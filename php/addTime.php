<?php
require_once('connection.php');
session_start();
$conn = connect();

$query = "INSERT INTO `supervisor available time` (`supervisorID`, `Day`, `Start Time`, `End Time`, `maxStudent`) VALUES(:id,:day,:startTime,:endTime,:maxStudent)";
$stmt = $conn->prepare($query);
var_dump($_POST);
$start = json_decode($_POST["startTime"], true);
$end = json_decode($_POST["endTime"], true);
$max = json_decode($_POST["maxStudent"], true);
var_dump(array($start,$end,$max));
for($i = 0;$i<count($start);$i++){
    $array = array(":id" => $_SESSION["ID"], ":day" => $_POST["day"], ":startTime" => $start[$i], ":endTime" => $end[$i], ":maxStudent" => $max[$i]);
    $stmt->execute($array);
}

echo json_encode("this");
?>