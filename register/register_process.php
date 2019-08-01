<?php
    session_start();
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $roleid = $_POST['roleId'];

    var_dump($roleid); die;
    $sql = "INSERT INTO users (fname,lname,username,password,roleId)
            VALUES ('$fname','$lname','$username','$password',$roleid)";

    if($conn->query($sql))
        $_SESSION['addUser'] = "Successful";
    else    
        $_SESSION['addUser'] = "Unsuccessful";
    $conn->close();

    if($_GET['fromadmin'] == "no")
        header("Location: ../index.php?regstat=success");
    elseif($_GET['fromadmin'] == "yes")
        header("Location: ../user_view/user_view.php?adminopt=ShowUser");
?>