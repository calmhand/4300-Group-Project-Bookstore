<?php
    // sets the parameters to connect to the database for this site.
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASS', '');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'NovelReads');
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // test if a connection to the database has been made
    // disclaimer: an error handler will be implemented later.
    if ($conn->ping()) {
        // printf ("Our connection is ok!\n");
    } else {
        printf ("Error: %s\n", $conn->error); 
    }
?>