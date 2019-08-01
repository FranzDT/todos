<?php
    session_start();
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
    require "../functions/functions.php";  
    require "../functions/prompts.php";
    
    $id = $_SESSION['id'];
    if(isset($_POST['todoid'])){
        $todoid = $_POST['todoid'];
        $todotitle = getTodoTitle($todoid);
        $tododescription = getTodoDesc($todoid);
        unset($_POST['todoid']);
    }
?>

<html>
    <head>
        <title>USER VIEW</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


        <script type="text/javascript">
            var x = <?php echo $todoid; ?>;
            if(x>0){
                $(window).on('load',function(){
                    $('#editModal').modal('show');
                });
            }
        </script>
    </head>
    <body>
        <?php 
            if(!isset($_SESSION['roleId'])){
                header("Location: ../index.php");
            }
        ?>


        <!-- for NON-ADMIN users -->
        <?php if($_SESSION['roleId']==101) {
            if(addTaskPrompt()){ 
        ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>To do added successfully!</strong> 

                </div>
        <?php  
            }
            if(editTodoPrompt()){
        ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Update successful!</strong> 

                </div>

        <?php   }   
            if(deleteTodoPrompt()){
        ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Deleted successful!</strong> 

                </div>

        <?php   }
            if(markDonePrompt()){
                ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Done successful!</strong> 
        
                        </div>
        
                <?php   }
        ?>
        
        <!-- LOGOUT -->
        <div class="container">
            <div class="row">
                <div class="col-lg-9"></div>
                <div class="col-lg-1">

                    <!-- Add Task -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                        &plus;
                    </button>
                </div>
                <div class="col-lg-1"> <h4>Hi, <?php echo $_SESSION['username'];  ?></h4></div>
                <div class="col-lg-1">
                    <a href="../logout/logout.php" class="btn btn-primary" role="button">Logout</a>
                </div>
            </div>
        </div>

        <!-- View All tasks -->
        <?php
            $sql = userView($id);
            $result = $conn->query($sql);

            if($result->num_rows > 0){ 
        ?>
                <div class="container-fluid">
            
        <?php
                while($row = $result->fetch_assoc()){ 
        ?>
                    <div class="row">
                        <div class="col-xl-4"></div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                                <h4 class="modal-title"><?php echo $row['title'] ?></h4>
                                                <form action="../delete/delete_todo_process.php" method="POST">
                                                    <input type="hidden" id="id" name="id" value='<?php echo $row["id"]; ?>'>
                                                    <!-- <input type="submit" value="DELETE" class="btn btn-primary">&times; -->
                                                    <button type="submit" class="close" data-dismiss="modal">&times;</button>
                                                </form>
                                    </div>
                                    <div class="card-body"><?php echo $row['description'] ?></div> 
                                    <div class="card-footer">
                                        <div class="row">

                                            <!-- mark as done row -->
                                            <div class="col-lg-4">
                                                <form action="../markDone/mark_Done_Process.php" method="POST">
                                                    <input type="hidden" name='id' value="<?php echo $row['id'];  ?>">
                                                    <input type="submit" value="DONE" class="btn btn-primary">
                                                </form>
                                            </div>

                                            <!-- edit row -->
                                            <div class="col-lg-4">
                                                <form action="./user_view.php" method="POST">
                                                    <input type="hidden" name="todoid" id="todoid" value="<?php echo $row['id']; ?>">
                                                    <input type="submit" value="EDIT" class="btn btn-primary">
                                                </form>
                                            </div>

                                            <!-- delete row -->
                                            <!-- <div class="col-lg-4">
                                                <form action="../delete/delete_todo_process.php" method="POST">
                                                    <input type="hidden" id="id" name="id" value='<?php echo $row["id"]; ?>'>
                                                    <input type="submit" value="DELETE" class="btn btn-primary">
                                                </form>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
        <?php } echo "</div></div>";
            }else{
                echo "No current Task!";
            }
        ?>

        <!-- for ADMIN View-->
        <?php }elseif($_SESSION['roleId']==100){?>
        <?php 

                    

                    addUser();

                    // prompts delete user status   
                    deleteUser();

                    // Add User

        ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9"></div>
                            <div class="col-lg-1">

                                <!-- Add Task -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                                    &plus;
                                </button>
                            </div>
                            <div class="col-lg-1"> <h4>Hi, <?php echo $_SESSION['username'];  ?></h4></div>
                            <div class="col-lg-1">
                                <a href="../logout/logout.php" class="btn btn-primary" role="button">Logout</a>
                            </div>
                        </div>
                    </div>
                   
        <?php            
                    // View all user
                    $sql = adminUserView();
                    $result = $conn->query($sql);

                    if($result->num_rows > 0){
        ?>
                <table class="table table-dark table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
        <?php
                while($row =$result->fetch_assoc()){
        ?>
                <tr>
                <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['Full_Name'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td>
                        <?php
                            if($row['roleId']==100)
                                echo "Admin";
                            else   
                                echo "User";
                        ?>
                    </td>
                    <td>
                        <form action="../delete/delete_user_process.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <input type="submit" value="DELETE">
                        </form>
                    </td>
                    <td>
                        <form action="../edit/edit_user_user.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <input type="submit" value="EDIT">
                        </form>
                    </td>
                </tr>
        <?php 
                    }         
            }
        }?>
        
       <?php require "../modal/modal.php"; ?>
    </body>

</html>