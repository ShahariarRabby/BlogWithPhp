<?php

if(isset($_GET['edit'])){
	
		$edit = ($_GET['edit']);
}
		$query = "select * from posts where post_id=$edit"	;
	
		$select_all_posts_forEditAdmin= mysqli_query($connection, $query);
								
		while($row = mysqli_fetch_array($select_all_posts_forEditAdmin)){
		$post_id = $row['post_id'];
		$post_catagory_id= $row['post_catagory_id'];	
		$post_author = $row['post_author'];
		$post_title = $row['post_title'];	
		$post_date = $row['post_date'];
		$post_image= $row['post_image'];	
		$post_content = $row['post_content'];
		$post_tegs = $row['post_tegs'];	
		$post_comment_count = $row['post_comment_count']; $post_status = $row['post_status'];	
		echo($post_id);	
	
	
}


if(isset($_POST['update_post'])){
		
		$post_title = $_POST['page_title'];
		$post_author = $_POST['post_author'];
		$post_catagory_id= $_POST['post_catagory_id'];	
		$post_status = $_POST['post_status'];
	
		$post_image= $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];
	
		$post_tegs = $_POST['post_tag'];	
		$post_content1 =($_POST['post_content']); 
		$post_content =mysqli_real_escape_string($connection ,($_POST['post_content']))  ;
		
		$post_date = date('d-m-y');
		$post_comment_count = 4;
	
		move_uploaded_file($post_image_temp, "../img/$post_image" );
	
	if(empty($post_image)){
		$query = "select * from posts where post_id = $post_id ";
		$imgquery=mysqli_query($connection, $query);
		while($row = mysqli_fetch_array($imgquery)){
		$post_image= $row['post_image'];
		}
	}
	
	
	$query = "UPDATE `posts` SET `post_catagory_id`='$post_catagory_id',`post_title`='$post_title',`post_author`='$post_author',`post_date`=now(),`post_image`='$post_image',`post_content`='$post_content',`post_tegs`='$post_tegs',`post_comment_count`='$post_comment_count',`post_status`='$post_status' WHERE `post_id`='$post_id'";
	

	
	$updatePostQuery=mysqli_query($connection, $query);
	
	if(!$updatePostQuery){
		die('<div class="alert alert-danger" role="alert">
  <strong>Oh snap!</strong> <a href="#" class="alert-link">try submitting again</a>
</div>');
		
	}
	else{
		echo ('<div class="alert alert-success" role="alert">
  <strong>Well done!</strong><a href="../post.php?p_id='.$post_id.'" class="alert-link"> view post.</a> 
</div>');
		
	}
}
?>
<form action="" method="post" enctype="multipart/form-data" >
    
    

	<div class="form-group">
		<lable class="bolden" >Post title</lable>
	<input value="<?php echo($post_title);?>"  class="form-control" name="page_title" type="text">
	</div>
	
	<div class="form-group">
		<lable class="bolden">Post Catagory Id</lable>
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
		
		
<!--	<input value="<?php echo($post_catagory_id);?>"  class="form-control" name="post_cat_id" type="number">-->
	</div>
		
	<div  class="form-group">
		<lable class="bolden">Post Auther</lable>
	<input value="<?php echo($post_author);?>" class="form-control"  name="post_author" type="text">
	</div>
	
	
	<select name="post_status" id="">
		<option value="drafts">Drafts</option>
		<option value="publish">Publish</option>
	</select>
	
<!--
	<div class="form-group">
		<lable class="bolden">Post status</lable>
	<input value="<?php echo($post_status);?>" class="form-control" name ="post_status" type="text">
	</div>
-->
	
	<div class="form-group">
		<lable class="bolden">Post Image</lable>
	<input   class="form-control" name="image"  type="file">
	<img width=100px src="../img/<?php echo($post_image); ?>" alt="">
	</div>
	
	<div class="form-group">
		<lable class="bolden">Post Tags</lable>
	<input value="<?php echo($post_tegs);?>" class="form-control" name="post_tag"  type="text">
	</div >
	
	<div class="form-group">
		<lable class="bolden">Post Date</lable>
	<input value="<?php echo($post_date);?>" class="form-control" name="post_date"  type="date">
	</div >
	
	<div class="form-group">
		<lable class="bolden">Post Content</lable>
	<textarea value="<?php echo($post_content);?>" class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo($post_content);?></textarea>
	</div>
	
	<div class="form-group">
		<input class="btn btn-primary" name="update_post" value="Publish Post" type="Submit">
	</div>
	</form>