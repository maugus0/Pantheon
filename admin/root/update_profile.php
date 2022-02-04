<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("form").submit(function(){
alert("Profile changes successful! The changes will be made as soon as you log in again.");
});
});
</script>
<?php
if(isset($_POST['update_user'])) {
    $user_id = $_SESSION['user_id'];
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_id = $_SESSION['user_id'];

    move_uploaded_file($user_image_temp, "../img/$user_image");
    if(empty($user_image)) {
        $query = "SELECT * FROM users WHERE user_id = {$user_id}";
        $select_images = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($select_images)) {
            $user_image = $row['user_image'];
        }
       }

    $query = "UPDATE users SET " ;
    $query .= "user_fname = '{$user_fname}', ";
    $query .= "user_lname = '{$user_lname}', ";
    $query .= "user_image = '{$user_image}', ";
    $query .= "user_name = '{$user_name}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}' ";
    $query .= "WHERE user_id = {$user_id} ";
    $update_one_user = mysqli_query($connection,$query);
    if (!$update_one_user) {
        die('Server disrupted.' . mysqli_error($connection));
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="user_fname">First Name</label>
    <input type="text" value="<?php echo $_SESSION['user_fname']; ?>" class="form-control" name="user_fname">
</div>
<div class="form-group">
    <label for="user_lname">Last Name</label>
    <input type="text" value="<?php echo $_SESSION['user_lname']; ?>" class="form-control" name="user_lname">
</div>
<div class="form-group">
    <label for="user_image">User Image</label><br>
    <img width="200" src="../img/<?php echo $_SESSION['user_image']; ?>" />
    <input style="margin-top:5px; width: 210px;" type="file" class="form-control" name="user_image">
</div>
<div class="form-group">
    <label for="user_name">Username</label>
    <input type="text" value="<?php echo $_SESSION['user_name']; ?>" class="form-control" name="user_name">
</div>
<div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" value="<?php echo $_SESSION['user_email']; ?>" class="form-control" name="user_email">
</div>
<div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" value="<?php echo $_SESSION['user_password']; ?>" class="form-control" name="user_password">
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" class="form-control" name="update_user" value="Update User">
</div>
</form>