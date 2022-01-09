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
                        echo 'Manage';
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