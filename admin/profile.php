<?php include "root/db.php" ?>
<?php include "root/header.php" ?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5">
<?php include "root/topnav.php" ?>
<h2 class="mb-4">Profile</h2>
                        <?php 
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = "";
                        }
                        switch($source) {
                            case 'update_profile';
                            include "root/update_profile.php";
                            break;

                            default:
                            include "root/view_profile.php";
                        }
                        ?>
</div>
</div>
<?php include "root/footer.php" ?>