<?php
    session_start();
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
?>

<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <form action="register_process.php" method="POST">
            First Name: <input type="text" name="fname" placeholder="First Name"><br>
            Last Name: <input type="text" name="lname" placeholder="Last Name"><br>
            User Name:<input type="text" name="username" placeholder="User Name"><br>
            Password: <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" value="SUBMIT">
        </form>
    </body>
</html>