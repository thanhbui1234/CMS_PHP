<?php
updatePost();
?>

<?php
selectEditPosts();
?>

<form enctype="multipart/form-data" action="#" method="POST">
    <?php foreach ($dataPostsEdit as $value) {?>
    <div class="form-group">
        <label for="post_title"> Post title</label>
        <input type="text" value="<?php echo $value['post_title'] ?>" class="form-control" name="post_title"
            id="post_title">
    </div>



    <div class="form-group">
        <?php

    selectcategoryPost();

    ?>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category_id" id="">
            <?php foreach ($data as $key) {?>
            <option value="<?php echo $key['cat_id'] ?>"> <?php echo $key['cat_title'] ?></option>
            <?php }?>

        </select>

    </div>





    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $value['post_author'] ?>" type="text" class="form-control" name="post_author"
            id="post_author">

    </div>



    <div class="form-group">
        <label for="post_status">Post Status</label> <br>
        <select class="form-select" aria-label="Default select example" name="post_status" id="">
            <option value="publised">Publised</option>
            <option value="draf">Draf</option>
        </select>

    </div>


    <div class="form-group">
        <label for="post_image">Post Image</label> <br>
        <input type="file" name=" post_image" id="post_image"> <br>
        <img width="100" src="/images//<?php echo $value['post_img'] ?>" alt="">

    </div>






    <div class="form-group">
        <label for="title">Post Tag</label>
        <input type="text" value="<?php echo $value['post_tag'] ?>" class="form-control" name="post_tag" id="post_tag">

    </div>


    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea class="form-control" name="post_content" id="" post_content cols="30" rows="10"><?php echo $value['post_content'] ?>
        </textarea>


    </div>
    <?php }?>

    <div class="form-group">
        <input type="submit" value="Submit :)" class="form-control btn btn-primary " name="create_post"
            id="create_post">
    </div>







</form>