<?php
if(isset($_POST['create_post'])){

    $post_title = $_POST['page_title'];
    $post_author = $_POST['post_author'];
    $post_catagory_id= $_POST['post_catagory_id'];	
    $post_status = $_POST['post_status'];

    $post_image= $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tegs = $_POST['post_tag'];	
    $post_content = $_POST['post_content'];
    $post_content = mysqli_real_escape_string($connection ,$post_content);
    $post_date = date('d-m-y');
    //$post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../img/$post_image" );


    $query = "INSERT INTO `posts`(`post_catagory_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tegs`, `post_status`) VALUES ('$post_catagory_id','$post_title','$post_author',now(),'$post_image','$post_content','$post_tegs','$post_status')";

    $createPostQuery=mysqli_query($connection, $query);

    if(!$createPostQuery){
        die('<div class="alert alert-danger" role="alert">
  <strong>Oh snap!</strong> <a href="#" class="alert-link">try submitting again</a>
</div>');

    }
    else{
        die ('<div class="alert alert-success" role="alert">
  <strong>Well done!</strong><a href="#" class="alert-link">Post successfull.</a> 
</div>');

    }
}





?>
<form action="" method="post" enctype="multipart/form-data">



    <div class="form-group">
        <lable class="bolden">Post title</lable>
        <input class="form-control" name="page_title" type="text">
    </div>

    <select name="post_catagory_id" id="">
        <?php

        $query = "select * from categories ";

        $select_all_categories_foredit=mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_all_categories_foredit)){

            $post_catagory_id = $row['cat_id'];
            $cat_title = $row['cat_title'];


            echo("<option value='$post_catagory_id'>".$cat_title."</option>");

        }




        ?>







    </select>
    <div class="form-group">
        <lable class="bolden">Post Auther</lable>
        <input class="form-control" name="post_author" type="text">
    </div>



    <select name="post_status" id="">
        <option value="drafts">Drafts</option>
        <option value="publish">Publish</option>
    </select>

    <div class="form-group">
        <lable class="bolden">Post Image</lable>
        <input class="form-control" name="image" type="file">
    </div>

    <div class="form-group">
        <lable class="bolden">Post Tags</lable>
        <input class="form-control" name="post_tag" type="text">
    </div>

    <div class="form-group">
        <lable class="bolden">Post Date</lable>
        <input class="form-control" name="post_date" type="date">
    </div>
     
    <div class="form-group">
        <lable class="bolden">Post Content</lable>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
        
    </div>
<!--
 <script>
            CKEDITOR.replace( 'post_content' );
            CKEDITOR.config.extraPlugins = 'smiley,quran,preview,colordialog';
           
        </script>
-->
    <div class="form-group">
        <input class="btn btn-primary" name="create_post" value="Publish Post" type="Submit">
    </div>










</form>