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
          <a href="#" class="here" ><i class="fa fa-calendar icon"></i>Set Available Period </i></a>
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
       <form>
       <section class="app">
         <div class="time">
           <p type="Available Day:">
               <select type="date" id="day" style="border:none; padding-top:30px 10px 10px 0px;" required>
                <option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
                <option>Saturday</option>
                <option>Sunday</option>
             </select></p>
         </div>
          
         <div>
            <span id="addtime" onclick="myFunction()"><b>+ Add</b></span>
            <p type="Start Time:" id="startslot"><input type="time" class="startTime" required></input></p>
         </div>
         <div>
    
            <p type="End Time:" id="endslot"><input type="time" class="endTime" required></input></p>
         </div>
          <div>
            <span id="addtime"></span>
            <p type="Students No:" id ="maxStudent"><input  type="number" class="maxStudent" required></input></p>
         </div>
         
         
       </section>
       <br>
       <input type="submit" value="Create" class="cr1" id = "cr1">
     </form>
    </div>
   
  </div>


  <div class="limiter">
  <div class="container-table100">
      <div class="wrap-table100">
          <div class="table100 ver2 m-b-110">
              <div class="table100-head">
                  <table >
                      <thead>
                          <tr class="row100 head" style="border:1px solid grey">
                              <th class="cell100 column1">Day</th>
                              <th class="cell100 column2">Available Time</th>
                              <th class="cell100 column3">No of Students</th>
                              <th class="cell100 column4">Adjustment</th>
                          </tr>
                      </thead>
                  </table>
              </div>

             <div class="table100-body js-pscroll">
						<table id="timetable">
							<tbody>
								<tr class="row100 body">
									<td class="cell100 column1">21-May-2018</td>
									<td class="cell100 column2">9:00:00 AM</td>
									<td class="cell100 column3">4</td>
                                    <td class="cell100 column4"><div class="adjust"><button>Edit</button> <button>Cancel</button></div> </td>
                                
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Mind & Body</td>
									<td class="cell100 column2">Yoga</td>
									<td class="cell100 column3">8:00 AM - 9:00 AM</td>
                                    <td class="cell100 column4"><div class="adjust"><button>Edit</button> <button>Cancel</button> </td>
									
                                </tr>
                                </tbody>
						</table>
					</div>
                </div>
            </div>  
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
       var itm = document.getElementById("startslot");
       var itm2 = document.getElementById("endslot");
     while(itm.lastChild != itm.firstChild && itm2.lastChild != itm2.firstChild ){
       itm.removeChild(itm.lastChild);
       itm2.removeChild(itm2.lastChild);
     }
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
    var itm = document.getElementById("startslot").lastChild;
    var itm2 = document.getElementById("endslot").lastChild;
    var itm3 = document.getElementById("maxStudent").lastChild;
    var cln = itm.cloneNode(true);
    var cln2 = itm2.cloneNode(true);
    var cln3 = itm3.cloneNode(true);
    document.getElementById("startslot").appendChild(cln);
    document.getElementById("endslot").appendChild(cln2);
    document.getElementById("maxStudent").appendChild(cln3);
    
}


    </script>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="../js/addtime.js"></script>
    <script>
    callajax([],'../php/getLecturerAppointment.php',showTime);
    </script>
</body>
</html>