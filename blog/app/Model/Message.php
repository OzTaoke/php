<?php

namespace App\Model;

use Base\AbstractModel;
use Base\Db;
use Intervention\Image\ImageManager as Image;

class Message extends AbstractModel
{
    private $id;
    private $userId;
    private $message;

    private $date;
    private string $fileContent = '';
    private string $imagesPath =  'images';

    public function __construct($data = [])
    {
        if ($data) {
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
    public function setId(int $id): self
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
    public function setUserId(int $userId): self
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
    public function setMessage(string $message): self
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
    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileContent(): mixed
    {
        return $this->fileContent;
    }

    public function loadFile($file): void
    {
        if (isset($file)) {
            $this->fileContent = (string)mt_rand(1, 100000) . '.png';
            $result = getcwd() . DIRECTORY_SEPARATOR . $this->imagesPath . DIRECTORY_SEPARATOR . $this->fileContent;
            $image = (new Image)
                ->make($file)
                ->resize(200, null, function ($image) {
                    $image->aspectRatio();
                })
                ->insert(getcwd() . DIRECTORY_SEPARATOR . $this->imagesPath . DIRECTORY_SEPARATOR . 'watermark.png', 'bottom-right')
                ->save($result,100);
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

        return $db->exec($insert, __FILE__, [
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
        $users = User::getUsers();
        if (!$data) {
            return [];
        }
        $posts = [];
        foreach ($data as $row) {
            $message = new self($row);
            foreach ($users as $user) {
                if(in_array($user['id'], $row)) {
                    if ($user['id'] == $message->userId) {
                        $message->name = $user['name'];
                        break;
                    }
                } else {
                    $message->name = 'Удаленный пользователь';
                }
            }
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

        if (!$data) {
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

    public function setWatermark(Image $image)
    {

    }
}
