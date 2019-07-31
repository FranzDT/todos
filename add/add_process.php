<?php
    session_start();
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
    require "../functions/functions.php";    

    $description = $_POST['description'];
    $id = $_SESSION['id'];
    $deadline = '2019-08-10';

    $sql = addTodo($id,$description);
    if($conn->query($sql)){
        $_SESSION['addTask'] = "Successful";
        header("Location: ../user_view/user_view.php");
    }
    else   {
        $_SESSION['addTask'] = "Unsuccessful";
        header("Location: ../user_view/user_view.php");
    }
?>  