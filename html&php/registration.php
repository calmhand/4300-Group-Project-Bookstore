<?php 
    require_once "../php/connectToDBAdmin.php"; // replace w/ login for all admins

    $first = $last = $email = $mobile = $pass = $confirm_pass = "";
    $errs = array();

    if (isset($_POST['register'])) {
        $first = mysqli_real_escape_string($conn, $_POST['Fname']);
        $last = mysqli_real_escape_string($conn, $_POST['Lname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['phone']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_pass = mysqli_real_escape_string($conn, $_POST['cpassword']);

        if ($pass != $confirm_pass) {
            array_push($errs, "Passwords do not match.");
        }
        
        if (count($errs) == 0) {
            $pass = md5($pass);
            $addUser = "INSERT INTO `Users` (`userName`, `userLast`, `userPass`, `userEmail`, `userCell`) VALUES ('$first', '$last', '$pass', '$email', '$mobile')";
            mysqli_query($conn, $addUser);
            $_SESSION['first'] = $first;
            $_SESSION['success'] = "logged in";
            header('location: index.php');
        }
    }
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
        <form class="formStyle" action="registration.php" method="post">
            <p style="font-size:large;">Have an account? <a href="login.php">Login</a></p>
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
                <input type="password" name="password" value="" maxlength="16" required="">
            </div>

            <div>
                <label>Confirm Password</label><br>
                <input type="password" name="cpassword" value="" maxlength="16" required="">
            </div>

            <div>
                <input type="submit" name="register" value="Register">
            </div><br><br>
            <br>

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