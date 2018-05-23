<?php
require_once('connection.php');
$conn = connect();
session_start();
$query = "DELETE FROM `appointment` where `AppointmentID` = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":id",$_POST["id"]);
try{
    $stmt->execute();
    echo json_encode("1");
}catch(PDOException $ex){
    echo json_encode($ex->getMessage());
}
$msg = $_SESSION["title"].' '.$_SESSION["lastname"].' cancelled your appointment for '.$_POST["date"].' by '.$_POST["time"];
$query = "INSERT INTO `notifications` (`userID`,`Notice`) VALUES(".$_POST["studentID"].",'".$msg."')";
$conn->query($query);

?>