<?php

    function userView ($id){
        $sql = "SELECT id,title, description, status
                FROM todos 
                WHERE user_id = '$id'
                AND status ='undone';";
        return $sql;
    }

    function addTodo($id,$title,$description){
        $sql = "INSERT INTO todos (title,description, status, user_id)
                VALUES ('$title','$description','undone', $id)";
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

    function markDone($id){
        $sql = "UPDATE todos
            set status = 'done'
            WHERE id = $id";
        return $sql;
    }

    function adminUserView(){
        $sql = "SELECT id, concat(fname, ' ',lname) 'Full_Name', username
                FROM users
                WHERE roleId=101";
        return $sql;
    }

    function adminUserDelete($id){
        $sql= "DELETE FROM users
                WHERE id = $id";
        return $sql;
    }

    function editUser($id){
        $sql = "UPDATE users
            SET ";
    }

    function getUser($id){
        $sql = "SELECT *
            FROM users
            WHERE id = $id";
        return $sql;
    }
?>