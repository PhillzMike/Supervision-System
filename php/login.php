<?php
    require_once('connection.php');
    session_start();
    if(isset($_POST['submit'])){
        $conn = connect();
        $stmt = $conn->prepare('SELECT * FROM `login` WHERE username = :username AND password = :password');
        $data = Array('username' => $_POST['username'],'password' => $_POST['password']);
        if($stmt->execute($data)){
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
                header("Location: ../lecturer/lectdashboard.php");
            }
        }
        var_dump($result);
    }
?>