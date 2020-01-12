<?php

namespace Manager;

use \Model;
use \Framework;

class UserManager extends \Framework\Model 
{  
    private $encrypt = PASSWORD_BCRYPT;

    public function register($data)
    {
        $password = password_hash($data['post']['password'], $this->encrypt);

        $req = $this->getDb()->prepare("INSERT INTO user (username, email, password, active, role, date_add) VALUES (:username, :email, :password, :active, :role, :date_add)");
        $req->execute(array(':username'=>$data['post']['username'],
                            ':email'=>$data['post']['email'], 
                            ':password'=>$password,
                            ':active'=> 1,
                            ':role'=> 1,
                            ':date_add'=>date("Y-m-d H:i:s") 
                            ) );
    }  

    public function login($username, $password)
    {
        $req = $this->getDb()->prepare("SELECT id, imageUrl, username, password, active, role FROM user WHERE username = :username LIMIT 1");
        $req->execute(array(':username' => $username) );
        
        $user = $req->fetch(\PDO::FETCH_ASSOC);
 
        $checkPassword = password_verify($password, $user['password']);

        if (password_needs_rehash($user['password'], $this->encrypt) ) {

            $password = password_hash($user['password'], $this->encrypt);
            $req = $this->getDb()->prepare("UPDATE user SET password = :password WHERE id = :id");
            $req->execute(array(':password' => $password, ':id' => $user['id']) );

        }

        if ($checkPassword) {

            return $user;

        }
        
        return false; 
         
    }    

    public function getList()
    {
        $usersTab = [];
        $req = $this->getDb()->prepare("SELECT id, imageUrl, username, email, password, active, role, DATE_FORMAT(date_add, '%d/%m/%Y à %Hh%i') AS date_add_fr FROM user ORDER BY date_add desc");
        $req->execute();

        while ($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            array_push($usersTab, new \Model\User($data));
        }

        return $usersTab;
    }

    public function getUser($id)
    {
        $user = [];
        $req = $this->getDb()->prepare("SELECT id, imageUrl, username, email, password, active, validation_key, role, DATE_FORMAT(date_add, '%d/%m/%Y à %Hh%i') AS date_add_fr FROM user WHERE id = :id");
        $req->execute(array(':id' => $id));
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $user = $req->fetch();
        return $user;
    }

    public function add($params)
    {
        $password = password_hash($data['post']['password'], $this->encrypt);
        $user = new \Model\User($params['post']);
        $req = $this->getDb()->prepare("INSERT INTO user (imageUrl, username, email, password, active, role, date_add) VALUES (:imageUrl, :username, :email, :password, :active, :role, :date_add)");
        $user = $req->execute(array(':imageUrl'=>$user->getImageUrl(),
                                    ':username'=>$user->getUsername(),
                                    ':email'=>$user->getEmail(), 
                                    ':password'=>$password,
                                    ':active'=>$user->getActive(),
                                    ':role'=>$user->getRole(),
                                    ':date_add'=>date("Y-m-d H:i:s") 
                                    ) );
    }

    public function update($params)
    {
        if (!empty($params['post']['password']) ) {

        $password = password_hash($data['post']['password'], $this->encrypt);
        $user = new \Model\User($params['post']);
        $req = $this->getDb()->prepare("UPDATE user SET id = :id, imageUrl = :imageUrl, username = :username, email = :email, password = :password, active = :active, role = :role WHERE id = :id");
        $user = $req->execute(array(':id'=>$user->getId(),
                                    ':imageUrl'=>$user->getImageUrl(),
                                    ':username'=>$user->getUsername(),
                                    ':email'=>$user->getEmail(), 
                                    ':password'=>$password,
                                    ':active'=>1,
                                    ':role'=>$user->getRole()  
                                    ) );
       }

       if (empty($params['post']['password']) ) {

        $user = new \Model\User($params['post']);
        $req = $this->getDb()->prepare("UPDATE user SET id = :id, imageUrl = :imageUrl, username = :username, email = :email, active = :active, role = :role WHERE id = :id");
        $user = $req->execute(array(':id'=>$user->getId(),
                                    ':imageUrl'=>$user->getImageUrl(),
                                    ':username'=>$user->getUsername(),
                                    ':email'=>$user->getEmail(),
                                    ':active'=>1,
                                    ':role'=>$user->getRole() 
                                    ) );
       }

    }

    public function delete($params)
    { 
        $req = $this->getDb()->prepare('DELETE FROM user WHERE id = :id');
        $req->execute(array(':id'=>$params['get'][0]) );   
    }
    
}