<?php


require_once('Framework/Model.php');
require_once('Model/User.php');
require_once('Framework/Entity.php');


class UserManager extends Model 
{    

    public function login($username, $password)
    {
        $req = $this->getDb()->prepare("SELECT id, password FROM user WHERE username = :username");
        $user = $req->execute(array($username));
        
        if ($user->rowCount() == 1) {

            $user = $user->fetch(\PDO::FETCH_ASSOC);
             
            return (password_verify($password, $user['password']));
        }
    }    

    public function getList()
    {
        $req = $this->getDb()->prepare("SELECT id, username, email, password, active, validation_key, role, date_add FROM user ORDER BY date_add desc");
        $users = $req->execute();
        $usersTab = [];

        while ($data = $users->fetch(\PDO::FETCH_ASSOC))
        {
            $usersTab[] = new User($data);
        }

        return $usersTab;
    }

    public function getUser($id)
    {
        $req = $this->getDb()->prepare("SELECT id, username, email, password, active, validation_key, role, date_add FROM user WHERE id = :id");
        $user = $req->execute(array($id));
        
        if ($user->rowCount() == 1) {
            $data = $user->fetch(\PDO::FETCH_ASSOC);
        
            return new User($data);
        
        } else {

            throw new \Exception("Aucun utilisateur ne correspond à l'identifiant '$id'");
        }
    }

    public function getUserByUsername($username)
    {
        $req = $this->getDb()->prepare("SELECT id, username, email, password, active, validation_key, role, date_add FROM user WHERE username = :username");
        $user = $req->execute(array($username));
        
        if ($user->rowCount() == 1) {
            $data = $user->fetch(\PDO::FETCH_ASSOC);
        
            return new User($data);
        
        } else {

            throw new \Exception("Aucun utilisateur ne correspond à l'username '$username'");
        }
    }

    public function getUserByEmail($email)
    {
        $req = $this->getDb()->prepare("SELECT id, username, email, password, active, validation_key, role, date_add FROM user WHERE email = :email");
        $user = $req->execute(array($email));
        
        if ($user->rowCount() == 1) {
            $data = $user->fetch(\PDO::FETCH_ASSOC);
        
            return new User($data);
        
        } else {

            throw new \Exception("Aucun utilisateur ne correspond à l'e-mail '$email'");
        }
    }

    public function add($params)
    {
        $user = new User($params['post']);
        $req = $this->getDb()->prepare("INSERT INTO user (username, email, password, active, validation_key, role, date_add) VALUES (:username, :email, :password, :active, :validation_key, :role, :date_add)");
        $user = $req->execute(array(':username'=>$user->getUsername(),
                                    ':email'=>$user->getEmail(), 
                                    ':password'=>$user->getPassword(),
                                    ':active'=>$user->getActive(),
                                    ':validation_key'=>$user->getValidation_key(),
                                    ':role'=>$user->getRole(),
                                    ':date_add'=>date("Y-m-d H:i:s")  )  );
        return $user;
    }

    public function update($params)
    {
        $user = new User($params['post']);
        $req = $this->getDb()->prepare("UPDATE user SET id, username, email, password, active, validation_key, role WHERE id = :id");
        $user = $req->execute(array(':id'=>$user->getId(),
                                    ':username'=>$user->getUsername(),
                                    ':email'=>$user->getEmail(), 
                                    ':password'=>$user->getPassword(),
                                    ':active'=>$user->getActive(),
                                    ':validation_key'=>$user->getValidation_key(),
                                    ':role'=>$user->getRole()  )  );
        return $user;
    }

    public function delete($params)
    { 
        $req = $this->getDb()->prepare('DELETE FROM user WHERE id = :id');
        $user = $req->execute(array(':id'=>$params['get'][0]) );   
        return $user;
        
    }
    

}