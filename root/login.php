<?php include "db.php"; ?>
<?php session_start(); ?>
<?php
if(isset($_POST['login'])) {
$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];

$user_name = mysqli_real_escape_string($connection, $user_name);
$user_password = mysqli_real_escape_string($connection, $user_password);
$query = "SELECT * FROM users WHERE user_name = '{$user_name}' ";
$select_user = mysqli_query($connection,$query);
if (!$select_user) {
    die('Server disrupted.' . mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($select_user)) {
    $db_user_id = $row['user_id'];
    $db_user_fname = $row['user_fname'];
    $db_user_lname = $row['user_lname'];
    $db_user_role = $row['user_role'];
    $db_user_name = $row['user_name'];
    $db_user_email = $row['user_email'];
    $db_user_password = $row['user_password']; 
    $db_user_image = $row['user_image']; 
}

if($user_name !== $db_user_name && $user_password !== $db_user_password ) {
 header("Location: ../login2.php");
} else if ($user_name === $db_user_name && $user_password === $db_user_password) {
    $_SESSION['user_id'] = $db_user_id;
    $_SESSION['user_name'] = $db_user_name;
    $_SESSION['user_fname'] = $db_user_fname;
    $_SESSION['user_lname'] = $db_user_lname;
    $_SESSION['user_email'] = $db_user_email;
    $_SESSION['user_password'] = $db_user_password;
    $_SESSION['user_role'] = $db_user_role;
    $_SESSION['user_image'] = $db_user_image;
    header("Location: ../admin");
} else {
 header("Location: ../login3.php");
}
}
?>