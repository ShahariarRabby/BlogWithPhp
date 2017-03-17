<?php
include("include/header.php");
include("include/db.php");
include("include/navigation.php");

?>



<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


            <?php

            if(isset($_GET['p_id'])){

                $id = ($_GET['p_id']);

            }else{
                $id="";
            }



            $query= "select * from posts where post_id ='$id'";

            $select_all_queryPost = mysqli_query($connection, $query);


            while($row = mysqli_fetch_array($select_all_queryPost)){
                $post_title = $row['post_title'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
 $p_id= $row['post_id'];
            ?>



            <h2>
                <a href="#"><?php echo($post_title);?></a>
            </h2>
            <p class="lead">
                by
                <a href="authour.php?authour=<?php echo($post_author);?>&p_id=<?php echo($p_id);?>">
                    <?php echo($post_author);?>
                </a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>
                <?php echo($post_date);?>
            </p>
            <hr>
            <img class="img-responsive" src="img/<?php echo($post_image)?>" alt="">
            <hr>
            <p>
                <?php echo($post_content);?>
            </p>

            <hr>

            <?php	

            }
            ?>

            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

            <!-- comment -->



            <?php
            if(isset($_POST['create_comment'])){
						
				$post_id = $_GET['p_id'];
                $comment_authour =mysqli_real_escape_string($connection, $_POST['comment_authour']);
                $comment_email = $_POST['comment_email'];

                $comment_area = mysqli_real_escape_string($connection, $_POST['comment_area']) ;
				
				if(!empty($comment_authour) && !empty($comment_email)&& !empty($comment_area) ){
			

                $query = "INSERT INTO `comments`(`comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES ('$post_id','$comment_authour','$comment_email','$comment_area','Unapproved',now())";

                $insert_comment = mysqli_query($connection,$query);



                $query = "update posts set post_comment_count = post_comment_count + 1 where post_id=$post_id";
                $commentCount = mysqli_query($connection , $query);

					
					
					
				}else{
					echo('<div class="alert alert-danger" role="alert">
  <strong>Oh snap!</strong> Change a few things up and try submitting again.
</div>');
					echo('<script> alert ("<div>Field can not be empty</div>");
			</script>');
				}
              

            }

            ?>



            <div class="well">

                <h3>Leave Comment</h3>
                <form action="" method="post">

                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="comment_authour" id="" cols="30" rows="3" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email" name="email">Email</label>
                        <input name="comment_email" id="" cols="30" rows="3" placeholder="email@example.com" class="form-control">

                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea name="comment_area" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>

                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                <?php

                $post_id = $_GET['p_id'];

                $query="select * from comments where comment_post_id = '$post_id' and comment_status = 'Approved' order by comment_id desc";

                $show_comments=mysqli_query($connection, $query);


                while($row=mysqli_fetch_assoc($show_comments)){
                    $commnet_date=$row['comment_date'];
                    $comment_content = $row['comment_content'];
                    $comment_authour = $row['comment_author'];
                    $commentCC= $row['comment_content'];

                ?>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo($comment_authour); ?>
                            <small><?php echo($commnet_date); ?></small>
                        </h4>
                        <p>
                            <?php echo($comment_content); ?>
                        </p>
                    </div>
                </div>

                <?php } ?>






            </div>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">
            <!-- Blog Categories Well -->
            <?php include("include/catagory.php"); ?>

        </div>
  
    </div>

    <?php

    include("include/footer.php");

    ?>