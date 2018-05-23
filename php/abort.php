<?php
    require_once('connection.php');
        $conn = connect();
        $stmt = $conn->prepare('DELETE FROM `notifications` WHERE `MessageID` = :messageID');
        $stmt->bindParam(':messageID', $_POST['id']);
        //echo $data;
        if($stmt->execute()){
            echo json_encode("1");
        }

?>