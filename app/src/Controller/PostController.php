<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Entity\Post;
use App\Route\Route;

class PostController extends AbstractController
{
    #[Route('/', name: "home", methods: ["GET", "POST"])]
    public function home()
    {
        $postManager = new PostManager(new PDOFactory());
        $posts = $postManager->getAllPosts();

        $this->render("home.php", [
            "posts" => $posts,
            "trucs" => "je suis une string",
            "machin" => 42
        ], "Tous les posts");
    }

    // testt
    #[Route('/', name: "home", methods: ["POST"])]
    public function publish()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // on recup post_content on le 'nettoie'
            $_POST['post_content'] = htmlspecialchars($_POST['post_content']);
            $_POST['author'] = $_POST['username'];

            // on cree nouvelle instance de Post;
            // trouver moyen de lui don ner author;
            // author =  $_POST['username'];
            $post = new Post($_POST);
            var_dump($post);

            $postManager = new PostManager(new PDOFactory());

            $postManager->insertPost($post);
            exit;
        }
    }
    // test

    /**
     * @param $id
     * @param $truc
     * @param $machin
     * @return void
     */
    #[Route('/post/{id}/{truc}/{machin}', name: "francis", methods: ["GET"])]
    public function showOne($id, $truc, $machin)
    {
        var_dump($id, $truc);
    }

}