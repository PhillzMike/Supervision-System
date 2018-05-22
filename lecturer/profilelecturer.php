<html>  
<head>
	<title>Lecturer DashBoard</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="../css/startpage.css">
  <link rel="stylesheet" href="../css/materialtext.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <div class="navbar">
     <span class="toggle"><i class="fa fa-bars bar" onclick="editclick()"></i></span>
     <p class="welcometxt"> Welcome to your dashboard</p>
   </div>
     <div class="sidebar">
            <div class="image-case">
            <h2><img src="../img/logo/unilag.png" alt="institution-logo"><span>Hi,
               <!-- putname  --> </span></h2>
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
          <a href="#" class="here"><i class="fa fa-user icon"></i>Change Profile</a>
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
            <h3 style="margin-left:37%"> Profile Information</h3>
          <div class="lprofilechange"style="display:block " id="student-form">
            <div class="group" style="width:70%;">
                <input type="text" name="fname" class="float-input" >
                <span class="bar"></span>
                <label class="placejumper">First Name</label>
            </div>
            <div class="group" style="width:70%;">
                <input type="text" name="mname" class="float-input">
                <span class="bar"></span>
                <label class="placejumper">MiddleName</label>
            </div>
            <div class="group" style="width:70%;">
                <input type="text" name="lname" class="float-input">
                <span class="bar"></span>
                <label class="placejumper">Last Name</label>
            </div>
            <div class="group" style="width:70%;">
                <input type="text" name="title" class="float-input">
                <span class="bar"></span>
                <label class="placejumper">Title</label>
            </div>
            <div class="group" style="width:70%;">
                <input type="text" name="institute" class="float-input">
                <span class="bar"></span>
                <label class="placejumper">Institution</label>
            </div>
            <div class="group" style="width:70%;">
                <input type="text" name="username" class="float-input">
                <span class="bar"></span>
                <label class="placejumper">Staff id</label>
            </div>
            <div class="group" style="width:70%;">
                <input type="text" name="username" class="float-input">
                <span class="bar"></span>
                <label class="placejumper">Email</label>
            </div>
            <div class="group"style="width:70%;">
                <input type="text" name="phonenumber" class="float-input">
                <span class="bar"></span>
                <label class="placejumper">Phone Number</label>
            </div>
            <div class="enter">
               <input class=" signIn homebutton" value="Change" style="margin-top:1%; background-color:#5264AE;" name="submit" type="submit">
            </div>
        </div>


    
</html>