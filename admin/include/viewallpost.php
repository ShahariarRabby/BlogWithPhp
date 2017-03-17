<?php

if(isset($_POST['checkBoxArray'])){
	foreach( $_POST['checkBoxArray'] as $checkBoxValue){
	
	$bulk_option = $_POST['bulk_options'];
		
		switch($bulk_option){
			case 'publish':
				$query="UPDATE `posts` SET `post_status` ='$bulk_option' where `post_id`='$checkBoxValue'";
				$published = mysqli_query($connection, $query);
				break;
				
			case 'drafts':
				$query="UPDATE `posts` SET `post_status` ='$bulk_option' where `post_id`='$checkBoxValue'";
				$drafts = mysqli_query($connection, $query);
				break;
				
			case 'delete':
				$query="DELETE FROM `posts` WHERE `post_id`='$checkBoxValue'";
				$delete = mysqli_query($connection, $query);
			
				break;
				
				
				
				
				
				
				
		}
	}
}



?>
   
<form action="" method="post">
   <div class="col-xs-4" id="bulkOptionContainer">
   	
   	<select name="bulk_options" class="form-control" id="bulk_options">
   		<option value="">Select Option</option>
   		<option value="publish">Publish</option>
   		<option value="drafts">Drafts</option>
   		<option value="delete">Delete</option>
   	</select>	
   </div>
   <div class="col-xs-4">
   	<input type="submit" name="submit" class="btn btn-success" value="Apply"><a href="posts.php?source=2" class="btn btn-primary" >Add New</a>
   </div>
   <table class="table table-bordered table-hover ">
    <thade>
        <tr>
           <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>Id</th>
            <th>Authour</th>
            <th>Title</th>
            <th>Catagory</th>
            <th>Status</th>
            <th>Imsge</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thade>

    <tbody>
        <?php
		
		$query = "select * from posts"	;
	
		$select_all_posts_forAdmin= mysqli_query($connection, $query);
								
		while($row = mysqli_fetch_array($select_all_posts_forAdmin)){
		$post_id = $row['post_id'];
		$post_catagory_id= $row['post_catagory_id'];	
		$post_author = $row['post_author'];
		$post_title = $row['post_title'];	
		$post_date = $row['post_date'];
		$post_image= $row['post_image'];	
		$post_content = $row['post_content'];
		$post_tegs = $row['post_tegs'];	
		$post_comment_count = $row['post_comment_count'];
		$post_status = $row['post_status'];	
			
	
						   
		
						   
		?>
            <tr>
               <th><input class="checkBoxes" name="checkBoxArray[]" value="<?php echo($post_id); ?>" type="checkbox"></th>

                <td>
                    <?php echo $post_id; ?>
                </td>
                <td>
                    <?php echo $post_author; ?>
                </td>
                <td>
                    <?php echo '<a href="../post.php?p_id='.$post_id.'">'.$post_title.'</a>'; ?> 
                </td>
                <td>
                    <?php echo $post_catagory_id; ?>
                </td>
                <td>
                    <?php echo $post_status; ?>
                </td>
                <td>
                    <?php echo ("<img  width=100px src='../img/$post_image'>"); ?></td>
                <td>
                    <?php echo $post_tegs; ?>
                </td>
                <td>
                    <?php echo $post_comment_count; ?>
                </td>
                <td>
                    <?php echo $post_date; ?>
                </td>
                <td>
                    <?php echo '<a onClick=\'javascript: return confirm ("are you sure?");\' href="posts.php?delete='.$post_id.'">Delete</a>'; ?></td>
                <td>
                    <?php echo '<a href="posts.php?source=3&edit='.$post_id.'">Edit</a>'; ?></td>

            </tr>

    </tbody>


    <?php } ?>
</table>


</form>





<?php
			if(isset($_GET['delete'])){
				$post_delete = $_GET['delete'];
				
				$query = "delete from posts where post_id='{$post_delete}'";
				$delete_post = mysqli_query($connection , $query);
				header("location: posts.php");
				
			}

			


?>