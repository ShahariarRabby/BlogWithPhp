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
            $query = "select * from posts ";

                $select_all_queryPost = mysqli_query($connection , $query);

                if(!$select_all_queryPost){
                    die("faild". mysqli_errno($connection));
                }


            while($row = mysqli_fetch_array($select_all_queryPost)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];//this thing putting all data from db to a array in PhP
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
               $post_content = substr($row['post_content'], 0,200) ;
                $post_status = $row['post_status'];
				$p_id= $row['post_id'];
               if($post_status == 'publish'){
             
              

            ?>
                    <h2>
                <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo($post_title);?></a>
            </h2>
                    <h2><?php echo($post_status)?></h2>
                    <p class="lead"> by
                        <a href="authour.php?authour=<?php echo($post_author);?>&p_id=<?php echo($p_id);?>">
                    <?php echo($post_author);?>
                </a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span>
                        <?php echo($post_date);?>
                    </p>
                    <hr><a href="post.php?p_id=<?php echo $post_id;?>"> <img class="img-responsive" src="img/<?php echo($post_image)?>" alt=""></a>
                    <hr>
                    <p>
                        <?php echo($post_content);?>
                    </p> <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                    <?php	

                }}
            ?>
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
  