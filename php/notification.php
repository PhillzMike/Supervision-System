<?php

$notification = array();
function notify(){
    require_once('connection.php');
        $conn = connect();
        $stmt = $conn->prepare('SELECT `MessageID`,`notice` FROM `notifications` WHERE userID = :username');
        $data = Array('username' => $_SESSION['ID']);
      
        if($stmt->execute($data)){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $notification = $result;
            return $notification;
        }
}
?>