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

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php posts()?>
                <?php foreach ($dataPots as $post) {
    $title = $post['post_title'];
    $author = $post['post_author'];
    $time = $post['post_time'];
    $content = $post['post_content']?>
                <h2>
                    <a href="#"><?php echo $title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $time ?></p>
                <hr>
                <img class="img-responsive" src="/images//banner.jpg" alt="">
                <hr>
                <p><?php echo $content ?></p>
                <a class="btn btn-primary" href="#">Read More <span
                        class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php }?>

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