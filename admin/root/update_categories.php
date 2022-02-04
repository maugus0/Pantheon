<form action="" method="post">
                            <label for="cat_title">Enter below to update category:</label>
                                <div class="form-group">
                                <?php 
                                 if(isset($_GET['update'])) {
                                    $cat_id = $_GET['update'];
                                    $query = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
                                    $update_all_query = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($update_all_query)) {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                ?>
                                 
                                 <input value="<?php if(isset($cat_title)) { echo $cat_title; } ?>"type="text" class="form-control" name="cat_title"> 

                                <?php } } ?>
                                 
                                <?php 
                                if(isset($_POST['submitt'])) {
                                    $the_cat_title = $_POST['cat_title'];
                                    $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
                                    $update_query = mysqli_query($connection, $query);
                                    if (!$update_query) {
                                        die('Server disrupted.' . mysqli_error($connection));
                                       }
                                    }
                                ?>
                                </div>
                                <div class="form-group">
                                 <input type="submit" class="btn btn-primary" class="form-control" name="submitt" value="Update Category">
                                </div>
                            </form>