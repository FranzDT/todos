<?php
    session_start();
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
    require "../functions/functions.php";    

    $description = $_POST['description'];
    $id = $_SESSION['id'];
    $title = $_POST['title'];
    // $deadline = '2019-08-10';
    
    $sql = addTodo($id,$title,$description);
    if($conn->query($sql))
        $_SESSION['addTask'] = "Successful";
    else   
        $_SESSION['addTask'] = "Unsuccessful";
    $conn->close();
    header("Location: ../user_view/user_view.php");
?>  