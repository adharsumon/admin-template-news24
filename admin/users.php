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
                                                        <td>01</td>
                                                        <td>
                                                            <img src="assets/images/users/<?php echo $u_image; ?>" width="80px" >
                                                        </td>
                                                        <td><?php echo $u_name; ?></td>
                                                        <td><?php echo $u_mail; ?></td>
                                                        <td><?php echo $u_phone; ?></td>
                                                        <td><?php echo $u_address; ?></td>
                                                        <td><?php echo $u_gender; ?></td>
                                                        <td><?php 
                                                            if($user_role == 0){
                                                                echo '<span class="badge bg-success">Subscriber</span>';
                                                            }elseif($user_role == 1){
                                                                echo '<span class="badge bg-info">Editor</span>';
                                                            }elseif($user_role == 2){
                                                                echo '<span class="badge bg-danger">Admin</span>';
                                                            }
                                                         ?></td>
                                                        <td>
                                                            <?php 
                                                            if($u_status == 0){
                                                                echo '<span class="badge bg-success">Active</span>';
                                                            }
                                                            else{
                                                                echo '<span class="badge bg-danger">Active</span>';
                                                            }
                                                        
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href=""><i class="mdi mdi-grease-pencil"></i> </a>
                                                            <a href="" class="ms-2"><i class="mdi mdi-account-star"></i> </a>
                                                            <a href="" class="ms-2" data-bs-toggle="modal"
                                                                data-bs-target="#delete_id"> <i
                                                                    class="mdi mdi-delete text-danger"></i> </a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="delete_id" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <div class="modal-body text-center">
                                                                            <h2 class="mb-4">Are You Sure?</h2>
                                                                            <a href="" type="button"
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
                  <form class="forms-sample">
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

                    <button type="submit" class="btn btn-lg btn-success me-2 text-light">Submit</button>
                    <button class="btn btn-lg btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
                       
                       <?php
                    }

                    elseif($do == 'Edit'){
                        // Edit a new user
                    }

                    elseif($do == 'Update'){
                        // Update a new user
                    }

                    elseif($do == 'Delete'){
                        // Delete a new user
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