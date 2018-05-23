<?php
$SuperIDNames = array();
function getAppoints(){
    require_once('../php/connection.php');
        $conn = connect();
        $stmt2 = $conn->query("SELECT `supervisorID`,`Date`,`Start Time`,`End Time`,`message` FROM `appointment` WHERE `studentID` =  '".$_SESSION['ID']."'");
        $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $ret = array();
        for($i=0;$i<count($result);$i++){
            $ret[$i][0] = $result[$i]['ID'];
            $ret[$i][1] = $result[$i]['title']." ".$result[$i]['lastname']; 
        }
        $SuperIDNames = $ret;
        return $ret;
        
}
?>