<?php
    require "../cons/cons.php";
    require "../dbconnect/dbconnect.php";

    function getTodoTitle($id)
    {     
        $sql = "SELECT title
                FROM todos
                WHERE id = $id";
        $res = 
    }
?>