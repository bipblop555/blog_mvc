<?php
namespace App\Controller;

use App\style\main;

use App\Entity\User;
use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Route\Route;

class SecurityController extends AbstractController
{

    // LOGIN

    #[Route("/login", name: "login", methods: ["POST"])]
    public function login()
    {
        $_POST["username"] = htmlspecialchars($_POST["username"]);

        $_POST["password"] = htmlspecialchars($_POST["password"]);

        $_SESSION['username'] = $_POST["username"];
        $_SESSION['roles']= $_POST["roles"];

        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getByUsername($_POST["username"]);
        
        if (!$user)
        {
            echo 'nope';
            header("Location: /?error=notfound");
            exit;
        }

        if ($user->passwordMatch($_POST["password"]))
        {
            // header("Location: /home.php");
            
            $this->render("/home.php");

            exit;
        }

        header("Location: /?error=not found");
        exit;
        var_dump("Utilisateur non recoonu");
    }

    #[Route("/login", name: "login", methods: ["GET"])]
    function toLogin()
    {

        $this->render("/login.php");
    }


    // REGISTER
    #[Route("/register", name: "register", methods: ["POST"])]
    public function register()
    {   
        var_dump($_SERVER);

        echo "kk";
        // POST => tout ce qui est envoyé en POST

        $_POST["roles"] = 0;
        $_POST["username"] = htmlspecialchars($_POST["username"]);

        $_POST["password"]= htmlspecialchars($_POST["password"]);

        $_SESSION['username'] = $_POST["username"];
        $_SESSION['roles'] =  $_POST["roles"];

        $user = new User($_POST);
        $userManager = new UserManager(new PDOFactory());
            
        $userManager->insertUser($user);

        // permet l"affichage
        // header('Location: /home.php');
        $this->render("/home.php");

        exit;
    } 

    #[Route("/register", name: "register", methods: ["GET"])]
    function toRegister()
    {
        $this->render("/register.php");
    }
}