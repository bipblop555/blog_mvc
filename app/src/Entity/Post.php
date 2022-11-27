<?php

namespace App\Entity;

class Post extends BaseEntity
{
    private ?int $id = null;
    private string $post_title;

    private string $content;
    private string $username;
    private string $date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Post
     */
    public function setId(int $id): Post
    {
        $this->id = $id;
        
        return $this;
    }
    /**
     * @return string
     */
    public function getpost_title(): string 
    {
        return $this->post_title;
    }

    /**
     * @return string $post_title
     * @return Post
     */
    public function setpost_title(string $post_title): Post
    {
        $this->post_title = $post_title;

        return $this;
    }
    /**
     * @return string
     */
    public function getcontent(): string 
    {
        return $this->content;
    }

    /**
     * @return string $content
     * @return Post
     */
    public function setContent(string $content): Post
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Post
     */
    public function setUsername(string $username): Post
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     *
     * @param string $date
     * @return Post
     */
    public function setDate(string $date): Post
    {
        $this->date = $date;
        return $this;
    }

}