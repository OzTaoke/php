<?php

namespace App\Model;

use Base\AbstractModel;
use Base\Db;

class Message extends AbstractModel
{
    private $id;
    private $userId;
    private $message;

    private $date;
    private $fileContent;

    public function __construct($data = [])
    {
        if($data) {
            $this->id = $data['id'];
            $this->userId = $data['user_id'];
            $this->message = $data['message'];
            $this->date = $data['date'];
            $this->fileContent = $data['file_content'] ?? '';
        }
    }

    /**
     * @return mixed
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileContent()
    {
        return $this->fileContent;
    }

    public function loadFile($file)
    {
        if(isset($file)) {
            $this->fileContent = mt_rand(1,100000) . '.png';
            move_uploaded_file
            ($file, getcwd() . '/images/' . $this->fileContent);
        }
    }

    public function getData(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->userId,
            'message' => $this->message,
            'date' => $this->date,
            'file_content' => $this->fileContent
        ];
    }
    public function save(): int
    {
        $db = Db::getInstance();
        $insert = "INSERT INTO blog.posts (user_id, `message`, date, file_content) 
        VALUES (:userId, :message, :date, :fileContent)";

        return $db->exec($insert, __FILE__,
        [
            ':userId' => $this->userId,
            ':message' => $this->message,
            ':date' => $this->date,
            ':fileContent' => $this->fileContent
        ]);
    }

    public static function delete(int $id): int
    {
        $db = Db::getInstance();
        $delete = "DELETE FROM blog.posts WHERE id = $id";
        return $db->exec($delete, __FILE__);
    }

    public static function getView(): array
    {
        $db = Db::getInstance();
        $select = "SELECT * FROM blog.posts ORDER BY date DESC LIMIT 20";
        $data = $db->fetchAll($select, __METHOD__);

        if(!$data) {
            return [];
        }

        $posts = [];
        foreach ($data as $row) {
            $message = new self($row);
            $message->id = $row['id'];
            $posts[] = $message;
        }

        return $posts;
    }

    public static function getMessagesByUserId(string $id): array
    {
        $db = Db::getInstance();
        $select = "SELECT * FROM blog.posts WHERE user_id = :id LIMIT 20";
        $data = $db->fetchAll($select, __METHOD__, [':id' => $id]);

        if(!$data) {
            return [];
        }

        $posts = [];
        foreach ($data as $row) {
            $message = new self($row);
            $message->id = $row['id'];
            $posts[] = $message;
        }

        return $posts;
    }

}