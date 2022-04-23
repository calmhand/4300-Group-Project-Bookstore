<?php
    require "../php/connectToDBAdmin.php";
    $handler = new NovelConnection();
    session_start();
    
    if ($_SESSION['success'] == 0) { // if the user is not logged in.
        header('location: login.php');
    } else if ($_SESSION['success'] == 1) {
        if (!empty($_GET["action"])) {
            if ($_GET["action"] == "read") {
                $_SESSION["currentBook"] = $_GET['ISBN'];
                header("location: ./read.php?ISBN= $_GET[ISBN]");
            }
            if ($_GET["action"] == "return") {
                // re-add book to 'books' db.
                $code = $_GET['ISBN'];
                $getBook = "SELECT * FROM `RentedBooks` WHERE `bookISBN` = '$code'";
                $row = $handler->runQuery($getBook);

                $name = $row[0]['bookName'];
                $author = $row[0]['bookAuthor'];
                $publish = $row[0]['publisher'];
                $year = $row[0]['year'];
                $genre = $row[0]['genreID'];

                $addBook = "INSERT INTO `Books` VALUES (
                    '$code',
                    '$name',
                    '$author',
                    '$publish',
                    '$year',
                    '$genre'
                )";
                $handler->executeSingleQuery($addBook);

                // delete book from 'rentedbooks' db
                $deleteQuery = "DELETE FROM `RentedBooks` WHERE `bookISBN` = '$code'";
                $handler->executeSingleQuery($deleteQuery);
                header("location: collection.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/collection.css">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <title>NRs - Collection</title>
    </head>
    <div class="nav-bar">
            <ul class="nav-bar">
                <li><a class="link-space" href="./library.php">All</a></li>
                <li><a class="link-space" href="./library.php?genre=1">Philosophy</a></li>
                <li><a class="link-space" href="./library.php?genre=2">Fiction</a></li>
                <li><a class="link-space" href="./library.php?genre=3">Non-Fiction</a></li>
            </ul>
    </div>
    
    <div class="txt-heading"><h3>Rented Book Collection</h3></div>

    <div class="product-box"> 
        <?php
            $collection_array = $handler->runQuery("SELECT * FROM `RentedBooks` WHERE `userID`='$_SESSION[id]' ORDER BY 'bookISBN' ASC");

            if (!empty($collection_array)) {
                foreach($collection_array as $key=>$value) {
        ?>
                <div class="product-inner-img">
                    <form method="post" action="collection.php?action=read&ISBN=<?php echo $collection_array[$key]["bookISBN"]; ?>">
                        <input title="Click to read!" class="product-img" type="image" src="https://covers.openlibrary.org/b/isbn/<?php echo $collection_array[$key]["bookISBN"];?>-L.jpg"/>
                    </form>

                    <form method="post">
                        <input class="returnBtn" type="submit" value="Return" formaction="collection.php?action=return&ISBN=<?php echo $collection_array[$key]["bookISBN"]; ?>" class="returnButton" />
                    </form>

                    <p class="info-link">
                        <span id="info">Book Info</span>
                        <p class="hidden-info">
                            Title: <?php echo $collection_array[$key]["bookName"];?></br>
                            Author: <?php echo $collection_array[$key]["bookAuthor"];?></br>
                            Year: <?php echo $collection_array[$key]["year"];?></br>
                            ISBN: <?php echo $collection_array[$key]["bookISBN"];?></br>
                        </p>
                    </p>
                </div>

            <?php
                }
            }
            ?>
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