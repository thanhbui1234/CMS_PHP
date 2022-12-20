<?php ob_start()?>
<?php include './includes/header.php'?>
<?php include './includes/funtions.php'?>


<body>

    <!-- Navigation -->
    <?php include './includes/nav.php'?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
addCommnet();

?>


                <h1 class="page-header">
                    Page Heading
                    <small>Bùi Chí Thanh</small>
                </h1>

                <!-- First Blog Post -->
                <?php postsOnly()?>
                <?php foreach ($dataPots as $post) {

    $title = $post['post_title'];
    $author = $post['post_author'];
    $time = $post['post_time'];
    $img = $post['post_img'];
    $content = $post['post_content']?>
                <h2>
                    <a href="#"><?php echo $title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $time ?></p>
                <hr>
                <img class="img-responsive" src="/images//<?php echo $img ?>" alt="">
                <hr>
                <p><?php echo $content ?></p>
                <a class="btn btn-primary" href="#">Read More <span
                        class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php }?>



                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="POST" action="" role="form">
                        <div class="form-group">
                            <label for="">Author</label>
                            <input name="commnet_author" class="form-control" type="text">
                            <h3 class="text-danger"> <?php echo isset($errCmt['author']) ? $errCmt['author'] : ''; ?>
                            </h3>
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="commnet_email" class="form-control" type="email">
                            <h3 class="text-danger"> <?php echo isset($errCmt['commnet']) ? $errCmt['commnet'] : ''; ?>
                            </h3>

                        </div>

                        <div class="form-group">
                            <label for="">Your commnet</label>
                            <textarea name="commnet_content" class="form-control" rows="3"></textarea>
                            <h3 class="text-danger">
                                <?php echo isset($errCmt['commnet_content']) ? $errCmt['commnet_content'] : ''; ?> </h3>

                        </div>
                        <button type="submit" name="create_submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                        commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                        nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                        commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                        nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>



            </div>









            <!-- Blog Sidebar Widgets Column -->
            <?php include './includes/sidebar.php'?>


        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

        <!-- /.container -->

        <!-- jQuery -->
        <?php include './includes/footer.php'?>