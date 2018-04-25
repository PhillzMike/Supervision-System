<?php
function connect(){
    $hostname = 'localhost';
    $username = 'root';
    $pwd = '';
    $dp  = 'sms';
    try{
        $conn = new PDO("mysql:host=$hostname;dbname=$dp",$username,$pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $ex){
        file_put_contents("pdhoe.TXT",$ex->getMessage(),FILE_APPEND);
    }
    return $conn;
}
?>