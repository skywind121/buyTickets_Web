<?php
    include "db_conn.php";
    session_start();
    
    $user_check = $_SESSION['login_user'];
    //echo $user_check;
    $ses_sql = mysqli_query($db, "SELECT username FROM users WHERE username = '$user_check' ");
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    $login_session = $row['username'];

    
    if (!isset($_SESSION['login_user'])) {
        header("location:login.php");
        die();
    }
?>