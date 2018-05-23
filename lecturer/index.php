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
    <link rel="stylesheet" href="../css/startpage.css">
    <link rel="stylesheet" href="../css/materialtext.css">
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
            <a href="#" class="here"><i class="fa fa-columns icon "></i>Dashboard</a>
        </div>
        <br>
        <div class="dashboard-list">
            <a href="setime.php"><i class="fa fa-calendar icon"></i>Set Available Period</a>
        </div>
        <br>
        <div class="dashboard-list">
            <a href="lectnotification.php"><i class="fa fa-user icon"><span class="badge notcon" style="background-color: #03A9F4;"></span></i>Notifications</a>
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
                 <a href="#" class="here"> Dashboard</a>
            </div>
            <div class="dashboard-list">
                <a href="setime.php">Set Available Period</a>
            </div>
            <div class="dashboard-list">
                 <a href="#">View Profile</a>
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
                    <button type="button" >
                        <i class="mark x"></i>
                        <i class="mark xx"></i>
                    </button>
                </div>
                <span class="textf">Name:Joda Opemipo</span>
                <br>
                <span class="textf">Day:18th April,2018</span>
                <br>
                <span class="textf">Time:12pm - 1pm </span>
            </div>
        </section>

   </div>

   

   <div class="cancel_app" id="cancel_app">
    <div class="cancel_info">
       <span class="close2">&times;</span>
      <h6 style="font-size:16px">Are you sure you want to delete this Appointment?</h6>
    
     <input class=" signIn homebutton" id = "yesConfirmation" value="Yes" style="margin-top:1%; background-color:#5264AE;" type="submit">
     <input class=" signIn homebutton" value="No" style="margin-top:1%; background-color:#5264AE;" type="submit" onclick = "removeConfirmation();">
           
    </div>
  </div>

  <div class="fullinfo_app" id="fullinfo_app">
    <div class="fullinfo_content" style>
       <span class="close3">&times;</span>
       <br>
       <div class="modal_text">
           <img src="../img/teni.jpg" class = "modalInput" alt="student img">
            <p class = "modalInput">FirstName:Joda</p>
            <p class = "modalInput">LastName:Opemipo</p>
            <p class = "modalInput">Matric No:140805004</p>
            <p class = "modalInput">Department: csc </p>
            <p class = "modalInput">Day: Monday</p>
            <p class = "modalInput">Time: 00:00:00</p>
            <p class = "modalInput">Level:400 </p>
            <p class = "modalInput">Message:ueehfhbfhududhfeheueue</p>
       </div>
    </div>
  </div>


    <script>
      var side = document.getElementById("residebar");
      var span = document.getElementsByClassName("close")[0];
      var span2 = document.getElementsByClassName("close2")[0];
      var span3 = document.getElementsByClassName("close3")[0];
      var remove = document.getElementById("cancel_app");
      var full = document.getElementById("fullinfo_app");
     function editclick() {
        side.style.display = "block";
    }
    span.onclick = function() {
       side.style.display = "none";
    }
    function removeConfirmation(){
        remove.style.display = "none";
    }
    span2.onclick = removeConfirmation;
    span3.onclick = function() {
        full.style.display = "none";
    }
     window.onclick = function(event) {
    if (event.target == side) {
        side.style.display = "none";
    } else if(event.target == remove){
        remove.style.display = "none";
    } else if(event.target == full){
        full.style.display = "none";
    }
     }

   </script>
    <script type = "text/javascript" src = "../js/ajax.js"></script>
    <script type = "text/javascript" src = "../js/card.js"></script>
    <script src="../student/close.js"></script>
    <script>
    callajax([],'../php/cardGuy.php',fillCard);
    </script>
</body>
</html>