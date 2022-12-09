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
                </tr>";
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
            $err['message'] = 'Please put something ';
            return false;

        }
        if (empty($err)) {
            $sql = "INSERT INTO categories(cat_title) values('$category')";
            $statement = $conn->prepare($sql);
            $statement->execute();
        }
    }
}