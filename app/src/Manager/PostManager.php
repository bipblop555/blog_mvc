<?php

namespace App\Manager;

use App\Entity\Post;
use App\Controller\PostController;

class PostManager extends BaseManager
{
    /**
     * @return Post[]
     */
    public function getAllPosts(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM `Posts` ORDER BY `date` DESC');

        $query->execute();

        // while ($data = $query->fetchAll(\PDO::FETCH_ASSOC)){

        //     $fetchedPosts[] = new Post($data);
        // }

        $posts = [];

        while ($fetchedPosts = $query->fetch(\PDO::FETCH_ASSOC)){

            $post = new Post($fetchedPosts);

            $posts[] =  [
                
                "id" => $post->getId(),
                "post_title" => $post->getpost_title(),
                "content" => $post->getContent(),
                "username" => $post->getUsername(),
                "date" => $post->getDate()
            ];
        }

        return $posts;
    }

    public function insertPost(Post $post)
    {
        $query = $this->pdo->prepare('INSERT INTO Posts (post_title, content, username, date) VALUES (:post_title, :content, :username, :date)');

        $query->bindValue(
            "post_title", $post->getpost_title(), \PDO::PARAM_STR
        );
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

    public function deletePost($id)
    {
        $query = $this->pdo->prepare('DELETE FROM `Posts` WHERE `id` = :id');

        $query->bindValue(
            "id", $id, \PDO::PARAM_STR
        );

        $query->execute();
    }
}