<?php include './includes/admin_header.php'?>
<?php include './includes/admin_funtions.php'?>
<?php include '/xampp/htdocs/PHP_UDEMY/projectUdemy/includes/db.php'?>



<body>



    <div id="wrapper">

        <!-- Navigation -->
        <?php include './includes/admin_nav.php'?>

        <!-- delete post -->
        <?php deletePost()?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Bùi Chí Thanh</small>
                            <!-- <button><a href="./includes/delete.php">delete</a></button> -->
                        </h1>

                        <?php

//// code  này mặc định nó sẽ sổ ra dasbord posts

isset($_GET['source']) ? $source = $_GET['source'] : $source = false;

switch ($source) {

    case 'add_post';
        include './includes/add_posts.php';

        break;
    case 'edit_posts';
        include './includes/edit_posts.php';

        break;

    default:
        include './includes/view_all_commnets.php';
        break;

}

?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include './includes/admin_footer.php'?>