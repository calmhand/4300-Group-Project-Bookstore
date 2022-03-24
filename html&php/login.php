<?php 
    require "../php/connectToDBAdmin.php"; // replace w/ login for all admins

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
                <label>Username</label><br>
                <input type="username" name="name" value="" maxlength="30" required>
            </div><br><br>
            
            <div>
                <label>Password</label><br>
                <input type="password" name="password" value="" maxlength="8" required>
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
            </p>
            <span class="foot">Novel Reads</span>
            <p class="footer-text-right">
                <a href="./accountinfo.php" class="menu">Account</a>
                <a href="./checkout.php" class="menu">Cart</a>
            </p>
        </div>
    </body>
</html>