<?php

require_once("Framework/Entity.php");

class Post extends Entity
{

    private $id;
    private $user_id;
    private $author;
    private $title;
    private $chapeau;
    private $date_add;
    private $date_update;
    private $content;

    //SETTERS
    public function setId($id)
    {
        $id = (int) $id;
        if($id > 0)
           $this->id = $id;
    }

    public function setUser_id($user_id)
    {
        $user_id = (int) $user_id;
        if($user_id > 0)
           $this->user_id = $user_id;
    }

    public function setAuthor($author)
    {
        $author = (string) $author;
        if(is_string($author))
           $this->author = $author;
    }

    public function setTitle($title)
    {
        $title = (string) $title;
        if(is_string($title))
           $this->title = $title;
    }

    public function setChapeau($chapeau)
    {
        $chapeau = (string) $chapeau;
        if(is_string($chapeau))
           $this->chapeau = $chapeau;
    }

    public function setImageUrl($imageUrl)
    {
        $imageUrl = (string) $imageUrl;
        if(is_string($imageUrl))
           $this->imageUrl = $imageUrl;
    }

    public function setDate_add($date_add)
    {
           $this->date_add = $date_add;
    }

    public function setDate_update($date_update)
    {
           $this->date_update = $date_update;
    }

    public function setContent($content)
    {
        $content = (string) $content;
        if(is_string($content))
           $this->content = $content;
    }

    //GETTERS

    public function getId()
    {
        return $this->id;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getChapeau()
    {
        return $this->chapeau;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function getDate_add($lg = "")
    {
        return date("d/m/Y h:m", strtotime($this->date_add));
        return $this->date_add;
    }

    public function getDate_update()
    {
        return date("d/m/Y h:m", strtotime($this->date_update));
        return $this->date_update;
    }

    public function getContent()
    {
        return $this->content;
    }
    
}
