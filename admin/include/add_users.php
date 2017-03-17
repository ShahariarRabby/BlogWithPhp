<?php
if(isset($_POST['create_user'])){
	
		$user_password = $_POST['user_password'];
		$username= $_POST['username'];	
		$firstname = $_POST['user_firstname'];
		$lastname = $_POST['user_lastname'];
		$user_email = $_POST['user_email'];	
		$user_role= $_POST['user_role'];
		
	
	$query = "INSERT INTO `users`(`username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_role`) VALUES ('$username','$user_password','$firstname','$lastname','$user_email','$user_role')";
	
	$createPostQuery=mysqli_query($connection, $query);
	
	if(!$createPostQuery){
		die('<div class="alert alert-danger" role="alert">
  <strong>Oh snap!</strong> <a href="#" class="alert-link">try submitting again</a>
</div>');
		
	}
	else{
		
		echo ('<div class="alert alert-success" role="alert">
  <strong>Well done!</strong><a href="" class="alert-link">Post successfull.</a> 
</div>');
		
		
	}
	
}
	
	
		


?>
<form action="" method="post" enctype="multipart/form-data" >
    
    


	
	
		<div class="form-group">
		<lable class="bolden">First Name</lable>
	<input class="form-control"  name="user_firstname" type="text">
	</div>
	
	<div class="form-group">
		<lable class="bolden">Last Name</lable>
	<input class="form-control" name ="user_lastname" type="text">	
	</div>
	
	
	<select name="user_role" id="">
			<?php
			
//			$query = "select * from users ";
//							
//		$select_all_users=mysqli_query($connection, $query);
//		
//			while($row = mysqli_fetch_array($select_all_users)){
//									
//			$user_id = $row['user_id'];
//			$user_role = $row['user_role'];
//				
//				
//				echo("<option value='$user_id'>".$user_role."</option>");
//			
//			}
//			
			
			
			
			?>
			
			
			<option value="subscriber">Select option</option>
			<option value="Admin">Admin</option>
			<option value="Subscriber">Subscriber</option>
			
			
			
		</select>
<!--
	<div class="form-group">
		<lable class="bolden">Post Image</lable>
	<input class="form-control" name="image"  type="file">
	</div>
-->
	
	<div class="form-group">
		<lable class="bolden">username</lable>
	<input class="form-control" name="username"  type="text">
	</div >
	
	<div class="form-group">
		<lable class="bolden">email</lable>
	<input class="form-control" name="user_email"  type="email">
	</div >
	
	<div class="form-group">
		<lable class="bolden">Password</lable>
	<input class="form-control" name="user_password"  type="Password">
	</div >
	

	
	<div class="form-group">
		<input class="btn btn-primary" name="create_user" value="add user" type="Submit">
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</form>