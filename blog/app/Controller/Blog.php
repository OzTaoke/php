<?php

namespace App\Controller;

use App\Model\Message as MessageModel;
use Base\RedirectException;
use Base\AbstractController;

class Blog extends AbstractController
{
    /**
     * @throws RedirectException
     */
    function indexAction(): string
    {
        if(!$this->user) {
            $this->redirect('/user/register');
        }
        $posts = MessageModel::getView();

        return $this->view->render('Blog/index.phtml',
        [
            'user' => $this->user,
            'posts' => $posts
        ]);
    }

    /**
     * @throws RedirectException
     */
    function sendAction()
    {
        if(!$this->user) {
            $this->redirect('/user/register');
        }
        if($_POST['message'] || $_FILES['userfile']['tmp_name']) {
            $message = htmlspecialchars($_POST['message']);
            $user_id = $_SESSION['id'];
            $date = date("Y-m-d H:i:s");

            $post = (new MessageModel())
                ->setUserId($user_id)
                ->setMessage($message)
                ->setDate($date);

            if(!empty($_FILES['userfile']['tmp_name'])) {
                $post->loadFile($_FILES['userfile']['tmp_name']);
            }

            $post->save();
        }

        $this->redirect('/blog/index');
    }

}