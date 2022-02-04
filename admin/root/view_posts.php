<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Date</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = "SELECT * FROM posts";
                            $select_posts = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($select_posts)) {
                                $post_id = $row['post_id'];
                                $post_author = $row['post_author'];
                                $post_title = $row['post_title'];
                                $post_category_id = $row['post_category_id'];
                                $post_status = $row['post_status'];
                                $post_image = $row['post_image'];
                                $post_tags = $row['post_tags'];
                                $post_date = $row['post_date'];
                                echo "<tr>";
                                echo "<td>$post_id</td>";
                                echo "<td>$post_author</td>";
                                echo "<td>$post_title</td>";
                                $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                                $select_all_categories_query = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                echo "<td>$cat_title</td>";
                                }
                                echo "<td>$post_status</td>";
                                echo "<td><center><img width='250' class='img-responsive' src='../img/$post_image'/></center></td>";
                                echo "<td>$post_tags</td>";
                                echo "<td>$post_date</td>";
                                echo "<td><a href='posts.php?source=update_posts&p_id={$post_id}'>Update</a></td>";
                                echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>

<?php
if(isset($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$del_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: posts.php");
}
?>