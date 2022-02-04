<?php include "root/db.php" ?>
<?php include "root/header.php" ?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5">
<?php include "root/topnav.php" ?>
<h2 class="mb-4">Pantheon Statistics</h2>
<div class="p-4 p-md-1">
<table class="table table-bordered table-hover">
<thead>
    <tr>
        <th><center><i class="fa fa-file-text fa-2x"></i> <h6>Posts</h6></center></th>
        <th><center><i class="fa fa-comments fa-2x"></i></i> <h6>Comments</h6></center></th>
        <th><center><i class="fa fa-user fa-2x"></i> <h6>Users</h6></center></th>
        <th><center><i class="fa fa-list fa-2x"></i> <h6>Categories</h6></center></th>
    </tr>
</thead>
<tbody>
<tr>
<?php 
$query = "SELECT * FROM posts";
$select_posts = mysqli_query($connection, $query);
$post_count = mysqli_num_rows($select_posts);
echo "<td><center><strong><h2>$post_count</h2></strong></center></td>";
$query = "SELECT * FROM comments";
$select_comments = mysqli_query($connection, $query);
$comment_count = mysqli_num_rows($select_comments);
echo "<td><center><strong><h2>$comment_count</h2></strong></center></td>";
$query = "SELECT * FROM users";
$select_users = mysqli_query($connection, $query);
$user_count = mysqli_num_rows($select_users);
echo "<td><center><strong><h2>$user_count</h2></strong></center></td>";
$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection, $query);
$category_count = mysqli_num_rows($select_categories);
echo "<td><center><strong><h2>$category_count</h2></strong></center></td>";
?>

</tr>
<tr>
<td><center><strong><h6><a href="posts.php">View Details <i class="fa fa-arrow-circle-right fa-1x"></i></a></h6></strong></center></td>
<td><center><strong><h6><a href="comments.php">View Details <i class="fa fa-arrow-circle-right fa-1x"></i></a></h6></strong></center></td>
<td><center><strong><h6><a href="users.php">View Details <i class="fa fa-arrow-circle-right fa-1x"></i></a></h6></strong></center></td>
<td><center><strong><h6><a href="categories.php">View Details <i class="fa fa-arrow-circle-right fa-1x"></i></a></h6></strong></center></td>
</tr>
</tbody>
</table>
</div>
<!-- CHART -->
<div class="p-4 p-md-5">
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Pantheon Statistics Chart', ''],
           <?php
           echo "['Posts', $post_count],";
           echo "['Comments', $comment_count],";
           echo "['Users', $user_count],";
           echo "['Categories', $category_count],";
           ?>
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <div id="columnchart_material" style="height: 600px;"></div>
</div>
</div>
<?php include "root/footer.php" ?>
