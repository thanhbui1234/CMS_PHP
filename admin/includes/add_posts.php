<?php
addPost()

?>

<form enctype="multipart/form-data" action="#" method="POST">

    <div class="form-group">
        <label for="post_title"> Post title</label>
        <input type="text" class="form-control" name="post_title" id="post_title">
        <span class="text-danger"> <?php echo isset($err['title']) ? $err['title'] : ''; ?> </span>
    </div>


    <div class="form-group">
        <label for="post_category_id">Post Category Id</label>
        <input type="text" class="form-control" name="post_category_id" id="post_category_id">
        <span class="text-danger"> <?php echo isset($err['post_category_id']) ? $err['post_category_id'] : ''; ?>
        </span>

    </div>


    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" id="post_author">
        <span class="text-danger"> <?php echo isset($err['post_author']) ? $err['post_author'] : ''; ?> </span>

    </div>


    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" id="post_status">
        <span class="text-danger"> <?php echo isset($err['post_status']) ? $err['post_status'] : ''; ?> </span>

    </div>


    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="" name="post_image" id="post_image">
        <span class="text-danger"> <?php echo isset($err['post_image']) ? $err['post_image'] : ''; ?> </span>

    </div>


    <div class="form-group">
        <label for="title">Post Tag</label>
        <input type="text" class="form-control" name="post_tag" id="post_tag">
        <span class="text-danger"> <?php echo isset($err['post_tag']) ? $err['post_tag'] : ''; ?> </span>

    </div>


    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea class="form-control" name="post_content" id="" post_content cols="30" rows="10"></textarea>

    </div>

    <div class="form-group">
        <input type="submit" value="Submit :)" class="form-control btn btn-primary " name="create_post"
            id="create_post">
    </div>







</form>