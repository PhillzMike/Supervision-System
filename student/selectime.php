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
        <br>
        <br>
            <h2>
                <span class="">Hello, <?php echo ' '.$_SESSION['firstname'].' '.$_SESSION['lastname'] ?></span>
            </h2>
        </div>
        <br>
        <hr>
        <nav class="side" style="height: 100vh;">
            <br>
            <a href="index.php">
                <i class="fa fa-columns icon"></i>&nbsp;&nbsp;Dashboard
            </a>
            <br>
            <a href="selectime.php" class="here">
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

    <div class="dropdown">
        <h3>Choose Your Supervisor:</h3>
        <select id="lecture" style="width:50%">
            <option value="0">Select Lecturer:</option>
            <option value ="1">Doctor. V.Odumuyiwa</option>
            <option value ="2">Doctor. Sawyerr</option>
            <option value ="3">Doctor. E.P. Fasina</option>
            <option value ="4">Doctor. Akinlade</option>
        </select>
        
    </div>
        <div class="myCard" >

            <section class="card">
                <h3>Time Slot</h3>
                <p>
                    <span class="textf">Name:Joda Opemipo</span>
                    <br>
                    <span class="textf">Day:18th April,2018</span>
                    <span class="textf">Time:12pm - 1pm </span>
                </p>
                <p>
                    <button class="accept">Accept</button>
                </p>
            </section>

            <section class="card">
                <h3>Time Slot</h3>
                <p>
                    <span class="textf">Name:Joda Opemipo</b>
                    </span>
                    <br>
                    <span class="textf">Day:18th April,2018</span>
                    <span class="textf">Time:12pm - 1pm </span>
                </p>
                <p>
                    <button class="accept">Accept</button>
                </p>
            </section>

        </div>
    </div>
</body>

</html>
<style>
    .float-input{
        margin-top: 25%;
        width: 55%;
    }
    .bar{
        width:55%;
    }
</style>