<?php

if(isset($_GET['edit_user'])){
	$user_id = $_GET['edit_user'];
	
	
	$query = "select * from users where user_id = '$user_id' "	;
	
		$user_edit= mysqli_query($connection, $query);
								
		while($row = mysqli_fetch_array($user_edit)){
		$user_id = $row['user_id'];
		$username= $row['username'];	
		 $firstname = $row['user_firstname'];
		$lastname = $row['user_lastname'];
		$user_email = $row['user_email'];	
		$user_role= $row['user_role'];
		$user_password = $row['user_password'];
	
			
			
			
	
}}

	
		


?>


<?php
if(isset($_POST['edit_user'])){
	
		$user_password = $_POST['user_password'];
		$username= $_POST['username'];	
		$firstname = $_POST['user_firstname'];
		$lastname = $_POST['user_lastname'];
		$user_email = $_POST['user_email'];	
		$user_role= $_POST['user_role'];
		
	
	$query =" UPDATE `users` SET `username`= '$username',`user_password`='$user_password',`user_firstname`='$firstname',`user_lastname`='$lastname',`user_email`='$user_email',`user_role`='$user_role' WHERE `user_id`= '$user_id' ";
			
			$user_edit1= mysqli_query($connection, $query);
	if(!$user_edit1){
		die('<div class="alert alert-danger" role="alert">
  <strong>Oh snap!</strong> <a href="#" class="alert-link">try submitting again</a>
</div>');
		
	}
	else{
		
		echo ('<div class="alert alert-success" role="alert">
  <strong>Well done!</strong><a href="#" class="alert-link">Post successfull.</a> 
</div>');
		
		
	}
	
}
	
	
		


?>


<form action="" method="post" enctype="multipart/form-data" >
    
    


	
	
		<div class="form-group">
		<lable class="bolden">First Name</lable>
	<input class="form-control"  value="<?php echo $firstname; ?>" name="user_firstname" type="text">
	</div>
	
	<div class="form-group">
		<lable class="bolden">Last Name</lable>
	<input class="form-control" value="<?php echo $lastname; ?>"  name ="user_lastname" type="text">	
	</div>
	
	
	<select name="user_role"  value="<?php echo $user_role; ?>" id="">
		<option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
			<?php
		if($user_role == 'Admin'){
			?>
			<option value="Subscriber">Subscriber</option>
		<?php }else{ ?>

					<option value="Admin">Admin</option>
		<?php }	?>
			
			
			

			
			
			
			
		</select>

	
	<div class="form-group">
		<lable class="bolden">Username</lable>
	<input class="form-control" value="<?php echo $username; ?>" name="username"  type="text">
	</div >
	
	<div class="form-group">
		<lable class="bolden">email</lable>
	<input class="form-control" value="<?php echo $user_email; ?>" name="user_email"  type="email">
	</div >
	
	<div class="form-group">
		<lable class="bolden">Password</lable>
	<input class="form-control" name="user_password"  type="Password">
	</div >
	

	
	<div class="form-group">
		<input class="btn btn-primary" name="edit_user" value="Update" type="Submit">
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</form>