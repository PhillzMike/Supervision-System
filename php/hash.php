<?php
    //Hashing passwords
    function hashThis($password){
        return hash('ripemd128', $password."STOT");
    }
?>