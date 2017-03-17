<?php  include "include/db.php"; ?>
 <?php  include "include/header.php"; ?>
 
 
<?php

if(isset($_POST['submit'])){
   $username= $_POST['username'];
    $email=$_POST['email'];
       $password=$_POST['password'];
    
    if(!empty($username) && !empty($email) && !empty($password)){
    $username= mysqli_real_escape_string($connection, $username);
    $email=mysqli_real_escape_string($connection, $email);
    $password=mysqli_real_escape_string($connection, $password);

    
//    $query= "select randSalt from `users` ";
//         $selectuserquery = mysqli_query($connection,$query);
//    if(!$selectuserquery){
//        echo 2555555;
//    }else{
        
        
//        $row = mysqli_fetch_array($selectuserquery);
//         $randSalt = $row['randSalt'];
//      echo 555;
//        echo $randSalt;
//      // $password1 = $password1.$randSalt;
//            $password1 = crypt($password,"	$2y$10$");
      
            $query = "insert into users (username, user_email, user_password,user_role) values ('$username', '$email', '$password', 'subscriber')";
            
            $insertuser = mysqli_query($connection, $query);
       
       echo "sucessfully submited";
        
    
    
//} 
    }else{
        echo "Please Fill all from";
    }
}
    
?>


    <!-- Navigation -->
    
    <?php  include "include/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php";?>
