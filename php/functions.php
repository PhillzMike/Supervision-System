<?php
 
 function isSuper(){
     return $_SESSION['role']=="supervisor";
 }
 function isStudent(){
    return $_SESSION['role']=="student";
}

?>