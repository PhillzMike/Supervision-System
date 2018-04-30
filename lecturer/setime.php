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
     <p class="welcometxt"> Welcome to your dashboard</p>
   </div>
  <div class="sidebar">
  	<img src="../img/logo/unilag.png" alt="institution-logo">
  	<h2>Hi, Dr Odumuyiwa</h2>
      <div class="dashboard-list">
          <a href="./"><i class="fa fa-columns icon"></i>Dashboard</a>
      </div>
      <div class="dashboard-list">
          <a href="#"><i class="fa fa-calendar icon"></i>Set Available Period <i class="fa fa-caret-left arrow" style="font-size:30px;"></i></a>
      </div>
      <div class="dashboard-list">
          <a href="#"><i class="fa fa-user icon"></i>Change Profile</a>
      </div>
      <div class="dashboard-list">
          <a href="#"><i class="fa fa-key icon"></i>Change Password</a>
      </div>
      <div class="dashboard-list">
          <a href="#"><i class="fa fa-sign-out-alt icon"></i>Logout</a>     
      </div>
    
    
    
     
    

  </div>
  <!-- Explain -->
  <div class="blurpart"  id="residebar">
    <div class="phonebar">
      <span class="close">&times;</span>
    <img src="unilag.png" alt="institution-logo">
    <h2>Hi, Dr Odumuyiwa</h2>
     <a href="./"> Dashboard</a>
     <a href="#"  class="here">Set Available Period</a>
     <a href="#">Change Profile</a>
     <a href="#">Change Password</a>
     <a href="#">Logout</a>
     </div>
  </div>  

  <div class="addpart">
    <p id="addbutton" onclick="addclick()"><b>+ Add</b></p>
  </div>

  <div class="createapp" id="createapp">
    <div class="infocreate">
       <span class="close2">&times;</span>
       <h3 STYLE="text-align:center;">SET FREE SCHEDULE</h3>
       <section class="app">
         <div class="time">
           <p type="Available Day:"><input type="date"></input></p>
         </div>
          
         <div>
            <span id="addtime" onclick="myFunction()"><b>+ Add</b></span>
            <p type="Available Time:" id="timeslot"><input type="time"></input></p>
         </div>
       </section>
       <br>
       <button class="cr1" >Create</button>
    </div>
  </div>

   <script>
      var side = document.getElementById("residebar");
      var span = document.getElementsByClassName("close")[0];
      var addmodal = document.getElementById("createapp");
      var spann = document.getElementsByClassName("close2")[0];
     function editclick() {
        side.style.display = "block";
    }
    span.onclick = function() {
       side.style.display = "none";
    }
     spann.onclick = function() {
       addmodal.style.display = "none";
    }
     function addclick() {
        addmodal.style.display = "block";
    }
     window.onclick = function(event) {
    if (event.target == side) { 
        side.style.display = "none";
    } else if(event.target == addmodal){
         addmodal.style.display = "none";
    }
  }
function myFunction() {
    var itm = document.getElementById("timeslot").lastChild;
    var cln = itm.cloneNode(true);
    document.getElementById("timeslot").appendChild(cln);
}


    </script>
</body>
</html>