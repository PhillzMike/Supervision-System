<?php 
    session_start();
    require_once('../php/functions.php');
    if(isSuper()){
         header('Location: ../lecturer');
    }elseif(!isStudent()){
        header('Location: ../');
    }
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Student Page</title>
    <link rel="stylesheet" href="student.css">
    <link rel = "stylesheet" href="../css/startpage.css">
    <link rel = "stylesheet" href="../css/materialtext.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="sidebar">
        <div class="image-case">
        <img src="<?php echo "../profile/studentImages/".$_SESSION['img_path']?>">
        <br>
        <br>
            <h2>
                <span class="">Hello,<?php echo ' '.$_SESSION['firstname'].' '.$_SESSION['lastname'] ?></span>
            </h2>
        </div>
        <br>        <nav class="side" style="height: 100vh;">
            <br>
            <a href="index.php" >
                <i class="fa fa-columns icon"></i>&nbsp;&nbsp;Dashboard
            </a>
            <br>
            <a href="selectime.php">
                <i class="fa fa-calendar icon"></i>&nbsp;&nbsp;Choose Supervisor </a>
            <br>
            <a href="#" class="here">
                <i class="fa fa-bell-o"><span class="badge"></span></i>&nbsp;&nbsp;Notifications
            </a>
            <br>
            <a href="profilestudent.php">
                <i class="fa fa-user icon"></i>&nbsp;&nbsp;View Profile</a>
            <br>
            <a href="passwordchange.php" >
                <i class="fa fa-key icon"></i>&nbsp;&nbsp;Change Password</a>
            <br>
            <a href="../php/logout.php">
                <i class="fa fa-home icon"></i>&nbsp;&nbsp;Logout</a>
            <br>
        </nav>
    </div>
<div style="margin-left: 30%">
    <div class = "myContent">
       <table class="myTable">
           <?php
           
           require_once('../php/notification.php');
           $counter = 1;
           $notification = notify();
           foreach($notification as $note){
                echo '<tr class="color'.$counter++.'">
                <td><h4>'.$note['notice'].'</h4>
                    <span class="close" onclick = "Del('.$note['MessageID'].');">&times;</span>
                </td>
            </tr>'; 
        if($counter > 5){
            $counter = 1;
        }}
           ?>
            
             <tr class="color2">
                <td><h4>It is time to meet with your supervisor</h4>
                    <span class="close" onclick = "Del(1);">&times;</span>
                </td>
            </tr>
            <tr class="color3">
                <td><h4>You have one hour left to your meeting time</h4>
                    <span class="close" onclick = "this.parentElement.style.display='none';">&times;</span>
                </td>
            </tr>
            <tr class="color4">
                <td><h4>One day to your meeting date</h4>
                    <span class="close" onclick = "this.parentElement.style.display='none';">&times;</span>
                </td>
            </tr>
            <tr class="color5">
                <td><h4>Your appointment scheduling was successful</h4>
                    <span class="close" onclick = "this.parentElement.style.display='none';">&times;</span>
                </td>
            </tr>
        </table>
    </div>
</div>
<script src = "../js/ajax.js"></script>
<script src="close.js"></script>
</body>
</html>
