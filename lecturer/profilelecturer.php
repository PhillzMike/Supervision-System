<html>  
<head>
	<title>Lecturer DashBoard</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
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
    
     
    
</html>