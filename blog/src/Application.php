<?php

namespace Base;

use App\Controller\Blog;
use App\Controller\User;

class Application
{
    private $route;
    /** @var AbstractController */
    private $controller;
    private $actionName;

    private $pattern;

    public function __construct()
    {
        $this->route = new Route();
    }

    /**
     * @throws RouteException
     */
    public function run(): void
    {
        try {
            session_start();
            $this->addRoutes();
            $this->initController();
            $this->initAction();

            $view = new View();
            $this->controller->setView($view);
            $this->initUser();

            $content = $this->controller->{$this->actionName}();

            echo $content;
        } catch (RedirectException $e) {
            header('Location: ' . $e->getUrl());
            die;
        } catch (RouteException $e) {
            header('HTTP/1.0 404 Not Found');
            die;
        }
    }

    private function initUser(): void
    {
        $id = $_SESSION['id'] ?? null;
        if ($id) {
            $user = \App\Model\User::getById($id);
            if ($user) {
                $this->controller->setUser($user);
            }
        }
    }

    private function addRoutes(): void
    {
        /** @uses User::indexAction */
        $this->route->addRoute('/', User::class, 'index');
        /** @uses User::loginAction */
        $this->route->addRoute('/user/login', User::class, 'login');
        /** @uses User::registerAction */
        $this->route->addRoute('/user/register', User::class, 'register');
        /** @uses Blog::indexAction */
        $this->route->addRoute('/blog', Blog::class, 'index');
        $this->route->addRoute('/blog/index', Blog::class, 'index');
    }

    /**
     * @throws RouteException
     */
    private function initController(): void
    {
        $controllerName = $this->route->getControllerName();
        if (!class_exists($controllerName)) {
            throw new RouteException("Controller class '$controllerName' not found");
        }
        $this->controller = new $controllerName();
    }

    /**
     * @throws RouteException
     */
    private function initAction(): void
    {
        $actionName = $this->route->getActionName();
        if (!method_exists($this->controller, $actionName)) {
            throw new RouteException('Action does not exist');
        }
        $this->actionName = $actionName;
    }
}