<?php
    require "../php/connectToDBAdmin.php";
    session_start();

    if ($_SESSION['success'] == 0) { // if the user is not logged in.
        // header('location: login.php');
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
        <link rel="stylesheet" type="text/css" href="../css/about.css">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    </head>
    <main>
        <header class="home-header"><h2>Novel Reads Libraries</h2></header>
        <body>
            <div class="outer">
                <div class="inner">
                    <article class="intro">
                        <p class="text">
                            <u>About Site</u>
                        </p>
                        <p class="text">
                            This website uses HTML/CSS, PHP, Javascript, and mySQL.
                        </p>
                        <p class="text">
                            This site has been tested on Firefox and Chrome.
                        </p>
                        <p class="text">
                            All the books on the site are available to the public and are 
                            free from copyright.
                        </p>
                        <p class="text">
                            Book covers are provided by <a href="https://openlibrary.org/">Open Library</a> via their API.
                        </p>
                        <p class="text">
                            All books are sourced from either <a href="https://www.goodreads.com/shelf/show/public-domain">Good Reads</a>
                            or <a href="https://www.gutenberg.org/">Gutenberg</a> as they both also host public domain literature.
                        </p>
                        <p class="text">
                            Books are hosted on the server and displayed to the user through the browser's PDF viewer.
                        </p>
                    </article>
                </div>
                <div class="inner"><img class="home-img" src="../images/newreadinggal.gif" ></div>
            </div>
            <div class="footer">
                <p class="footer-text-left">
                    <a href="./index.php" class="menu">Home</a>
                    <a href="./library.php" class="menu">Books</a>
                    <a href="./about.php" class="menu">About</a> <!-- change later -->
                </p>
                <p class="footer-text-right">
                    <?php 
                    if ($_SESSION['success'] == 1) {
                    ?>
                        <a href="./collection.php" class="menu">Collection</a>
                        <a href="./accountinfo.php" class="menu">Account</a>

                    <?php
                    } else {
                        ?><a href="./login.php" class="menu">Login</a><?php
                    }?>
                </p>
            </div>
        </body>
    </main>
</html>