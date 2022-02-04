<?php
if(isset($_POST['create_user'])) {
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_role = $_POST['user_role'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $query = "INSERT INTO users(user_name, user_password, user_fname, user_lname, user_email, user_role) ";
    $query .= "VALUES('{$user_name}','{$user_password}','{$user_fname}','{$user_lname}','{$user_email}','{$user_role}')";
    $create_user_query = mysqli_query($connection,$query);
    if (!$create_user_query) {
        die('Server disrupted.' . mysqli_error($connection));
    }
} 
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="user_fname">First Name</label>
    <input type="text" class="form-control" name="user_fname">
</div>
<div class="form-group">
    <label for="user_lname">Last Name</label>
    <input type="text" class="form-control" name="user_lname">
</div>
<div class="form-group">
    <select name="user_role" id="">
    <option value='Member'>Select Roles</option>
    <option value='Admin'>Admin</option>
    <option value='Member'>Member</option>
    </select>
</div>
<div class="form-group">
    <label for="user_name">Username</label>
    <input type="text" class="form-control" name="user_name">
</div>
<div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" class="form-control" name="user_email">
</div>
<div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" class="form-control" name="user_password">
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" class="form-control" name="create_user" value="Add User">
</div>
</form>