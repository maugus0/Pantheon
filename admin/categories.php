<?php include "root/db.php" ?>
<?php include "root/header.php" ?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5">
<?php include "root/topnav.php" ?>
<h2 class="mb-4">Categories</h2>
<div class="p-4 p-md-1">
                            <?php
                            if(isset($_POST['submit'])) {
                                $cat_title = $_POST['cat_title'];
                                if($cat_title == "" || empty($cat_title)) {
                                    echo "<h3 class='text-danger'>This field should not be empty.</h3>";
                                } else {
                                    $query = "INSERT INTO categories(cat_title)";
                                    $query .= "VALUES('{$cat_title}')";
                                    $select_all_categories_query = mysqli_query($connection,$query);
                                    if (!$select_all_categories_query) {
                                     die('Server disrupted.' . mysqli_error($connection));
                                    }
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <label class="text-dark" for="cat_title">Enter below to add category:</label>
                                <div class="form-group">
                                 <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                 <input type="submit" class="btn btn-primary" class="form-control" name="submit" value="Add Category">
                                </div>
                            </form>
                         <?php // UPDATE CATEGORY
                         if(isset($_GET['update'])) {
                             $cat_id = $_GET['update'];
                             include "root/update_categories.php";
                         }
                         ?>
                        </div> <!-- Add Category -->
                        <div class="p-4 p-md-1">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Category ID</th>
                                        <th>Category Title</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php // FIND ALL CATEGORIES
                                $query = "SELECT * FROM categories";
                                $select_all_categories_query = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo "<tr>";
                                    echo "<td>$cat_id</td>";
                                    echo "<td><a href='../category.php?category={$cat_id}'>$cat_title</a></td>";
                                    echo "<td><a href='categories.php?update={$cat_id}'>Update</a></td>";
                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>

                                <?php // DELETING CATEGORIES
                                if(isset($_GET['delete'])) {
                                    $the_cat_id = $_GET['delete'];
                                    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                                    $delete_query = mysqli_query($connection, $query);
                                    header("Location: categories.php");
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
</div>
<?php include "root/footer.php" ?>