<?php
    session_name("_csuvals");
    session_start();
    
    function check_log_in(){
    if(!isset($_SESSION['user_id'])){
        header("location: index.php");
    }  
    }
?>