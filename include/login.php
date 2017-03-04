<?php include "db.php"; ?>
    <?php session_start(); ?>
        <?php 

if (isset($_POST['login'])) {
    echo   $username = mysqli_real_escape_string($connection,$_POST['username']) ;
    echo  $password = mysqli_real_escape_string($connection,$_POST['password']);

    $query= "select * from `users` WHERE username = '$username' AND  user_password= '$password' ";
    $selectuserquery = mysqli_query($connection,$query);

    if(!$selectuserquery){
        echo "No user Found";
    }
    while($row = mysqli_fetch_array($selectuserquery)){ 
        $dbuserid = $row['user_id'];
        $dbusername = $row['username'];
        $dbuser_password = $row['user_password'];
        $dbuser_firstname = $row['user_firstname'];
        $dbuser_lastname = $row['user_lastname'];
        $dbuser_role = $row['user_role'];
        $randSalt = $row['randSalt'];
        //$user_email = $row['user_email'];
        //$user_image = $row['user_image'];



    }
    
    echo $randSalt;
         echo   $password1 = crypt($password,$randSalt);
    
    
    

    if($username !== $dbusername && $password !== $dbuser_password){
        header("location: ../index.php");

    }else if($username == $dbusername && $password == $dbuser_password){

        $_SESSION['username'] = $dbusername;
        $_SESSION['firstname']=$dbuser_firstname;
        $_SESSION['lastname']=$dbuser_password;
        $_SESSION['user_role']=$dbuser_firstname;
        $_SESSION['lastname']=$dbuser_lastname;
        $_SESSION['user_role']=$dbuser_role;
        header("location: ../admin/index.php");

    }else{
        header("location: ../index.php");
    }



}


?>