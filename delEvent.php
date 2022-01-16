<?php
  include('db_conn.php');

  $id = $_GET['id'];
  $stmt = $db->prepare('delete from events where eId=?');
  $stmt -> bind_param("i", $id);
  
  $stmt -> execute();

  // 如果刪除成功
  header('Location: listEvents.php');
?>