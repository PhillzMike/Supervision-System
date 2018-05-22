<?php
    require_once('connection.php');
    $conn = connect();
    session_start();
    $query = "SELECT `Date`, `Start Time`, `End Time` FROM appointment where `supervisorID` = ".$_POST["supervisor"];
    $result = $conn->query($query);
    if(!$result){
        $query = "INSERT INTO `appointment` (`supervisorID`,`studentID`,`Date`,`Start Time`, `End Time`, `message`)
        VALUES(:supervisorID,:studentID,:date,:start,:end,:message)";
        $stmt = $conn->prepare($query);
        $details = array(":supervisorID"=>$_POST["supervisor"], ":studentID" => $_SESSION["studentID"], ":date" => $_POST["date"], ":start" => $_POST["startTime"], 
        ":end" => $_POST["endTime"], ":message" => $_POST["message"]);
        try{
            $stmt->execute($details);
            echo json_encode("success");
        }catch(PDOException $ex){
            echo json_encode($ex->getMessage());
        }
        
    }else{
        //TODO CHECK IF THE APPOINTMENT IS CLASHING WITH ANOTHER
    }
    


?>