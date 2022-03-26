<?php
    DEFINE ('DB_USER', 'calm');
    DEFINE ('DB_PASS', '200257847');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'NovelReads');
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->ping()) {
        printf ("Our connection is ok!\n"); 
    } else {
        printf ("Error: %s\n", $conn->error); 
    }
?>