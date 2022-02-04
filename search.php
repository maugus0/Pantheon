<?php include "root/db.php" ?>
<?php include "root/header.php" ?>
	<!-- Preloader -->
	<div class="preeloader">
		<div class="preloader-spinner"></div>
	</div>
	<!-- End Preloader -->
	
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
	<section class="blog section" id="blog">
		<div class="container">
			<?php include "root/searchbar.php"; ?>
			<div class="row">
                <?php    
                if(isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $search_query = mysqli_query($connection,$query);
                    if(!$search_query) {
                        die("SEARCH FAILED." . mysqli_error($connection));
                    }
                    $count = mysqli_num_rows($search_query);
                    if($count == 0) {
                        echo "<div class='alert alert-primary' role='alert'><strong>Sorry!</strong> But there is no blog post related to your search on <strong>Pantheon</strong>. Search again to look for other amusing and exciting blog posts on Pantheon features. Thanks for the visit!</div>";
                    } else {
                    while($row = mysqli_fetch_assoc($search_query)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_desc = $row['post_desc'];
                ?>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Single Blog -->
					<div class="single-news">
						<div class="news-head">
							<img src="img/<?php echo $post_image; ?>" alt="#">
						</div>
						<div class="news-body">
							<div class="news-content">
								<div class="date"><?php echo $post_date; ?> | By <?php echo $post_author; ?></div>
								<h2><a href="blog.php"><?php echo $post_title; ?></a></h2>
								<p class="text"><?php echo $post_desc; ?></p>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
				</div>
				<?php } } } ?>
			</div>
		</div>
	</section>
	<!-- End Blog Area -->
    <!--Footer-->
    <?php include "root/footer.php" ?>
	
	