
<?php

function insert_data(){
    global $connection;

    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title)){
            echo("This field should be not empty");
        }else{
            $query = "insert into categories (cat_title) values ('{$cat_title}')";
            $create_catagory_query = mysqli_query($connection, $query);
            if(!$create_catagory_query){
                die("Try again letter");
            }
        }
    }
}





function update_admin(){
    global $connection;

    if(isset($_POST['update'])){

        $updateCatIdAdmin = $_POST['update'];
        $cat_title = $_POST['cat_title'];
        $query = "update categories set cat_title= '{$cat_title}' where cat_id = {$cat_id}";

        $select_all_categories_updateAdmin= mysqli_query($connection, $query);

        header("Location: admin_catagories.php");

    }
}





function show_admin(){


    global $connection;
    $query = "select * from categories"	;

    $select_all_categories_forAdmin= mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_categories_forAdmin)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo("<tr>");
        echo("<td>{$cat_title}</td>");
        echo("<td><a href='admin_catagories.php?delete={$cat_id}'>Delete</a></td>");
        echo("<td><a href='admin_catagories.php?edit={$cat_id}'>Edit</a></td>");
        echo("<tr>");
    }	
}

function delete_admin(){

    global $connection;
    if(isset($_GET['delete'])){
        $deleteCatIdAdmin = $_GET['delete'];
        $query = "delete from categories where cat_id = {$deleteCatIdAdmin}";

        $select_all_categories_DeleteAdmin= mysqli_query($connection, $query);



        header("Location: admin_catagories.php");

    }


}


//echo 

function users_online(){
	
	
include("../include/db.php");		
$session = session_id();
$time = time();
$time_out_sec = 60;
$time_out = $time - $time_out_sec;
if(isset($_SESSION['username'])){
	$usernameSE = ($_SESSION['username']);
}else{
	$usernameSE = "Null";
	
}

$query = "select * from users_online where session = '$session'";
$session_query = mysqli_query($connection , $query);
$count_session = mysqli_num_rows($session_query);

if($count_session == null){
	$test1 = mysqli_query($connection, "insert into users_online (session, time, username) values ('$session','$time','$usernameSE')");
	
}else{
	$test2 = mysqli_query($connection, "update users_online set time = '$time' where session = '$session'");
	
}

$user_online_idk = mysqli_query($connection,"select * from users_online where time > '$time_out' AND session !=''"); 

$user_online_delete = mysqli_query($connection,"DELETE FROM `users_online` WHERE time < '$time_out' "); 

echo $count_session_user = mysqli_num_rows($user_online_idk);
}


users_online();
