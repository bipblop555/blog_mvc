<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Entity\Post;
use App\Route\Route;

class PostController extends AbstractController
{
    // #[Route('/', name: "home", methods: ["GET", "POST"])]
    // public function home()
    // {
    //     $postManager = new PostManager(new PDOFactory());
    //     $posts = $postManager->getAllPosts();

    //     $this->render("home.php", [
    //         "posts" => $posts,
    //         "trucs" => "je suis une string",
    //         "machin" => 42
    //     ], "Tous les posts");
    // }

    // testt
    #[Route('/home', name: "home", methods: ["POST"])]
    public function publish()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            date_default_timezone_set('UTC');
            $messageDate = date("Y-m-d H:i:s");

            $_POST['content'] = htmlspecialchars($_POST['content']);
            $_POST['username'] = $_SESSION['username'];
            $_POST['date'] = $messageDate;

            $post = new Post($_POST); // on cree nouvelle instance de Post;

            var_dump($_POST);
            // die;

            $postManager = new PostManager(new PDOFactory());

            $postManager->insertPost($post);

            $this->render('/home.php');

            exit;
        }
    }
    #[Route('/home', name: "home", methods: ["POST"])]
    public function toPublish()
    {
        $this->render('/home.php');
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