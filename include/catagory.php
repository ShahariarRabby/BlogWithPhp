<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control" placeholder="Search"> <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span> </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>


<!--  login-->
<div class="well">
    <form action="include/login.php" method="post">
        <h2 class="form-signin-heading">sign in</h2>
        <div class="form-group">
            <label for="username" class="sr-only">username</label>
            <input type="username" name="username" id="" class="form-control" placeholder="Email address"> </div>
        <div class="input-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <!--  //<div class="checkbox">
<label>
<input type="checkbox"  value="remember-me"> Remember me
</label> --><span class="input-group-btn">
            <button class="btn  btn-primary btn-block" name="login" type="submit">Sign in</button>
            </span> </div>
    </form>
    <!-- /.input-group -->
</div>


<?php

$query = "select * from categories"	;
$select_all_categories= mysqli_query($connection, $query);




?>
<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php


                while($row = mysqli_fetch_array($select_all_categories)){
                    $cat_title = $row['cat_title'];//this thing putting all data from db to a array in PhP
                    $cat_id = $row['cat_id'];

                    echo("<li><a href='catagory.php?catagory=".$cat_id."'>{$cat_title}</a></li>");
                }


                ?>

            </ul>
        </div>

        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- Side Widget Well -->
<?php

include("include/widget.php");


?>