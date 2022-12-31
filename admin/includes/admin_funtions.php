<?php include_once '/xampp/htdocs/PHP_UDEMY/projectUdemy/includes/db.php';

function showCat()
{

    global $conn;
    $sql = "SELECT * FROM categories ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dataCategories = $statement->fetchAll();
    foreach ($dataCategories as $category) {
        echo "<tr>
                <th>$category[cat_id]</th>
                <th>$category[cat_title]</th>
                <th>
                <button class='btn btn-success'> <a class='text-success'href='./includes/update.php?update=$category[cat_id]'>UPDATE</a></button>

                <button class='btn btn-danger'> <a class='text-success'href='./includes/delete.php?delete=$category[cat_id]'>DELETE</a></button>
                </th>

                </tr>";
    }

}
// function userOnline()
// {
//     global $conn;
//     // luu  session cua? bat' ky` nguoi` dung` nao` dang nhap. vao he. thong'
//     $session = session_id();
//     $time = time();
//     $set_time_out_inSecond = 20;
//     $time_out = $time - $set_time_out_inSecond;
//     $sql = "SELECT * FROM user_online WHERE session = '$session'";
//     $statement = $conn->query($sql);
//     $statement->execute();
//     $data1 = $statement->fetchAll();
//     if ($data1 == null) {
//         $sqlinsert = "INSERT INTO user_online (session, time) values('$session' , ' $time') ";
//         $statement2 = $conn->query($sqlinsert);
//         $statement2->execute();

//     } else {
//         $sqlstm3 = "update user_online set time = '$time' where session = '$session'";
//         $statement3 = $conn->query($sqlstm3);
//         $statement3->execute();

//     }

//     $sql3 = "SELECT * FROM user_online WHERE time  >'$time_out'";
//     $statement4 = $conn->query($sql3);
//     $statement4->execute();
//     $data2 = $statement4->fetchAll();
//     echo $countdata2 = count($data2);
// }
function bulk_options()
{

    if (isset($_POST['checkBoxArr'])) {
        $checkBoxArr = $_POST['checkBoxArr'];
        global $conn;

        foreach ($checkBoxArr as $checkBox) {
            $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {

                case 'publised':

                    $sql = "Update posts set  post_status = 'publised' where post_id = $checkBox  ";
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                    break;

                case 'draf':

                    $sql = "Update posts set  post_status = 'draf' where post_id = $checkBox  ";
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                    break;

                case 'delete':

                    $sql = " DELETE FROM posts WHERE post_id = $checkBox ";
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                    break;

                case 'clone':

                    $sql = " SELECT * FROM posts WHERE post_id = $checkBox ";
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                    $dataClone = $statement->fetchAll();

                    foreach ($dataClone as $clone) {

                        $post_category_id = $clone['post_category_id'];
                        $title = $clone['post_title'];
                        $post_author = $clone['post_author'];
                        $post_date = $clone['post_time'];
                        $post_content = $clone['post_content'];
                        $post_tag = $clone['post_tag'];
                        $post_status = $clone['post_status'];
                        $post_img = $clone['post_img'];

                    }

                    $sql2 = " INSERT INTO posts (post_category_id,post_title,post_author,post_time,post_img,post_content,post_tag,post_status)
  VALUES('$post_category_id','$title','$post_author','$post_date','
  $post_img','$post_content','$post_tag','$post_status') ";
                    $statement2 = $conn->prepare($sql2);
                    $statement2->execute();
                    break;

                default:echo 'Bạn phải chọn gì đó';
                    break;

            }

        }
    }

}

function addUsers()
{
    if (isset($_POST['create_user'])) {
        global $conn;
        $userEmail = $_POST['user_email'];
        $userName = $_POST['user_name'];
        $user_firstname = $_POST['user_firstName'];
        $user_lastname = $_POST['user_Lastname'];
        $user_Password = $_POST['user_password'];
        $user_role = $_POST['user_role'];

        global $errUser;
        $errUser = [];

        if (empty($userEmail)) {
            $errUser['email'] = ' Bạn phải nhập email';

        }
        if (empty($userName)) {
            $errUser['userName'] = ' Bạn phải nhập user name';

        }
        if (empty($user_firstname)) {
            $errUser['user_firstname'] = ' Bạn phải nhập first name';

        }
        if (empty($user_lastname)) {
            $errUser['user_lastname'] = ' Bạn phải nhập last name';
        }
        if (empty($user_Password)) {
            $errUser['user_Password'] = ' Bạn phải nhập password';
        }

        if (empty($errUser)) {

            $arr = ['cost' => 12];

// crypt password
            $user_Password = password_hash($user_Password, PASSWORD_BCRYPT, $arr);

            $sql = "INSERT INTO users (user_name,user_password,user_firstname,user_lastname,user_email,user_role)";
            $sql .= " VALUES ('$userName','$user_Password','$user_firstname','$user_lastname','$userEmail','$user_role')   ";
            $statement = $conn->prepare($sql);
            $statement->execute();
            header("Location: /admin/user.php");

        }

    }

}
function deleteUsers()
{

    if (isset($_GET['delete'])) {
        global $conn;
        $idUser = $_GET['delete'];
        $sql = "DELETE FROM users WHERE user_id = $idUser";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            header("Location: /admin/user.php");
        }

    }
}
function addPost()
{
    if (isset($_POST['create_post'])) {

        global $conn;
        $title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_tmp = $_FILES['post_image']['tmp_name'];
        $targe_dir = '../images//';
        $target_file = $targe_dir . $post_image;
        move_uploaded_file($post_image_tmp, $target_file);
        $post_tag = $_POST['post_tag'];
        $post_content = $_POST['post_content'];
        $post_date = date("Y-m-d H:i a ");
        // $post_comment_count = 0;
        global $err;
        $err = [];
        if (empty($title)) {
            $err['title'] = 'This  here is not empty';
        }
        if (empty($post_category_id)) {
            $err['post_category_id'] = 'This  here is not empty';
        }
        if (empty($post_author)) {
            $err['post_author'] = 'This  here is not empty';
        }
        // if (empty($post_status)) {
        //     $err['post_status'] = 'This  here is not empty';
        // }
        if (empty($post_image)) {
            $err['post_image'] = 'This  here is not empty';
        }

        if (empty($post_tag)) {
            $err['post_tag'] = 'This  here is not empty';
        }

        if (empty($err)) {

            echo " hehe";

            $sql = " INSERT INTO posts (post_category_id,post_title,post_author,post_time,post_img,post_content,post_tag,post_status)
  VALUES('$post_category_id','$title','$post_author','$post_date','$post_image','$post_content','$post_tag','$post_status') ";
            $statement = $conn->prepare($sql);
            if ($statement->execute()) {
                header("Location: /admin/posts.php");
            }

            // $sql = " INSERT INTO posts (post_category_id,post_title,post_author,post_time,post_img,post_content,post_tag,post_status)";
            // $sql .= " VALUES('$post_category_id','$title','$post_author','$post_date','$post_image','$post_content','$post_tag','$post_status') ";
            // $statement = $conn->prepare($sql);
            // $statement->execute();
            // if ($statement->execute()) {
            //     header("Location: /admin/posts.php");
            // }

        }

    }

}

