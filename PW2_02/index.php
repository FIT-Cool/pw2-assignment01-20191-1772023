<?php
include_once 'db_function/genre_func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="STefanus Hermawan - 1772023">
    <meta name="description" content="PHP Navigation and PHP Data Object (PDO)">
    <title>PWL02</title>
</head>
<body>
<header>
    <h2>PHP Navigation & PDO</h2>
</header>
<nav>
    <ul>
        <li><a href="?menu=home">Home</a></li>
        <li><a href="?menu=about">About</a></li>
        <li><a href="?menu=genre">Genre</a></li>
    </ul>
</nav>

<main>
    <?php

    $targetMenu = filter_input(INPUT_GET,'menu');
    switch ($targetMenu){
        case 'home':
            include_once 'view/home.php';
            break;
        case 'about':
            include_once 'view/about.php';
            break;
        case 'genre':
            include_once 'view/genre.php';
            break;
        default:
            include_once 'view/home.php';
    }
    ?>
</main>

<footer>
    Pemrograman Web 2 &copy;2019
</footer>
</body>


</html>