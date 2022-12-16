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
        $post_comment_count = 4;
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
        if (empty($post_status)) {
            $err['post_status'] = 'This  here is not empty';
        }
        if (empty($post_image)) {
            $err['post_image'] = 'This  here is not empty';
        }

        if (empty($post_tag)) {
            $err['post_tag'] = 'This  here is not empty';
        }

        if (empty($err)) {

            $sql = " INSERT INTO posts (post_category_id,post_title,post_author,post_time,post_img,post_content,post_tag,post_comment_count,post_status)";
            $sql .= " VALUES('$post_category_id','$title','$post_author','$post_date','$post_image','$post_content','$post_tag','$post_comment_count','$post_status')";
            $statement = $conn->prepare($sql);
            if ($statement->execute()) {
                echo "<script>
Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
)
</script>";
            }

        }

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
    }

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
    $sql = "SELECT * FROM posts ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataPosts;
    $dataPosts = $statement->fetchAll();

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
        $post_tag = $_POST['post_tag'];
        $post_content = $_POST['post_content'];
        $post_date = date("Y-m-d H:i a ");
        $post_comment_count = 4;

        $sql = " UPDATE posts set post_category_id = '$category_id' , post_title = '$title' , post_comment_count = '$post_comment_count', ";
        $sql .= " post_author = '$post_author' , post_time = '$post_date' , post_img = '$post_image' ,post_content = '$post_content', post_tag = '$post_tag', ";
        $sql .= " post_status = '$post_status'  where post_id = $id ";

        $statement = $conn->prepare($sql);
        $statement->execute();

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