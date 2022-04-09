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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, inital-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <main>
        <body>
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