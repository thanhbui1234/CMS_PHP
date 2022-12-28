<?php
bulk_options();
?>

<form action="" method="post">

    <table class="table table-responsive table-condensed table-bordered">

        <div id="bokOptionsContainer" class="col-xs-4 ">

            <select name="bulk_options" class="form-select form-select-sm form-control  "
                aria-label=".form-select-sm example">
                <option selected>Select options</option>
                <option value="publised">Publised</option>
                <option value="draf">Draf</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>

            </select>

        </div>

        <div class="col-xs-4 ">
            <input class="btn btn-success" value="Apply" type="submit" name="submit">
            <a href="posts.php?source=add_post" class="btn btn-primary">Add new</a>
        </div>


        <thead>
            <tr>
                <th> <input id="selectAllBoxes" type="checkbox"></th>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
            <?php showPosts()?>
            <?php
foreach ($dataPosts as $value) {
    ?>
            <tr>

                <td><input class="selectAllBoxesChild" name="checkBoxArr[]" value="<?php echo $value['post_id'] ?>"
                        type="checkbox"> </td>

                <td> <?php echo $value['post_id'] ?></td>
                <td> <?php echo $value['post_author'] ?></td>
                <td> <a href="/post.php?id=<?php echo $value['post_id'] ?>"><?php echo $value['post_title'] ?> </a></td>
                <?php
$sql = "SELECT * FROM categories where cat_id = $value[post_category_id]";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $datapots = $statement->fetchAll();
    foreach ($datapots as $post) {
        ?>
                <td> <?php echo $post['cat_title'] ?></td>
                <?php }?>



                <td> <?php echo $value['post_status'] ?></td>
                <td><img width="50" src="/images//<?php echo $value['post_img'] ?>"
                        alt="<?php echo $value['post_img'] ?>"></td>
                <td> <?php echo $value['post_tag'] ?></td>
                <td> <?php echo $value['post_comment_count'] ?></td>
                <td> <?php echo $value['post_time'] ?></td>
                <td> <button> <a href="posts.php?delete=<?php echo $value['post_id'] ?>">DELETE</a>
                    </button>

                    <button> <a href="posts.php?source=edit_posts&p_id=<?php echo $value['post_id'] ?>">UPDATE</a>
                    </button>



                </td>

            </tr>
            <?php
}

?>

        </tbody>
    </table>

</form>