function showUsers()
{
    global $conn;
    $sql = "SELECT * FROM users ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataUser;
    $dataUser = $statement->fetchAll();

}
function deleteCmt()
{

    if (isset($_GET['idCmt'])) {
        $id = $_GET['idCmt'];
        global $conn;
        $sql = "DELETE FROM commnets where commnet_id  = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        header("Location: commnet.php");

    }

}

function approvedCmt()
{

    if (isset($_GET['approve'])) {
        $id = $_GET['approve'];
        global $conn;
        $sql = "UPDATE commnets set commnet_status = 'Approve' where commnet_id  = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        header("Location: commnet.php");

    }

}

function unapproveCmt()
{

    if (isset($_GET['unapprove'])) {
        $id = $_GET['unapprove'];
        global $conn;
        $sql = "UPDATE commnets set commnet_status = 'Unapprove' where commnet_id  = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        header("Location: commnet.php");

    }

}

function adminUser()
{

    if (isset($_GET['admin'])) {
        $id = $_GET['admin'];
        global $conn;
        $sql = "UPDATE users set user_role = 'admin' where user_id   = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        header("Location: user.php");

    }

}
function updateUsers()
{
    if (isset($_POST['updateUser'])) {

        global $conn;
        $id_user = $_GET['id_user'];
        $userEmail = $_POST['user_email'];
        $userName = $_POST['user_name'];
        $user_firstname = $_POST['user_firstName'];
        $user_lastname = $_POST['user_Lastname'];
        $user_Password = $_POST['user_password'];
        $user_role = $_POST['user_role'];

        $sql = "UPDATE users  SET  user_name = '$userName' , user_Password = '$user_Password' , user_firstname = '$user_firstname' ";
        $sql .= "  , user_lastname='$user_lastname' , user_email = '$userEmail' , user_role = '$user_role' WHERE user_id = $id_user ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        header("Location: user.php");

    }

}

