<?php
    require "../php/connectToDBAdmin.php";
    $handler = new NovelConnection();
    session_start();

    if ($_SESSION['success'] == 0) { // if the user is not logged in.
        header('location: login.php');
    } else if ($_SESSION['success'] == 1) {
        if (!empty($_GET["action"])) {
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
    <body class="site">
        <div id="product-grid">
            <div class="txt-heading"><h3>Rented Book Collection</h3></div>
            <?php
            $collection_array = $handler->runQuery("SELECT * FROM `RentedBooks` WHERE `userID`='$_SESSION[id]' ORDER BY 'bookISBN' ASC");
            if (!empty($collection_array)) { 
                foreach($collection_array as $key=>$value) {
            ?>
                <div class="product-item">
                    <form method="post" action="collection.php?action=return&ISBN=<?php echo $collection_array[$key]["bookISBN"]; ?>">
                        <div class="product-image">
                            <img src="https://covers.openlibrary.org/b/isbn/<?php echo $collection_array[$key]["bookISBN"];?>-M.jpg">
                        </div>

                        <div class="product-tile-footer">
                            <div class="product-title">
                                <?php echo $collection_array[$key]["bookName"]; ?>
                            </div>

                            <!-- CHANGE LATER -->
                            <div class="cart-action">
                                <!-- <input type="text" class="product-quantity" name="quantity" value="1" size="2" /> -->
                                <input type="submit" value="Return" class="returnButton" />
                                <input type="submit" value="Read" class="readButton" />
                            </div>

                        </div>
                    </form>
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
                <a href="./index.php" class="menu">About</a> <!-- change later -->
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
    </body>
</html>