<?php include("include/admin_header.php"); ?>

<div id="wrapper">
    <!-- Navigation -->
    <?php
        include("include/admin_navigation.php"); 
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>
                            <?php $usernameSE = $_SESSION['username']; ?>
                        </small>
                    </h1>
                    <h1>
                    	
                    </h1>
                </div>
            </div>
            
            
            <?php include("admin_wid.php");?>
            
            
            
        </div>
    </div>


 <?php include("include/admin_footer.php"); ?>