<?php
namespace App\Controller;

use App\Entity\Comment;
use App\Factory\PDOFactory;
use App\Utilitaire\Utilitaire;
use App\Manager\CommentManager;
use App\Route\Route;

class CommentController extends AbstractController
{

    // /**
    //  * @return void
    //  */
    // #[Route('/posts', name: "commentStore", methods: ["POST"])]
    // public function storeComment()
    // {
    //     $user = (new Comment($_POST))
    //         ->setUser_Id($this->getUser()->getId())
    //         ->setCreated_At();
    //     $manger = new CommentManager(new PDOFactory());
    //     $manger->insertComment($user);
        
    //     Utilitaire::redirect('posts');
    // }
}