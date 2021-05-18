<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db   = 'test'; //disesuaikan nama databasenya

    $conn = mysqli_connect($host, $user, $pass, $db);

    if(!$conn){
        echo 'Error : '.mysqli_connect_error($conn);
    }

?>