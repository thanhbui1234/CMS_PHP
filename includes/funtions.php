<?php
include './includes/db.php';

function nav()
{
    global $conn;
    $sql = "SELECT * FROM categories  ";
    $statement = $conn->prepare($sql);

    $statement->execute();
    $dataNav = $statement->fetchAll();
    foreach ($dataNav as $nav) {
        echo "<li>
             <a href='./linknav.php?title=$nav[cat_id]'>$nav[cat_title]</a>
            </li>";
    }
}
function blogCategories()
{

    global $conn;
    $sql = "SELECT * FROM categories ";
    $statement = $conn->prepare($sql);

    $statement->execute();
    $dataBlog = $statement->fetchAll();
    foreach ($dataBlog as $blog) {

        echo "<li>
<a href='../category.php?id=$blog[cat_id]'>$blog[cat_title]</a>

            </li>";
    }

}

function posts()
{

    /// kèm phân trang
    global $conn;

    $sqlCount = "SELECT * from posts where post_status = 'publised'";

    $statementCount = $conn->prepare($sqlCount);
    $statementCount->execute();
    $dataCount = $statementCount->fetchAll();

    // môi trang chỉ đc 5 bài sẽ phân sang trang khác
    $perPage = 5;

    $page = count($dataCount);

    global $resultCountPage;
    // ceil sẽ làm tròn số thấp phân   làm tròn nên

    $resultCountPage = ceil($page / 5);

    if (isset($_GET['page'])) {

        $pageGet = $_GET['page'];

    } else {

        $pageGet = '';

    }

    if ($pageGet == '' || $pageGet == 1) {
        $pageSelect = 0;
    } else {
        $pageSelect = ($pageGet * $perPage) - $perPage;

    }

    $sql = "SELECT * from posts where post_status = 'publised' order by post_id desc limit  $pageSelect , $perPage";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataPots;
    $dataPots = $statement->fetchAll();

}
function postsOnly()
{
    if (isset($_GET['id'])) {
        global $conn;
        $id = $_GET['id'];
        $sql = "SELECT * from posts where post_id = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataPots;
        $dataPots = $statement->fetchAll();
    }

}

function search()
{
    global $conn;
    $search = $_POST['search'];
    $sql = "select * from posts where post_tag LIKE '%$search%'  ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataSearch;
    $dataSearch = $statement->fetchAll();
}

function registrations()
{
    if (isset($_POST['submit'])) {
        global $conn;

// mã hóa code của người lạ
        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        global $errregistrations;
        $errregistrations = [];
        if (empty($first_name)) {

            $errregistrations['first_name'] = ' Bạn phải nhập  first name';

        }

        if (empty($last_name)) {

            $errregistrations['last_name'] = ' Bạn phải nhập last name';

        }

        if (empty($username)) {

            $errregistrations['username'] = ' Bạn phải nhập user name';

        }

        if (empty($email)) {

            $errregistrations['email'] = ' Bạn phải nhập email';

        }

        if (empty($password)) {

            $errregistrations['password'] = ' Bạn phải nhập password';

        }

        if (empty($errregistrations)) {

            // crypt password
            $cryptyy = '$2y$10$nguyenphuongthao111112';

            $password = crypt($password, $cryptyy);

            $sql = "INSERT INTO users (user_firstname, user_lastname , user_name, user_password , user_email ,user_role) VALUES ('$first_name','$last_name','$username','$password','$email','subscriber')  ";
            $statement = $conn->prepare($sql);
            $statement->execute();

        }

    }

}

function linkNav()
{
    global $conn;
    $search = $_GET['title'];
    $sql = "select * from posts where post_category_id = $search ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $linkNav;
    $linkNav = $statement->fetchAll();
}

function allCategory()
{
    if (isset($_GET['id'])) {
        global $conn;
        $id = $_GET['id'];
        $sql = "select * from posts where post_category_id = $id ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataALLcATEGORY;
        $dataALLcATEGORY = $statement->fetchAll();

        // var_dump($dataALLcATEGORY);

    }

}

function showCmt()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        global $conn;
        $sql = "SELECT * from commnets where commnet_post_id  = $id and commnet_status = 'Approve'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $datacmt;
        $datacmt = $statement->fetchAll();

    }

}

function addCommnet()
{
    if (isset($_POST['create_submit'])) {
        global $conn;
        $author = $_POST['commnet_author'];
        $email = $_POST['commnet_email'];
        $commnet_content = $_POST['commnet_content'];
        $date = date("Y-m-d H:i a ");
        $post_id = $_GET['id'];

        global $errCmt;
        $errCmt = [];

        if (empty($author)) {

            $errCmt['author'] = 'Please enter a author';

        }

        if (empty($email)) {

            $errCmt['commnet'] = 'Please enter a commnet';

        }
        if (empty($commnet_content)) {

            $errCmt['commnet_content'] = 'Please enter a content';

        }

        if (empty($errCmt)) {

            $sql = " INSERT INTO commnets (commnet_post_id,commnet_author,commnet_email,commnet_content,commnet_status,commnet_date )";
            $sql .= " VALUES ($post_id,'$author','$email','$commnet_content','  Unapproved','$date' )";
            $statement = $conn->prepare($sql);
            $statement->execute();

            $sql2 = " UPDATE posts set post_comment_count =  post_comment_count + 1  where post_id  = $post_id";
            $statement2 = $conn->prepare($sql2);
            $statement2->execute();

        }

    }

}