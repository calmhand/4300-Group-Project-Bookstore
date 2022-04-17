<?php 
    require "../php/connectToDBAdmin.php";
    $handler = new NovelConnection();
    session_start(); // begins session

    $errs = array();
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if (empty($email)) {
            array_push($errs, "Email required.");
        }
        if (empty($pass)) {
            array_push($errs, "Password required.");
        }

        if (count($errs) == 0) { // no errors? log user in.
            $pass = md5($pass);
            $loginUser = "SELECT * FROM `Users` WHERE `userEmail` = '$email' AND `userPass` = '$pass';";
            // $ans = mysqli_query($conn, $loginUser);
            $ans = $handler->runQuery($loginUser);
            if ($handler->numRows($loginUser) == 1) {
                $_SESSION['id'] = $ans[0]['userID'];
                $_SESSION['email'] = $email;
                $_SESSION['success'] = 1;
                setcookie("loggedin", TRUE, time()+6);
                header('location: index.php');
            } else {
                array_push($errs, "Wrong email/password combination.");
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, inital-scale=1">
        <link rel="stylesheet" href="../css/login.css">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <title>NRs - Login</title>
    </head>
    <body>
        <form id="formStyle" action="./login.php" method="post">

            <div>
                <label>Email</label><br>
                <input type="email" name="email" value="" maxlength="30" required>
            </div><br><br>
            
            <div>
                <label>Password</label><br>
                <input type="password" name="password" value="" maxlength="16" required>
            </div><br><br>

            <div>
                <input id="submit" type="submit" name="login" value="Sign In">
            </div><br><br>

            <br>
            No Account? <a href="registration.php">Register Here</a> 
            <div><img id="registerAni" src="../images/registerlinkanimation.gif"</div>
        </form>

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
    </body>
</html>