<?php ob_start()?>
<?php include './includes/header.php'?>
<?php include './includes/funtions.php'?>



<body>


    <?php

registrations();

?>
    <!-- Navigation -->
    <?php include './includes/nav.php'?>








    <!-- Page Content -->
    <div class="container">

        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="form-wrap">
                            <a id="anh" href="post.php">a</a>
                            <h1>Register</h1>
                            <form role="form" action="registration.php" method="post" autocomplete="off">
                                <div id="name">
                                    <div class="form-group">
                                        <label for="username" class="sr-only">First name</label>
                                        <input type="text" name="first_name" id="username" class="form-control"
                                            placeholder=" First name">

                                        <h4 class="text-danger">
                                            <?php echo isset($errregistrations['first_name']) ? $errregistrations['first_name'] : ''; ?>
                                        </h4>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="sr-only">Last name</label>
                                        <input type="text" name="last_name" id="username" class="form-control"
                                            placeholder=" Last name">

                                        <h4 class="text-danger">
                                            <?php echo isset($errregistrations['last_name']) ? $errregistrations['last_name'] : ''; ?>
                                        </h4>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="username" class="sr-only">username</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="Enter Desired Username">

                                    <h4 class="text-danger">
                                        <?php echo isset($errregistrations['username']) ? $errregistrations['username'] : ''; ?>
                                    </h4>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="somebody@example.com">
                                    <h4 class="text-danger">
                                        <?php echo isset($errregistrations['email']) ? $errregistrations['email'] : ''; ?>
                                    </h4>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control"
                                        placeholder="Password">
                                    <h4 class="text-danger">
                                        <?php echo isset($errregistrations['password']) ? $errregistrations['password'] : ''; ?>
                                    </h4>
                                </div>

                                <input type="submit" name="submit" id="btn-login"
                                    class="btn btn-custom btn-lg btn-block" value="Register">
                            </form>

                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>


        <hr>


        <script>
        const anh = document.querySelector("#anh");
        console.log(anh);
        anh.addEventListener("click", () => {
            anh.preventDefault();
        });
        </script>

        <!-- Footer -->

        <!-- /.container -->

        <!-- jQuery -->
        <?php include './includes/footer.php'?>