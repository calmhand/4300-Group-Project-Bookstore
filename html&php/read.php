<?php
    require "../php/connectToDBAdmin.php";
    $handler = new NovelConnection();
    session_start();

    if ($_SESSION['success'] == 0) { // if the user is not logged in.
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/read.css">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <title>NRs - Read</title>
    </head>
    
    <div class="book-window">
            <embed src="../books/<?php echo($_SESSION["currentBook"]); ?>.pdf#toolbar=0" width="800px" height="2100px" />
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
                <?php
                }?>
                <a href="./accountinfo.php" class="menu">Account</a>
            </p>
        </div>
</html>