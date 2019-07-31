<?php
    session_start();
    unset($_SESSION['roleId']);
    unset($_SESSION['username']);
    
    header("Location: ../index.php");
    exit; 
?>