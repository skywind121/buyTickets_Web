<?php
include "db_conn.php";

$eventname   = $_POST["eventname"];
$ticketPrice    = $_POST["ticketPrice"];
$numTickets = $_POST["numTickets"];
$eId     = $_POST["eId"];

$query = ("insert into events values(?,?,?,?)");
$stmt = $db -> prepare($query);
$stmt -> bind_param("siii", $eventname,$ticketPrice,$numTickets,$eId);
$stmt -> execute();
header("Location: listEvents.php");
?>
