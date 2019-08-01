<?php
    // require "../cons/cons.php";

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

    function editTodo($id,$title,$description){
        $sql = "UPDATE todos
            SET description = '$description',
            title = '$title'
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
        $sql = "SELECT id, concat(fname, ' ',lname) 'Full_Name', username, roleId
                FROM users";
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

    function getTodoTitle($id){
        require "../dbconnect/dbconnect.php";
        $sql = "SELECT title
                FROM todos
                WHERE id = $id";
        
        $res = $conn->query($sql);
            while($row = $res->fetch_assoc()){
                $title = $row['title'];
            } 
        return $title;
    }

    function getTodoDesc($id){
        require "../dbconnect/dbconnect.php";
        $sql = "SELECT description
                FROM todos
                WHERE id = $id";
        
        $res = $conn->query($sql);
            while($row = $res->fetch_assoc()){
                $description = $row['description'];
            } 
        return $description;
    }

    function adminAddUser($fname,$lname,$username,$password,$roleId){
        $sql = "INSERT INTO users (fname,lname,username,password,roleID)
                VALUES('$fname','$lname','$username','$password',$roleId)";
        return $sql;
    }
?>