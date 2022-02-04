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
	<?php include "root/nav.php" ?>
	<!--Breadcrumbs-->
    <div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index.php">Home<i class="lni lni-arrow-right"></i></a></li>
							<li class="active"><a href="login.php">Login</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Hero header-->
    <section class="hero-header primary-header slider-header" id="home">
        <div class="login-form">
			<form action="root/login.php" method="post">
				<h2 class="text-center">Login</h2> 
                <div class="alert alert-primary" role="alert"><strong>Error 202:</strong> No user found.</div>      
				<div class="form-group">
					<input type="text" name="user_name" class="form-control" placeholder="Username" required="required">
				</div>
				<div class="form-group">
					<input type="password" name="user_password" class="form-control" placeholder="Password" required="required">
				</div>
				<div class="clearfix">
					<a href="register.php" class="float-left"><p class="text-center text-primary">Forgot Password?</p></a>
				</div> 
				<div class="form-group">
					<button type="submit" name="login" class="btn btn-primary btn-lg btn-block text-center"><p style="color:white;">Login</p></button>
				</div>
				<div class="clearfix">
					<p class="text-center text-primary"><a href="register.php">Create an Account</a></p>
				</div>        
			</form>
		</div>
    </section>
    
    <!--Footer-->
    <?php include "root/footer.php" ?>