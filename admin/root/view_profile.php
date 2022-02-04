<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="../img/<?php echo $_SESSION['user_image']; ?>" alt="Profile Picture">
  <div class="card-body">
  <h5 class="card-title"><?php echo $_SESSION['user_fname'] . " " . $_SESSION['user_lname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Role: <?php echo $_SESSION['user_role']; ?></h6>
  </div>
    <div class="card-header">
    <strong>Username:</strong> <?php echo $_SESSION['user_name']; ?>
  </div>
  <div class="card-body">
  <div class="card-text">
    <strong>Email:</strong> <?php echo $_SESSION['user_email']; ?>
    </div></div>
  <div class="card-body">
    <center><a href="profile.php?source=update_profile" class="card-link">Update Profile</a></center>
  </div>
</div>