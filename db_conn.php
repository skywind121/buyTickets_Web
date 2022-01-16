<?php
    $localhost = 'localhost';
    $user = 'root';
    $password = '12345678';
    $database = 'test';

    $db = mysqli_connect($localhost, $user, $password, $database);
    if (mysqli_connect_errno()) {
        // echo "Failed Connection";
        printf("Connection failed: ".mysqli_connect_errno());
        exit();
    }
    // else echo "Established Connection";

    mysqli_set_charset($db, "utf8");
    mysqli_select_db($db, "test");
    // echo("Connection Succeeded");
?>