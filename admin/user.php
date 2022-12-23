<?php include './includes/admin_header.php'?>
<?php include './includes/admin_funtions.php'?>
<?php include '/xampp/htdocs/PHP_UDEMY/projectUdemy/includes/db.php'?>



<body>



    <div id="wrapper">

        <!-- Navigation -->
        <?php include './includes/admin_nav.php'?>

        <?php adminUser()?>
        <?php subscriberUser()?>
        <!-- delete post -->
        <?php deleteUsers()?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Subheading</small>
                            <!-- <button><a href="./includes/delete.php">delete</a></button> -->
                        </h1>

                        <?php

//// code  này mặc định nó sẽ sổ ra dasbord posts

isset($_GET['source']) ? $source = $_GET['source'] : $source = false;

switch ($source) {

    case 'add_user';
        include './includes/add_user.php';

        break;
    case 'edit_user';
        include './includes/edit_user.php';

        break;

    default:
        include './includes/view_all_user.php';
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