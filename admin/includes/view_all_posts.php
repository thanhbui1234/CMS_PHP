                       <table class="table table-responsive table-condensed">
                           <thead>
                               <tr>
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
                                   <td> <?php echo $value['post_id'] ?></td>
                                   <td> <?php echo $value['post_author'] ?></td>
                                   <td> <?php echo $value['post_title'] ?></td>
                                   <td> <?php echo $value['post_category_id'] ?></td>
                                   <td> <?php echo $value['post_status'] ?></td>
                                   <td><img width="50" src="/images//<?php echo $value['post_img'] ?>"
                                           alt="<?php echo $value['post_img'] ?>"></td>
                                   <td> <?php echo $value['post_tag'] ?></td>
                                   <td> <?php echo $value['post_comment_count'] ?></td>
                                   <td> <?php echo $value['post_time'] ?></td>
                                   <td> <button> <a href="posts.php?delete=<?php echo $value['post_id'] ?>">DELETE</a>
                                       </button>

                                       <button> <a
                                               href="posts.php?source=edit_posts&p_id=<?php echo $value['post_id'] ?>">UPDATE</a>
                                       </button>



                                   </td>

                               </tr>
                               <?php
}

?>

                           </tbody>
                       </table>