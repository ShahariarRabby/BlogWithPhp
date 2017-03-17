<?php include("../include/db.php"); ?>
      <?php ob_start(); ?><?php session_start(); ?>
    <?php include("function.php"); ?>
     
            
                <?php
                    if(isset($_SESSION['user_role'])){
                       if($_SESSION['user_role'] !== 'Admin'){
                           header("location:  ../index.php");
                               }
                                   }else{
						echo 23233;//$usernameSE = ($_SESSION['username']);
                                        header("location: ../index.php");}
?>





                    <!DOCTYPE html>
                    <html lang="en">

                    <head>

                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta name="description" content="">
                        <meta name="author" content="">

                        <title>Shahariar's</title>

                        <!-- Bootstrap Core CSS -->
                        <link href="css/bootstrap.min.css" rel="stylesheet">

                        <!-- Custom CSS -->
                        <link href="css/sb-admin.css" rel="stylesheet">

                        <!-- Custom Fonts -->
                        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
						<link href="../js/tinymce/content.min.css">
                       <link rel="stylesheet" href="../js/tinymce/skin.min.css">
                        <style>
                            .bolden {
                                font-weight: bold;
                            }
							
							
							#bulkOptionContainer{
								padding: 0px;
	
							}
                        </style>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!--                       <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>-->
<!--                 <script src="../js/ckeditor/ckeditor.js"></script>-->
                    <script src="../js/tinymce/tinymce.dev.js"></script>
				 <script>tinymce.init({ selector:'textarea',  plugins: "emoticons code",
 });
						</script>
                       
                     
                         
                          
                    </head>

                    <body>