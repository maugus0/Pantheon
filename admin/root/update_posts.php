<?php
if(isset($_GET['p_id'])) {
    $update_id = $_GET['p_id'];
}                           
                            $query = "SELECT * FROM posts WHERE post_id = {$update_id}";
                            $select_posts = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($select_posts)) {
                                $post_id = $row['post_id'];
                                $post_author = $row['post_author'];
                                $post_title = $row['post_title'];
                                $post_category_id = $row['post_category_id'];
                                $post_status = $row['post_status'];
                                $post_image = $row['post_image'];
                                $post_tags = $row['post_tags'];
                                $post_desc = $row['post_desc'];
                                $post_content = $row['post_content'];
                                $post_comment_count = $row['post_comment_count'];
                                $post_date = $row['post_date'];
                            }
                            if(isset($_POST['update_post'])) {
                                $post_title = $_POST['title'];
                                $post_author = $_POST['author'];
                                $post_category_id = $_POST['post_category'];
                                $post_status = $_POST['post_status'];
                            
                                $post_image = $_FILES['post_image']['name'];
                                $post_image_temp = $_FILES['post_image']['tmp_name'];
                            
                                $post_tags = $_POST['tags'];
                                $post_desc = $_POST['post_desc'];
                                $post_content = $_POST['post_content'];
                                $post_date = date('d-m-y');
                                $post_comment_count = 0;
                            
                                move_uploaded_file($post_image_temp, "../img/$post_image");

                                if(empty($post_image)) {
                                 $query = "SELECT * FROM posts WHERE post_id = {$update_id}";
                                 $select_image = mysqli_query($connection, $query);
                                 while($row = mysqli_fetch_array($select_image)) {
                                     $post_image = $row['post_image'];
                                 }
                                }

                                $query = "UPDATE posts SET " ;
                                $query .= "post_title = '{$post_title}', ";
                                $query .= "post_category_id = '{$post_category_id}', ";
                                $query .= "post_date = now(), ";
                                $query .= "post_author = '{$post_author}', ";
                                $query .= "post_status = '{$post_status}', ";
                                $query .= "post_tags = '{$post_tags}', ";
                                $query .= "post_desc = '{$post_desc}', ";
                                $query .= "post_content = '{$post_content}', ";
                                $query .= "post_image = '{$post_image}' ";
                                $query .= "WHERE post_id = {$update_id} ";


                                $update_one_post = mysqli_query($connection,$query);
                                if (!$update_one_post) {
                                    die('Server disrupted.' . mysqli_error($connection));
                                }
                            }
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="title">
</div>
<div class="form-group">
    <label for="post_category">Post Category ID</label><br>
    <select name="post_category" id="">
    <?php 
    $query = "SELECT * FROM categories";
    $show_categories = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($show_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<option value='$cat_id'>$cat_title</option>";
    }
    ?> 
    </select>
</div>
<div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" value="<?php echo $post_author; ?>" class="form-control" name="author">
</div>
<div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" value="<?php echo $post_status; ?>" class="form-control" name="post_status">
</div>
<div class="form-group">
    <label for="post_image">Post Image</label><br>
    <img width="200" src="../img/<?php echo $post_image; ?>" />
    <input style="margin-top:5px; width: 210px;" type="file" class="form-control" name="post_image">
</div>
<div class="form-group">
    <label for="tags">Post Tags</label>
    <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="tags">
</div>
<div class="form-group">
    <label for="post_desc">Post Description</label>
    <textarea class="form-control" name="post_desc" id="" cols="30" rows="10"><?php echo $post_desc; ?></textarea>
</div>
<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" class="form-control" name="update_post" value="Update Post">
</div>
</form>