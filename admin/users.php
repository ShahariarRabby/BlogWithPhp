<?php include("include/admin_header.php"); ?>

    <div id="wrapper">   
       
        <!-- Navigation -->
       <?php include("include/admin_navigation.php");?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1>Users</h1>
                    
                    <?php
						if(isset($_GET['source'])){
							$source = $_GET['source'];	
					}else{
							$source ="";
						}
			
				
				switch ($source){
						case '1' :
						include("include/viewallpost.php");
						break;
						
					case 2:
						include("include/add_users.php");
						break;
						
					case 3:
						include("include/edit_user.php");
						break;
						
							case 4:
						include("onlineuser.php");
						break;
						
					default:
						include("include/view_all_users.php");
				}		
						
						
							
						
						?> 
                    </div>
                </div>

            </div>

        </div>
     
        <!-- /#page-wrapper -->
<?php include("include/admin_footer.php"); ?>

   