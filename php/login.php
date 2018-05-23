<?php
    require_once('connection.php');
    require_once('hash.php');
    session_start();
    if(isset($_POST['submit'])){
        $conn = connect();
        $stmt = $conn->prepare('SELECT * FROM `login` WHERE ID = :username AND password = :password');
        $hashed = hashThis($_POST['password']);
        $data = Array('username' => $_POST['username'],'password' => $hashed);
        if($stmt->execute($data)){
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $error = "Internal database error, contact an administrator";
            if(!$result){
                $error = "Invalid username and password";
            }
            $id = $result['ID'];
            $role = $result['role'];
            // $_SESSION['ID'] = $id;
             $_SESSION['role'] = $role;
            
             $stamt = $conn->query("SELECT * FROM `notifications` WHERE userID = $id");
            $resulta = $stamt->fetch(PDO::FETCH_ASSOC);
            if($resulta){
                $count = count($resulta);
            }else{
                $count = 0;
            }
            if($role=="student"){
                $stmt = $conn->query("SELECT * FROM `students` WHERE ID = $id");
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION = array_merge($_SESSION,$result);
                
                $groupres = array('link'=>true, 'value'=>'./student', 'count'=>$count);
            }else if($role == "supervisor"){
                $stmt = $conn->query("SELECT * FROM `supervisors` WHERE ID = $id");
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION = array_merge($_SESSION,$result);
                // $_SESSION['fstnm'] = $result['firstname'];
                // $_SESSION['lstnm'] = $result['lastname'];
                // $_SESSION['title'] = $result['title'];
                
                $groupres = array('link'=>true, 'value'=>'./lecturer', 'count'=>$count);
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
       
    }else{
        header("location: ../index.html");
    }
?>