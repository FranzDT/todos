 <!-- USER MODAL -->

        <!-- EDIT modal -->
        <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="../edit/edit_process.php" method="POST">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="textarea" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Description:</label>
                        <input type="textarea" class="form-control" id="description" name="description" required>
                    </div>
                    <input type="submit" value="Update" class="btn btn-primary">
                </form>
            </div>

            </div>
        </div>
        </div>

        <!-- ADD MODAL -->
        <div class="modal" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="../add/add_process.php" method="POST">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="textarea" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Description:</label>
                        <input type="textarea" class="form-control" id="description" name="description" required>
                    </div>
                    <!-- Title: <input type="textarea" name="title" required>
                    Description: <input type="textarea" name="description" required> -->
                    <input type="submit" class="btn btn-primary" value="ADD">
                </form>
            </div>

            </div>
        </div>
        </div>

        <!-- ADD User MODAL -->
        <div class="modal" id="addUserModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form action="./register/register_process.php?fromadmin=yes" method="POST">
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" name="fname"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" name="lname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="uname">User Name:</label>
                        <input type="text" name="username"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password"  class="form-control" required>
                    </div>
                    <div>
                    <div class="form-group">
                        <label for="sel1">User Type:</label>
                        <select class="form-control" id="roleId">
                            <option name="roleId" value="101">User</option>
                            <option name="roleId" value="100">Admin</option>
                        </select>
                        </div>
                    </div>
                    <input type="submit" value="SUBMIT" class="btn btn-primary">
            </div>

            </div>
        </div>
        </div>
        <!-- END OF MODAL GROUP -->