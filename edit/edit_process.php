<?php
    session_start();
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
    require "../functions/functions.php";

    $id = $_POST['id'];
    $description = $_POST['description'];

    $sql = editTodo($id,$description);


    if($conn->query($sql) === true){
        $_SESSION['editTodo'] = "Successful";
    }else  
        $_SESSION['editTodo'] = "Unsuccessful";

    $conn->close();
    header("Location: ../user_view/user_view.php");
?>