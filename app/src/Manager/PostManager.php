<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{
    /**
     * @return Post[]
     */
    public function getAllPosts(): array
    {
        $query = $this->pdo->query('SELECT * FROM Posts');

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)){

            $users[] = new Post($data);
        }

        return $users;
    }

    public function insertPost(Post $post)
    {
        $query = $this->pdo->prepare('INSERT INTO Posts (content, author) VALUES (:content, :author)');

        $query->bindValue(
        "content", $post->getContent(), \PDO::PARAM_STR
        );
        $query->bindValue(
        "author", $post->getAuthor(), \PDO::PARAM_STR
        );

        $query->execute();
    }
}