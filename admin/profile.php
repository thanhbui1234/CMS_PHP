<?php include './includes/admin_header.php'?>
<?php include './includes/admin_funtions.php'?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include './includes/admin_nav.php'?>

        <!-- delete post -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <?php updateUsers2();
?>
                <?php profileUser()?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $sessionUserName ?></small>

                            <!-- <button><a href="./includes/delete.php">delete</a></button> -->
                        </h1>


                        <?php
?>

                        <!-- post_category_id -->
                        <form enctype="multipart/form-data" action="" method="POST">


                            <?php foreach ($dataSessionUsers as $value) {?>
                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input type="user_email" value="<?php echo $value['user_email'] ?>" class="form-control"
                                    name="user_email" id="user_email">
                                <span class="text-danger">

                            </div>
                            <div class="form-group">
                                <label for="user_name"> User name</label>
                                <input type="text" value="<?php echo $value['user_name'] ?>" class="form-control"
                                    name="user_name" id="user_name">
                                <span class="text-danger">
                            </div>

                            <div class="form-group">
                                <label for="user_firstName"> First name</label>
                                <input type="text" value="<?php echo $value['user_firstname'] ?>" class="form-control"
                                    name="user_firstName" id="user_firstName">
                                <span class="text-danger">
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="user_Lastname"> Last name</label>
                                <input type="text" value="<?php echo $value['user_lastname'] ?>" class="form-control"
                                    name="user_Lastname" id="user_Lastname">
                                <span class="text-danger">
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="user_password"> Password</label>
                                <input type="password" class="form-control"
                                    value="<?php echo $value['user_password'] ?>" name="user_password"
                                    id="user_password">
                                <span class="text-danger">
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="user_role">User role</label> <br>
                                <select class="form-select" aria-label="Default select example" name="user_role" id="">

                                    <option value="<?php echo $value['user_role'] ?>"><?php echo $value['user_role'] ?>

                                        <?php
echo $value['user_role'] == 'admin' ? "<option value='subscriber' >subscriber </option>" : "<option value='admin' >admin </option>";

    ?>
                                    </option>
                                </select>

                            </div>
                            <?php }?>

                            <div class="form-group">
                                <input type="submit" value="Submit :)" class="form-control btn btn-primary "
                                    name="updateUser2" id="updateUser">
                            </div>







                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include './includes/admin_footer.php'?>