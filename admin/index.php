<?php include './includes/admin_header.php'?>
<?php include './includes/admin_funtions.php'?>

<body>


    <div id="wrapper">



        <!-- Navigation -->
        <?php include './includes/admin_nav.php'?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['user_name'] ?></small>
                            <!-- <?php

//userOnline()
?> -->

                            <?php countDrafPosts()?>
                            <?php countPendingCmt()?>
                            <?php countSubUsers()?>


                        </h1>

                        <!-- /.row -->


                        <!-- /.row -->
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class='huge'> <?php countPosts()?></div>
                                            <div>Posts</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="posts.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Posts</span>
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
                                            <div class='huge'><?php countCmt()?></div>
                                            <div>Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="commnet.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Comments</span>
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
                                            <div class='huge'><?php countUsers()?></div>
                                            <div> Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="user.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Users</span>
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
                                            <div class='huge'><?php countCategories()?></div>
                                            <div>Categories</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="categories.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Categories</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>




                    </div>
                </div>


                <!-- /.row -->

                <!-- /.container-fluid -->
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
$arrDataCount = [$countPosts, $countDrafPosts, $countCmt, $countPendingCmt, $countUsers, $countSubUsers, $countCategories];
$arrtitle = ['Active Posts', 'Draf Posts', 'Commnets', 'Pending Commnets', 'Users', 'Subscriber', 'Categories'];

$summTitle = count($arrDataCount);
for ($i = 0; $i < $summTitle; $i++) {
    echo " ['$arrtitle[$i]'" . "," . "  $arrDataCount[$i]   ],";
}
?>
                        ]);

                        var options = {
                            chart: {
                                title: 'CMS',
                                subtitle: '',
                            }
                        };
                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                    </script>
                    <div id="columnchart_material" style="width:'auto' ; height: 600px;"></div>
                </div>
            </div>


        </div>
        <!-- /#page-wrapper -->


        <?php include './includes/admin_footer.php'?>