<?php
  include "db_conn.php";

  $query = ("delete from events where eId=?");
  $stmt = $db->prepare($query);
  $id = $_GET['id'];
  $stmt -> bind_param("i", $id);
  $stmt -> execute();

  // 如果刪除成功
  header('Location: listEvents.php');
?>