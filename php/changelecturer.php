<?php
session_start();
require_once('changeprofile.php');


changeProfile("lecturer", $_POST);
?>