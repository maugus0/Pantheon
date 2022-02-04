<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response to</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>UnApprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = "SELECT * FROM comments";
                            $select_comments = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($select_comments)) {
                                $comment_id = $row['comment_id'];
                                $comment_post_id = $row['comment_post_id'];
                                $comment_author = $row['comment_author'];
                                $comment_content = $row['comment_content'];
                                $comment_email = $row['comment_email'];
                                $comment_status = $row['comment_status'];
                                $comment_date = $row['comment_date'];
                                echo "<tr>";
                                echo "<td>$comment_id</td>";
                                echo "<td>$comment_author</td>";
                                echo "<td>$comment_content</td>";
                                echo "<td>$comment_email</td>";
                                echo "<td>$comment_status</td>";
                                $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
                                $select_post_title = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($select_post_title)) {
                                    $post_id = $row['post_id'];
                                    $post_title = $row['post_title'];
                                echo "<td><a href='../bposts.php?p_id={$post_id}'>$post_title</a></td>";
                                }
                                echo "<td>$comment_date</td>";
                                echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                                echo "<td><a href='comments.php?unapprove={$comment_id}'>UnApprove</a></td>";
                                echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
if(isset($_GET['approve'])) {
    $app_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$app_id}";
    $approve_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}
?>

<?php
if(isset($_GET['unapprove'])) {
    $unapp_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$unapp_id}";
    $unapprove_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}
?>

<?php
if(isset($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$del_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}
?>