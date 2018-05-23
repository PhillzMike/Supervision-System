<?php
    session_start();
    $_SESSION['SuperId'] = $_POST['id'];
    
    echo json_encode( $_SESSION['SuperId']);
?>