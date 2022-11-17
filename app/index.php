<?php

use App\Rpoute\Route;

require_once 'vendor/autoload.php';

$controllerDir = dirname(__FILE__) . '/src/Controller';

// cherche les Controllers
$dirs = scandir($controllerDir);
$controllers = [];

foreach ($dirs as $dir){
    
}