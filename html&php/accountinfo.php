<?php
    require "../php/connectToDBAdmin.php";
    session_start(); // begin session.
    $errs = array(); // an array that holds any possible errors. Will be implemented later.

    if ($_SESSION['success'] == 0) { // if the user is not logged in
        header('location: login.php');
    } else if ($_SESSION['success'] == 1) { // if user is logged in
        // proceed
        if (isset($_POST['logout'])) { // if user wants to log out
            session_destroy();
            setcookie("loggedin", time()-1000);
            unset($_SESSION['success']);
            unset($_SESSION['email']);
            unset($_SESSION['id']);
            header("location: login.php");
        } elseif (isset($_POST['reset'])) { // if user wants to reset their password
            $pass = $_POST['password'];
            $new_pass = $_POST['npassword'];
            $old_pass = "";

            if (empty($pass)) {
                array_push($errs, "Password required.");
            }

            if (empty($new_pass)) {
                array_push($errs, "New password required.");
            }

            if (count($errs) == 0) { // if no prior errors
                // query the logged in user's information
                $getUser = "SELECT * FROM `Users` WHERE userEmail = '$_SESSION[email]'";
                $ans = mysqli_query($conn, $getUser);
                $row = $ans->fetch_assoc();
                
                if (mysqli_num_rows($ans) == 1) { // on successful query
                    if ($row["userPass"] == md5($pass)) { // do the old passwords (encrypted) match?
                        // update in mySQL
                        $new_pass = md5($new_pass);
                        $updatePass = "UPDATE `Users` SET `userPass` = '$new_pass' WHERE `userEmail` = '$_SESSION[email]'";
                        // logout
                        mysqli_query($conn, $updatePass);
                        session_destroy();
                        unset($_SESSION['email']);
                        unset($_SESSION['success']);
                        header("location: login.php");
                    }
                }
            }
        }
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
            <h5>Email: <?php echo $_SESSION['email'] ?></h5>
            <h5>Account ID: <?php echo $_SESSION['id'] ?></h5>
            <!-- <h4>First Name: </h4>
            <h4>Last Name: </h4> -->
        </div>

        <div>
            <form id='formStyle' action='./accountinfo.php' method='post'>
                <input type=submit name=logout value="Logout">
            </form>
        </div>

        <h2 id='accountHead'>Reset Password</h2>
        <div>
            <form id='formStyle' action='./accountinfo.php' method='post'>
                <div>
                    <label>Old Password</label><br>
                    <input type=password name=password value="" maxlength="16" required>
                </div>
                <div>
                    <label>New Password</label><br>
                    <input type=password name=npassword value="" maxlength="16" required>
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
</hmtl>