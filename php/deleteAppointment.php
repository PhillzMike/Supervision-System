<?php
    require_once('connection.php');
    $conn = connect();
    session_start();
    $query = "SELECT `maxStudent` FROM `supervisor available time` WHERE `supervisorID` = :supervisorID AND `Day` = :day AND `Start Time` = :startTime";
    $stmt =$conn->prepare($query);
    $details = array(":supervisorID" => $_POST["supervisor"], ":day" => $_POST["day"], ":startTime" => $_POST["startTime"]);
    $stmt->execute($details);
    $result = $stmt->fetch(PDO::FETCH_NUM);
    if($result){
            $query = "UPDATE `supervisor available time` SET `maxStudent` = ".($result[0] + 1)."WHERE `supervisorID` = :supervisorID AND `Day` = :day AND `Start Time` = :startTime";
            $stmt =$conn->prepare($query);
            $stmt->execute($details);
    }
    else{
            $query = "INSERT INTO `supervisor available time` (`supervisorID`,`Day`,`Start Time`,`End Time`, `maxStudent`)  VALUES(:supervisorID, :day,:startTime,:endTime,:maxStudent)";
            $stmt =$conn->prepare($query);
            $details = array_merge($details, array(":endTime" => $_POST["endTime"],":maxStudent" => $_POST["maxStudent"]));
            $stmt->execute($details);
        }

    $query = "INSERT INTO `appointment` (`supervisorID`,`studentID`,`Date`,`Start Time`, `End Time`, `message`)
    VALUES(:supervisorID,:studentID,:date,:start,:end,:message)";
    $stmt = $conn->prepare($query);

    $details = array(":supervisorID"=>$_POST["supervisor"], ":studentID" => $_SESSION["studentID"], ":date" => $_POST["date"], ":start" => $_POST["startTime"], 
    ":end" => $_POST["endTime"], ":message" => $_POST["message"]);
    
    try{
        $stmt->execute($details);
        echo json_encode("Appointment successfully booked");
    }catch(PDOException $ex){
        echo json_encode($ex->getMessage());
    }

?>