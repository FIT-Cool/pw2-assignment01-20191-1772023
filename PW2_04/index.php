<?php
session_start();
include_once 'db_function/genre_func.php';
include_once 'db_function/book_func.php';
include_once 'db_function/db_helper.php';
include_once 'db_function/user_func.php';

if(!isset($_SESSION['user_logged'])){
    $_SESSION['user_logged'] = false;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Stefanus Hermawan - 1772023">
    <meta name="description" content="PHP Session">

    <link rel="stylesheet" type="text/css" href="src/datatables.css">
    <script type="text/javascript" charset="utf8" src="src/datatables.js"></script>
    <script type="text/javascript" charset="utf8" src="src/functions.js"></script>

    <title>PWL02</title>
</head>
<?php
if ($_SESSION['user_logged']){
?>

<body>
<header>
    <h2>PHP Session</h2>
</header>
<nav>
    <ul>
        <li><a href="?menu=home">Home</a></li>
        <li><a href="?menu=about">About</a></li>
        <li><a href="?menu=genre">Genre</a></li>
        <li><a href="?menu=book">Book</a></li>
        <li><a href="?menu=logout">Log Out</a></li>
    </ul>
</nav>

<main>
    <?php
    $targetMenu = filter_input(INPUT_GET, 'menu');
    switch ($targetMenu) {
        case 'home':
            include_once 'view/home.php';
            break;
        case 'about':
            include_once 'view/about.php';
            break;
        case 'genre':
            include_once 'view/genre.php';
            break;
        case 'genre_update':
            include_once 'view/genre_update.php';
            break;
        case 'book':
            include_once 'view/book.php';
            break;
        case 'logout':
            session_destroy();
            header("location:index.php");
            break;
        default:
            include_once 'view/home.php';
            break;
    }
    ?>
</main>

<footer>
    Pemrograman Web 2 &copy;2019
</footer>
<script>
    $(document).ready(function () {
        $('#book').DataTable();
        $('#genre').DataTable();
        // $('#insertBook').DataTable();
    });

</script>
<?php
}else{
    include_once 'view/login.php';
}
?>

</body>s
</html>