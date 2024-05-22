<?php

namespace App\Controller;

use App\Model\Message;
use Base\AbstractController;
use Base\RedirectException;

class Admin extends AbstractController
{
    /**
     * @throws RedirectException
     */
    public function deleteAction()
    {

        if(!$this->user || !$this->user->isAdmin()) {
            $this->redirect('/');
        }
        $id = (int) $_GET['id'];
        Message::delete($id);
        $this->redirect('/blog/index');
    }
}