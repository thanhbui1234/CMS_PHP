<?php
include './includes/db.php';

function nav()
{
    global $conn;
    $sql = "SELECT cat_title FROM categories";
    $statement = $conn->prepare($sql);

    $statement->execute();
    $dataNav = $statement->fetchAll();
    foreach ($dataNav as $nav) {
        echo "<li>
             <a href='#'>$nav[cat_title]</a>
            </li>";
    }
}
function blogCategories()
{

    global $conn;
    $sql = "SELECT cat_title FROM categories order by cat_title asc limit 3";
    $statement = $conn->prepare($sql);

    $statement->execute();
    $dataBlog = $statement->fetchAll();
    foreach ($dataBlog as $blog) {
        echo "<li>
             <a href='#'>$blog[cat_title]</a>
            </li>";
    }

}

function posts()
{
    global $conn;
    $sql = "SELECT * from posts";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataPots;
    $dataPots = $statement->fetchAll();

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