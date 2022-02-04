<?php
if(isset($_GET['p_id'])) {
    $update_id = $_GET['p_id'];
}                           
                            $query = "SELECT * FROM users WHERE user_id = {$update_id}";
                            $select_users = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($select_users)) {
                                $user_fname = $row['user_fname'];
                                $user_lname = $row['user_lname'];
                                $user_role = $row['user_role'];
                                $user_name = $row['user_name'];
                                $user_email = $row['user_email'];
                                $user_password = $row['user_password']; 
                            }
                            if(isset($_POST['update_user'])) {
                                $user_fname = $_POST['user_fname'];
                                $user_lname = $_POST['user_lname'];
                                $user_role = $_POST['user_role'];
                                $user_name = $_POST['user_name'];
                                $user_email = $_POST['user_email'];
                                $user_password = $_POST['user_password'];

                                $query = "UPDATE users SET " ;
                                $query .= "user_fname = '{$user_fname}', ";
                                $query .= "user_lname = '{$user_lname}', ";
                                $query .= "user_role = '{$user_role}', ";
                                $query .= "user_name = '{$user_name}', ";
                                $query .= "user_email = '{$user_email}', ";
                                $query .= "user_password = '{$user_password}' ";
                                $query .= "WHERE user_id = {$update_id} ";
                                $update_one_user = mysqli_query($connection,$query);
                                if (!$update_one_user) {
                                    die('Server disrupted.' . mysqli_error($connection));
                                }
                            }
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="user_fname">First Name</label>
    <input type="text" value="<?php echo $user_fname; ?>" class="form-control" name="user_fname">
</div>
<div class="form-group">
    <label for="user_lname">Last Name</label>
    <input type="text" value="<?php echo $user_lname; ?>" class="form-control" name="user_lname">
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
    <input type="text" value="<?php echo $user_name; ?>" class="form-control" name="user_name">
</div>
<div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
</div>
<div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" class="form-control" name="update_user" value="Update User">
</div>
</form>