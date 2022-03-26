<?php
    require "../php/connectToDBAdmin.php";
    session_start();

    if ($_SESSION['success'] == 0) {
        header('location: login.php');
    } else if ($_SESSION['success'] == 1) {
        // proceed
    }
?>

<!DOCTYPE html>
<hmtl lang='en'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, inital-scale=1">
        <link rel="stylesheet" href="../css/accountinfo.css">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <title>NRs - Account</title>
    </head>
    <body class='main'>

        <h2 id='accountHead'>Account Info</h2>
        <div class='accountDetails'>
            <h4>Email: </h4>
            <h4>First Name: </h4>
            <h4>Last Name: </h4>
        </div>

        <h2 id='accountHead'>Reset Password</h2>
        <div>
            <form id='formStyle' action='./accountinfo.php' method='post'>
                <div>
                    <label>Current Password</label><br>
                    <input type=password name=password value="Old Password" maxlength="16" required>
                </div>
                <div>
                    <label>New Password</label><br>
                    <input type=password name=password value="New Password" maxlength="16" required>
                </div><br>
                <input type=submit name=reset value="Reset Password">
            </form>
        </div>

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
</hmtl>