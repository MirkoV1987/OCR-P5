<?php

namespace Model;

use \Framework;

class User extends \Framework\Entity
{
    const ROLE = [
   
  1 => 'member',
  2 => 'admin'

  ];

    private $id;
    private $username;
    private $email;
    private $password;
    private $active;
    private $validation_key;
    private $role;
    private $date_add;

    //SETTERS

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setImageUrl($imageUrl)
    {
        $imageUrl = (string) $imageUrl;
        if (is_string($imageUrl)) {
            $this->imageUrl = $imageUrl;
        }
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setPassword(string $password)
    {
        $password = (string) $password;
        if (is_string($password)) {
            $this->password = $password;
        }
    }

    public function setActive($active)
    {
        $active = (int) $active;
        if (is_int($active)) {
            $this->active = $active;
        }
    }

    public function setValidation_key(binary $validation_key)
    {
        $this->validation_key = $validation_key;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setDate_add(string $date_add)
    {
        $this->date_add = $date_add;
    }

    //GETTERS

    public function getId()
    {
        return $this->id;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getActive() : int
    {
        return (int) $this->active;
    }

    public function getValidation_key()
    {
        return $this->validation_key;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getRoleString(): int
    {
        return self::ROLE[$this->role];
    }

    public function getDate_add()
    {
        return date("d/m/Y h:m", strtotime($this->date_add));
    }
}
