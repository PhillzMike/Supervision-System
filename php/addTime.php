<?php
require_once('connection.php');
session_start();
$conn = connect();
$query = "INSERT INTO `supervisor available time` (`supervisorID`, `Day`, `Start Time`, `End Time`, `maxStudent`) VALUES(:id,:day,:startTime,:endTime,:maxStudent)";
$stmt = $conn->prepare($query);
$array = array(":id" => $_SESSION["ID"], ":day" => $_POST["day"], ":startTime" => $_POST["startTime"], ":endTime" => $_POST["endTime"], ":maxStudent" => $_POST["maxStudent"]);
$stmt->execute($array);
echo json_encode("this");
?>