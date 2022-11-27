<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Entity\Post;
use App\Manager\PostManager;
use App\Route\Route;

class PostController extends AbstractController
{
    #[Route('/home', name: "home", methods: ["GET"])]
    public function showAll()
    {
        $postManager = new PostManager(new PDOFactory());

        $fetchedPosts = $postManager->getAllPosts();

        // print_r($fetchedPosts);die;
        
        $this->render("home.php", [
            'fetchedPosts'=>$fetchedPosts
        ]);
        // return $fetchedPosts;
    
    }

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

            $postManager = new PostManager(new PDOFactory());

            $postManager->insertPost($post);

            $this->showAll();

            // exit;
        }
    }


    #[Route('/home', name: "home", methods: ["GET"])]
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
    {        var_dump($_SERVER);

    }

}