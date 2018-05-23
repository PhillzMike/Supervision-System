<?php
require_once('connection.php');
$conn = connect();
session_start();
$query = "Select `AppointmentID`,`studentID`, `Date`, `Start Time`, `End Time`, `message` from appointment where `supervisorID` = ".$_SESSION["ID"];
$result = $conn->query($query);
$allAppointment = $result->fetchAll(PDO::FETCH_ASSOC);
$query = "Select `firstname`, `lastname`, `img_path`, `department`, `level` from students where `ID` = :id";
$stmt = $conn->prepare($query);
$studentID = 0;
$stmt->bindParam(':id',$studentID);
$final = array();
foreach($allAppointment as $appointment){
    $studentID = $appointment["studentID"];
    $result = $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    $appointmentID = $appointment['AppointmentID'];
    unset($appointment['studentID']);
    unset($appointment['AppointmentID']);
    $appointment = array_merge($appointment,$student);
    $final[$appointmentID] = $appointment;
}
echo json_encode($final);
?>