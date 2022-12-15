<?php selectCategories();?>
<?php foreach ($dataUpdateCategories as $category) {

    ?>
<form action="./includes/updatecate.php?id=<?php echo $category['cat_id'] ?>" method='POST'>
    <div class='form-group mt-3'>
        <label for='cat_title'>Add Category</label>
        <input type='text' value="<?php echo $category['cat_title'] ?>" class='form-control' name='cat_title'>
        <span> <?php echo isset($err['update']) ? $err['update'] : "" ?> </span>
        <div class='fomr-group'>
            <input type='submit' value='submit' name='submit' class='btn btn-primary'>
        </div>
    </div>
</form>
<?php }?>