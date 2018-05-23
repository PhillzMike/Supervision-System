<?php 
    session_start();
    require_once('../php/functions.php');
    if(isSuper()){
         header('Location: ../lecturer');
    }elseif(!isStudent()){
        header('Location: ../');
    }
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Student Page</title>
    <link rel="stylesheet" href="student.css">
    <link rel = "stylesheet" href="../css/startpage.css">
    <link rel = "stylesheet" href="../css/materialtext.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="sidebar">
        <div class="image-case">
                <img src="<?php echo "../profile/studentImages/".$_SESSION['img_path']?>">
            
        </div>
        <h2>Hello, <?php echo ' '.$_SESSION['firstname'].' '.$_SESSION['lastname'] ?>
            </h2>
        <br>
        <hr>
        <nav class="side" style="height: 100vh;">
            <br>
            <a href="#" class="here">
                <i class="fa fa-columns icon"></i>&nbsp;&nbsp;Dashboard
            </a>
            <br>
            <a href="selectime.php">
                <i class="fa fa-calendar icon"></i>&nbsp;&nbsp;Choose Supervisor </a>
            <br>
            <a href="notice.php">
                <i class="fa fa-bell-o"><span class="badge" style="background-color: #03A9F4">5</span></i>&nbsp;&nbsp;Notifications
            </a>
            <a href="profilestudent.php">
                <i class="fa fa-user icon"></i>&nbsp;&nbsp;View Profile</a>
            <br>
            <a href="passwordchange.php">
                <i class="fa fa-key icon"></i>&nbsp;&nbsp;Change Password</a>
            <br>
            <a href="../php/logout.php">
                <i class="fa fa-home icon"></i>&nbsp;&nbsp;Logout</a>
            <br>
        </nav>
    </div>

    <div style="margin-left:30%">
        <div class="myCard">
            <div class="button-block">
                <button type="button" >
                    <i class="mark x"></i>
                    <i class="mark xx"></i>
                </button>
            </div>
            <?php 
                 require_once('php/getAppointments.php');
                 $allAppoint = getAppoints();
                 foreach($allAppoint as $appoint){
               echo '<section class="card">
               <h3>Time Slot</h3>
               <p>
                   <span class="textf">Name:'.$appoint[1].'</span>
                   <br>
                   <span class="textf">Day:'.$appoint[2].'</span>
                   <span class="textf">Time:'.$appoint[3].' - '.$appoint[4].'</span>
               </p>
           </section>';
                 }
            ?>
            

            

        </div>
    </div>
</body>



    <script type = "text/javascript" src = "close.js"></script>
    <script type = "text/javascript" src = "changeCount.js"></script>
</html>