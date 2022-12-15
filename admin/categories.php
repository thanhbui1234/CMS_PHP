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
                            <small>Subheading</small>
                            <!-- <button><a href="./includes/delete.php">delete</a></button> -->

                        </h1>
                        <div class="col-xs-6">
                            <?php addCategories();?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                    <span> <?php echo isset($err['message']) ? $err['message'] : "" ?> </span>
                                </div>
                                <div class="fomr-group">
                                    <input type="submit" value="submit" name="submit" class="btn btn-primary">
                                </div>
                            </form>
                            <?php
if (isset($_GET['update'])) {
    include './includes/update_cat.php';

}?>

                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Categories</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php showCat()?>

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

        <?php include './includes/admin_footer.php'?>