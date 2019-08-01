<?php

    function addTaskPrompt(){
        // Prompt for status of adding a todo
        if(isset($_SESSION['addTask'])){
            if($_SESSION['addTask'] == "Successful"){
                unset($_SESSION['addTask']);
                return true;
            }else{
                unset($_SESSION['addTask']);
                return false;
            }
        }
    }

    function deleteTodoPrompt(){
        // Prompt for status of deleting a todo
        if(isset($_SESSION['deleteTodo'])){
            if($_SESSION['deleteTodo'] == "Successful"){
                unset($_SESSION['deleteTodo']);
                return true;
            }else{
                unset($_SESSION['deleteTodo']);
                return false;
            }
        }
    }

    function editTodoPrompt(){
        // Prompt for status of editing a todo
        if(isset($_SESSION['editTodo'])){
            if($_SESSION['editTodo']==true){
                unset($_SESSION['editTodo']);
                return true;
            }else{
                unset($_SESSION['editTodo']);
                return false;
            }
        }
    }

    function markDonePrompt(){
        // prompt for status of marking tasks as done
        if(isset($_SESSION['markDone'])){
            if($_SESSION['markDone']=="Successful"){
                unset($_SESSION['markDone']);
                return true;
            }else{
                unset($_SESSION['markDone']);
                return false;
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