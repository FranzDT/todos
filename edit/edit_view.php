<?php
    $id = $_POST['id'];
    $description = $_POST['description'];
?>
<html>
    <head>
        <title>Edit View</title>
    </head>
    <body>
        <form action="edit_process.php" method="POST">
            Description: <input type="text" name="description" value="<?php echo $description;  ?>" placeholder="<?php echo $description;  ?>">
            <input type="hidden" name="id" id="<?php  echo $id; ?>" value="<?php  echo $id; ?>"> 
            <input type="submit" value="Update">
        </form>
    </body>
</html>