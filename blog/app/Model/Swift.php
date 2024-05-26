<?php

namespace App\Model;

use Base\AbstractModel;
use Swift_Attachment;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Swift extends AbstractModel
{
    private $mailer;
    private $message;

    function __construct()
    {
        $transport = (new Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl'))
            ->setUsername(BLOG_EMAIL)
            ->setPassword(BLOG_PASSWORD);

        $this->mailer = new Swift_Mailer($transport);
        return $this->mailer;
    }

    public function sendMessage(string $email, string $body, string $file): int
    {
        $this->message = (new Swift_Message('Wonderfully subject'))
            ->setFrom([BLOG_EMAIL => BLOG_EMAIL])
            ->setTo([$email])
            ->setBody($body)
            ->attach(Swift_Attachment::fromPath($file));
        return $this->mailer->send($this->message);
    }
}
