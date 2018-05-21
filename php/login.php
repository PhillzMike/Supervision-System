<?php
    require_once('connection.php');
    session_start();
    if(isset($_POST['submit'])){
        $conn = connect();
        $stmt = $conn->prepare('SELECT * FROM `login` WHERE username = :username AND password = :password');
        $data = Array('username' => $_POST['username'],'password' => $_POST['password']);
        if($stmt->execute($data)){
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$result){
                $error = "Invalid username and password";
            }
            $id = $result['ID'];
            $role = $result['role'];
            $_SESSION['ID'] = $id;
            $_SESSION['role'] = $role;
            
            if($role=="student"){

            }else if($role == "supervisor"){
                $stmt = $conn->query("SELECT * FROM `supervisors` WHERE ID = $id");
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['fstnm'] = $result['firstname'];
                $_SESSION['lstnm'] = $result['lastname'];
                $_SESSION['title'] = $result['title'];
                
                $groupres = array('link'=>true, 'value'=>'./lecturer');
                //header("Location: ../lecturer");
            }else{
            //var_dump($result);
            $groupres = array('link'=>false, 'value'=>$error);
            
              }

        }else{
            $groupres = array('link'=>true, 'value'=>'./oops.html');
            //header("Location: ../oops.html");
        }
        echo json_encode($groupres);
       
    }
?>