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
        $post = new Post($params['post']);
        $req = $this->getDb()->prepare("INSERT INTO post(title, chapeau, date_add, content) VALUES(:title, :chapeau, :date_add, :content)");
        $post = $req->execute(array(':title'=>$post->getTitle(), ':chapeau'=>$post->getChapeau(), ':date_add'=>$post->getDate_add(), ':content'=>$post->getContent() ));
        return $post;
    }

    public function update()
    {
        if(isset($_GET['update'])) {

        $req = $this->getDb()->prepare("UPDATE post SET(title = :title, chapeau = :chapeau, date_update_fr = :date_update_fr, content = :content) WHERE(id = :id, user_id = :user_id)");
        $post = $this->execute($req, array($post->getTitle(), $post->getChapeau(), $post->getDate_update(), $post->getContent()));

        }
        
    }

    public function delete($params)
    { 
        $post = new Post($params['post']);
        $req = $this->getDb()->prepare('DELETE FROM post WHERE id = :id');
        //$req->bindValue(':id', $postId, \PDO::PARAM_INT);
        $post = $req->execute(array(':id'=>$post->getId() ) );
        
        print_r($post);
        return $post;
        
    }
    

}
