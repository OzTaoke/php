<?php

namespace App\Controller;

use App\Model\Message;
use Base\AbstractController;

class Api extends AbstractController
{
    public function getUserMessages()
    {
        $userId = (int) $_GET['user_id'] ?? 0;
        if(!$userId) {
            return $this->response(['error' => 'Пользователь не найден']);
        }
        $messages = Message::getMessagesByUserId($userId);
        if(!$messages) {
            return $this->response(['error' => 'нет сообщений']);
        }

        $data = array_map(function (Message $message) {
            return $message->getData();
        }, $messages);

        return $this->response(['messages' => $data]);
    }

    public function response(array $data)
    {
        header('Content-type: application/json');
        return json_encode($data);
    }
}