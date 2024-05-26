<?php

namespace Base;


use App\Model\Message;
use App\Model\User;

abstract class AbstractController
{
    /** @var View */
    protected $view;
    /** @var User */
    protected $user;
    /**
     * @throws RedirectException
     */

    protected function redirect(string $url)
    {
        throw new RedirectException($url);
    }

    public function setView(View $view): void
    {
        $this->view = $view;
    }
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
