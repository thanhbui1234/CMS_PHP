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


                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php posts()?>
                <?php foreach ($dataPots as $post) {

    $post_id = $post['post_id'];
    $title = $post['post_title'];
    $author = $post['post_author'];
    $time = $post['post_time'];
    $img = $post['post_img'];
    $content = substr($post['post_content'], 0, 100) . '..........'?>
                <h2>
                    <a href="./post.php?id= <?php echo $post_id ?> "><?php echo $title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $time ?></p>
                <hr>
                <a href="./post.php?id= <?php echo $post_id ?> ">
                    <img class="img-responsive" src="/images//<?php echo $img ?>" alt="">
                </a>

                <hr>
                <p><?php echo $content ?></p>
                <a class="btn btn-primary" href="./post.php?id= <?php echo $post_id ?> ">Read More <span
                        class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php }?>


                <ul class="pager">


                    <!--  css stlye cho phân trang -->

                    <?php
for ($i = 1; $i <= $resultCountPage; $i++) {

    isset($_GET['page']) ? $hehe = $_GET['page'] : $hehe = null;

    echo $hehe == $i ? "<li><a class='active' href='index.php?page=$i'>$i</a></li>" : "<li><a href='index.php?page=$i'>$i</a></li>";

}

?>

                </ul>


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