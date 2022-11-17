<?php

namespace App\Entity;

class Post extends BaseEntity
{
    private int $id;
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
     * @return int
     */
    public function getAuthor(): int
    {
        return $this->author;
    }

    /**
     * @param int $author
     * @return Post
     */
    public function setAuthor(int $author): Post
    {
        $this->author = $author;
        return $this;
    }
}