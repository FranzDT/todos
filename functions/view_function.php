<?php
    function userView(){
         if($_SESSION['roleId']==101) {
            if(addTaskPrompt()){ 
                echo "
                <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>To do added successfully!</strong> 

                </div>";
          
            }
            if(editTodoPrompt()){
                echo "
                <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Update successful!</strong> 

                </div>";
                
    }

?>