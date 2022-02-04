<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">

<button type="button" id="sidebarCollapse" class="btn btn-primary">
<i class="fa fa-bars"></i>
<span class="sr-only">Toggle Menu</span>
</button>
<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<i class="fa fa-bars"></i>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="nav navbar-nav ml-auto">
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['user_fname'] . " " . $_SESSION['user_lname']; ?> <i class="fa fa-user"> . </i></a>
<div class="dropdown-menu">
    <a class="dropdown-item" href="../blog.php"><i class="fa fa-fw fa-home"></i> Home</a><hr>
    <a class="dropdown-item" href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a><hr>
    <a class="dropdown-item" href="../root/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
</div>
</li>
</ul>
</div>
</div>
</nav>