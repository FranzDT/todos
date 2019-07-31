<?php

    function addTaskPrompt(){
        // Prompt for status of adding a todo
        if(isset($_SESSION['addTask'])){
            if($_SESSION['addTask'] == "Successful"){
                echo "<br>Succesfully added a new task<br>";
                unset($_SESSION['addTask']);
            }else{
                echo "<br>Adding of task was unsuccessful!<br>";
                unset($_SESSION['addTask']);
            }
        }
    }

    function deleteTodoPrompt(){
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
    }

    function editTodoPrompt(){
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
    }

    function markDonePrompt(){
        // prompt for status of marking tasks as done
        if(isset($_SESSION['markDone'])){
            if($_SESSION['markDone']=="Successful"){
                echo "Successfully marked as done<br>";
                unset($_SESSION['markDone']);
            }else{
                echo "Failed to mark as done<br>";
                unset($_SESSION['markDone']);
            }
        }
    }

    function addUser(){
        if(isset($_SESSION['addUser'])){
            if($_SESSION['addUser']=="Successful"){
                echo "Successfully marked as done<br>";
                unset($_SESSION['addUser']);
            }else{
                echo "Failed to mark as done<br>";
                unset($_SESSION['addUser']);
            }
        }
    }

    function deleteUser(){
        if(isset($_SESSION['deleteUser'])){
            if($_SESSION['deleteUser']=="Successful"){
                echo "Successfully deleted user<br>";
                unset($_SESSION['deleteUser']);
            }else{
                echo "Failed delete user<br>";
                unset($_SESSION['deleteUser']);
            }
        }
    }
?>