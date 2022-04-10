<?php
    require "../php/connectToDBAdmin.php";
    session_start();

    if ($_SESSION['success'] == 0) { // if the user is not logged in.
        header('location: login.php');
    } else if ($_SESSION['success'] == 1) {
        // application will proceed. more to be implemented
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/normalize.css">
        <link rel="stylesheet" type="text/css" href="../css/home.css">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    </head>
    <main>
        <header class="home-header"><h2>Novel Reads Libraries</h2></header>
        <body>
            <div class="nav-bar">
                <ul>
                    <li><a class="link-space" href="">Textbooks</a></li>
                    <li><a class="link-space" href="">Fiction</a></li>
                    <li><a class="link-space" href="">Non-Fiction</a></li>
                    <li><a class="link-space" href="">Comics</a></li>
                </ul>
            </div>
            <div class="outer">
                <div class="inner">
                    <article class="intro">
                        <p class="text">
                            Welcome to Novel Reads! <br><br>
                            This is a small online library that hosts a wide array of textbooks, 
                            novels, and comics.<br><br> 
                            The books provided are sourced, for free, from around the internet. <br><br>
                            The goal of this site is to localize books for readers to easily access with worrying about fees or convenience.
                        </p>
                    </article>
                </div>
                <div class="inner"><img class="home-img" src="../images/newreadinggal.gif" ></div>
            </div>
            <div class="footer">
                <p class="footer-text-left">
                    <a href="./index.php" class="menu">Home</a>
                    <a href="./library.php" class="menu">Books</a>
                    <a href="./index.php" class="menu">About</a> <!-- change later -->
                </p>
                <p class="footer-text-right">
                    <?php 
                    if ($_SESSION['success'] == 1) {
                    ?>
                        <a href="./collection.php" class="menu">Library</a>
                    <?php
                    }?>
                    <a href="./accountinfo.php" class="menu">Account</a>
                </p>
            </div>
        </body>
    </main>
</html>