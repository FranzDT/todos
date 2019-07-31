<?php
    session_start();

    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
    require "../functions/functions.php";

    $id=$_POST['id'];

    $sql = markDone($id);

    if($conn->query($sql) === true){
        $_SESSION['markDone'] = "Successful";
    }else{
        $_SESSION['markDone'] = "Unsuccessful";
    }
    $conn->close();
    header("Location: ../user_view/user_view.php");
?>