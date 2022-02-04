<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th colspan="2">Change Roles</th>
                                    <th colspan="2">Update/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = "SELECT * FROM users";
                            $select_users = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($select_users)) {
                                $user_id = $row['user_id'];
                                $user_name = $row['user_name'];
                                $user_password = $row['user_password'];
                                $user_fname = $row['user_fname'];
                                $user_lname = $row['user_lname'];
                                $user_email = $row['user_email'];
                                $user_image = $row['user_image'];
                                $user_role = $row['user_role'];

                                echo "<tr>";
                                echo "<td>$user_id</td>";
                                echo "<td>$user_name</td>";
                                echo "<td>$user_fname</td>";
                                echo "<td>$user_lname</td>";
                                echo "<td>$user_email</td>";
                                echo "<td>$user_role</td>";
                                echo "<td><a href='users.php?approve={$user_id}'>Admin</a></td>";
                                echo "<td><a href='users.php?unapprove={$user_id}'>Member</a></td>";
                                echo "<td><a href='users.php?source=update_users&p_id={$user_id}'>Update</a></td>";
                                echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
if(isset($_GET['approve'])) {
    $app_id = $_GET['approve'];
    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$app_id}";
    $admin_query = mysqli_query($connection, $query);
    header("Location: users.php");
}
?>
<?php
if(isset($_GET['unapprove'])) {
    $unapp_id = $_GET['unapprove'];
    $query = "UPDATE users SET user_role = 'Member' WHERE user_id = {$unapp_id}";
    $member_query = mysqli_query($connection, $query);
    header("Location: users.php");
}
?>

<?php
if(isset($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$del_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: users.php");
}
?>