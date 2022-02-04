<?php include "root/db.php" ?>
<?php include "root/header.php" ?>
	<!-- Preloader -->
	<div class="preeloader">
		<div class="preloader-spinner"></div>
	</div>
	<!-- End Preloader -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#commentss").submit(function(){
alert("Comment posted successfully! It will be published online after admin approval.");
});
});
</script>
	<!-- Color Plate -->
	<div class="color-plate ">
		<a class="color-plate-icon"><i class="fa fa-cog fa-spin"></i></a>
		<h4>Pantheon Deepsight</h4>
		<p>Here are same other awesome theme colors.</p>
		<span class="color1"></span>
		<span class="color2"></span>
		<span class="color3"></span>
		<span class="color4"></span>
	</div>
	<!-- /End Color Plate -->
    <!--Navigation-->
	<?php include "root/nav2.php" ?>
    <!--Breadcrumbs-->
    <div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index.php">Home<i class="lni lni-arrow-right"></i></a></li>
							<li class="active"><a href="blog.php">Blog Posts</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!--Blog Posts-->
    <!-- Start Blog Area -->
    <section class="blog-single section">
        <div class="container">
        <?php include "root/searchbar.php"; ?>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-12">
                    <div class="blog-single-main">
                        <div class="row">
                            <div class="col-12">
                                <div class="blog-detail">
                                    <?php
                                    if (isset($_GET['p_id'])) {
                                        $post_id = $_GET['p_id'];
                                    }
                                    $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
                                    $select_all_posts_query = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                                        $post_title = $row['post_title'];
                                        $post_category_id = $row['post_category_id'];
                                        $post_author = $row['post_author'];
                                        $post_date = $row['post_date'];
                                        $post_image = $row['post_image'];
                                        $post_content = $row['post_content'];

                                        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                                        $sidebar_query = mysqli_query($connection,$query);
                                    ?>
                                    <h2 class="blog-title"><?php echo $post_title; ?></h2>
                                    <div class="blog-meta">
                                        <span class="author"><a href="login.php"><i class="fa fa-user"></i><?php echo $post_author; ?></a><a href="#"><i class="fa fa-calendar"></i><?php echo $post_date; ?></a></span>
                                    </div>
                                    <div class="content">
                                    <?php echo $post_content; ?>
                                    </div>
                                </div>
                                <div class="share-social">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="content-tags">
                                                <h4>Tags:</h4>
                                                <ul class="tag-inner">
                                                    <?php 
                                                    while($row = mysqli_fetch_assoc($sidebar_query)) {
                                                        $cat_title = $row['cat_title'];
                                                        $cat_id = $row['cat_id'];
                                                        echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        <!-- POST -->
                        <div class="col-12">
                                <div class="comments">
                                    <h3 class="comment-title">Comments:</h3>
									<!-- Single Comment -->
                                    <?php
                                    if (isset($_GET['p_id'])) {
                                        $comment_id = $_GET['p_id'];
                                    }
                                    $query = "SELECT * FROM comments WHERE comment_post_id = {$comment_id} ";
                                    $query .= "AND comment_status = 'Approved' ";
                                    $query .= "ORDER BY comment_id ASC";
                                    $comments_query = mysqli_query($connection,$query);
                                    if(!$comments_query) {
                                        die("COULD NOT UPLOAD COMMENTS." . mysqli_error($connection));
                                    }
                                    while($row = mysqli_fetch_assoc($comments_query)) {
                                    $comment_author = $row['comment_author'];
                                    $comment_email = $row['comment_email'];
                                    $comment_content = $row['comment_content'];
                                    $comment_date = $row['comment_date'];
                                    $comment_image = $row['comment_image'];
                                    ?>
                                    <div class="single-comment">
                                        <img src="img/<?php echo $comment_image; ?>" alt="#">
                                        <div class="content">
                                            <h4><?php echo $comment_author; ?> <span>At <?php echo $comment_date; ?></span></h4>
                                            <p><?php echo $comment_content; ?></p>
                                            <div class="button">
                                                <a href="#comment" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- End Single Comment -->
                                </div>									
                            </div>
                        </div>
                        <div id="comment" class="col-12">	
                        <?php
                        if(isset($_POST['create_comment'])) {
                        $comment_post_id = $_GET['p_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                        $query .= "VALUES({$comment_post_id},'{$comment_author}','{$comment_email}','{$comment_content}','Unapproved', now() )";
                        $create_comment_query = mysqli_query($connection,$query);
                            if (!$create_comment_query) {
                                die('Server disrupted.' . mysqli_error($connection));
                            }
                        }
                        ?>		
                                <div class="reply">
                                    <div class="reply-head">
                                        <h2 class="reply-title">Leave a Comment:</h2>
                                        <!-- Comment Form -->
                                        <form id="commentss" action="" method="post" role="form">
                                            <div class="form-group">
                                                <label for="comment_author">Name:</label>
                                                <input class="form-control" type="text" name="comment_author" value="<?php echo $_SESSION['user_fname'] . " " . $_SESSION['user_lname']; ?>" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="comment_email">Email:</label>
                                                <input class="form-control" type="email" name="comment_email" value="<?php echo $_SESSION['user_email']; ?>" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="comment_content">Your Comment:</label>
                                                <textarea class="form-control" rows="1" name="comment_content" required="required"></textarea>
                                            </div>
                                            <button type="submit" name="create_comment" class="btn btn-primary">Comment</button>
                                        </form>
                                        <!-- End Comment Form -->
                                    </div>
                                </div>			
                            </div>	
                    </section>
	<!-- End Blog Area -->
    <!--Footer-->
    <?php include "root/footer.php" ?>