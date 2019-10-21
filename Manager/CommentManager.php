<?php


require_once('Framework/Model.php');
require_once('Model/Comment.php');
require_once('Framework/Entity.php');

class CommentManager extends Model 
{    

    public function getList()
    {
        $comments = [];
        $req = $this->getDb()->prepare("SELECT id, pseudo, content, date_add, active FROM comment ORDER BY id desc");
        $req->execute();
        while ($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            array_push($comments, new Comment($data));
        }
        return $comments;
    }

    public function getComment($commentId) 
    {
        $comment = []; 
        $req = $this->getDb()->prepare("SELECT id, pseudo, content, DATE_FORMAT(date_add, '%d/%m/%Y à %Hh%imin%ss') AS date_add_fr, post_id, active FROM comment WHERE id = :id");
        $req->bindValue(':id', $commentId, \PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $comment = $req->fetch();
        return $comment;
    }

    public function add($params)
    {
        $comment = new Comment($params['post']);
        $req = $this->getDb()->prepare("INSERT INTO comment(pseudo, content, date_add, active) VALUES(:pseudo, :content, :date_add, :active)");
        $comment = $req->execute(array(':pseudo'=>$comment->getPseudo(), ':content'=>$comment->getContent(), ':date_add'=>date("Y-m-d H:i:s"), ':active'=>$comment->getActive() ) );
        return $comment;
    }

    public function update($params)
    {
        $comment = new Comment($params['post']);
        $req = $this->getDb()->prepare("UPDATE comment SET id = :id, pseudo = :pseudo, content = :content, date_update = :date_update WHERE id = :id");
        $comment = $req->execute(array(':id'=>$comment->getId(), ':pseudo'=>$comment->getPseudo(), ':content'=>$comment->getContent(), ':date_update'=>date("Y-m-d H:i:s") ) );
        return $comment;
    }

    public function delete($params)
    { 
        $req = $this->getDb()->prepare('DELETE FROM comment WHERE id = :id');
        $comment = $req->execute(array(':id'=>$params['get'][0]) );   
        return $comment;
    }
    

}
