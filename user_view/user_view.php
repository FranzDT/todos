<?php
    session_start();
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
    require "../functions/functions.php";  
    
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

            // Prompt for status of adding a new task
            if(isset($_SESSION['addTask'])){
                if($_SESSION['addTask'] == "Successful"){
                    echo "<br>Succesfully added a new task<br>";
                    unset($_SESSION['addTask']);
                }else{
                    echo "<br>Adding of task was unsuccessful!<br>";
                    unset($_SESSION['addTask']);
                }
            }

            // Prompt for status of deleting a todo
            if(isset($_SESSION['deleteTodo'])){
                if($_SESSION['deleteTodo'] == "Successful"){
                    echo "<br>Succesfully deleted the todo<br>";
                    unset($_SESSION['deleteTodo']);
                }else{
                    echo "<br>Deleting of todo was unsuccessful!<br>";
                    unset($_SESSION['deleteTodo']);
                }
            }

            // Prompt for status of editing a todo
            if(isset($_SESSION['editTodo'])){
                if($_SESSION['editTodo']=="Successful"){
                    echo "Successfully updated<br>";
                    unset($_SESSION['editTodo']);
                }else{
                    echo "Failed to update<br>";
                    unset($_SESSION['editTodo']);
                }
            }


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
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
        <?php
                while($row = $result->fetch_assoc()){ 
        ?>
                        <tr>
                            <td><?php echo $row["description"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>
                            <td>
                                <form action="../delete_todo/delete_todo_process.php" method="POST">
                                    <input type="hidden" id="id" name="id" value='<?php echo $row["id"]; ?>'>
                                    <input type="submit" value="DELETE">
                                </form>
                            </td>
                            <td>
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


        



        <?php } ?>
    </body>

</html>