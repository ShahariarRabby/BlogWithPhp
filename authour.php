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

            if(isset($_GET['authour'])){

              //  $id = ($_GET['p_id']);
                $id = ($_GET['p_id']);
                $authour = ($_GET['authour']);

            }else{
                $authour="";
            }



            $query= "select * from posts where post_author ='$authour'";

            $select_all_queryPost = mysqli_query($connection, $query);


            while($row = mysqli_fetch_array($select_all_queryPost)){
                $post_title = $row['post_title'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0,200) ;
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





        <!-- Blog Sidebar Widgets Column -->
        
        </div>

        <div class="col-md-4">
            <!-- Blog Categories Well -->
            <?php include("include/catagory.php"); ?>

        </div>
  
    </div>

    <?php

    include("include/footer.php");

    ?>
   
  
 


div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-6">


     