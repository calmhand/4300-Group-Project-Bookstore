<?php
    DEFINE ('DB_USER', 'calm');
    DEFINE ('DB_PASS', '200257847');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'NovelReads');
    
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)
    OR die("Couldn't connect to mySQL: ").mysqli_connect_error();
?>