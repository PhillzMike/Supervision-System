<?php
function changeProfile($type, $arrayvalues){
    require_once('connection.php');
    if(isset($_POST['submit'])){
        $conn = connect();
        if($type == "student"){
        $stmt = $conn->prepare('UPDATE `students` SET `firstname`= :stu_fname,
        `middlename`=:stu_mname,`lastname`=:stu_lname,
        `department`=:stu_dept,`institution`=:stu_institute,`level`=:stu_level,`email`=:stu_email WHERE `ID` = :stu_matric');
         print_r($arrayvalues);
        
         if($stmt->execute($arrayvalues)){
                header("Location: profilestudent.php");
         }
        }else if($type == "lecturer"){
            $stmt = $conn->prepare('UPDATE `supervisors` SET 
            `title`=:title,`firstname`=:fname,`middlename`=:mname,
            `lastname`=:lname,`institution`=:institute,`email`=:email,`phone_number`= :phonenumber
             WHERE `ID` =:username');
               print_r($arrayvalues);
               unset($arrayvalues["submit"]);
               print_r($arrayvalues);
              if($stmt->execute($arrayvalues)){
                $stmt2 = $conn->query("SELECT * FROM `supervisors` WHERE `ID` = ".$arrayvalues["username"]);
                $result = $stmt2->fetch(PDO::FETCH_ASSOC);
                $_SESSION = array_merge($_SESSION,$result);
                
                header("Location: ../lecturer/profilelecturer.php");
         }
        }

     }
    }
?>