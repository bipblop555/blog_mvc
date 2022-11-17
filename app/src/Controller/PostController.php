<?php

namespace App\Controller;

use \PDOFactory;
use \PostManager;
use \UserManager;
use \Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'homepage', methods: ['GET'])]
    public function home()
    {

    }

}