<?php
    session_start();
    require "./cons/cons.php";
    if( isset( $_SESSION['roleId'] ) ) {   
     }else {
        $_SESSION['roleId'] = 0;
     }
    
?>
<html>
    <head>
        <title>
            Todos
        </title>

        
    </head>
    <body>

        <!-- This block is for when the user is not yet logged in -->
        <?php
            if($_SESSION['roleId'] < 100){
                
                // Prompts if credentials is wrong
                if($_SESSION['roleId'] == 1){
                    echo "Invalid credentials!! <br>";
        } ?>
                <!-- Registration link -->
                <a href="./register/register.php">REGISTER</a>
                
                <!-- Login Form -->
                <form action="./auth/auth.php" method="POST">
                    Username: <input type="text" name="username" placeholder="User Name"><br>
                    Password: <input type="password" name="password" placeholder="Password"><br>
                    <input type="submit" value="LOGIN">
                </form>
                
        <?php } ?>






        <?php unset($_SESSION['roleId']); ?>
    </body>
</html>