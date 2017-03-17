<?php include("include/admin_header.php"); ?>

<div id="wrapper">   

    <!-- Navigation -->
    <?php include("include/admin_navigation.php");?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Username</small>




                    </h1>

                    <div class="col-xs-6">

                        <?php insert_data() ?>



                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Catagory</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary">
                            </div>

                        </form>



                        <form action="" method="post">







                            <?php
    if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];


        $query = "select * from categories WHERE cat_id = $edit_id";

        $select_all_categories_foredit=mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_all_categories_foredit)){

            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
                            ?>

                            <div class="form-group">
                                <label for="cat_title">Edit Catagory</label>		
                                <input value="<?php if(isset($cat_title)){echo($cat_title);}else{echo(123);} ?>" type="text" class="form-control" name="cat_title">

                            </div>
                            <div class="form-group">
                                <input type="submit" name="update" class="btn btn-primary" value="Update">
                            </div>

                            <?php } }  ?>


                            <?php 
                            if(isset($_POST['update'])){

                                $updateCatIdAdmin = $_POST['update'];
                                $cat_title = $_POST['cat_title'];
                                $query = "update categories set cat_title= '{$cat_title}' where cat_id = {$cat_id}";

                                $select_all_categories_updateAdmin= mysqli_query($connection, $query);

                                header("Location: admin_catagories.php");

                            } ?>




                        </form>




                    </div>    
                    <div class="col-xs-4">     

                        <table class="table table-bordered table-hover ">
                            <thade>
                                <tr>

                                    <th>Catagory Title</th>
                                    <th>Delete</th>
                                </tr>
                            </thade>
                            <tbody>



                                <?php show_admin();


                                ?>

                                <?php
                                delete_admin();
                                ?>



                            </tbody>
                        </table>

                    </div>  

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include("include/admin_footer.php"); ?>

