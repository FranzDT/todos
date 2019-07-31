<?php
    session_start();
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
    require "../functions/functions.php";  
    require "../functions/prompts.php";
    
    $id = $_SESSION['id'];
?>

<html>
    <head>
        <title>USER VIEW</title>
    </head>
    <body>
        <a href="../logout/logout.php">Logout</a> <br>
        <!-- for NON-ADMIN users -->
        <?php if($_SESSION['roleId']==101) {
            addTaskPrompt();
            deleteTodoPrompt();
            editTodoPrompt();
            markDonePrompt();
        ?>
        <!-- Add Task -->
        <a href="../add/add_view.php">ADD TASK</a>
        <br>

        <!-- View All tasks -->
        <?php
            $sql = userView($id);
            $result = $conn->query($sql);

            if($result->num_rows > 0){ 
        ?>
                <table>
                        <tr>
                            <th>Mark Done</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
        <?php
                while($row = $result->fetch_assoc()){ 
        ?>
                        <tr>
                            <td>

                                <!-- marks selected task as done -->
                                <form action="../markDone/mark_Done_Process.php" method="POST">
                                    <input type="hidden" name='id' value="<?php echo $row['id'];  ?>">
                                    <input type="submit" value="DONE">
                                </form>
                            </td>
                            <td><?php echo $row["description"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>
                            <td>
                                
                                <!-- deletes current selected task -->
                                <form action="../delete/delete_todo_process.php" method="POST">
                                    <input type="hidden" id="id" name="id" value='<?php echo $row["id"]; ?>'>
                                    <input type="submit" value="DELETE">
                                </form>
                            </td>
                            <td>

                                <!-- updates current selected task -->
                                <form action="../edit/edit_view.php" method="POST">
                                    <input type="hidden" id="description" name="description" value='<?php echo $row["description"]; ?>'>
                                    <input type="hidden" id="id" name="id" value='<?php echo $row["id"]; ?>'>
                                    <input type="submit" value="EDIT">
                                </form>
                            </td>
                        </tr>

        <?php } echo "</table>";
            }else{
                echo "No current Task!";
            }
        ?>

        <!-- for ADMIN -->
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