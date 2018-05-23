<?php
$TimeSlots =  array();
function getTimeSlots($id,$name){
    if(isset($_SESSION['SuperId'])){
    if($_SESSION['SuperId']=='-1'){
        return array();
    }
}else{
    return array();
}
    require_once('../php/connection.php');
        $conn = connect();
        $stmt2 = $conn->query("SELECT `Day`, `Start Time`, `End Time`, `maxStudent` FROM `supervisor available time` WHERE `supervisorID` = '".$id."'");
        
        $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $ret = array();
        for($i=0;$i<count($result);$i++){
            $ret[$i][0] = $result[$i]['Day'];
            $ret[$i][1] = $result[$i]['Start Time'];
            $ret[$i][2] = $result[$i]['End Time'];
            $ret[$i][3] = $result[$i]['maxStudent'];
            $ret[$i][4] = $name;
        }
        $TimeSlots = $ret;
        return $ret;
        
}
?>