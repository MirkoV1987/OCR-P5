<?php

namespace \Model;

/**
 * Cette classe hydrate les entités de type Comment
 * 
 */

class Comment 
{

    private $id;
    private $content;
    private $date_add;
    private $date_update;
    private $user_id;
    private $post_id;
    private $active;

    //SETTERS
    
    public function setId(int $id)
    {
      $this->id = $id;
    }

    public function setContent(int $content)
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

    public function setUser_id(int $user_id)
    {
      $this->user_id = $user_id;
    }

    public function setPost_id(int $post_id)
    {
      $this->post_id = $post_id;
    }

    public function setActive(tinyint $active)
    {
      $this->active = $active;
    }  

    //GETTERS

    public function getId()
    {
      return $this->id;
    }

    public function getContent()
    {
      return $this->content;
    }

    public function getDate_add()
    {
      return $this->date_add;
    }

    public function getDate_update()
    {
      return $this->date_update;
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