<?php

require_once('Framework/Model.php');
require_once('Model/Post.php');
require_once('Framework/Entity.php');

class PostManager extends Model 
{    

    public function getList()
    {
        $postsTab = [];
        $req = $this->getDb()->prepare("SELECT id, author, title, chapeau, imageUrl, date_add, content FROM  post  ORDER BY id desc");
        $req->execute();
        while ($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            array_push($postsTab, new Post($data));
        }
        return $postsTab;
    }

    public function getPost($id) 
    {
        $post = []; 
        $req = $this->getDb()->prepare("SELECT id, author, title, chapeau, imageUrl, DATE_FORMAT(date_add, '%d/%m/%Y à %Hh%imin%ss') AS date_add_fr, DATE_FORMAT(date_update, '%d/%m/%Y à %Hh%imin%ss') AS date_update_fr, content FROM post WHERE id = :id");
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $post = $req->fetch();
        return $post;
    }

    public function add($params)
    {
        $post = new Post($params['post']);
        $req = $this->getDb()->prepare("INSERT INTO post(author, title, chapeau, imageUrl, date_add, content) VALUES(:author, :title, :chapeau, :imageUrl, :date_add, :content)");
        $post = $req->execute(array(':author'=>$post->getAuthor(),
                                    ':title'=>$post->getTitle(), 
                                    ':chapeau'=>$post->getChapeau(), 
                                    ':imageUrl'=>$post->getImageUrl(), 
                                    ':date_add'=>date("Y-m-d H:i:s"), 
                                    ':content'=>$post->getContent() 
                                    ) );
        return $post;
    }

    public function update($params)
    {
        $post = new Post($params['post']);
        $req = $this->getDb()->prepare("UPDATE post SET author = :author, title = :title, imageUrl = :imageUrl, chapeau = :chapeau, date_update = :date_update, content = :content WHERE id = :id");
        $post = $req->execute(array(':id'=>$post->getId(),
                                    ':author'=>$post->getAuthor(),
                                    ':title'=>$post->getTitle(), 
                                    ':chapeau'=>$post->getChapeau(),
                                    ':imageUrl'=>$post->getImageUrl(), 
                                    ':date_update'=>date("Y-m-d H:i:s"), 
                                    ':content'=>$post->getContent() 
                                    ) );
        return $post;
    }

    public function delete($params)
    { 
        $req = $this->getDb()->prepare('DELETE FROM post WHERE id = :id');
        $req->execute(array(':id'=>$params['get'][0] ) );   
    }
    
}
