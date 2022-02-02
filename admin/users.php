<?php include "includes/header.php"; ?>
<style>
  thead, tbody, tfoot, tr, td, th {
    border-color: inherit;
    border-style: solid;
    border-width: 0;
    vertical-align: middle !important;
}
</style>
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
                       ?>

                        <div class="row">
                        <div class="col-lg-12 d-flex flex-column">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">All User Information</h4>
                                        <p class="card-description">Users info <code>.table-hover</code></p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>User Photo</th>
                                                        <th>User Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Gender</th>
                                                        <th>User Role</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php 

                                                $user_query = "SELECT * FROM users";
                                                $result = mysqli_query($conn,$user_query);
                                                $count = 0;
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $u_id       = $row['u_id'];
                                                    $u_name     = $row['u_name'];
                                                    $u_mail     = $row['u_mail'];
                                                    $u_pass     = $row['u_pass'];
                                                    $u_address  = $row['u_address'];
                                                    $u_phone    = $row['u_phone'];
                                                    $u_biodata  = $row['u_biodata'];
                                                    $u_gender   = $row['u_gender'];
                                                    $user_role  = $row['user_role'];
                                                    $u_status   = $row['u_status'];
                                                    $u_image    = $row['u_image'];
                                                    $count++;

                                                    ?>

                                                        <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td>
                                                          <?php 
                                                            if(empty($u_image)){
                                                              ?>
                                                              <img src="assets/images/users/default.png" width="80px">
                                                              <?php
                                                            }else{
                                                              ?>
                                                              <img src="assets/images/users/<?php echo $u_image; ?>" width="80px">
                                                              <?php
                                                            }
                                                          ?>
                                                            
                                                        </td>
                                                        <td><?php echo $u_name; ?></td>
                                                        <td><?php echo $u_mail; ?></td>
                                                        <td><?php echo $u_phone; ?></td>
                                                        <td><?php echo $u_address; ?></td>
                                                        <td><?php echo $u_gender; ?></td>
                                                        <td><?php 
                                                            if($user_role == 0){
                                                                echo '<span class="badge bg-success" style="padding:5px !important">Subscriber</span>';
                                                            }elseif($user_role == 1){
                                                                echo '<span class="badge bg-info" style="padding:5px !important">Editor</span>';
                                                            }elseif($user_role == 2){
                                                                echo '<span class="badge bg-danger" style="padding:5px !important">Admin</span>';
                                                            }
                                                         ?></td>
                                                        <td>
                                                            <?php 
                                                            if($u_status == 0){
                                                                echo '<span class="badge bg-success"style="padding:5px !important">Active</span>';
                                                            }
                                                            else{
                                                                echo '<span class="badge bg-danger"style="padding:5px !important">Inactive</span>';
                                                            }
                                                        
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="users.php?do=Edit&edit_id=<?php echo $u_id ?>"><i class="mdi mdi-grease-pencil"></i> </a>
                                                            <a href="" class="ms-2"><i class="mdi mdi-account-star"></i> </a>
                                                            <a href="" class="ms-2" data-bs-toggle="modal"
                                                                data-bs-target="#delete_id<?php echo $u_id?>"> <i
                                                                    class="mdi mdi-delete text-danger"></i> </a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="delete_id<?php echo $u_id?>" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <div class="modal-body text-center">
                                                                            <h2 class="mb-4">Are You Sure?</h2>
                                                                            <a href="users.php?do=Delete&delete_id=<?php echo $u_id; ?>" type="button"
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
                  <h4 class="card-title">Add New User</h4>
                  <p class="card-description">
                    User Form
                  </p>


                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="username" class="col-sm-3 col-form-label">User Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="useremail" class="col-sm-3 col-form-label">User Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="useremail" placeholder="Email" name="useremail">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        <span>Password should contain at least 8 letters</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" placeholder="Phone number" name="phone">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="address" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <textarea class="custom_text w-100" name="address" rows="4" placeholder="Address"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="gender" id="gender">
                            <option selected>Please select your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="biodata" class="col-sm-3 col-form-label">Biodata</label>
                      <div class="col-sm-9">
                        <textarea class="custom_text w-100" name="biodata" rows="8" placeholder="Biodata"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="user_role" class="col-sm-3 col-form-label">User Type</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="user_role" id="user_role">
                            <option selected>Please select user role</option>
                            <option value="0">Subscriber</option>
                            <option value="1">Editor</option>
                            <option value="2">Admin</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="image" class="col-sm-3 col-form-label">User Photo</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" id="image" name="image">
                        <small>Please insert a png/jpg/jpeg format photo only.</small>
                      </div>
                    </div>

                    <button type="submit" name="add_user" class="btn btn-lg btn-success me-2 text-light">Submit</button>
                    <button class="btn btn-lg btn-light">Cancel</button>
                  </form>

                  <!-- Add User Code start Here -->
                  <?php 

                  if(isset($_POST['add_user'])){
                    $username       =$_POST['username'];
                    $useremail      =$_POST['useremail'];
                    $password       =$_POST['password'];
                    $phone          =$_POST['phone'];
                    $address        =$_POST['address'];
                    $gender         =$_POST['gender'];
                    // $biodata        =$_POST['biodata'];
                    $biodata        =mysqli_real_escape_string($conn,$_POST['biodata']);
                    $user_role      =$_POST['user_role'];
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
                      move_uploaded_file($tmp_name, 'assets/images/users/'.$updated_name);
                      $hass_password = sha1($password);

                      // save the value into database
                      if(!empty($username) && !empty($useremail) && !empty($password)){
                        $add_query = "INSERT INTO users (u_name,u_mail,u_pass,u_address,u_phone,u_biodata,u_gender,user_role,u_status,	u_image) VALUES ('$username', '$useremail', '$hass_password', '$address', '$phone', '$biodata', '$gender', '$user_role', '0', '$updated_name')";
                        $result = mysqli_query($conn, $add_query);
                        if($result){
                          header('Location: users.php');
                        }else{
                          die('User information add error'.mysqli_error($conn));
                        }
                      }else{
                        echo '<span class="alert alert-danger">Please fill the all information </span>';
                      }
                     
                    }else{
                      // not image
                      echo '<span class="alert alert-danger">Please upload an image (png, jpg, jpeg)</span>';
                    }                   


                  }// if
                  
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
                          $edit_id = $_GET['edit_id'];

                          // Read all info from database first
                          $user_query = "SELECT * FROM users WHERE u_id='$edit_id'";
                          $result = mysqli_query($conn,$user_query);
                          while($row = mysqli_fetch_assoc($result)){
                          $u_id       = $row['u_id'];
                          $u_name     = $row['u_name'];
                          $u_mail     = $row['u_mail'];
                          $u_pass     = $row['u_pass'];
                          $u_address  = $row['u_address'];
                          $u_phone    = $row['u_phone'];
                          $u_biodata  = $row['u_biodata'];
                          $u_gender   = $row['u_gender'];
                          $user_role  = $row['user_role'];
                          $u_status   = $row['u_status'];
                          $u_image    = $row['u_image'];
                          }

                          // Display all the ihe now
                          ?>
          <div class="row">
            <div class="col-lg-10 col-md-12 d-flex flex-column">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit User Info</h4>
                  <p class="card-description">
                    User Form
                  </p>


                  <form class="forms-sample" action="users.php?do=Update" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="username" class="col-sm-3 col-form-label">User Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?php echo $u_name; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="useremail" class="col-sm-3 col-form-label">User Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="useremail" placeholder="Email" name="useremail" value="<?php echo $u_mail; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        <span>Password should contain at least 8 letters</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" placeholder="Phone number" name="phone" value="<?php echo $u_phone; ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="address" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <textarea class="custom_text w-100" name="address" rows="4" placeholder="Address"><?php echo $u_address; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="gender" id="gender">
                            <option selected>Please select your gender</option>
                            <option value="Male" <?php if($u_gender == 'Male') echo 'selected' ?>>Male</option>
                            <option value="Female" <?php if($u_gender == 'Female') echo 'selected' ?>>Female</option>
                            <option value="Others" <?php if($u_gender == 'Others') echo 'selected' ?>>Others</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="biodata" class="col-sm-3 col-form-label">Biodata</label>
                      <div class="col-sm-9">
                        <textarea class="custom_text w-100" name="biodata" rows="8" placeholder="Biodata"><?php echo $u_biodata; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="user_role" class="col-sm-3 col-form-label">User Type</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="user_role" id="user_role">
                            <option selected>Please select user role</option>
                            <option value="0" <?php if($user_role == 0) echo 'selected' ?>>Subscriber</option>
                            <option value="1" <?php if($user_role == 1) echo 'selected' ?>>Editor</option>
                            <option value="2" <?php if($user_role == 2) echo 'selected' ?>>Admin</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="user_role" class="col-sm-3 col-form-label">User Status</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="u_status" id="u_status">
                            <option selected>Please select user status</option>
                            <option value="0" <?php if($u_status == 0) echo 'selected' ?>>Active</option>
                            <option value="1" <?php if($u_status == 1) echo 'selected' ?>>Inactive</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="image" class="col-sm-3 col-form-label">User Photo</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" id="image" name="image">
                        <small>Please insert a png/jpg/jpeg format photo only.</small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="image" class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <div class="u_i" style="width: 140px;">
                        <img class="w-100" src="assets/images/users/<?php echo $u_image; ?>" alt="">
                        </div>
                     
                      </div>
                    </div>

                    <input type="hidden" name="user_id" value="<?php echo $u_id;?>">

                    <button type="submit" name="add_user" class="btn btn-lg btn-success me-2 text-light">Update</button>
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
                        // Update a new user

                        if($_SERVER['REQUEST_METHOD'] == 'POST'){

                          $user_id        = $_POST['user_id'];
                          $username       = $_POST['username'];
                          $useremail      = $_POST['useremail'];
                          $password       = $_POST['password'];
                          $phone          = $_POST['phone'];
                          $address        = mysqli_real_escape_string($conn,$_POST['address']);
                          $gender         = $_POST['gender'];
                          // $biodata        = $_POST['biodata'];
                          $biodata        = mysqli_real_escape_string($conn,$_POST['biodata']);
                          $user_role      = $_POST['user_role'];
                          $u_status       = $_POST['u_status'];
                          $user_image     =$_FILES['image']['name'];
                          $file_size      =$_FILES['image']['size'];
                          $tmp_name       =$_FILES['image']['tmp_name'];

                          // update both pass & img
                          if(!empty($password) && !empty($user_image)){

                            $split_name     = explode('.', $_FILES['image']['name']);
                            $extn           = end($split_name);
                            $extn           = strtolower($extn);
                            $extensions     = array('png', 'jpg', 'jpeg');
                            if(in_array($extn, $extensions) === true && $file_size < 2097152){

                              
                              // delete image first
                              $del_user = "SELECT u_image FROM users WHERE u_id='$user_id'";
                              $result = mysqli_query($conn, $del_user);
                              while($row =mysqli_fetch_assoc($result)){
                              $u_image =$row['u_image'];
                              }
                               unlink('assets/images/users/'.$u_image);

                                // image
                                // random number
                                $random = rand();
                                $updated_name = $random.'_'.$user_image;
                                move_uploaded_file($tmp_name, 'assets/images/users/'.$updated_name);
                                $hass_password = sha1($password);

                                // update query
                                $update_query = "UPDATE users SET u_name='$username', u_mail='$useremail', u_pass='$hass_password', u_address='$address', u_phone='$phone', u_biodata='$biodata', u_gender='$gender', user_role='$user_role', u_status='$u_status', u_image='$updated_name' WHERE u_id='$user_id'";
                                $result = mysqli_query($conn, $update_query);
                                if($result){
                                  header('Location: users.php');
                                }else{
                                  die('User update error'.mysqli_error($conn));
                                }


                            }else{                            
                             echo '<span>Please Select An Image For User. (png, jpg, jpeg)</span>';
                            }

                          }
                          // change only pass no img
                          elseif(!empty($password) && empty($user_image)){

                               $hass_password = sha1($password);

                                // update query
                                $update_query = "UPDATE users SET u_name='$username', u_mail='$useremail', u_pass='$hass_password', u_address='$address', u_phone='$phone', u_biodata='$biodata', u_gender='$gender', user_role='$user_role', u_status='$u_status' WHERE u_id='$user_id'";
                                $result = mysqli_query($conn, $update_query);
                                if($result){
                                  header('Location: users.php');
                                }else{
                                  die('User update error'.mysqli_error($conn));
                                }

                          }
                          // change only img no pass
                          elseif(empty($password) && !empty($user_image)){
                            $split_name     = explode('.', $_FILES['image']['name']);
                            $extn           = end($split_name);
                            $extn           = strtolower($extn);
                            $extensions     = array('png', 'jpg', 'jpeg');
                            if(in_array($extn, $extensions) === true && $file_size < 2097152){
                                                             
                              // delete image first
                              $del_user = "SELECT u_image FROM users WHERE u_id='$user_id'";
                              $result = mysqli_query($conn, $del_user);
                              while($row =mysqli_fetch_assoc($result)){
                              $u_image =$row['u_image'];
                              }
                               unlink('assets/images/users/'.$u_image);
                            
                                // image
                                // random number
                                $random = rand();
                                $updated_name = $random.'_'.$user_image;
                                move_uploaded_file($tmp_name, 'assets/images/users/'.$updated_name);
                            
                                // update query
                                $update_query = "UPDATE users SET u_name='$username', u_mail='$useremail', u_address='$address', u_phone='$phone', u_biodata='$biodata', u_gender='$gender', user_role='$user_role', u_status='$u_status', u_image='$updated_name' WHERE u_id='$user_id'";
                                $result = mysqli_query($conn, $update_query);
                                if($result){
                                  header('Location: users.php');
                                }else{
                                  die('User update error'.mysqli_error($conn));
                                }


                            }else{                            
                             echo '<span>Please Select An Image For User. (png, jpg, jpeg)</span>';
                            }
                          }
                          // no change
                          else{
                            // update query
                            $update_query = "UPDATE users SET u_name='$username', u_mail='$useremail', u_address='$address', u_phone='$phone', u_biodata='$biodata', u_gender='$gender', user_role='$user_role', u_status='$u_status' WHERE u_id='$user_id'";
                            $result = mysqli_query($conn, $update_query);
                            if($result){
                              header('Location: users.php');
                            }else{
                              die('User update error'.mysqli_error($conn));
                            }
                          }       
                          
                        } // if end

                    }

                    elseif($do == 'Delete'){
                        // Delete a new user
                        if(isset($_GET['delete_id'])){
                          $delete_id = $_GET['delete_id'];

                          // Delete user image first 
                          $del_user = "SELECT u_image FROM users WHERE u_id='$delete_id'";
                          $result = mysqli_query($conn, $del_user);
                          while($row =mysqli_fetch_assoc($result)){
                            $u_image =$row['u_image'];
                          }
                          unlink('assets/images/users/'.$u_image);

                          // Delete user info from database
                          $del_query = "DELETE FROM users where u_id='$delete_id'";
                          $del_res = mysqli_query($conn, $del_query);
                          if($del_res){
                            header('Location: users.php');
                          }else{
                            die('User delete error'.mysqli_error($conn));
                          }
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