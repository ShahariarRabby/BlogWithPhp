<table class="table table-bordered table-hover ">
    <thade>
        <tr>
            <th>Id</th>
            <th>Authour</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unaprove</th>
            <th>Delete</th>
        </tr>
    </thade>

    <tbody>
        <?php

        $query = "select * from comments"	;

        $select_comments_forAdmin= mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_comments_forAdmin)){
            $comment_id = $row['comment_id'];
            $comment_post_id= $row['comment_post_id'];	
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];	
            $comment_status= $row['comment_status'];	
            $comment_date = $row['comment_date'];






        ?>					<tr  >
        <td><?php echo $comment_id; ?></td>
        <td><?php echo $comment_author; ?></td>
        <td><?php echo $comment_content; ?></td>
        <td><?php echo $comment_email; ?></td>
        <td ><?php echo $comment_status; ?></td>


        <?php

            $query = "select * from posts where post_id = $comment_post_id";


            $selectpostid= mysqli_query($connection , $query);

            while($row  = mysqli_fetch_assoc($selectpostid)){

                $post_id = $row['post_id'];
                $post_title = $row['post_title'];


                echo("<td><a href = '../post.php?p_id=".$post_id."'>".$post_title."</a></td>");
            }





        ?>
        <td><?php echo $comment_date; ?></td>
        <td><?php echo '<a href="comment_admin.php?aprove='.$comment_id.'">Approved</a>'; ?></td>
        <td><?php echo '<a href="comment_admin.php?unaprove='.$comment_id.'">Unapproved</a>'; ?></td>
        <td><?php echo '<a href="comment_admin.php?delete='.$comment_id.'">Delete</a>'; ?></td>

        </tr>

    </tbody>


    <?php } ?>
</table>

<img src="" alt="">






<?php


if(isset($_GET['aprove'])){
    $comment_aprove = $_GET['aprove'];

    $query = "update comments set comment_status = 'Approved' where comment_id='{$comment_aprove}'";
    $aproved_post = mysqli_query($connection , $query);

    header("location: comment_admin.php");

}




if(isset($_GET['unaprove'])){
    $comment_unaprove = $_GET['unaprove'];

    $query = "update comments set comment_status = 'Unapproved' where comment_id='{$comment_unaprove}'";
    $Unaproved_post = mysqli_query($connection , $query);
    header("location: comment_admin.php");

}



if(isset($_GET['delete'])){
    $comment_delete = $_GET['delete'];

    $query = "delete from comments where comment_id='{$comment_delete}'";
    $delete_post = mysqli_query($connection , $query);
    header("location: comment_admin.php");

}




?>