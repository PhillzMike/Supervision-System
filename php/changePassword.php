<?php
    require_once('connection.php');
    session_start();
    if(isset($_POST['submit'])){
        $conn = connect();
        $stmt2 = $conn->query("SELECT * FROM `login` WHERE `ID` = ".$_SESSION['ID']);
        $result = $stmt2->fetch(PDO::FETCH_ASSOC);
        if($_POST['stu_oldpass']==$result['password']){
        $stmt = $conn->prepare('UPDATE `login` SET `password`= :pass WHERE `ID` = :id');
        $data = Array('pass' => $_POST['stu_newpass'],'id' => $_SESSION['ID']);
         if($stmt->execute($data)){
            $groupres = array('success'=>true, 'value'=>'Password Changed Successfully');
         }else{
            $groupres = array('success'=>false, 'value'=>'An error occured while trying to change your password','incorrect'=>false);
         }
        }else{
            $groupres = array('success'=>false, 'value'=>'The password you entered was incorrect','incorrect'=>'old_pass');
        }
        echo json_encode($groupres);
     }else{
        header("location: ../lecturer");
    }
    
?>