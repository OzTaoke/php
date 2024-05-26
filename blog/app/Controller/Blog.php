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
    public function indexAction(): string
    {
        if (!$this->user) {
            $this->redirect('/');
        }
        $posts = MessageModel::getView();

        return $this->view->render('Blog/index', 2, [
            'user' => $this->user,
            'posts' => $posts,
            'admin' => $this->user->isAdmin()
        ]);
    }

    /**
     * @throws RedirectException
     */
    public function sendAction(): void
    {
        if (!$this->user) {
            $this->redirect('/');
        }
        if ($_POST['message'] || $_FILES['userfile']['tmp_name']) {
            $message = htmlspecialchars($_POST['message']);
            $user_id = $_SESSION['id'];
            $date = date("Y-m-d H:i:s");

            $post = (new MessageModel())
                ->setUserId($user_id)
                ->setMessage($message)
                ->setDate($date);

            if (!empty($_FILES['userfile']['tmp_name'])) {
                $post->loadFile($_FILES['userfile']['tmp_name']);
            }

            $post->save();
        }

        $this->redirect('/blog/index');
    }
}
