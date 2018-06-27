<?php 
    session_start();
    require_once('../php/functions.php');
    if(isStudent()){
        header('Location: ../student');
    }elseif(!isSuper()){
       header('Location: ../');
    }
?>
<html>  
<head>
	<title>Lecturer DashBoard</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="../css/startpage.css">
  <link rel="stylesheet" href="../css/materialtext.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style>
   .remonly{
  background-color:rgb(255, 255, 255);
    }
</style>

</head>
<body>
  <div class="navbar">
     <span class="toggle"><i class="fa fa-bars bar" onclick="editclick()"></i></span>
     <p class="welcometxt"> Welcome to your dashboard</p>
   </div>
     <div class="sidebar">
            <div class="image-case">
            <h2><img src="../img/logo/unilag.png" alt="institution-logo">
            <br><span>Hi,
            <?php echo ' '.$_SESSION['title'].' '.$_SESSION['lastname'] ?> </span></h2>
            </div>
      <hr>
      <div class="dashboard-list">
          <a href="index.php"><i class="fa fa-columns icon"></i>Dashboard</a>
      </div>
      <br>
      <div class="dashboard-list">
          <a href="setime.php"  ><i class="fa fa-calendar icon"></i>Set Available Period </i></a>
      </div>
      <br>
      <div class="dashboard-list">
            <a href="lectnotification.php"><i  class="fa fa-bell-o icon"><span class="badge" style="background-color: #03A9F4;"></span></i>Notifications</a>
        </div>
        <br>
      <div class="dashboard-list">
          <a href="#" class="here"><i class="fa fa-user icon"></i>View Profile</a>
      </div>
      <br>
      <div class="dashboard-list">
          <a href="passwordlect.php"><i class="fa fa-key icon"></i>Change Password</a>
      </div>
      <br>
      <div class="dashboard-list">
          <a href="../php/logout.php"><i class="fa fa-home icon"></i>Logout</a>     
      </div>
    
</div>
<div>
        <br>
            <h3 style="margin-left:37%"> Profile Information 
            <span><input class="signIn homebutton" value="Edit"
             style=" background-color:#5264AE;margin-left:23%" id="edit" onclick="reditclick()"><span></h3>
           
        <form action="../php/changelecturer.php" method ="POST"> 
          <div class="lprofilechange"style="display:block " id="student-form">
            <div class="group " style="width:70%;">
                <input readonly type="text" name="fname" class="float-input remonly" value="<?php echo $_SESSION['firstname'] ?>" >
                <span class="bar"></span>
                <label class="placejumper">First Name</label>
            </div>
            <div class="group " style="width:70%;">
                <input readonly type="text" name="mname" class="float-input remonly"value="<?php echo $_SESSION['middlename'] ?>">
                <span class="bar"></span>
                <label class="placejumper">MiddleName</label>
            </div>
            <div class="group " style="width:70%;">
                <input readonly type="text" name="lname" class="float-input remonly" value="<?php echo $_SESSION['lastname'] ?>">
                <span class="bar"></span>
                <label class="placejumper">Last Name</label>
            </div>
            <div class="group " style="width:70%;">
                <input readonly type="text" name="title" class="float-input remonly" value="<?php echo $_SESSION['title'] ?>">
                <span class="bar"></span>
                <label class="placejumper">Title</label>
            </div>
            <div class="group" style="width:70%;">
                <input readonly type="text" name="institute" class="float-input remonly" value="<?php echo $_SESSION['institution'] ?>">
                <span class="bar"></span>
                <label class="placejumper">Institution</label>
            </div>
            <div class="group " style="width:70%;">
                <input readonly type="text" name="username" class="float-input" 
                style="background-color:white;" value="<?php echo $_SESSION['ID'] ?>">
                <span class="bar"></span>
                <label class="placejumper">Staff ID</label>
            </div>
            <div class="group" style="width:70%;">
                <input readonly type="text" name="email" class="float-input remonly"
                value="<?php echo $_SESSION['email'] ?>">
                <span class="bar"></span>
                <label class="placejumper">Email</label>
            </div>
            <div class="group "style="width:70%;">
                <input  type="text" id="readonlyfalse" name="phonenumber" class="float-input remonly" readonly value="<?php echo $_SESSION['phone_number'] ?>">
                <span class="bar"></span>
                <label class="placejumper">Phone Number</label>
            </div>
            <div class="enter">
               <input class=" signIn homebutton" id="change" value="Change" style="margin-top:1%; margin-left:25%; background-color:#5264AE; display:none;" name="submit" type="submit" >
            </div>
        </div>
</form>

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
      <script src="../student/close.js"></script>
    
</html>