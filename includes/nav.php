 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
     <div class="container">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse"
                 data-target="#bs-example-navbar-collapse-1">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand" href="/index.php"> <i class="fa-solid fa-house"></i></a>
         </div>
         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav">
                 <?php nav();?>
                 <li>
                     <a href='/admin//index.php'>Admin</a>
                 </li>
                 <li>
                     <a href='./registration.php'>Registration</a>
                 </li>

                 <?php

//// nếu là admin khi đang ở trang chính  thì khi ấn vào một bài post nào đó thì trên nav sẽ hiện link dẫn đến phần edit của bài post tương ứng

if (isset($_SESSION['user_role'])) {

    if (isset($_GET['id'])) {
        echo "<li>
                     <a href='admin//posts.php?source=edit_posts&p_id=$_GET[id]'>Edit Post</a>
                 </li>";
    }

}
?>

             </ul>
         </div>
         <!-- /.navbar-collapse -->
     </div>
     <!-- /.container -->
 </nav>