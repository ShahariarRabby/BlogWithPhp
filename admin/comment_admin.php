<?php include("include/admin_header.php"); ?>

<div id="wrapper">   

    <!-- Navigation -->
    <?php include("include/admin_navigation.php");?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1>Posts</h1>

                    <?php
                    //include("include/viewallpost.php");
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
                            include("include/addpost.php");
                            break;

                        case 3:
                            include("include/edit_post.php");
                            break;

                        default:
                            include("include/viewallcomment.php");
                    }		

                    ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include("include/admin_footer.php"); ?>

