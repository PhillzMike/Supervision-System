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
        <h2><img src="../img/logo/unilag.png" alt="institution-logo"><span>Hi,
            <?php echo ' '.$_SESSION['title'].' '.$_SESSION['lstnm'] ?></span></h2> 
        </div>
        <hr>
        <br>
        <div class="dashboard-list">
            <a href="#" class="here"><i class="fa fa-columns icon "></i>Dashboard<i class="fa fa-caret-left arrow" style="font-size:30px;"></i></a>
        </div>
        <br>
        <div class="dashboard-list">
            <a href="setime.php"><i class="fa fa-calendar icon"></i>Set Available Period</a>
        </div>
        <br>
        <div class="dashboard-list">
            <a href="#"><i class="fa fa-user icon"></i>Change Profile</a>
        </div>
        <br>
        <div class="dashboard-list">
            <a href="#"><i class="fa fa-key icon"></i>Change Password</a>
        </div>
        <br>
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
<<<<<<< HEAD

	  <div class="appointmentcards" id = "appointmentCards">
        <section class="card" id = "card">
           <img class = "image"src="../img/logo/unilag.png">
          <p><span class="name">Name:Joda Opemipo</span>
            <br>
            <span class="date">Day:18th April,2018</span>
            <span class="time">Time:12pm - 1pm </span>
=======
  
  <h3 class="app_tag">Appointment Dashboard</h3>
	  <div class="appointmentcards">
        
        <section class="card"> 
        <div class="color_placinga">
           <h3> 1 </h3>
           </div>
          
          <p><span class="textf">Name:Joda Opemipo</span>
            <br>
            <span class="textf">Day:18th April,2018</span>
            <span class="textf">Time:12pm - 1pm </span>
          </p>
        </section>

        <section class="card">
        <div class="color_placingb">
           <h3> 2</h3>
           </div>
            <p><span class="textf">Name:Joda Opemipo</b></span>
            <br>
            <span class="textf">Day:18th April,2018</span>
            <span class="textf">Time:12pm - 1pm </span>
>>>>>>> 75f64b5a7683d639e02ddda0f296ee96f3e8e695
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
    <script type = "text/javascript" src = "../js/ajax.js"></script>
    <script type = "text/javascript" src = "../js/card.js"></script>
    <script>
        window.onload = () => {
        callajax([],"../php/cardGuy.php",fillCard);
    };
    </script>
</body>
</html>