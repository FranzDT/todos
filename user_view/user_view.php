<?php
    session_start();
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
    require "../functions/functions.php";  
    require "../functions/prompts.php";
    
    $id = $_SESSION['id'];
    $todoid = "";
    $title = "";
    $description = "";
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
            $(window).on('load',function(){
                $('#editModal').modal('show');
            });
        </script>
    </head>
    <body>
 
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
            deleteTodoPrompt();
            editTodoPrompt();
            markDonePrompt();
        ?>

        <!-- LOGOUT -->
        <div class="container">
            <div class="row">
                <div class="col-lg-9"></div>
                <div class="col-lg-2"> <h4>Hi, <?php echo $_SESSION['username'];  ?></h4></div>
                <div class="col-lg-1">
                    <a href="../logout/logout.php" class="btn btn-primary" role="button">Logout</a>
                </div>
            </div>
        </div>

        <!-- Add Task -->
        <a href="../add/add_view.php">ADD TASK</a>
        <br>

        <!-- View All tasks -->
        <?php
            $sql = userView($id);
            $result = $conn->query($sql);

            if($result->num_rows > 0){ 
        ?>
                <div class="container">
            
        <?php
                while($row = $result->fetch_assoc()){ 
        ?>
                    <div class="row">
                        <div class="col-xl-4"></div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header"><h1><?php echo $row['title'] ?></h1></div>
                                    <div class="card-body"><?php echo $row['description'] ?></div> 
                                    <div class="card-footer">
                                        <div class="row">

                                            <!-- mark as done row -->
                                            <div class="col-lg-4">
                                                <form action="../markDone/mark_Done_Process.php" method="POST">
                                                    <input type="hidden" name='id' value="<?php echo $row['id'];  ?>">
                                                    <input type="submit" value="DONE">
                                                </form>
                                            </div>

                                            <!-- edit row -->
                                            <div class="col-lg-4">
                                                
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
                                                    Edit
                                                </button>

                                            </div>

                                            <!-- delete row -->
                                            <div class="col-lg-4">
                                                <form action="../delete/delete_todo_process.php" method="POST">
                                                    <input type="hidden" id="id" name="id" value='<?php echo $row["id"]; ?>'>
                                                    <input type="submit" value="DELETE">
                                                </form>
                                            </div>
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

        <!-- USER MODAL -->

        <!-- EDIT modal -->
        <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="../edit/edit_process.php" method="POST">
                    <div class="row">Title: <input type="text" name="title" value="<?php echo $title;  ?>" placeholder="<?php echo $title;  ?>"></div>
                    <div class="row">Description: <input type="text" name="description" value="<?php echo $description;  ?>" placeholder="<?php echo $description;  ?>"></div>
                    <input type="hidden" name="id" id="<?php  echo $id; ?>" value="<?php  echo $todoid; ?>"> 
                    <div class="row"><input type="submit" value="Update"></div>
                </form>
            </div>

            </div>
        </div>
        </div>

        <!-- for ADMIN View-->
        <?php }elseif($_SESSION['roleId']==100){?>
            <a href="user_view.php?adminopt=ShowUser" >Show Users</a><br>
            <a href="user_view.php?adminopt=ShowTodo" >Show Todos</a><br>
            <br>
        <?php
            $get = $_GET['adminopt'] ?? "";

                // If admin wants to see the users
                if($get == "ShowUser"){
                    // prompts added user by admin
                    addUser();

                    // prompts delete user status
                    deleteUser();

                    // Add User
                    echo "<a href='../register/register.php?fromadmin=yes'>Add User</>";
                    
                    // View all user
                    $sql = adminUserView();
                    $result = $conn->query($sql);

                    if($result->num_rows > 0){
        ?>
                <table>
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
                        <form action="../delete/delete_user_process.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <input type="submit" value="DELETE">
                        </form>
                    </td>
                    <td>
                        <form action="../edit/edit_user_user.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <input type="submit" value="DELETE">
                        </form>
                    </td>
                </tr>
        <?php } ?>
                </table>
        <?php                
                    }else{
                        echo "Empty Set";
                    }
                }
        ?>

        <?php } ?>
    </body>

</html>