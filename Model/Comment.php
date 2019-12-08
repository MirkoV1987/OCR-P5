<?php

require_once("Framework/Entity.php");

class Comment extends Entity
{

    private $id;
    private $pseudo;
    private $content;
    private $date_add;
    private $date_update;
    private $user_id;
    private $post_id;
    private $active;

    //SETTERS
    
    public function setId($id)
    {
      $id = (int) $id;
        if($id > 0)
           $this->id = $id;
    }

    public function setPseudo(string $pseudo)
    {
      $this->pseudo = $pseudo;
    }

    public function setContent(string $content)
    {
      $this->content = $content;
    }

    public function setDate_add(string $date_add)
    {
      $this->date_add = $date_add;
    }

    public function setDate_update(string $date_update)
    {
      $this->date_update = $date_update;
    }

    public function setUser_id($user_id)
    {
      $user_id = (int) $user_id;
      if($user_id > 0)
         $this->user_id = $user_id;
    }

    public function setPost_id($post_id)
    {
      $post_id = (int) $post_id;
      if($post_id > 0)
         $this->post_id = $post_id;
    }

    public function setActive($active)
    {
      $active = (int) $active;
      if($active > 0)
         $this->active = $active;
    }  

    //GETTERS

    public function getId()
    {
      return $this->id;
    }

    public function getPseudo()
    {
      return $this->pseudo;
    }

    public function getContent()
    {
      return $this->content;
    }

    public function getDate_add($lg = "")
    {
      return date("d/m/Y h:m", strtotime($this->date_add));
    }

    public function getDate_update($lg = "")
    {
      return date("d/m/Y h:m", strtotime($this->date_update));
    }

    public function getUser_id()
    {
      return $this->user_id;
    }

    public function getPost_id()
    {
      return $this->post_id;
    }

    public function getActive()
    {
      return $this->active;
    }
    
}
