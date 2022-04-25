<?php
    require "../php/connectToDBAdmin.php";
    $handler = new NovelConnection();
    session_start();

    if ($_SESSION['success'] == 0) { // if the user is not logged in.
        header('location: login.php');
    } else if ($_SESSION['success'] == 1) {
        if (!empty($_GET["action"])) {
            if ($_GET["action"] == "add") { // if book is unrented.
                // add book to rented book db.
                $code = $_GET["ISBN"];
                $selectQuery = "SELECT * FROM `Books` WHERE `bookISBN` = '$code'";
                $row = $handler->runQuery($selectQuery);

                // assign variables.
                $name = $row[0]['bookName'];
                $author = $row[0]['bookAuthor'];
                $publish = $row[0]['publisher'];
                $year = $row[0]['year'];
                $genre = $row[0]['genreID'];

                // adds to rentedbook db.
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
    <div class="nav-bar">
            <ul class="nav-bar">
                <li><a class="link-space" href="./library.php">All</a></li>
                <li><a class="link-space" href="./library.php?genre=1">Philosophy</a></li>
                <li><a class="link-space" href="./library.php?genre=2">Fiction</a></li>
                <li><a class="link-space" href="./library.php?genre=3">Non-Fiction</a></li>
            </ul>
    </div>

    <!-- product-box container will not be looped -->
    <div class="product-box"> 
        <?php
            if (!isset($_GET["genre"])) { // If the user wants to view all books...
                $product_array = $handler->runQuery("SELECT * FROM `Books` ORDER BY 'bookISBN' ASC");
            } else { // If the user wants to view a specific genre...
                $product_array = $handler->runQuery("SELECT * FROM `Books` WHERE `genreID` = '$_GET[genre]' ORDER BY 'bookISBN' ASC");
            }

            if (!empty($product_array)) {
                foreach($product_array as $key=>$value) {
        ?>
                    <div class="product-inner-img">
                        <form method="post" action="library.php?action=add&ISBN=<?php echo $product_array[$key]["bookISBN"]; ?>">
                            <input title="Click to rent!" class="product-img" type="image" src="https://covers.openlibrary.org/b/isbn/<?php echo $product_array[$key]["bookISBN"];?>-L.jpg"/>
                        </form>
                        <p class="info-link">
                            <span id="info">Book Info</span>
                            <p class="hidden-info">
                                Title: <?php echo $product_array[$key]["bookName"];?></br>
                                Author: <?php echo $product_array[$key]["bookAuthor"];?></br>
                                Year: <?php echo $product_array[$key]["year"];?></br>
                                ISBN: <?php echo $product_array[$key]["bookISBN"];?></br>
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
                <a href="./about.php" class="menu">About</a>
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