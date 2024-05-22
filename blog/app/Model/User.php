<?php

namespace App\Model;

use Base\AbstractModel;
use Base\Db;

class User extends AbstractModel
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $createAt;

    public function __construct($data = [])
    {
        if($data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->email = $data['email'];
            $this->password = $data['password'];
            $this->createAt = $data['created_at'];
        }
    }

    /**
     * @return mixed
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword():string
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreateAt():string
    {
        return $this->createAt;
    }

    /**
     * @param mixed $createAt
     */
    public function setCreateAt(string $createAt): self
    {
        $this->createAt = $createAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail(): int
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
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

    public function save(): int
    {
        $db = Db::getInstance();
        $insert = "INSERT INTO blog.users (`name`, `email`, `password`) 
        VALUES (:name, :email, :password)";

        $db->exec($insert, __METHOD__, [
            ':name' => $this->name,
            ':email' => $this->email,
            ':password' => $this->password,
        ]);

        $id = $db->lastInsertId();
        $this->id = $id;

        return $id;
    }

    public static function getById(int $id)
    {
        $db = Db::getInstance();
        $select = "SELECT * FROM blog.users WHERE id = $id";
        $data = $db->fetchOne($select, __METHOD__);

        if(!$data) {
            return null;
        }

        return new self($data);
    }

    public static function getUserNameById(int $id): string
    {
        $db = Db::getInstance();
        $select = "SELECT * FROM blog.users WHERE id = $id";
        $data = $db->fetchOne($select, __METHOD__);

        if(!$data) {
            return '';
        }

        return $data['name'];
    }

    public static function getByEmail(string $email)
    {
        $db = Db::getInstance();
        $select = "SELECT * FROM blog.users WHERE `email` = :email";
        $data = $db->fetchOne($select, __METHOD__, [':email' => $email]);

        if(!$data) {
            return null;
        }

        return new self($data);
    }

    public static function getPasswordHash(string $password): string
    {
        return sha1('.2458swdvf' . $password);
    }

    public function isAdmin(): bool
    {
        return in_array($this->id, ADMIN_ITS);
    }
}
























