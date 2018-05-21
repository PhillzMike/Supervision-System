<?php 
    session_start();
    require_once('../php/functions.php');
    if(isStudent()){
         //to student dash
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
            <img src="../img/logo/unilag.png" alt="institution-logo">
        </div>
        <h2>Hi,<?php echo ' '.$_SESSION['title'].' '.$_SESSION['lstnm'] ?></h2>
        <div class="dashboard-list">
            <a href="#"><i class="fa fa-columns icon"></i>Dashboard<i class="fa fa-caret-left arrow" style="font-size:30px;"></i></a>
        </div>
        <div class="dashboard-list">
            <a href="setime.php"><i class="fa fa-calendar icon"></i>Set Available Period</a>
        </div>
        <div class="dashboard-list">
            <a href="#"><i class="fa fa-user icon"></i>Change Profile</a>
        </div>
        <div class="dashboard-list">
            <a href="#"><i class="fa fa-key icon"></i>Change Password</a>
        </div>
        <div class="dashboard-list">
            <a href="../php/logout.php"><i class="fa fa-sign-out-alt icon"></i>Logout</a>
        </div>

        </div>
  <div class="blurpart"  id="residebar">
    <div class="phonebar">
      <span class="close">&times;</span>
    <img src="unilag.png" alt="institution-logo">
    <h2>Hi, <?php echo ' '.$_SESSION['title'].' '.$_SESSION['lstnm'] ?></h2>
            <div class="dashboard-list">
                 <a href="#" class="here"> Dashboard</a>
            </div>
            <div class="dashboard-list">
                <a href="setime.php">Set Available Period</a>
            </div>
            <div class="dashboard-list">
                 <a href="#">Change Profile</a>
            </div>
            <div class="dashboard-list" >
                <a href="#">Change Password</a>
            </div>
            <div class="dashboard-list" >
                <a href="#">Logout</a>
            </div>
        
        
        </div>
  </div> 

	  <div class="appointmentcards" id = "appointmentCards">
        <section class="card" id = "card">
           <img class = "image"src="../img/logo/unilag.png">
          <p><span class="name">Name:Joda Opemipo</span>
            <br>
            <span class="textf">Day:18th April,2018</span>
            <span class="textf">Time:12pm - 1pm </span>
          </p>
        </section>

        <section class="card">
            <img src="../img/logo/unilag.png">
            <p><span class="textf">Name:Joda Opemipo</b></span>
            <br>
            <span class="textf">Day:18th April,2018</span>
            <span class="textf">Time:12pm - 1pm </span>
          </p>
        </section>
	  </div>
    <script>
      var side = document.getElementById("residebar");
      var span = document.getElementsByClassName("close")[0];
     function editclick() {
        side.style.display = "block";
    }
    span.onclick = function() {
       side.style.display = "none";
    }
     window.onclick = function(event) {
    if (event.target == side) {
        side.style.display = "none";
    } 
  }

    </script>
</body>
</html>