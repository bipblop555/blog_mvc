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
        $query = $this->pdo->prepare('INSERT INTO Posts (content, username, published) VALUES (:content, :username, :date)');

        $query->bindValue(
            "content", $post->getContent(), \PDO::PARAM_STR
        );
        $query->bindValue(
            "username", $post->getUsername(), \PDO::PARAM_STR
        );
        $query->bindValue(
            "date", $post->getDate(), \PDO::PARAM_STR
        );

        $query->execute();
    }
}