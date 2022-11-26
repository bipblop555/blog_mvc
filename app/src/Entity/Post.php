<?php

namespace App\Entity;

class Post extends BaseEntity
{
    private ?int $id = null;
    private string $content;
    private string $username;
    private string $date;

    private array $fetchedPosts;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Postusername
     */
    public function setId(int $id): Post
    {
        $this->id = $id;
        
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

    /**
     * @param array $fetchedPosts
     * @return array
     */
    public function getfetchedPosts(): array
    {
        return $this->fetchedPosts;
    }

    /**
     * @param array $fetchedPosts
     * @return void
     */
    public function setfetchedPosts(array $fetchedPosts)
    {
        $this->fetchedPosts = $fetchedPosts;
        return $this;
    }
}