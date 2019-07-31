<?php
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";
    require "../functions/functions.php";
    $id = $_POST['id'];
    $sql = getUser($id);
    $result = $conn->query($sql);
?>
<html>
    <head>
        <title>Edit User</title>
    </head>
    <body>
        <?php while($row = $result->fetch_assoc()) {?>
            <form action="edit_user_process.php" method="POST">
                <input type="text">
            </form>
        <?php } ?>
    </body>
</html>