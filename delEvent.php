<?php
  include('db_conn.php');

  
  $stmt = $db->prepare('delete from events where eId=?');
  $stmt -> bind_param("i", $id);
  $id = $_GET['id'];
  $stmt -> execute();

  // 如果刪除成功
  header('Location: listEvents.php');
?>