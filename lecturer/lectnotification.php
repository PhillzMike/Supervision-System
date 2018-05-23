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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   <div class="navbar">
     <span class="toggle"><i class="fa fa-bars bar" onclick="editclick()"></i></span>
     <span class="welcometxt"><h4>Welcome to your dashboard</h4></span>
   </div>
    <div class="sidebar">
        <div class="image-case">
        <h2><img src="../img/logo/unilag.png" alt="institution-logo"> <br><span>Hi,
            <?php echo ' '.$_SESSION['title'].' '.$_SESSION['lastname'] ?></span></h2> 
        </div>
        <hr>
        <br>
        <div class="dashboard-list">
            <a href="index.php" ><i class="fa fa-columns icon "></i>Dashboard</a>
        </div>
        <br>
        <div class="dashboard-list">
            <a href="setime.php"><i class="fa fa-calendar icon"></i>Set Available Period</a>
        </div>
        <br>
        <div class="dashboard-list">
            <a href="#" class="here"><i class="fa fa-user icon"></i>Notification</a>
        </div>
        <br>
        <div class="dashboard-list">
            <a href="profilelecturer.php"><i class="fa fa-user icon"></i>View Profile</a>
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

  <div class="blurpart"  id="residebar">
    <div class="phonebar">
      <span class="close">&times;</span>
    <img src="unilag.png" alt="institution-logo">
   
    <h2>Hi, <?php echo ' '.$_SESSION['title'].' '.$_SESSION['lastname'] ?></h2>
            <div class="dashboard-list">
                 <a href="index.php" class="here"> Dashboard</a>
            </div>
            <div class="dashboard-list">
                <a href="setime.php">Set Available Period</a>
            </div>
            <div class="dashboard-list">
                 <a href="#">Notifications</a>
            </div>
            <div class="dashboard-list">
                 <a href="profilelecturer.php">View Profile</a>
            </div>
            <div class="dashboard-list" >
                <a href="passwordlect.php">Change Password</a>
            </div>
            <div class="dashboard-list" >
                <a href="#">Logout</a>
            </div>
        
        
        </div>
  </div> 
  </body>
  </html>