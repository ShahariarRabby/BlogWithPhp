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
            if(isset($_POST['submit'])){
                $search = ($_POST['search']);
                echo($search);	

                $query = "select * from posts where post_tegs like '%$search%' ";

                $searcquery = mysqli_query($connection , $query);

                if(!$searcquery){
                    die("faild". mysqli_errno($connection));
                }


                $count = mysqli_num_rows($searcquery);
                if($count == 0){
                    echo("<h1>NO Result</h1>");
                }else{
                    echo($count);

                    while($row = mysqli_fetch_array($searcquery)){
						$post_id = $row['post_id'];
                        $post_title = $row['post_title'];//this thing putting all data from db to a array in PhP
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0,200) ;

            ?>



             <h2>
                <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo($post_title);?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo($post_author);?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo($post_date);?></p>
            <hr>
            <img class="img-responsive" src="img/<?php echo($post_image)?>" alt="">
            <hr>
            <p><?php echo($post_content);?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

            <?php	

                    }


                }

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

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">


            <!-- Blog Categories Well -->
            <?php include("include/catagory.php"); ?>



            <?php

            include("include/footer.php");

            ?>