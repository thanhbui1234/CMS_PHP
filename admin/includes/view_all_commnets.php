                       <table class="table table-responsive table-condensed table-bordered">
                           <thead>
                               <tr>
                                   <th>ID</th>
                                   <th>Author</th>
                                   <th>Commnet</th>
                                   <th>Email</th>
                                   <th>Status</th>
                                   <th>In response to</th>
                                   <th>Comment Date</th>
                                   <th>Approve</th>
                                   <th>Unapprove</th>
                                   <th>Delete</th>



                               </tr>
                           </thead>
                           <tbody>
                               <?php showCommnets()?>
                               <?php
foreach ($Datacommnets as $value) {
    ?>
                               <tr>
                                   <td> <?php echo $value['commnet_id'] ?></td>
                                   <td> <?php echo $value['commnet_author'] ?></td>
                                   <td> <?php echo $value['commnet_content'] ?></td>
                                   <td> <?php echo $value['commnet_email'] ?></td>
                                   <td> <?php echo $value['commnet_status'] ?></td>

                                   <?php $sql = "SELECT * FROM posts where post_id = $value[commnet_post_id] ";
    $stament = $conn->prepare($sql);
    $stament->execute();
    $responses = $stament->fetchAll();
    foreach ($responses as $response) {
        ?>
                                   <td> <a href="/post.php?id=<?php echo $value['commnet_post_id'] ?>"><?php echo $response['post_title'] ?>
                                       </a></td>
                                   <?php }?>
                                   <td> <?php echo $value['commnet_date'] ?></td>

                                   <td>Approve</td>
                                   <td>Unapprove</td>
                                   <td> <button> <a
                                               href="commnet.php?idCmt=<?php echo $value['commnet_id'] ?>">DELETE</a>
                                       </button>
                                   </td>

                               </tr>
                               <?php
}

?>



                           </tbody>
                       </table>