function updateUsers2()
{
    if (isset($_POST['updateUser2'])) {

        global $conn;

        $userEmail = $_POST['user_email'];
        $userName = $_POST['user_name'];
        $user_firstname = $_POST['user_firstName'];
        $user_lastname = $_POST['user_Lastname'];
        $user_Password = $_POST['user_password'];
        $cryptyy = '$2y$10$nguyenphuongthao111112';

        $user_Password = crypt($user_Password, $cryptyy);

        $user_role = $_POST['user_role'];
        $sql = " UPDATE users  SET  user_name = '$userName' , user_Password = '$user_Password' , user_firstname = '$user_firstname' ";
        $sql .= "  , user_lastname='$user_lastname' , user_email = '$userEmail' , user_role = '$user_role'  WHERE  user_name = '$_SESSION[user_name]' ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        header("Location: user.php");

    }

}

function subscriberUser()
{

    if (isset($_GET['subscriber'])) {
        $id = $_GET['subscriber'];
        global $conn;
        $sql = "UPDATE users set user_role = 'subscriber' where user_id   = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        header("Location: user.php");

    }

}

function deletePost()
{
    if (isset($_GET['delete'])) {
        global $conn;
        $id = $_GET['delete'];
        $sql = " DELETE FROM posts WHERE post_id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        // header("Location: posts.php");
    }

}

function countPosts()
{
    global $conn;
    $sql = " SELECT * FROM posts ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dataCountPost = $statement->fetchAll();
    global $countPosts;
    echo $countPosts = count($dataCountPost);

}

function countDrafPosts()
{

    global $conn;
    $sql = " SELECT * FROM posts where post_status = 'draf' ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dataCountPost = $statement->fetchAll();
    global $countDrafPosts;
    $countDrafPosts = count($dataCountPost);

}function countPendingCmt()
{
    global $conn;
    $sql = " SELECT * FROM commnets where commnet_status = 'Unapprove' ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dataCountCmt = $statement->fetchAll();
    global $countPendingCmt;
    $countPendingCmt = count($dataCountCmt);

}

function countCmt()
{
    global $conn;
    $sql = " SELECT * FROM commnets ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dataCountCmt = $statement->fetchAll();
    global $countCmt;
    echo $countCmt = count($dataCountCmt);

}

function countUsers()
{
    global $conn;
    $sql = " SELECT * FROM users ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dataCountCmt = $statement->fetchAll();
    global $countUsers;
    echo $countUsers = count($dataCountCmt);

}

function countSubUsers()
{
    global $conn;
    $sql = " SELECT * FROM users where user_role = 'subscriber' ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dataCountCmt = $statement->fetchAll();
    global $countSubUsers;
    $countSubUsers = count($dataCountCmt);

}

function countCategories()
{
    global $conn;
    $sql = " SELECT * FROM categories ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dataCountCmt = $statement->fetchAll();
    global $countCategories;
    echo $countCategories = count($dataCountCmt);

}

function selectUpdateUsers()
{

    if (isset($_GET['id_user'])) {
        $id_user = $_GET['id_user'];
        global $conn;
        $sql = "SELECT * FROM users WHERE user_id = $id_user";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataUsers;
        $dataUsers = $statement->fetchAll();

    }

}

function showtable()
{
    global $conn;
    $sql = "SHOW TABLES";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dataaaa = $statement->fetchAll();
    echo $countt = count($dataaaa);

}

function selectCategories()
{global $conn;

    $update = $_GET['update'];
    $sql = "SELECT * FROM categories  WHERE cat_id =$update ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataUpdateCategories;
    $dataUpdateCategories = $statement->fetchAll();

}
function deleteadminCategories()
{
    if (isset($_GET['delete'])) {
        global $conn;
        $delete = $_GET['delete'];
        $sql = " DELETE from  categories  where cat_id = $delete";
        $statement = $conn->prepare($sql);
        $statement->execute();
        header("Location: /./admin//categories.php");

    } else {
        die('query failed');

    }
}

