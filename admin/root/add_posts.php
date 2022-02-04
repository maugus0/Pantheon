<?php
if(isset($_POST['create_post'])) {
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
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_desc, post_comment_count, post_status) ";
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_desc}',{$post_comment_count},'{$post_status}')";
    $post_all_categories_query = mysqli_query($connection,$query);
    if (!$post_all_categories_query) {
        die('Server disrupted.' . mysqli_error($connection));
    }
} 
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title">
</div>
<div class="form-group">
    <label for="post_category_id">Post Category ID</label><br>
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
    <input type="text" class="form-control" name="author">
</div>
<div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status">
</div>
<div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control" name="post_image">
</div>
<div class="form-group">
    <label for="tags">Post Tags</label>
    <input type="text" class="form-control" name="tags">
</div>
<div class="form-group">
    <label for="post_desc">Post Description</label>
    <textarea class="form-control" name="post_desc" id="" cols="30" rows="10"></textarea>
</div>
<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" class="form-control" name="create_post" value="Publish Post">
</div>
</form>