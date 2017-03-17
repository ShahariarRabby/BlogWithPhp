<?php
include("include/header.php");
//include("include/db.php");
include("include/navigation.php");

?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
            if(isset($_GET['catagory'])){
                $catagory = ($_GET['catagory']);
            }else{
                //die("<h1>404</h1>");
                $s =include("index.php");
                die($s);
            }


            $query= "select * from posts WHERE post_catagory_id= $catagory";

            $select_all_queryPost1 = mysqli_query($connection, $query);


            while($row = mysqli_fetch_array($select_all_queryPost1)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];//this thing putting all data from db to a array in PhP
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0,350) ;



            ?>
                    <h2>
                <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo($post_title);?></a>
            </h2>
                    <p class="lead"> by
                        <a href="index.php">
                            <?php echo($post_author);?>
                        </a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span>
                        <?php echo($post_date);?>
                    </p>
                    <hr> <img class="img-responsive" src="img/<?php echo($post_image)?>" alt="">
                    <hr>
                    <p>
                        <?php echo($post_content);?>
                    </p> <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                    <?php	

            }
            ?>
                        <!--
<h1 class="page-header">
Page Heading
<small>Secondary Text</small>
</h1>
-->
                        <!-- First Blog Post -->
                        <!-- Third Blog Post -->
                        <!-- Pager -->
                        <ul class="pager">
                            <li class="previous"> <a href="#">&larr; Older</a> </li>
                            <li class="next"> <a href="#">Newer &rarr;</a> </li>
                        </ul>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Blog Categories Well -->
                <?php include("include/catagory.php"); ?>
                    <?php

            include("include/footer.php");

            ?>