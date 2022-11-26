<?php
namespace App\Views;
use App\Views\stle; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href ='stle.css' rel= 'stylesheet'>
    <title><?= $_pageTitle; ?></title>
    <style>
        <?php include 'style.css' ?>
    </style>
</head>
    <body>
            <?= $_pageContent ?>
    </body>
</html>
