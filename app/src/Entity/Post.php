<?php

namespace App\Entity;

class Post extends BaseEntity
{
    private ?int $id = null;
    private string $content;
    private string $author;

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
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Post
     */
    public function setAuthor(string $author): Post
    {
        $this->author = $author;
        return $this;
    }
}