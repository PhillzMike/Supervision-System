<?php
echo 'ggjjk';
    require_once('connection.php');
        $conn = connect();
        $stmt = $conn->prepare('DELETE * FROM `notifications` WHERE userID = :username');
        $data = Array('username' => $_POST['id']);
        echo $data;
        if($stmt->execute($data)){
        }

?>