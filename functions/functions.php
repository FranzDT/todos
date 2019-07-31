<?php

    function userView ($id){
        $sql = "SELECT id, description, status
                FROM todos 
                WHERE user_id = '$id'
                AND status ='undone';";
        return $sql;
    }

    function addTodo($id,$description){
        $sql = "INSERT INTO todos (description, status, user_id)
                VALUES ('$description','undone', $id)";
        return $sql;
    }

    function deleteTodo($id){
        $sql = "DELETE FROM todos
            WHERE id = $id";
        return $sql;
    }

    function editTodo($id,$description){
        $sql = "UPDATE todos
            SET description = '$description'
            WHERE id=$id";
        return $sql;
    }
?>