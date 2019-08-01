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

        <!-- alert for registering successfully -->
        <?php 
            if(isset($_GET['regstat'])){
                if($_GET['regstat'] == "success")  {?>
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Registered Successfully!</strong> 
                </div>
        <?php } }?>

        <?php
            if($_SESSION['roleId'] < 100){
                
                // Prompts if credentials is wrong
                if($_SESSION['roleId'] == 1){ 
        ?> 
        
        <!-- alert for invalid login credentials -->
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Invalid login credentials!</strong> 
        </div>
        <?php } }?>

        <div class="container fluid">
            <div class="row">
                <div class="col-xl-10"> </div>
                <div class="col-xl-2">
                    <div class="row">
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



<!-- start of MODAL -->
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
                <div class="form-group">
                    <label for="Username">Username: </label>
                    <input type="text" name="username"  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Password">Password: </label>
                    <input type="password" name="password"  class="form-control" required>
                </div>
                <!-- Username: <input type="text" name="username" placeholder="User Name"><br>
                Password:  <input type="password" name="password" placeholder="Password"><br> -->
                <input type="submit" value="LOGIN" class="btn btn-primary">
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


        <!-- register form -->
        
                <form action="./register/register_process.php?fromadmin=yes" method="POST">
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" name="fname"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" name="lname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="uname">User Name:</label>
                        <input type="text" name="username"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password"  class="form-control" required>
                    </div>
                    <input type="hidden" name="roleId" value="101">
                    <input type="submit" value="SUBMIT" class="btn btn-primary">


                    <!-- First Name: <input type="text" name="fname" placeholder="First Name" required><br>
                    Last Name: <input type="text" name="lname" placeholder="Last Name" required><br>
                    User Name:<input type="text" name="username" placeholder="User Name" required><br>
                    Password: <input type="password" name="password" placeholder="Password" required><br>
                    <input type="submit" value="SUBMIT"> -->
                </form>

      </div>
    </div>
  </div>
</div>    
<!-- END of MODAL -->


    </body>
</html>