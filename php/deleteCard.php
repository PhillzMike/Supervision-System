<?php
require_once('connection.php');
$conn = connect();
$query = "DELETE FROM `appointment` where `AppointmentID` = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":id",$_POST["id"]);
try{
    $stmt->execute();
    echo json_encode("1");
}catch(PDOException $ex){
    echo json_encode($ex->getMessage());
}

?>