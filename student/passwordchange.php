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
        <br>
        <hr>
        <nav class="side" style="height: 100vh;">
            <br>
            <a href="index.php" >
                <i class="fa fa-columns icon"></i>&nbsp;&nbsp;Dashboard
            </a>
            <br>
            <a href="selectime.php">
                <i class="fa fa-calendar icon"></i>&nbsp;&nbsp;Choose Supervisor </a>
            <br>
            <a href="notice.php">
                <i class="fa fa-bell-o"><span class="badge" style="background-color: #03A9F4"></span></i>&nbsp;&nbsp;Notifications
            </a>
            <a href="profilestudent.php">
                <i class="fa fa-user icon"></i>&nbsp;&nbsp;View Profile</a>
            <br>
            <a href="#" class="here">
                <i class="fa fa-key icon"></i>&nbsp;&nbsp;Change Password</a>
            <br>
            <a href="../php/logout.php">
                <i class="fa fa-home icon"></i>&nbsp;&nbsp;Logout</a>
            <br>
        </nav>
    </div>

    <div style="margin-left:30%">
    <div class="student" id="student-form">
        <div class="group">
            <input type="password" id="stu_oldpass" name="stu_oldpass" class="float-input">
            <span class="bar"></span>
            <label class="placejumper">Old Password</label>
        </div>
        <div class="group">
            <input type="password" id="stu_newpass" name="stu_newpass" class="float-input">
            <span class="bar"></span>
            <label class="placejumper">New Password</label>
        </div>
        <div class="group">
            <input type="password" id="stu_conpass" name="stu_conpass" class="float-input">
            <span class="bar"></span>
            <label class="placejumper">Confirm Password</label>
        </div>

    </div>
        <script type = "text/javascript" src = "close.js"></script>
        <script type = "text/javascript" src = "changeCount.js"></script>
        <button onclick = "changeP()">Change</button>
        <script src="../js/ajax.js"></script>
        <script src="./js/changePass"></script>
</body>

</html>
<style>
    .student{
        padding-top: 10%;
        padding-left: 10%;
    }

    .float-input{
        width: 55%;
    }
    .bar{
        width:55%;
    }
    h2{
        padding-top: 2%;
        text-align: center;
    }
    button{
        float:right;
        border: none;
        background-color: #5264AE;
        color: white;
        width: 12%;
        height: 30px;
        border-radius: 9px;
        margin-top: -3%;
        margin-right: 55%;
        margin-bottom: 5%;
        box-shadow: 2px 4px 4px 2px rgba(0, 0, 0, 0.671);
        cursor: pointer;
    }

</style>