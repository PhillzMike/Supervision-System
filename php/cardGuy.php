<?php
require_once('connection.php');
$conn = connect();
session_start();
$query = "Select `studentID`, `Date`, `Start Time`, `End Time` from appointment where `supervisorID` = 3";
$result = $conn->query($query);
$allAppointment = $result->fetchAll(PDO::FETCH_ASSOC);
$query = "Select `firstname`, `lastname`, `img_path` from students where `ID` = :id";
$stmt = $conn->prepare($query);
$studentID = 0;
$stmt->bindParam(':id',$studentID);
$final = array();
foreach($allAppointment as $appointment){
    $studentID = $appointment["studentID"];
    $result = $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    unset($appointment['studentID']);
    $appointment = array_merge($appointment,$student);
    $final[] = $appointment;
}
echo json_encode($final);
?>