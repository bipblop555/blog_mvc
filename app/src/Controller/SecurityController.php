<?php

namespace App\Controller;

use App\Entity\User;
use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Route\Route;

class SecurityController extends AbstractController
{
    #[Route('/login', name: "login", methods: ["POST"])]
    public function login()
    {
        $_POST['username'] = htmlspecialchars($_POST['username']);

        $_POST['password'] = htmlspecialchars($_POST['password']);

        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getByUsername($_POST['username']);

        if (!$user)
        {
            header('Location: /?error=notfound');
            exit;
        }

        if ($user->passwordMatch($_POST['password']))
        {
            $this->render('/home.php', [

                'message' => 'Connexion réussie'
            ],
                'Home'
            ); 
                exit;
        }

        header('Location: /?error=not found');
        exit;
        var_dump('toto');
    }

    #[Route('/login', name: "login", methods: ["GET"])]
    function toLogin()
    {
        $this->render('/login.php');
    }


    #[Route('/register', name: 'register', methods: ['GET','POST'])]
    public function register()
    {   
    //var_dump($_SERVER);die;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // POST => tout ce qui est envoyé en POST
            $_POST['roles'] = 0;
            $_POST['username'] = htmlspecialchars($_POST['username']);

            $_POST['password']= htmlspecialchars($_POST['password']);

            $user = new User($_POST);
            // var_dump($_POST); die;
            $userManager = new UserManager(new PDOFactory());
                
            $userManager->insertUser($user);

            header('Location: home.php');
            exit;
    }
    // permet l'affichage
        $this->render('register.php', [
            'message' => 'trgrgrt'
        ]);
    }
}