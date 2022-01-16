<?php
  include('db_conn.php');

  $eId = $_GET['eId'];
  $stmt = $db->prepare("delete from event where eId=%d",$eId);
  $stmt -> bind_param("siii", $eventname,$ticketPrice,$numTickets,$eId);
  $stmt -> execute();

  // 如果刪除成功
  header('Location: listEvents.php');
?>