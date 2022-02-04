<?php include "root/db.php" ?>
<?php include "root/header.php" ?>
<?php
 if(isset($_POST['register'])) {
	$user_fname = $_POST['user_fname'];
	$user_lname = $_POST['user_lname'];
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];

	$query = "INSERT INTO users(user_fname, user_lname, user_name, user_email, user_password) ";
	$query .= "VALUES ('$user_fname', '$user_lname', '$user_name', '$user_email', '$user_password')";
    $result = mysqli_query($connection, $query);
	if (!$result) {
		die("DB FAILURE." . mysqli_error());
	}
 }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("form").submit(function(){
    alert("Congratulations! You have successfully created an account, login to access Pantheon.");
  });
});
</script>
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
	<?php include "root/nav.php" ?>
	<!--Breadcrumbs-->
    <div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index.php">Home<i class="lni lni-arrow-right"></i></a></li>
							<li class="active"><a href="register.php">Register</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Hero header-->
    <section class="hero-header primary-header slider-header" id="home">
        <div class="login-form">
			<form action="register.php" method="post">
				<h2 class="text-center">Register</h2>       
				<div class="form-group">
					<div class="form-group">
						<input type="text" name="user_fname" class="form-control" placeholder="First Name" required="required">
					</div>
					<div class="form-group">
						<input type="text" name="user_lname" class="form-control" placeholder="Last Name" required="required">
					</div>
					<div class="form-group">
						<input type="text" name="user_name" class="form-control" placeholder="Username" required="required">
					</div>
					<div class="form-group">
						<input type="text" name="user_email" class="form-control" placeholder="Email" required="required">
					</div>
					<div class="form-group">
						<input type="password" name="user_password" class="form-control" placeholder="Password" required="required">
					</div>
					<div class="form-group">
					<button type="submit" name="register" id="submit" class="btn btn-primary btn-lg btn-block text-center"><p style="color:white;">Register</p></button>
				    </div>
					<div class="clearfix">

					</div>        
			</form>
		</div>
    </section>
    
    <!--Footer-->
    <?php include "root/footer.php" ?>