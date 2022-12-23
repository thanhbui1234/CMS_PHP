                       <table class="table table-responsive table-condensed table-bordered">
                           <thead>
                               <tr>
                                   <th>ID</th>
                                   <th>Username</th>
                                   <th>Firstname</th>
                                   <th>Lastname</th>
                                   <th>Email</th>
                                   <th>Role</th>
                                   <th>Change Role</th>
                                   <th>Action</th>



                               </tr>
                           </thead>
                           <tbody>
                               <?php showUsers()?>
                               <?php
foreach ($dataUser as $user) {
    ?>
                               <tr>
                                   <td> <?php echo $user['user_id'] ?></td>
                                   <td> <?php echo $user['user_name'] ?></td>
                                   <td> <?php echo $user['user_firstname'] ?></td>
                                   <td> <?php echo $user['user_lastname'] ?></td>
                                   <td> <?php echo $user['user_email'] ?></td>
                                   <td> <?php echo $user['user_role'] ?></td>
                                   <td>
                                       <a href="./user.php?admin=<?php echo $user['user_id'] ?>">Admin</a>
                                       <a href="./user.php?subscriber=<?php echo $user['user_id'] ?>">Subscriber</a>
                                   </td>
                                   <td>

                                       <a href=" ./user.php?delete=<?php echo $user['user_id'] ?>">DELETE</a>
                                       <a
                                           href=" ./user.php?source=edit_user&id_user=<?php echo $user['user_id'] ?>">Update</a>


                                   </td>

                               </tr>
                               <?php
}

?>

                           </tbody>
                       </table>