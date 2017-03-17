<table class="table table-bordered table-hover ">
               			<thade>
               				<tr>
               					<th>Id</th>
               					<th>Username</th>
               					<th>First Name</th>
               					
               					<th>Last Name</th>
               					<th>Email</th>
               					<th>Role</th>
               					<th>Admin</th>
               					<th>Subscriber</th>
               					<th>Delete</th>
               					<th>Edit</th>

               				</tr>
               			</thade>
               		
                       <tbody>
    	<?php
		
		$query = "select * from users"	;
	
		$select_users_forAdmin= mysqli_query($connection, $query);
								
		while($row = mysqli_fetch_array($select_users_forAdmin)){
		$user_id = $row['user_id'];
		$username= $row['username'];	
		$firstname = $row['user_firstname'];
		$lastname = $row['user_lastname'];
		$user_email = $row['user_email'];	
		$user_role= $row['user_role'];	
		//$comment_date = $row['comment_date'];
		
			
	
						   
		
						   
		?>					<tr  >
                       		<td><?php echo $user_id; ?></td>
                       		<td><?php echo $username; ?></td>
                       		<td><?php echo $firstname; ?></td>
                      		<td><?php echo $lastname; ?></td>
                       		<td ><?php echo $user_email; ?></td>
                       		<td ><?php echo $user_role; ?></td>
                       		
                       		<td><?php echo '<a href="users.php?admin='.$user_id.'">Admin</a>'; ?></td>
                       		<td><?php echo '<a href="users.php?sub='.$user_id.'">Subscriber</a>'; ?></td>
                       		<td><?php echo '<a href="users.php?delete='.$user_id.'">Delete</a>'; ?></td>
                       		<td><?php echo '<a href="users.php?source=3&edit_user='.$user_id.'">Edit</a>'; ?></td>
                       		
                       		<?php
			
//			$query = "select * from posts where post_id = $comment_post_id";
//			
//			
//			$selectpostid= mysqli_query($connection , $query);
//			
//			while($row  = mysqli_fetch_assoc($selectpostid)){
//				
//				$post_id = $row['post_id'];
//				$post_title = $row['post_title'];
//				
//				
//				echo("<td><a href = '../post.php?p_id=".$post_id."'>".$post_title."</a></td>");
			}
			
			
			
			
			
			?>
                      		
                       		
                       		</tr>
                       
                       </tbody>
                       
                       
                       <?php //} ?>
                       </table>
                       
                      <img src="" alt="">
                     
                    
                   
                  
                 
                
               <?php

					
					if(isset($_GET['admin'])){
				$admin= $_GET['admin'];
				
				$query = "update users set user_role = 'Admin' where user_id='{$admin}'";
				$admin_user = mysqli_query($connection , $query);
				header("location: user.php");
						
				header("location: users.php");
				
			}


				
			
					if(isset($_GET['sub'])){
				$sub = $_GET['sub'];
				
				$query = "update users set user_role = 'Subscriber' where user_id='{$sub}'";
				$Subscriber = mysqli_query($connection , $query);
				header("location: users.php");
				
			}


			
			if(isset($_GET['delete'])){
				$comment_delete = $_GET['delete'];
				
				$query = "delete from users where user_id ='{$user_id}'";
				$delete_user = mysqli_query($connection , $query);
				header("location: users.php");
				
			}

			


?>