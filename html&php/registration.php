<?php 
    require_once "../php/connectToDBAdmin.php";
    $handler = new NovelConnection();

    $first = $last = $email = $mobile = $pass = $confirm_pass = "";
    $errs = array();

    if (isset($_POST['register'])) {
        // assign form elements to variables.
        // first/last name and phone number validation already check via js.
        $first = mysqli_real_escape_string($conn, $_POST['Fname']);
        $last = mysqli_real_escape_string($conn, $_POST['Lname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['phone']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_pass = mysqli_real_escape_string($conn, $_POST['cpassword']);
        
        // checks if email is already in database.
        $emailCheck = "SELECT * FROM `Users` WHERE `userEmail` = '$email'";
        $rows = $handler->numRows($emailCheck);
        if ($rows >= 1) {
            array_push($errs, "Email already in database.");
            echo "<script>alert('Email already in use!')</script>";
        }
        
        // check if passwords match.
        if ($pass != $confirm_pass) {
            array_push($errs, "Passwords do not match.");
        }
        
        // barring any errors, register the new user into the database.
        if (count($errs) == 0) {
            $pass = md5($pass);
            $addUser = "INSERT INTO `Users` (`userName`, `userLast`, `userPass`, `userEmail`, `userCell`) VALUES ('$first', '$last', '$pass', '$email', '$mobile')";
            mysqli_query($conn, $addUser);
            $_SESSION['first'] = $first;
            $_SESSION['email'] = $email;
            $_SESSION['success'] = 1;
            header('location: index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="../css/registration.css">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <script src="../javascript/register.js"></script>
        <title>NRs - Registration</title>
    </head>
    <body>
        <form class="formStyle" name="registerForm" action="registration.php" onsubmit="" method="post">
            <p style="font-size:large;">Have an account? <a href="login.php">Login</a></p>
            <div>
                <label>First Name</label><br>
                <input type="text" name="Fname" maxlength="50" required="">
            </div>

            <div>
                <label>Last Name</label><br>
                <input type="text" name="Lname" maxlength="50" required="">
            </div>

            <div>
                <label>Email</label><br>
                <input type="text" name="email" maxlength="50" required="">
            </div>

            <div>
                <label>Mobile Number</label><br>
                <input type="text" name="phone" maxlength="10" required="">
            </div>

            <div>
                <label>Password</label><br>
                <input type="password" name="password" maxlength="16" required="">
            </div>

            <div>
                <label>Confirm Password</label><br>
                <input type="password" name="cpassword" maxlength="16" required="">
            </div>

            <div>
                <input type="submit" name="register" value="Register">
            </div><br><br>
            <br>

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
    </body>
</html>