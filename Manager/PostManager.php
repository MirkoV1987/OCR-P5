<?php

require_once('Framework/Model.php');
require_once('Model/Post.php');
require_once('Framework/Entity.php');

class PostManager extends Model 
{    

    public function getList()
    {
        $postsTab = [];
        $req = $this->getDb()->prepare("SELECT id, title, chapeau, date_add, content FROM  post  ORDER BY id desc");
        $req->execute();
        while ($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            array_push($postsTab, new Post($data));
        }
        return $postsTab;
    }

    public function getPost($postId) 
    {
        $post = []; 
        $req = $this->getDb()->prepare("SELECT id, title, chapeau, DATE_FORMAT(date_add, '%d/%m/%Y à %Hh%imin%ss') AS date_add_fr, DATE_FORMAT(date_update, '%d/%m/%Y à %Hh%imin%ss') AS date_update_fr, user_id, content FROM post WHERE id = :id");
        $req->bindValue(':id', $postId, \PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $post = $req->fetch();
        return $post;
    }

    public function add($params)
    {
        print_r($params);
        $post = new Post($params['post']);
        $req = $this->getDb()->prepare("INSERT INTO post(title, chapeau, date_add, content) VALUES(:title, :chapeau, :date_add, :content)");
        $post = $req->execute(array(':title'=>$post->getTitle(), ':chapeau'=>$post->getChapeau(), ':date_add'=>date("Y-m-d H:i:s"), ':content'=>$post->getContent() ));
        return $post;
    }

    public function update($params)
    {
        $post = new Post($params['post']);
        $req = $this->getDb()->prepare("UPDATE post SET title = :title, chapeau = :chapeau, date_update = :date_update, content = :content WHERE id = :id");
        $post = $req->execute(array(':id'=>$post->getId(),':title'=>$post->getTitle(), ':chapeau'=>$post->getChapeau(), ':date_update'=>date("Y-m-d H:i:s"), ':content'=>$post->getContent()));
        return $post;
    }

    public function delete($params)
    { 
        $req = $this->getDb()->prepare('DELETE FROM post WHERE id = :id');
        $post = $req->execute(array(':id'=>$params['get'][0]) );   
        return $post;
    }
    

}
