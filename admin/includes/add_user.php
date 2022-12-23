<?php
addUsers()

?>

<!-- post_category_id -->
<form enctype="multipart/form-data" action="#" method="POST">


    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="user_email" class="form-control" name="user_email" id="user_email">
        <span class="text-danger"> <?php echo isset($errUser['email']) ? $errUser['email'] : ''; ?> </span>

    </div>
    <div class="form-group">
        <label for="user_name"> User name</label>
        <input type="text" class="form-control" name="user_name" id="user_name">
        <span class="text-danger"> <?php echo isset($errUser['userName']) ? $errUser['userName'] : ''; ?> </span>
    </div>

    <div class="form-group">
        <label for="user_firstName"> First name</label>
        <input type="text" class="form-control" name="user_firstName" id="user_firstName">
        <span class="text-danger"> <?php echo isset($errUser['user_firstname']) ? $errUser['user_firstname'] : ''; ?>
        </span>
    </div>
    <div class="form-group">
        <label for="user_Lastname"> Last name</label>
        <input type="text" class="form-control" name="user_Lastname" id="user_Lastname">
        <span class="text-danger"> <?php echo isset($errUser['user_lastname']) ? $errUser['user_lastname'] : ''; ?>
        </span>
    </div>
    <div class="form-group">
        <label for="user_password"> Password</label>
        <input type="password" class="form-control" name="user_password" id="user_password">
        <span class="text-danger"> <?php echo isset($errUser['user_Password']) ? $errUser['user_Password'] : ''; ?>
        </span>
    </div>






    <div class="form-group">
        <label for="user_role">User role</label> <br>
        <select class="form-select" aria-label="Default select example" name="user_role" id="">
            <option value="subscriber">Subscriber</option>
            <option value="admin">Admin</option>
        </select>


    </div>


    <div class="form-group">
        <input type="submit" value="Submit :)" class="form-control btn btn-primary " name="create_user"
            id="create_user">
    </div>







</form>