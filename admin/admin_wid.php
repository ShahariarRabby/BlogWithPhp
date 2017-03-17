<!-- /.row -->

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">


                        <?php
						$query = "select * from posts";
						$post_count = mysqli_query($connection, $query);
						$post_counts = mysqli_num_rows($post_count);
						?>




                            <div class='huge'>
                                <?php echo($post_counts); ?>
                            </div>
                            <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php?source=1">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>



    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">



                        <?php
						$query = "select * from comments";
						$comments_count = mysqli_query($connection, $query);
						$comments_counts = mysqli_num_rows($comments_count);
						?>


                            <div class='huge'>
                                <?php echo($comments_counts); ?>
                            </div>
                            <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comment_admin.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>



    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
						$query = "select * from users";
						$users_count = mysqli_query($connection, $query);
						$users_counts = mysqli_num_rows($users_count);
						?>



                            <div class='huge'>
                                <?php echo($users_counts); ?>
                            </div>
                            <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>



    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">


                        <?php
						$query = "select * from categories";
						$categories_count = mysqli_query($connection, $query);
						$categories_counts = mysqli_num_rows($categories_count);
						?>

                            <div class='huge'>
                                <?php echo($categories_counts); ?>
                            </div>
                            <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="admin_catagories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>



</div>
<!-- /.row -->
<?php

$query = "SELECT * FROM `posts` WHERE `post_status` = 'drafts'";
$post_draft_count = mysqli_query($connection, $query);
$post_draft_count = mysqli_num_rows($post_draft_count);

$query = "SELECT * FROM `comments` WHERE `comment_status` = 'Unapproved'";
$comment_unapproved_count = mysqli_query($connection, $query);
$comment_unapproved_count = mysqli_num_rows($comment_unapproved_count);

$query = "SELECT * FROM `users` WHERE `user_role` = 'Subscriber'";
$Subscriber_count = mysqli_query($connection, $query);
$Subscriber_count = mysqli_num_rows($Subscriber_count);

?>




    <div class="row">


        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],


			<?php
			
			$element_text = ['Active Post','Draft Post' , 'Comments', 'Panding Com', 'Catagories', 'Users','Subscriber'  ];
		$element_count = [$post_counts,$post_draft_count , $comments_counts, $comment_unapproved_count, $categories_counts, $users_counts,$Subscriber_count  ];

			
			for($i=0; $i<sizeof($element_count); $i++){
				
				
				
				echo "['{$element_text[$i]}'" . "," ."{$element_count[$i]}],";
				
				
			}
			
			
			
			?>


       // ['Post', 10,20]
        ]);

                var options = {
                    chart: {
                        // title: 'Company Performance',
                        // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, options);
            }
        </script>



        <div id="columnchart_material" style="width: auto; height: 500px;"></div>





    </div>