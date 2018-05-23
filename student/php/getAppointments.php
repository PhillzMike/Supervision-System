<?php
function getAppoints(){
    require_once('../php/connection.php');
        $conn = connect();
        $stmt2 = $conn->query("SELECT `supervisorID`,`Date`,`Start Time`,`End Time`,`message` FROM `appointment` WHERE `studentID` =  '".$_SESSION['ID']."'");
        $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);
       
        $ret = array();
        
        for($i=0;$i<count($result);$i++){
            $stmt3 = $conn->query("SELECT `title`,`lastname` FROM `supervisors` WHERE `ID` =  '".$result[$i]['supervisorID']."'");
            $result2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            $ret[$i][0] = $result[$i]['supervisorID'];
            $ret[$i][1] = $result2[0]['title']." ".$result2[0]['lastname']; 
            $ret[$i][2] = $result[$i]['Date'];
            $ret[$i][3] = $result[$i]['Start Time'];
            $ret[$i][4] = $result[$i]['End Time'];
            $ret[$i][5] = $result[$i]['message'];
        }
        return $ret;
        
}
?>