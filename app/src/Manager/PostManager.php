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
        $query = $this->pdo->prepare('SELECT * FROM `Posts` ORDER BY `published` DESC');

        $query->execute();

        while ($data = $query->fetchAll(\PDO::FETCH_ASSOC)){

            $fetchedPosts[] = new Post($data);
        }

        $fetchedPosts = $query->fetchAll(\PDO::FETCH_ASSOC);


        return $fetchedPosts;
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