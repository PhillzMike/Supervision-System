
<?php 
    session_start();
    require_once('../php/functions.php');
    if(isSuper()){
         header('Location: ../lecturer');
    }elseif(!isStudent()){
        header('Location: ../');
    }
?><!DOCTYPE HTML>
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
            <h2>
                <span class="">Hello,  <?php echo ' '.$_SESSION['firstname'].' '.$_SESSION['lastname'] ?></span>
            </h2>
        </div>
        <br>
        <hr>
        <nav class="side" style="height: 100vh;">
            <br>
            <a href="index.php">
                <i class="fa fa-columns icon"></i>&nbsp;&nbsp;Dashboard
            </a>
            <br>
            <a href="selectime.php">
                <i class="fa fa-calendar icon"></i>&nbsp;&nbsp;Choose Supervisor </a>
            <br>
            <a href="">
                <i class="fa fa-bell-o"></i>&nbsp;&nbsp;Notifications
            </a>
            <a href="#" class="here">
                <i class="fa fa-user icon"></i>&nbsp;&nbsp;View Profile</a>
            <br>
            <a href="passwordchange.php">
                <i class="fa fa-key icon"></i>&nbsp;&nbsp;Change Password</a>
            <br>
            <a href="../php/logout.php">
                <i class="fa fa-home icon"></i>&nbsp;&nbsp;Logout</a>
            <br>
        </nav>
    </div>
    
    <h3 style="margin-left:37%"> Profile Information 
            <span><input class="signIn homebutton" value="Edit"
             style=" background-color:#5264AE;margin-left:23%" id="edit" onclick="reditclick()"><span></h3>
    <div style="margin-left:30%">
    <form action="../php/changestudent.php" method ="POST">
    <div class="student" id="student-form">
        <div class="group">
            <input type="text" id="stu_matric"  name="stu_matric"class="float-input" style="background-color:white;"
            value="<?php echo $_SESSION['ID'] ?>" readonly>
            <span class="bar"></span>
            <label class="placejumper">Matric Number</label>
        </div>
        <div class="group">
            <input type="text" id="stu_fname" name ="stu_fname" class="float-input  remonly" 
            value="<?php echo $_SESSION['firstname'] ?>" readonly>
            <span class="bar"></span>
            <label class="placejumper">First Name</label>
        </div>
        <div class="group">
            <input type="text" id="stu_mname" name="stu_mname" class="float-input  remonly" 
            value="<?php echo $_SESSION['middlename'] ?>" readonly>
            <span class="bar"></span>
            <label class="placejumper">Middle Name</label>
        </div>
        <div class="group">
            <input type="text" id="stu_lname" name="stu_lname" class="float-input  remonly" 
            value="<?php echo $_SESSION['lastname'] ?>" readonly>
            <span class="bar"></span>
            <label class="placejumper">Last Name</label>
        </div>
        <div class="group">
            <input type="text" id="stu_institute" name ="stu_institute" class="float-input  remonly" 
            value="<?php echo $_SESSION['institution'] ?>" readonly>
            <span class="bar"></span>
            <label class="placejumper">Institution</label>
        </div>
        <div class="group">
            <input type="text" id="stu_level" name="stu_level" class="float-input  remonly"
            value="<?php echo $_SESSION['level'] ?>" readonly>
            <span class="bar"></span>
            <label class="placejumper">Level</label>
        </div>
        <div class="group">
            <input type="text" id="stu_dept"  name="stu_dept" class="float-input  remonly"
            value="<?php echo $_SESSION['department'] ?>" readonly>
            <span class="bar"></span>
            <label class="placejumper">Department</label>
        </div>
        <div class="group">
            <input type="text" id="stu_email"  name="stu_email"  class="float-input  remonly"
            value="<?php echo $_SESSION['email'] ?>" readonly>
            <span class="bar"></span>
            <label class="placejumper">Email</label>
        </div>
</form>
     <div class="enter">
               <input class=" signIn homebutton" id="change" value="Change" style="margin-top:1%; margin-left:25%; background-color:#5264AE; display:none;" name="submit" type="submit" >
            </div>
</body>
<script>
    var item  = document.getElementById("edit");
    var changeitem  = document.getElementById("change");
    function reditclick() {
    item.style.display = "none";
    changeitem.style.display = "block";
    var reminput = document.getElementsByClassName("remonly");
    for(var i=0; i<reminput.length; i++){
        reminput[i].readOnly = false;
       }
    }
    </script>

</html>
<style>
    .student{
        padding-top: 3%;
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
        margin-right: 50%;
        box-shadow: 2px 4px 4px 2px rgba(0, 0, 0, 0.671);
        cursor: pointer;
    }
    .remonly{
  background-color:rgb(255, 255, 255);
    }

</style>