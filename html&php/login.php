<?php 
    require "../php/connectToDBAdmin.php";
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
            $ans = mysqli_query($conn, $loginUser);
            if (mysqli_num_rows($ans) == 1) {
                $_SESSION['email'] = $email;
                $_SESSION['success'] = 1;
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
                <a href="./index.php" class="menu">About</a> <!-- change later -->
            </p>
            <p class="footer-text-right">
                <a href="./accountinfo.php" class="menu">Account</a>
                <a href="./checkout.php" class="menu">Cart</a>
            </p>
        </div>
    </body>
</html>