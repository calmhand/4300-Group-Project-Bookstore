<?php
    require "../php/connectToDBAdmin.php";
    $handler = new NovelConnection();
    session_start();

    if ($_SESSION['success'] == 0) { // if the user is not logged in.
        header('location: login.php');
    } else if ($_SESSION['success'] == 1) {
        if (!empty($_GET["action"])) {
            if ($_GET["action"] == "add") { // if book is unrented
                // add book to rented book db
                $code = $_GET["ISBN"];
                $selectQuery = "SELECT * FROM `Books` WHERE `bookISBN` = '$code'";
                $row = $handler->runQuery($selectQuery);

                $name = $row[0]['bookName'];
                $author = $row[0]['bookAuthor'];
                $publish = $row[0]['publisher'];
                $year = $row[0]['year'];
                $genre = $row[0]['genreID'];

                // adds to rentedbook db
                $addQuery = "INSERT INTO `RentedBooks` VALUES (
                    '$_SESSION[id]', 
                    '$code', 
                    '$name',
                    '$author',
                    '$publish',
                    '$year',
                    '$genre'
                )";
                $handler->executeSingleQuery($addQuery);
                // remove book from available book db
                $deleteQuery = "DELETE FROM `Books` WHERE `bookISBN` = '$code'";
                $handler->executeSingleQuery($deleteQuery);
                header("location: library.php");
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
        <link rel="stylesheet" type="text/css" href="../css/library.css">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <title>NRs - Library</title>
    </head>
    <body class="site">
        <div class="txt-heading"><h3>Books Available To Rent</h3></div>
        <div class="book-contain">
            <?php
            $product_array = $handler->runQuery("SELECT * FROM `Books` ORDER BY 'bookISBN' ASC");
            if (!empty($product_array)) { 
                foreach($product_array as $key=>$value) {
            ?>
                <div class="product-item">
                    <form method="post" action="library.php?action=add&ISBN=<?php echo $product_array[$key]["bookISBN"]; ?>">

                        <div class="product-image">
                            <img src="https://covers.openlibrary.org/b/isbn/<?php echo $product_array[$key]["bookISBN"];?>-M.jpg">
                        </div>

                        <div class="product-tile-footer">
                            <div class="product-title">
                                <?php echo $product_array[$key]["bookName"]; ?>
                            </div>

                            <div class="cart-action">
                                <!-- <input type="text" class="product-quantity" name="quantity" value="1" size="2" /> -->
                                <input type="submit" value="Rent" class="rentButton" />
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