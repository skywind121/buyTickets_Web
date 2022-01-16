<?php
  include "db_conn.php";
  $username = 'steve';
  $query = "SELECT * FROM users where username='$username' and passcode='Steve00@'";
  if($stmt = $db->query($query)){
     while($result=mysqli_fetch_object($stmt)){
         echo "Name: ".$result->username." pass: ".$result->passcode;
} }
?>