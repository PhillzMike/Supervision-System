<?php
require_once('connection.php');
$conn = connect();
session_start();
$query = "Select `Day`, `Start Time`, `End Time`, `maxStudent` from `supervisor available time` where `supervisorID` = ".$_SESSION["ID"];
$result = $conn->query($query);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);

?>