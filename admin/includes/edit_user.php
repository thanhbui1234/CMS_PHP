<?php

updateUsers();
?>


<?php
selectUpdateUsers();

?>
<form enctype="multipart/form-data" action="#" method="POST">

    <?php foreach ($dataUsers as $user) {
    ?>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="user_email" class="form-control" value="<?php echo $user['user_email'] ?>" name="user_email"
            id="user_email">
        <span class="text-danger"> <?php echo isset($errUser['email']) ? $errUser['email'] : ''; ?> </span>

    </div>
    <div class="form-group">
        <label for="user_name"> User name</label>
        <input type="text" value="<?php echo $user['user_name'] ?>" class=" form-control" name="user_name"
            id="user_name">
        <span class="text-danger"> <?php echo isset($errUser['userName']) ? $errUser['userName'] : ''; ?> </span>
    </div>

    <div class="form-group">
        <label for="user_firstName"> First name</label>
        <input type="text" value="<?php echo $user['user_firstname'] ?>" class="form-control" name="user_firstName"
            id="user_firstName">
        <span class="text-danger"> <?php echo isset($errUser['user_firstname']) ? $errUser['user_firstname'] : ''; ?>
        </span>
    </div>
    <div class="form-group">
        <label for="user_Lastname"> Last name</label>
        <input type="text" value="<?php echo $user['user_lastname'] ?>" class="form-control" name="user_Lastname"
            id="user_Lastname">
        <span class="text-danger"> <?php echo isset($errUser['user_lastname']) ? $errUser['user_lastname'] : ''; ?>
        </span>
    </div>
    <div class="form-group">
        <label for="user_password"> Password</label>
        <input type="password" value="<?php echo $user['user_password'] ?>" class="form-control" name="user_password"
            id="user_password">
        <span class="text-danger"> <?php echo isset($errUser['user_Password']) ? $errUser['user_Password'] : ''; ?>
        </span>
    </div>





    <div class="form-group">
        <label for="user_role">User role</label> <br>
        <select class="form-select" aria-label="Default select example" name="user_role" id="">
            <option value="<?php echo $user['user_role'] ?>"><?php echo $user['user_role'] ?>
            </option>

            <?php

    echo $user['user_role'] == 'admin' ? "<option value='subscriber'>subscriber</option> " : "<option value='admin'>admin</option> ";

    ?>


        </select>


    </div>
    <?php }?>


    <div class="form-group">
        <input type="submit" value="Update user" class=" btn btn-primary " name="updateUser" id="create_user">
    </div>







</form>