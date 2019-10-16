<?php

namespace \Model;

/**
 * Cette classe hydrate les entités de type User
 * 
 */

class User 
{

    private $id;
    private $username;
    private $password;
    private $active;
    private $validation_key;
    private $role;
    private $date_add;

    public function getId()
    {
      return $this->id;
    }

    public function setId(int $id)
    {
      $this->id = $id;
    }

    public function getUsername()
    {
      return $this->username;
    }

    public function setUsername(string $username)
    {
      $this->content = $username;
    }

    public function getPassword()
    {
      return $this->password;
    }

    public function setPassword(binary $password)
    {
      $this->password = $password;
    }

    public function getActive()
    {
      return $this->active;
    }

    public function setActive(tinyint $active)
    {
      $this->active = $active;
    }

    public function getValidation_key()
    {
      return $this->validation_key;
    }

    public function setValidation_key(binary $validation_key)
    {
      $this->validation_key = $validation_key;
    }

    public function getRole()
    {
      return $this->role;
    }

    public function setRole(int $role)
    {
      $this->role = $role;
    }  

    public function getDate_add()
    {
      return $this->date_add;
    }

    public function setDate_add(string $date_add)
    {
      $this->date_add = $date_add;
    }
    
}