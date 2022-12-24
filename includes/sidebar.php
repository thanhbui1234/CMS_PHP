 <div class="col-md-4">

     <!-- Blog Search Well -->
     <div class="well">


         <form action="/search.php" method="POST">
             <h4>Blog Search</h4>
             <div class="input-group">

                 <input type="text" name="search" class="form-control">
                 <span class="input-group-btn">
                     <button name="submit1" class="btn btn-default" type="submit">
                         <span class="glyphicon glyphicon-search"></span>
                     </button>
                 </span>


             </div>
         </form>
         <!-- /.input-group -->
     </div>


     <div class="well">


         <form action="../admin//includes//login.php" method="POST">
             <h4>Login Admin</h4>
             <div class="form-group">
                 <input class="form-control" name="username" placeholder="Username" type="text">
             </div>
             <div class="form-group">
                 <input class="form-control" name="password" placeholder="Password" type="password">
             </div>
             <span><?php echo isset($errLogin['error']) ? $errLogin['error'] : ''; ?></span>

             <div class="input-group">
                 <input class=" btn btn-primary" name="login" value="Login" placeholder="Password" type="submit">
             </div>



         </form>
         <!-- /.input-group -->
     </div>

     <!-- Blog Categories Well -->
     <div class="well">
         <h4>Blog Categories</h4>
         <div class="row">
             <div class="col-lg-12">
                 <ul class="list-unstyled">
                     <?php blogCategories()?>

                 </ul>
             </div>
             <!-- /.col-lg-6 -->

             <!-- /.col-lg-6 -->
         </div>
         <!-- /.row -->
     </div>

     <!-- Side Widget Well -->
     <div class="well">
         <h4>Side Widget Well</h4>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci
             accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
     </div>

 </div>