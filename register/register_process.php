<?php
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (fname,lname,username,password,roleId)
            VALUES ('$fname','$lname','$username','$password',101)";

    if($conn->query($sql))
        echo "Successfully added! <br>";
    else    
        echo "Error: ". $sql . "<br>". $conn-error;
    $conn->close();
    header("Location: ../index.php");
?>