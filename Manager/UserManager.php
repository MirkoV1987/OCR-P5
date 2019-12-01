<?php


require_once('Framework/Model.php');
require_once('Model/User.php');
require_once('Framework/Entity.php');


class UserManager extends Model 
{    

    public function register($data)
    {
        $password = password_hash($data['post']['password'], PASSWORD_BCRYPT);
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
        $req = $this->getDb()->prepare("SELECT id, username, password, active, role FROM user WHERE username = :username LIMIT 1");
        $req->execute(array(':username' => $username) );
        
        $user = $req->fetch(\PDO::FETCH_ASSOC);
         
        $checkPassword = password_verify($password, $user['password']);
     
        return $checkPassword;  
    }    

    public function getList()
    {
        $usersTab = [];
        $req = $this->getDb()->prepare("SELECT id, imageUrl, username, email, password, active, role, date_add FROM user ORDER BY date_add desc");
        $req->execute();

        while ($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            array_push($usersTab, new User($data));
        }

        return $usersTab;
    }

    public function getUser($id)
    {
        $user = [];
        $req = $this->getDb()->prepare("SELECT id, imageUrl, username, email, password, active, validation_key, role, date_add FROM user WHERE id = :id");
        $req->execute(array(':id' => $id));
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $user = $req->fetch();
        return $user;
    }

    public function add($params)
    {
        $password = password_hash($data['post']['password'], PASSWORD_BCRYPT);
        $user = new User($params['post']);
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

        $password = password_hash($data['post']['password'], PASSWORD_BCRYPT);
        $user = new User($params['post']);
        $req = $this->getDb()->prepare("UPDATE user SET id = :id, imageUrl = :imageUrl, username = :username, email = :email, password = :password, active = :active, role = :role WHERE id = :id");
        $user = $req->execute(array(':id'=>$user->getId(),
                                    ':imageUrl'=>$user->getImageUrl(),
                                    ':username'=>$user->getUsername(),
                                    ':email'=>$user->getEmail(), 
                                    ':password'=>$password,
                                    ':active'=> 1,
                                    ':role'=> 2  
                                    ) );
       }

       if (empty($params['post']['password']) ) {

        $user = new User($params['post']);
        $req = $this->getDb()->prepare("UPDATE user SET id = :id, imageUrl = :imageUrl, username = :username, email = :email, active = :active, role = :role WHERE id = :id");
        $user = $req->execute(array(':id'=>$user->getId(),
                                    ':imageUrl'=>$user->getImageUrl(),
                                    ':username'=>$user->getUsername(),
                                    ':email'=>$user->getEmail(),
                                    ':active'=> 1,
                                    ':role'=> 2  
                                    ) );
       }

    }

    public function delete($params)
    { 
        $req = $this->getDb()->prepare('DELETE FROM user WHERE id = :id');
        $req->execute(array(':id'=>$params['get'][0]) );   
    }
    
}