function updateAdminCategories()
{
    if (isset($_GET['update'])) {

        $update = $_GET['update'];
        global $conn;
        $msg = "$update";
        header("Location: /./admin//categories.php?update=" . $msg);
    } else {
        die('query failed');

    }
}
function updatecate()
{
    if (isset($_POST['cat_title'])) {
        global $conn;
        // header("Location: /./admin//categories.php");
        $id = $_GET['id'];
        $update = $_POST['cat_title'];

        $sql = "UPDATE categories set cat_title = '$update' WHERE cat_id = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        header("Location: /./admin//categories.php");

    }
}
function addCategories()
{
    if (isset($_POST['submit'])) {
        global $conn;
        $category = $_POST['cat_title'];
        global $err;
        $err = [];
        if (empty($category)) {
            $err['message'] = '<h1 class="text-danger" > Please put something </h1>';
            return false;

        }
        if (empty($err)) {
            $sql = "INSERT INTO categories(cat_title) values('$category')";
            $statement = $conn->prepare($sql);
            $statement->execute();
        }
    }
}
function showPosts()
{
    global $conn;
    $sql = "SELECT * FROM posts order by post_id  DESC ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataPosts;
    $dataPosts = $statement->fetchAll();

}

function showCommnets()
{
    global $conn;
    $sql = "SELECT * FROM commnets ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $Datacommnets;
    $Datacommnets = $statement->fetchAll();

}

function selectEditPosts()
{
    if (isset($_GET['p_id'])) {
        global $conn;
        $id = $_GET['p_id'];
        $sql = "SELECT * FROM posts where post_id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataPostsEdit;
        $dataPostsEdit = $statement->fetchAll();

    }
}

function profileUser()
{

    if (isset($_SESSION['user_name'])) {

        global $sessionUserName;
        global $conn;
        $sessionUserName = $_SESSION['user_name'];
        $sql = "SELECT * FROM users WHERE user_name = '$sessionUserName'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataSessionUsers;
        $dataSessionUsers = $statement->fetchAll();

    }
}

function updatePost()
{
    if (isset($_POST['create_post'])) {

        global $conn;
        $title = $_POST['post_title'];
        $id = $_GET['p_id'];
        $category_id = $_POST['category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_tmp = $_FILES['post_image']['tmp_name'];
        $targe_dir = '../images//';
        $target_file = $targe_dir . $post_image;
        move_uploaded_file($post_image_tmp, $target_file);

        //header("Location: /./admin//categories.php)

        // giữ lại được ảnh ban đầu muốn chỉnh sửa
        if (empty($post_image)) {
            $sql = "SELECT post_img FROM posts where post_id = $id";
            $statement = $conn->prepare($sql);
            $statement->execute();
            $data1 = $statement->fetchAll();
            foreach ($data1 as $row) {
                $post_image = $row['post_img'];
            }

        }

        $post_tag = $_POST['post_tag'];
        $post_content = $_POST['post_content'];
        $post_date = date("Y-m-d H:i a ");
        $post_comment_count = 4;

        $sql = " UPDATE posts set post_category_id = '$category_id' , post_title = '$title' , post_comment_count = '$post_comment_count', ";
        $sql .= " post_author = '$post_author' , post_time = '$post_date' , post_img = '$post_image' ,post_content = '$post_content', post_tag = '$post_tag', ";
        $sql .= " post_status = '$post_status'  where post_id = $id ";

        $statement = $conn->prepare($sql);
        $statement->execute();

        header('location: ./posts.php');

    }

}

function login()
{
    if (isset($_POST['login'])) {
        global $conn;
        $username = htmlspecialchars($username = $_POST['username']);
        $password = htmlspecialchars($password = $_POST['password']);

        $sql = "SELECT * FROM  users WHERE user_name = '$username' ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $dataLogin = $statement->fetchAll();

        foreach ($dataLogin as $loginUser) {

            echo $user_id = $loginUser['user_id'];
            echo $user_name = $loginUser['user_name'];
            echo $user_password = $loginUser['user_password'];
            echo $user_firstname = $loginUser['user_firstname'];
            echo $user_lastname = $loginUser['user_lastname'];
            echo $user_email = $loginUser['user_email'];
            echo $user_role = $loginUser['user_role'];

        }

        if (password_verify($password, $user_password)) {

            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_firstname'] = $user_firstname;
            $_SESSION['user_lastname'] = $user_lastname;
            $_SESSION['user_role'] = $user_role;

            header('location: /admin//index.php');

        } else {

            header('location: /index.php');

        }

    }

}

function selectcategoryPost()
{
    if (isset($_GET['p_id'])) {
        global $conn;
        $id = $_GET['p_id'];
        $sql = "SELECT * from categories ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $data;
        $data = $statement->fetchAll();

    }

}