<?php include("include/admin_header.php"); ?>

<?php

if(isset($_SESSION['username'])){
    echo($_SESSION['username']);

    $username = ($_SESSION['username']);

    $query = "select *  from users  where username = '$username'";
    $userprofile= mysqli_query($connection,$query);


    while($row = mysqli_fetch_assoc($userprofile)){
        $user_id = $row['user_id'];
        $username= $row['username'];	
        $firstname = $row['user_firstname'];
        $lastname = $row['user_lastname'];
        $user_email = $row['user_email'];	
        //$user_role= $row['user_role'];
        $user_password = $row['user_password'];
        $user_role= $row['user_role'];

    }

}



?>




<?php
if(isset($_POST['edit_user'])){

    $user_password = $_POST['user_password'];
    $username= $_POST['username'];	
    $firstname = $_POST['user_firstname'];
    $lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];	
    $user_role= $_POST['user_role'];
    $username2 = ($_SESSION['username']);


    $query =" UPDATE `users` SET `username`= '$username',`user_password`='$user_password',`user_firstname`='$firstname',`user_lastname`='$lastname',`user_email`='$user_email',`user_role`='$user_role' WHERE `username`= '$username2' ";

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









<div id="wrapper">

    <!-- Navigation -->
    <?php include("include/admin_navigation.php");?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1>Posts</h1>


                    <form action="" method="post" enctype="multipart/form-data">






                        <div class="form-group">
                            <lable class="bolden">First Name</lable>
                            <input class="form-control" value="<?php echo $firstname; ?>" name="user_firstname" type="text">
                        </div>

                        <div class="form-group">
                            <lable class="bolden">Last Name</lable>
                            <input class="form-control" value="<?php echo $lastname; ?>" name="user_lastname" type="text">
                        </div>


                        <select name="user_role" value="<?php echo $user_role; ?>" id="">
                            <option value="<?php echo $user_role; ?>">
                                <?php echo $user_role; ?>
                            </option>
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
                            <input class="form-control" value="<?php echo $username; ?>" name="username" type="text">
                        </div>

                        <div class="form-group">
                            <lable class="bolden">email</lable>
                            <input class="form-control" value="<?php echo $user_email; ?>" name="user_email" type="email">
                        </div>

                        <div class="form-group">
                            <lable class="bolden">Password</lable>
                            <input class="form-control" name="user_password" value="<?php echo $user_password; ?>" type="Password">
                        </div>

                        <?php echo $user_password; ?>

                        <div class="form-group">
                            <input class="btn btn-primary" name="edit_user" value="Update" type="Submit">
                        </div>










                    </form>






                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include("include/admin_footer.php"); ?>