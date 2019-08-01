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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <div class="container fluid">
            <div class="row">
                <div class="col-xl-10"> </div>
                <div class="col-xl-2">
                    <div class="row">
                        <?php
                        if($_SESSION['roleId'] < 100){
                            
                            // Prompts if credentials is wrong
                            if($_SESSION['roleId'] == 1){
                                echo "Invalid credentials!! <br>";
                        } ?>

                        <?php } ?>
                        <?php unset($_SESSION['roleId']); ?>

                        <!-- Registration Button to modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal">
                            REGISTER
                            </button> 
                        &nbsp; &nbsp;
                        <!-- Login Button to modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                            LOGIN
                        </button>

                    </div>
                </div>
            </div>
        </div>

<div class="modal fade" id="loginModal">

  <div class="modal-dialog modal-dialog-centered modal-xs">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body text center">
            <!-- Login Form -->
            <form action="./auth/auth.php" method="POST" class="text center">
                Username: <input type="text" name="username" placeholder="User Name"><br>
                Password:  <input type="password" name="password" placeholder="Password"><br>
                <input type="submit" value="LOGIN" class="float right">
            </form>
      </div>
    </div>
  </div>
</div>      

<div class="modal fade" id="registerModal">

  <div class="modal-dialog modal-dialog-centered modal-xs">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User Registration</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body text center">
        <?php if(isset($_GET['fromadmin'])){
            ?>
                <form action="register_process.php?fromadmin=yes" method="POST">
                    First Name: <input type="text" name="fname" placeholder="First Name" required><br>
                    Last Name: <input type="text" name="lname" placeholder="Last Name" required><br>
                    User Name:<input type="text" name="username" placeholder="User Name" required><br>
                    Password: <input type="password" name="password" placeholder="Password" required><br>
                    <input type="submit" value="SUBMIT">
                </form>
            <?php }else{ ?>
                <form action="register_process.php" method="POST">
                    First Name: <input type="text" name="fname" placeholder="First Name" required><br>
                    Last Name: <input type="text" name="lname" placeholder="Last Name" required><br>
                    User Name:<input type="text" name="username" placeholder="User Name" required><br>
                    Password: <input type="password" name="password" placeholder="Password" required><br>
                    <input type="submit" value="SUBMIT">
                </form>
            <?php } ?>
      </div>
    </div>
  </div>
</div>    



    </body>
</html>