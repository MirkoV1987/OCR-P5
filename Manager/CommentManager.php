<?php

namespace Manager;

use \Model;
use \Framework;

class CommentManager extends \Framework\Model 
{    

    public function getList($post_id = 0)
    {
        $comments = [];

        if ($post_id == 0) {

            $req = $this->getDb()->prepare("SELECT id, pseudo, content, date_add, active FROM comment ORDER BY id desc"); 
            $req->execute();

        } else {

            $req = $this->getDb()->prepare("SELECT id, pseudo, content, date_add, active FROM comment WHERE post_id = :post_id ORDER BY id desc"); 
            $req->execute(array(':post_id' => $post_id));
        }
       
        while ($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            array_push($comments, new \Model\Comment($data));
        }
        return $comments;
    }

    public function getComment($post_id = 0, $active = 1) 
    {
        $comment = []; 

        if ($post_id == 0) {

            $req = $this->getDb()->prepare("SELECT id, post_id, pseudo, content, date_add, active FROM comment"); 
            $req->execute();

        } 

        $req = $this->getDb()->prepare("SELECT id, pseudo, content, DATE_FORMAT(date_add, '%d/%m/%Y à %Hh%i') AS date_add, post_id FROM comment WHERE post_id = :post_id AND active = :active ORDER BY date_add DESC"); 
        $req->execute(array(':post_id' => $post_id, ':active' => $active) );
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $comment = $req->fetchAll();
        return $comment;
    }

    public function add($params)
    {
        $post_id = explode('-', $params['get'][0]);
        $comment = new \Model\Comment($params['post']);

        if (filter_var(\Framework\Session::getSession()->getKey('user')['role']) == 1) { 
        
        $req = $this->getDb()->prepare("INSERT INTO comment(pseudo, content, date_add, post_id, user_id, active) VALUES(:pseudo, :content, :date_add, :post_id, :user_id, :active)");
        $comment = $req->execute(array(':pseudo'=>$comment->getPseudo(),
                                       ':content'=>$comment->getContent(), 
                                       ':date_add'=>date("Y-m-d H:i:s"), 
                                       ':post_id'=> $post_id[0],
                                       ':user_id'=>\Framework\Session::getSession()->getKey('user')['id'], 
                                       ':active'=> 0 
                                       ) );
        }

        if (filter_var(\Framework\Session::getSession()->getKey('user')['role']) == 2) { 
        
        $req = $this->getDb()->prepare("INSERT INTO comment(pseudo, content, date_add, post_id, user_id, active) VALUES(:pseudo, :content, :date_add, :post_id, :user_id, :active)");
        $comment = $req->execute(array( ':pseudo'=>$comment->getPseudo(),
                                        ':content'=>$comment->getContent(), 
                                        ':date_add'=>date("Y-m-d H:i:s"), 
                                        ':post_id'=> $post_id[0],
                                        ':user_id'=>\Framework\Session::getSession()->getKey('user')['id'], 
                                        ':active'=> 1 
                                        ) );
            return $comment;   
        }
    
        
    }

    public function validate($id)
    {
        $comment = [];
        $req = $this->getDb()->prepare("UPDATE comment SET active = 1 WHERE id = :id");
        $comment = $req->execute(array(':id' => $id) );
        return $comment;
    }

    public function update($params)
    {
        $comment = new \Model\Comment($params['post']);
        $req = $this->getDb()->prepare("UPDATE comment SET id = :id, pseudo = :pseudo, content = :content, date_update = :date_update WHERE id = :id");
        $comment = $req->execute(array(':id'=>$comment->getId(), 
                                       ':pseudo'=>$comment->getPseudo(), 
                                       ':content'=>$comment->getContent(), 
                                       ':date_update'=>date("Y-m-d H:i:s") 
                                       ) );
        return $comment;
    }

    public function delete($params)
    { 
        $req = $this->getDb()->prepare('DELETE FROM comment WHERE id = :id');
        $req->execute(array(':id'=>$params['get'][0]) );   
    }
    
}