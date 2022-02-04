<?php include "root/db.php" ?>
<?php include "root/header.php" ?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5">
<?php include "root/topnav.php" ?>
<h2 class="mb-4">Users</h2>
<?php 
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = "";
                        }
                        switch($source) {
                            case 'add_users';
                            include "root/add_users.php";
                            break;

                            case 'update_users';
                            include "root/update_users.php";
                            break;

                            default:
                            include "root/view_users.php";
                        }
                        ?>
</div>
</div>
<?php include "root/footer.php" ?>