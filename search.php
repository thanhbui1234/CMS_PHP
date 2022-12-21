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
                <?php search()?>
                <?php if ($dataSearch) {?>
                <?php foreach ($dataSearch as $search) {
    $title = $search['post_title'];
    $author = $search['post_author'];
    $time = $search['post_time'];
    $content = $search['post_content'];
    $img = $search['post_img'];
    ?>


                <h2>
                    <a href="./post.php?id=<?php echo $search['post_id'] ?>"><?php echo $title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $time ?></p>
                <hr>

                <a href="./post.php?id=<?php echo $search['post_id'] ?>"> <img class="img-responsive"
                        src="/images//<?php echo $img; ?>" alt=""></a>
                <hr>
                <p><?php echo $content ?></p>
                <a class="btn btn-primary" href="#">Read More <span
                        class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php }} else {
    echo "<h1 class='text-danger'> <i class=' fa-regular fa-face-sad-tear'></i>  Nothing to search  </h1>";
}?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include './includes/sidebar.php'?>


        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

        <!-- /.container -->

        <!-- jQuery -->

        <?php include './includes/footer.php    '?>