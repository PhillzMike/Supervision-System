<?php 
    session_start();
    require_once('../php/functions.php');
    if(isSuper()){
         header('Location: ../lecturer');
    }elseif(!isStudent()){
        header('Location: ../');
    }
?>
<html>
<head>
	<title>Student DashBoard</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/studentdash.css">
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
        <div class="stdimage-case">
        <h2><img src="../img/teni.jpg" alt="institution-logo">
        <br><span>Hi,
            <?php echo ' '.$_SESSION['firstname'].' '.$_SESSION['lastname'] ?></span></h2> 
        </div>
        <hr>
        <br>
        <div class="dashboard-list">
            <a href="#" class="here"><i class="fa fa-columns icon "></i>Dashboard</a>
        </div>
        <br>
        <div class="dashboard-list">
            <a href="supervisionchoice.php"><i class="fa fa-calendar icon"></i>Select Available Period</P></a>
        </div>
        <br>
        <div class="dashboard-list">
            <a href="profilestudent.php"><i class="fa fa-user icon"></i>Change Profile</a>
        </div>
        <br>
        <div class="dashboard-list">
            <a href="passwordchange.php"><i class="fa fa-key icon"></i>Change Password</a> 
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
  
  <h3 class="app_tag">Appointment Dashboard</h3>
	  <div class="appointmentcards" id = "appointmentCards">
        
      <section class="card" id = "card"> 
        <div class="color_placing">
           <img src = "../img/unilag.png" class = "image">
           </div>
          
        <div>
          <div class="button-block">
           <button type="button">
            <i class="mark x"></i>
            <i class="mark xx"></i>
           </button>
        </div>
            <span class="textf">Supervisor: Dr Odumuyiwa</span>
            <br>
            <span class="textf">Day:18th April,2018</span>
            <br>
            <span class="textf">Time:12pm - 1pm </span>
         </div>
        </section>

        <section class="card">
          <div class="color_placing">
                <img src = "../img/unilag.png" class = "image">
        </div>
       
       <div>
          <div class="button-block">
           <button type="button">
            <i class="mark x"></i>
            <i class="mark xx"></i>
           </button>
         </div>
         <span class="textf">Supervisor: Dr Odumuyiwa</span>
         <br>
         <span class="textf">Day:18th April,2018</span>
         <br>
         <span class="textf">Time:12pm - 1pm </span>
      </div>
        </section>
      
        <section class="card">
        <div class="color_placing">
             <img src = "../img/unilag.png" class = "image">
        </div>
       
       <div>
           <div class="button-block">
                <button type="button">
                    <i class="mark x"></i>
                    <i class="mark xx"></i>
                </button>
            </div>
            <span class="textf">Supervisor: Dr Odumuyiwa</span>
            <br>
            <span class="textf">Day:18th April,2018</span>
            <br>
            <span class="textf">Time:12pm - 1pm </span>
      </div>
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
    callajax([],'../php/cardGuy.php',fillCard);
    </script>
</body>
</html>