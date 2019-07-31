<?php
    $conn = new mysqli(SERVER_NAME,UNAME,PASS,DB);

    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
    
?>