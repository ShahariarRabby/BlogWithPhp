<table class="table table-bordered table-hover ">
               			<thade>
               				<tr>
               					<th>Session Id</th>
               					<th>Username</th>
								<th>Last Online</th>
               				
               					

               				</tr>
               			</thade>
               		
                       <tbody>
    	<?php
		
		$query = "select * from users_online where session !='' "	;
	
		$select_users_forAdmin= mysqli_query($connection, $query);
								
		while($row = mysqli_fetch_array($select_users_forAdmin)){
		$user_id = $row['session'];
		$username= $row['username'];	
		$seconds = $row['time'];

	$seconds= $seconds - 3600;
	$timeFormat=	date('Y/m/d H:i:s', $seconds);	
	?>						<tr  >
                       		<td><?php echo $user_id; ?></td>
                       		<td><?php echo $username; ?></td>
                       		<td ><?php echo $timeFormat; ?></td>
                       		<?php
							}
						   ?>
           		    		</tr>
                       
                       </tbody>
                       
                       
                  
                  
                 
                
