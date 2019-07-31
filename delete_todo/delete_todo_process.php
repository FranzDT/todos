<?php
    session_start();
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
    require "../functions/functions.php";

    $id = $_POST['id'];
    // var_dump($id);die;

    $sql = deleteTodo($id);
    
    if($conn->query($sql) === true){
        $_SESSION['deleteTodo'] = "Successful";
        header("Location: ../user_view/user_view.php");
    }else{
        $_SESSION['deleteTodo'] = "Unsuccessful";
        header("Location: ../user_view/user_view.php");
    }
        
?>