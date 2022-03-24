<?php 
    require "../php/connectToDBAdmin.php"; // replace w/ login for all admins

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, inital-scale=1">
        <link rel="stylesheet" href="../css/registration.css">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <title>NRs - Registration</title>
    </head>
    <body>
        <form id="formStyle" action="registration.php" method="post">
            <p>Have an account? <a href="login.php">Login</a></p>
            <div>
                <label>First Name</label><br>
                <input type="text" name="Fname" value="" maxlength="50" required="">
            </div>

            <div>
                <label>Last Name</label><br>
                <input type="text" name="Lname" value="" maxlength="50" required="">
            </div>

            <div>
                <label>Email</label><br>
                <input type="text" name="email" value="" maxlength="50" required="">
            </div>

            <div>
                <label>Mobile Number</label><br>
                <input type="text" name="phone" value="" maxlength="50" required="">
            </div>

            <div>
                <label>Password</label><br>
                <input type="password" name="password" value="" maxlength="8" required="">
            </div>

            <div>
                <label>Confirm Password</label><br>
                <input type="password" name="cpassword" value="" maxlength="8" required="">
            </div>

            <div>
                <input type="submit" name="signup" value="Register">
            </div><br><br>
            <br>

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