<?php
require_once('connection.php');
$conn = connect();
session_start();
if($_POST["oldPass"] == $_SESSION["password"]){
    $query = "Update `login` SET `password` = :pass where `ID` = ".$_SESSION["ID"];
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":pass",$_POST["newPass"]);
    try{  
        $stmt->execute();
        echo json_encode("1");
    }catch(PDOException $ex){
        echo json_encode($ex->getMessage());
    }
}else{
    echo json_encode("old password is wrong");
}

?>