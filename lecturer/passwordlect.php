<?php 
    session_start();
    require_once('../php/functions.php');
    if(isStudent()){
        header('Location: ../student');
    }elseif(!isSuper()){
       header('Location: ../');
    }
?><html>  
<head>
	<title>Lecturer DashBoard</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/startpage.css">
  <link rel="stylesheet" href="../css/materialtext.css">
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="navbar">
     <span class="toggle"><i class="fa fa-bars bar" onclick="editclick()"></i></span>
     <p class="welcometxt"> Welcome to your dashboard</p>
   </div>
     <div class="sidebar">
            <div class="image-case">
            <h2><img src="../img/logo/unilag.png" alt="institution-logo"><span>Hi,
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
          <a href="profilelecturer.php"><i class="fa fa-user icon"></i>View Profile</a>
      </div>
      <br>
      <div class="dashboard-list">
          <a href="#"  class="here"><i class="fa fa-key icon"></i>Change Password</a>
      </div>
      <br>
      <div class="dashboard-list">
          <a href="../php/logout.php"><i class="fa fa-home icon"></i>Logout</a>     
      </div>
    
</div>
   <br>
         <h3 style="margin-left:37%"> Profile Information</h3>
        
         <div class="lprofilechange"style="display:block " id="student-form">
            <div class="group"style="width:70%;">
                    <input type="password" name="pass1" class="float-input">
                    <span class="bar"></span>
                    <label class="placejumper">Old Password</label>
                </div>
                <div class="group" style="width:70%;">
                    <input type="password" name="pass1" class="float-input">
                    <span class="bar"></span>
                    <label class="placejumper">New Password</label>
                </div>
                <div class="group"style="width:70%;">
                    <input type="password" name="password" class="float-input">
                    <span class="bar"></span>
                    <label class="placejumper">Confirm Password</label>
                </div>
            </div>

            <div class="enter">
               <input class="signIn homebutton" value="Change" style="margin-top:1%; margin-left:20%; background-color:#5264AE;" name="submit" type="submit">
            </div>
</div>  

</body>
</html>