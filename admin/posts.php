<?php include "includes/header.php"; ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">                
                <div class="tab-content tab-content-basic">
                  <!-- Body content start here -->
                 <?php 

                    // if(isset($_GET['do'])){
                    //     $do = $_GET['do'];
                    // }else{
                    //     $do = 'Manage';
                    // }
                    $do = isset($_GET["do"]) ? $_GET["do"] : "Manage" ; // Ternary operation 

                    if($do == 'Manage'){
                        // view / read all users from database
                        // echo 'Manage';
						?>

                        <div class="row">
                        <div class="col-lg-12 d-flex flex-column">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">All Posts Information</h4>
                                        <p class="card-description">Posts info <code>.table-hover</code></p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Thumbnail</th>
                                                        <th>Title</th>
                                                        <!-- <th>Desc</th> -->
                                                        <th>Author</th>
                                                        <th>Category</th>
                                                        <th>Tags</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php 

                                                $post_query = "SELECT * FROM posts";
                                                $result = mysqli_query($conn,$post_query);
                                                $count = 0;
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $p_id       	= $row['p_id'];
                                                    $p_title     	= $row['p_title'];
                                                    $p_desc     	= $row['p_desc'];
                                                    $p_thumbnail    = $row['p_thumbnail'];
                                                    $p_author  		= $row['p_author'];
                                                    $p_cat    		= $row['p_cat'];
                                                    $p_date  		= $row['p_date'];
                                                    $p_tags   		= $row['p_tags'];
                                                    $p_status  		= $row['p_status'];
                                                    $count++;

                                                    ?>

                                                        <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $p_date; ?></td>
                                                        <td>
                                                          <?php 
                                                            if(empty($p_thumbnail)){
                                                              ?>
                                                              <img src="assets/images/posts/default.png" width="120px" style="border-radius: 8px;width:90px;height:auto">
                                                              <?php
                                                            }else{
                                                              ?>
                                                              <img src="assets/images/posts/<?php echo $p_thumbnail; ?>" width="120px" style="border-radius: 8px;width:90px;height:auto">
                                                              <?php
                                                            }
                                                          ?>
                                                            
                                                        </td>
                                                        <td><?php echo substr($p_title, 0, 20).'...'; ?></td>
                                                        <!-- <td><?php echo substr($p_desc,0,50) ?></td> -->
                                                        <td>
															<?php 
																$author_name_sql = "SELECT u_name FROM users WHERE u_id='$p_author'";
																$result_u = mysqli_query($conn, $author_name_sql);
																$row = mysqli_fetch_array($result_u);
																$author_name = $row['u_name'];
																
																echo $author_name;
															?>
														</td>
                                                        <td>
														<?php 
																$category_name_sql = "SELECT c_name FROM category WHERE cat_id='$p_cat'";
																$result_c = mysqli_query($conn, $category_name_sql);
																$row = mysqli_fetch_array($result_c);
																$category_name = $row['c_name'];
																
																echo $category_name;
															?>
														</td>
                            <td>
															<?php 
																$tags = explode(',', $p_tags);
																foreach($tags as $tag){
																	echo '<div style="background: tomato;color:white;padding:6px 12px;margin:5px;display:inline-block">'.$tag.'</div>';
																}

															?>
														</td>
                                                       
                              <td>
                                  <?php 
                                  if($p_status == 0){
                                      echo '<span class="badge bg-success" style="padding:5px !important">Active</span>';
                                  }
                                  else{
                                      echo '<span class="badge bg-danger" style="padding:5px !important">Inactive</span>';
                                  }
                              
                                  ?>
                              </td>
                              <td>
                                  <a href="posts.php?do=Edit&edit_id=<?php echo $p_id ?>"><i class="mdi mdi-grease-pencil"></i> </a>
                                  <a href="" class="ms-2"><i class="mdi mdi-account-star"></i> </a>
                                  <a href="" class="ms-2" data-bs-toggle="modal"
                                      data-bs-target="#delete_id<?php echo $p_id?>"> <i
                                          class="mdi mdi-delete text-danger"></i> </a>

                                  <!-- Modal -->
                                  <div class="modal fade" id="delete_id<?php echo $p_id?>" tabindex="-1"
                                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">

                                              <div class="modal-body text-center">
                                                  <h2 class="mb-4">Are You Sure?</h2>
                                                  <a href="posts.php?do=Delete&delete_id=<?php echo $p_id; ?>" type="button"
                                                      class="btn btn-lg btn-danger text-light">Yes</a>
                                                  <button type="button"
                                                      class="btn btn-lg btn-secondary"
                                                      data-bs-dismiss="modal">No</button>

                                              </div>
                                            </div>
                                      </div>
                                  </div>
                              </td>
                          </tr>

                          
                          <?php
                      }
                      
                      ?>
     
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       <?php

                    }

                    elseif($do == 'Add'){
                        // Add a new user
                        echo 'Add';
                    }

                    elseif($do == 'Edit'){
                        // Edit a new user
                    }

                    elseif($do == 'Update'){
                        // Update a new user
                    }

                    elseif($do == 'Delete'){
                        // Delete a new user
                          if(isset($_GET['delete_id'])){
                          $del_id = $_GET['delete_id'];

                          $table = 'posts';
                          $key = 'p_id';
                          $redirect = 'posts.php';
                          $files = 'p_thumbnail';
                          $folder_name = 'posts';
                
                            // Delete user image first 
                            delete_files($table,$key,$del_id,$files,$folder_name);
                
                            // Delete user info from database
                            delete($table,$key,$del_id,$redirect);
                        }


                    }

                 ?>
                  <!-- Body content end here -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

<?php include "includes/footer.php"; ?>