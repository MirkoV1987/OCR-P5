<?php

use Model;

/**
 * Cette classe hydrate les entités de type User
 * Cette classe utilise les méthodes de la classe mère Entity
 */

require_once("Framework/Entity.php");

class User extends Entity
{

  const ROLE = [
    
    1 => 'Member',
    2 => 'Admin'
    
  ];

    private $id;
    private $username;
    private $email;
    private $password;
    private $active;
    private $validation_key;
    private $role;
    private $date_add;

    //GETTERS

    public function getId()
    {
      return $this->id;
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

    public function getActive()
    {
      return $this->active;
    }

    public function getValidation_key()
    {
      return $this->validation_key;
    }

    public function getRole()
    {
      return $this->role;
    }

    public function getRoleString(): string
    {
      return self::ROLE[$this->role];
    }

    public function getDate_add($lg = "")
    {
      return date("d/m/Y h:m", strtotime($this->date_add));
    }

    //SETTERS

    public function setId(int $id)
    {
      $this->id = $id;
    }

    public function setUsername(string $username)
    {
      $this->username = $username;
    }

    public function setEmail(string $email)
    {
      $this->email = $email;
    }

    public function setPassword(binary $password)
    {
      $this->password = $password;
    }

    public function setActive(tinyint $active)
    {
      $this->active = $active;
    }

    public function setValidation_key(binary $validation_key)
    {
      $this->validation_key = $validation_key;
    }

    public function setRole(int $role)
    {
      $this->role = $role;
    }  

    public function setDate_add(string $date_add)
    {
      $this->date_add = $date_add;
    }
    
}
