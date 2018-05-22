<?php
    require_once('connection.php');
    session_start();
    if(isset($_POST['submit'])){
        $conn = connect();
        $id = $_POST['id'];
        $checkId = $conn->prepare('SELECT * FROM `login` WHERE ID = :userId');
        $assignId = array ("userId"=>$id);
        $checkId->execute($assignId);
        $oldId = $checkId->fetch(PDO::FETCH_ASSOC);
        if($oldId){
            echo json_encode(array('link'=>false, 'value'=>'Selected Id already exists', 'errors'=>array('id')));
        }else{
            $stmt = $conn->prepare('INSERT INTO `login`(`ID`, `password`, `role`) VALUES (:id,:password,:role)');
            $data = Array('id' => $_POST['id'],'password' => $_POST['password'],'role' => $_POST['role']);
            if($stmt->execute($data)){
                if($_POST['role']=="student"){
                    $stmt2 = $conn->prepare('INSERT INTO `students`(`ID`, `firstname`, `middlename`, `lastname`, `img_path`, `department`, `institution`, `level`, `email`) VALUES 
                                                                    (:id,:firstname,:middlename,:lastname,:img_path,:department,:institution,:level,:email)');
                    $data2 = Array('id' => $_POST['id'],'firstname' => $_POST['fname'],'middlename' => $_POST['mname'],'lastname' => $_POST['lname'],'img_path' => $_POST['img'],'department' => $_POST['dept'],'institution' => $_POST['institute']
                    ,'level' => $_POST['level'],'email' => $_POST['email']);
                    if($stmt2->execute($data2)){
                        $stmt3 = $conn->query("SELECT * FROM `students` WHERE ID = ".$_POST['id']);
                        $result = $stmt3->fetch(PDO::FETCH_ASSOC);
                            $_SESSION = array_merge($_SESSION,$result);
                            $_SESSION['role'] = $_POST['role'];
                        $groupres = array('link'=>true, 'value'=>'./student');
                    }else{
                        $groupres = array('link'=>false, 'value'=>'An unexpected error occured, while storing your details');
                    }
                }else if($_POST['role']=="supervisor"){
                    $stmt2 = $conn->prepare('INSERT INTO `supervisors`(`ID`, `title`, `firstname`, `middlename`, `lastname`, `institution`, `email`, `phone_number`) VALUES
                                            (:id,:title,:firstname,:middlename,:lastname,:institution,:email,:phone)');
                    $data2 = Array('id' => $_POST['id'],'title' => $_POST['title'],'firstname' => $_POST['fname'],'middlename' => $_POST['mname'],'lastname' => $_POST['lname'],'institution' => $_POST['institute']
                    ,'email' => $_POST['email'],'phone' =>  $_POST['pno']);
                    if($stmt2->execute($data2)){
                        $stmt3 = $conn->query("SELECT * FROM `supervisors` WHERE ID = ".$_POST['id']);
                    $result = $stmt3->fetch(PDO::FETCH_ASSOC);
                        $_SESSION = array_merge($_SESSION,$result);
                        $_SESSION['role'] = $_POST['role'];
                        $groupres = array('link'=>true, 'value'=>'./lecturer', 'why' => $_SESSION['role']);
                    }else{
                        $groupres = array('link'=>false, 'value'=>'An unexpected error occured, while storing your details');
                    }
                }

            }else{
                $groupres = array('link'=>false, 'value'=>'An unexpected error occured, while storing your login details');
            }
            echo json_encode($groupres);
        }
    }else{
        header("location: ../index.html");
    }
?>