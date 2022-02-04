<?php ob_start(); ?>
<?php session_start(); ?>
<?php 
if(!isset($_SESSION['user_role'])) {
    header("Location: ../index.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Pantheon Admin</title>
    <!-- Favicon -->
	  <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
  <!--Navigation-->
<?php 
if(isset($_SESSION['user_role'])) {
 if($_SESSION['user_role'] == 'Admin')
 include "root/sidenav.php";
}
if(isset($_SESSION['user_role'])) {
  if($_SESSION['user_role'] !== 'Admin')
  include "root/sidenav2.php";
 }
?>