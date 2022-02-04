<?php include "root/db.php" ?>
<?php include "root/header.php" ?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5">
<?php include "root/topnav.php" ?>
<h2 class="mb-4">Posts</h2>
<?php 
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = "";
                        }
                        switch($source) {
                            case 'add_posts';
                            include "root/add_posts.php";
                            break;

                            case 'update_posts';
                            include "root/update_posts.php";
                            break;

                            default:
                            include "root/view_posts.php";
                        }
                        ?>
</div>
</div>
<?php include "root/footer.php" ?>