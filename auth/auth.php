<?php
    session_start();
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";

    $username = $_POST['username']??"";
    $password = $_POST['password']??"";

    $sql = "Select id,username,password, roleId
            FROM users
            WHERE username ='$username'
            ";
    $result = mysqli_query($conn,$sql);
    
    $_SESSION['id'] = 0;
    $_SESSION['username'] = "";
    $_SESSION['roleId'] = 1;

    if(mysqli_num_rows($result)>0){
       while($row = $result->fetch_assoc()){
           if($row["password"] == $password){   
               $_SESSION['id'] = $row['id'];
               $_SESSION['username'] = $row["username"];
               $_SESSION['roleId'] = $row["roleId"];
               break;
           }
       }
    }

    mysqli_close($conn);

    if($_SESSION['roleId']>=100)
        header("Location: ../user_view/user_view.php");
    else
        header("Location: ../index.php");
?>