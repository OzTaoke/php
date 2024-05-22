<?php
namespace App\Controller;
use App\Model\User as UserModel;
use Base\RedirectException;
use Base\AbstractController;

class User extends AbstractController
{
    /**
     * @throws RedirectException
     */
    public function loginAction(): string
    {
        $email = trim($_POST['email']);

        if($email) {
            $password = $_POST['password'];
            $user = UserModel::getByEmail($email);
            if(!$user) {
                $this->view->assign('error', 'Неверный логин и пароль');
            }
            if($user) {
                if($user->getPassword() != UserModel::getPasswordHash($password)) {
                    $this->view->assign('error', 'Неверный логин и пароль');
                } else {
                    $_SESSION['id'] = $user->getId();
                    $this->redirect('/blog/index');
                }
            }
        }

        return $this->view->render('User/register.phtml', [
                'user' => UserModel::getById((int) $_GET['id'])
            ]);
    }

    /**
     * @throws RedirectException
     */
    function registerAction(): string
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $passwordRepeat = trim($_POST['passwordRepeat']);

        $success = true;
        if(isset($_POST['email'])) {
            if(!$email) {
                $this->view->assign('error', 'Введите email');
                $success = false;
            }

            $user = UserModel::getByEmail($email);
            if(!$name) {
                $this->view->assign('error', 'Введите имя');
                $success = false;
            }
            if($user) {
                $this->view->assign('error', 'Пользователь с таким email уже существует');
                $success = false;
            }

            if(!$password) {
                $this->view->assign('error', 'Введите пароль');
                $success = false;
            }
            if(strlen($password) < 4) {
                $this->view->assign('error', 'Пароль должен быть больше 4 символов');
                $success = false;
            }
            if($password != $passwordRepeat) {
                $this->view->assign('error', 'Пароли не совпадают');
                $success = false;
            }

            if($success) {
                $user = (new UserModel())
                    ->setName($name)
                    ->setEmail($email)
                    ->setPassword(UserModel::getPasswordHash($password));

                $user->save();

                $_SESSION['id'] = $user->getId();
                $this->setUser($user);

                $this->redirect('/blog/index');
            }
        }

        return $this->view->render('User/register.phtml',
            [
                'user' => UserModel::getById((int) $_GET['id'])
            ]);
    }

    /**
     * @throws RedirectException
     */
    public function logoutAction()
    {
        session_destroy();
        $this->redirect('/user/login');
    }

}


















