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
                                                    $p_thumbnail  = $row['p_thumbnail'];
                                                    $p_author  		= $row['p_author'];
                                                    $p_cat    		= $row['p_cat'];
                                                    $p_date  		  = $row['p_date'];
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
                        ?>
      <div class="row">
            <div class="col-lg-10 col-md-12 d-flex flex-column">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add New Post</h4>
                  <p class="card-description">
                    User Form
                  </p>


                  <form class="forms-sample" method="POST" enctype="multipart/form-data">

                    <div class="form-group row">
                      <label for="post_title" class="col-sm-3 col-form-label">Post Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="post_title" placeholder="Title" name="post_title">
                      </div>
                    </div>
                   
                    <div class="form-group row">
                      <label for="description" class="col-sm-3 col-form-label">Description</label>
                      <div class="col-sm-9">
                        <textarea class="custom_text w-100" name="description" rows="8" placeholder="Description"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="category" class="col-sm-3 col-form-label">Category</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="category" id="category">
                            <option selected>Select post category</option>

                            <?php
                             $read_query = "SELECT * FROM category";
                             $result = mysqli_query($conn,$read_query);
                             while($row = mysqli_fetch_assoc($result)){
                             $cat_id = $row['cat_id'];
                             $c_name = $row['c_name'];
                             $c_desc = $row['c_desc'];
                             $c_status = $row['c_status'];

                             ?>
                             <option value="<?php echo $cat_id;?>"><?php echo $c_name;?></option>
                             <?php

                             }
                            ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="tags" class="col-sm-3 col-form-label">Tags</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="tags" placeholder="Tags" name="tags">
                        <small>Separate your tags with comma(,) .</small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="image" class="col-sm-3 col-form-label">Featured Image</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" id="image" name="image">
                        <small>Please insert a png/jpg/jpeg format photo only. Less than 2mb.</small>
                      </div>
                    </div>

                    <button type="submit" name="add_post" class="btn btn-lg btn-success me-2 text-light">Publish</button>
                    <button class="btn btn-lg btn-light">Cancel</button>
                  </form>

                  <!-- Add User Code start Here -->
                  <?php 

                    if(isset($_POST['add_post'])){
                        $author_id = $_SESSION['u_id'];
                        $post_title = mysqli_real_escape_string($conn,$_POST['post_title']);
                        $description = mysqli_real_escape_string($conn,$_POST['description']);
                        $category = $_POST['category'];
                        $tags = $_POST['tags'];
                        $user_image     =$_FILES['image']['name'];
                        $file_size     =$_FILES['image']['size'];
                        $tmp_name       =$_FILES['image']['tmp_name'];                        
                        $split_name     = explode('.', $_FILES['image']['name']);
                        $extn           = end($split_name);
                        $extn           = strtolower($extn);
                        $extensions     = array('png', 'jpg', 'jpeg');

                        if(in_array($extn, $extensions) === true && $file_size < 2097152){
                         // image
                            $random = rand();
                            $updated_name = $random.'_'.$user_image;
                            move_uploaded_file($tmp_name, 'assets/images/posts/'.$updated_name);

                            $post_query = "INSERT INTO posts (p_title, p_desc, p_thumbnail, p_author, p_cat, p_date, p_tags, p_status) VALUES ('$post_title', '$description', '$updated_name', '$author_id', '$category', now(), '$tags', 0)";
                            $result7 = mysqli_query($conn, $post_query);
                                if($result7){
                                  header('Location: posts.php');
                                }else{
                                  die('Post information add error'.mysqli_error($conn));
                                }

                        }else{
                            echo '<span class="alert alert-danger">Please insert an image less than 2mb</span>';
                        }
                    }
                  
                  ?>
                  <!-- Add User Code end Here -->

                </div>
              </div>
            </div>
        </div>
                        <?php
                    }

                    elseif($do == 'Edit'){
                        // Edit a new user

                        if(isset($_GET['edit_id'])){
                          $post_id = $_GET['edit_id'];

                          $post_query = "SELECT * FROM posts WHERE p_id='$post_id'";
                          $result = mysqli_query($conn,$post_query);
                          while($row = mysqli_fetch_assoc($result)){
                              $p_title     	= $row['p_title'];
                              $p_desc     	= $row['p_desc'];
                              $p_thumbnail    = $row['p_thumbnail'];
                              $p_author  		= $row['p_author'];
                              $p_cat    		= $row['p_cat'];
                              $p_date  		= $row['p_date'];
                              $p_tags   		= $row['p_tags'];
                              $p_status  		= $row['p_status'];
                              $is_featured  		= $row['is_featured'];
                            }
                            ?>

<div class="row">
            <div class="col-lg-10 col-md-12 d-flex flex-column">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Post</h4>
                  <p class="card-description">
                    User Form
                  </p>


                  <form class="forms-sample" method="POST" action="posts.php?do=Update" enctype="multipart/form-data">

                    <div class="form-group row">
                      <label for="post_title" class="col-sm-3 col-form-label">Post Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="post_title" placeholder="Title" name="post_title" value="<?php echo $p_title; ?>">
                      </div>
                    </div>
                   
                    <div class="form-group row">
                      <label for="description" class="col-sm-3 col-form-label">Description</label>
                      <div class="col-sm-9">
                        <textarea class="custom_text w-100" name="description" rows="8" placeholder="Description" value="<?php echo $p_desc; ?>"><?php echo $p_desc; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="category" class="col-sm-3 col-form-label">Category</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="category" id="category">
                            <option selected>Select post category</option>

                            <?php
                             $read_query = "SELECT * FROM category";
                             $result = mysqli_query($conn,$read_query);
                             while($row = mysqli_fetch_assoc($result)){
                             $cat_id = $row['cat_id'];
                             $c_name = $row['c_name'];
                             $c_desc = $row['c_desc'];
                             $c_status = $row['c_status'];

                             ?>
                             <option value="<?php echo $cat_id;?>" <?php if($p_cat == $cat_id) echo 'selected'; ?>><?php echo $c_name;?></option>
                             <?php

                             }
                            ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="status" class="col-sm-3 col-form-label">Status</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="status" id="status">
                            <option selected>Select post status</option>
                            <option value="0" <?php if($p_status == 0) echo 'selected'; ?>>Active</option>
                            <option value="1" <?php if($p_status == 1) echo 'selected'; ?>>Inactive</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="featured" class="col-sm-3 col-form-label">Featured</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="featured" id="featured">
                            <option selected>Select post status</option>
                            <option value="0" <?php if($is_featured == 0) echo 'selected'; ?>>Normal</option>
                            <option value="1" <?php if($is_featured == 1) echo 'selected'; ?>>Featured</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="tags" class="col-sm-3 col-form-label">Tags</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="tags" placeholder="Tags" name="tags" value="<?php echo $p_tags; ?>">
                        <small>Separate your tags with comma(,) .</small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="image" class="col-sm-3 col-form-label">Featured Image</label>
                      <div class="col-sm-9">

                      <?php 
                      if(!empty($p_thumbnail)){
                        ?>
                        <img src="assets/images/posts/<?php echo $p_thumbnail; ?>" alt="" width="140px"> <br><br>
                        <?php
                      }
                      ?>

                        <input type="file" class="form-control" id="image" name="image">
                        <small>Please insert a png/jpg/jpeg format photo only.</small>
                      </div>
                    </div>

                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">

                    <button type="submit" name="add_post" class="btn btn-lg btn-success me-2 text-light">Update</button>
                    <button class="btn btn-lg btn-light">Cancel</button>
                  </form>

                </div>
              </div>
            </div>
        </div>

                            <?php
                        }
                    }

                    elseif($do == 'Update'){
                        // Update a new post
                      if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $edit_post_id = $_POST['post_id'];
                        $post_title = $_POST['post_title'];
                        $description = $_POST['description'];
                        $category = $_POST['category'];
                        $status = $_POST['status'];
                        $featured = $_POST['featured'];
                        $tags = $_POST['tags'];
                        $user_image     =$_FILES['image']['name'];
                        $file_size     =$_FILES['image']['size'];
                        $tmp_name       =$_FILES['image']['tmp_name']; 
                        
                        if(!empty($user_image)){
                          $split_name     = explode('.', $_FILES['image']['name']);
                          $extn           = end($split_name);
                          $extn           = strtolower($extn);
                          $extensions     = array('png', 'jpg', 'jpeg');

                          if(in_array($extn, $extensions) === true && $file_size < 2097152){
                            // Delete post image first 
                            delete_files('posts','p_id',$edit_post_id,'p_thumbnail','posts');

                            // image
                                // random number
                                $random = rand();
                                $updated_name = $random.'_'.$user_image;
                                move_uploaded_file($tmp_name, 'assets/images/posts/'.$updated_name);

                                $post_update = "UPDATE posts SET p_title='$post_title', p_desc='$description', 	p_thumbnail='$updated_name', p_cat='$category', p_tags='$tags', p_status='$status', is_featured='$featured' WHERE p_id='$edit_post_id'";
                                $result8 = mysqli_query($conn, $post_update);
                                if($result8){
                                  header('Location: posts.php');
                                }else{
                                  die('Post update error'.mysqli_error($conn));
                                }
                          }else{
                            echo '<span>Please Select An Image For Post. (png, jpg, jpeg)</span>';
                          }
                        }
                        else{
                          $post_update = "UPDATE posts SET p_title='$post_title', p_desc='$description', p_cat='$category', p_tags='$tags', p_status='$status', is_featured='$featured' WHERE p_id='$edit_post_id'";
                            $result8 = mysqli_query($conn, $post_update);
                            if($result8){
                              header('Location: posts.php');
                            }else{
                              die('Post update error'.mysqli_error($conn));
                            }
                        }
                        
                      }

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