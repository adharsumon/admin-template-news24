<?php include "includes/header.php"; ?>

<?php
// ********************
// Create Operation
// ********************

// Read data from Html form and insert into database
  
 if(isset($_POST['add_cat'])){

    $cat_name = $_POST['cat_name'];
    $cat_desc = $_POST['cat_desc'];
    
   $create_query = "INSERT INTO category (c_name,c_desc,c_status) VALUES ('$cat_name','$cat_desc',0)";
   $result = mysqli_query($conn,$create_query);
   if($result){
       header('Location: category.php');
   }else{
       die('connection error.'.mysqli_error($conn));
   }
 }

// ********************
// Delete Operation
// ********************
if(isset($_GET['delete_id'])){
    $del_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM category where cat_id = '$del_id'";
    $result = mysqli_query($conn, $delete_query);
    if($result){
        header('Location: category.php');
    }else{
        die('delete error.'.mysqli_error($conn));
    }
}



?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                        <!-- Body content start here -->

                        <div class="row">

                            <div class="col-lg-4 d-flex flex-column">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Add new category</h4>
                                        <p class="card-description">
                                            Name should be 20 characters long
                                        </p>


                                        <form class="forms-sample" method="POST">
                                            <div class="form-group row">
                                                <label for="cat_name"
                                                    class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="cat_name" class="form-control" id="exampleInputUsername2"
                                                        placeholder="Name" required="required" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cat_desc" class="col-sm-3 col-form-label">Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="custom_text w-100" name="cat_desc" id=""
                                                        rows="8" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                            <div class="cat_btn text-end">
                                                <button type="submit" name="add_cat" class="btn btn-lg btn-success me-2 text-light">Add
                                                    New</button>
                                                <button class="btn btn-lg btn-light me-0">Cancel</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>

                                <?php 
                                    if(isset($_GET['edit_id'])){
                                        $edit_id = $_GET['edit_id'];

                                        $read_query = "SELECT * FROM category WHERE cat_id = '$edit_id'";
                                                $result = mysqli_query($conn,$read_query);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $cat_id = $row['cat_id'];
                                                    $c_name = $row['c_name'];
                                                    $c_desc = $row['c_desc'];
                                                    $c_status = $row['c_status'];
                                                }

                                        ?>
                                            <!-- Edit form start here -->
                                            <div class="card mt-5">
                                                <div class="card-body">
                                                    <h4 class="card-title">Edit category</h4>
                                                    <p class="card-description">
                                                        Name should be 20 characters long
                                                    </p>


                                                    <form class="forms-sample" method="POST">
                                                        <div class="form-group row">
                                                            <label for="edit_name"
                                                                class="col-sm-3 col-form-label">Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="edit_name" class="form-control" id="exampleInputUsername2"
                                                                    placeholder="Name" required="required" value="<?php echo $c_name ?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="edit_desc" class="col-sm-3 col-form-label">Description</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="custom_text w-100" name="edit_desc" id=""
                                                                    rows="8" placeholder="Description"><?php echo $c_desc ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="cat_status" class="col-sm-3 col-form-label">Status</label>
                                                            <div class="col-sm-9">
                                                                <select class='form-control' name="cat_status" id="">
                                                                    <option value="0" <?php if($c_status == 0) echo 'selected' ?>>Active</option>
                                                                    <option value="1" <?php if($c_status == 1) echo 'selected' ?>>Inctive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="cat_btn text-end">
                                                            <button type="submit" name="update_cat" class="btn btn-lg btn-success me-2 text-light">Update Category</button>
                                                            <button class="btn btn-lg btn-light me-0">Cancel</button>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                            <!-- Edit form end here -->
                                        <?php
                                        // ********************
// Update Operation
// ********************

if(isset($_POST['update_cat'])){
    $edit_name = $_POST['edit_name'];
    $edit_desc = $_POST['edit_desc'];
    $cat_status = $_POST['cat_status'];

    $update_query = "UPDATE category SET c_name='$edit_name', c_desc='$edit_desc', c_status='$cat_status' WHERE cat_id='$edit_id'";
    $result = mysqli_query($conn, $update_query);
    if($result){
        header('Location: category.php');
    }else{
        die('delete error.'.mysqli_error($conn));
    }
}
                                    }
                                ?>

                                
                            </div>

                            <div class="col-lg-8 d-flex flex-column">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">All Categories</h4>
                                        <p class="card-description">Category info <code>.table-hover</code></p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Category name</th>
                                                        <th>Description</th>
                                                        <th>Category status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <!-- Read category form database -->
                                                <?php
                                                $read_query = "SELECT * FROM category";
                                                $result = mysqli_query($conn,$read_query);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $cat_id = $row['cat_id'];
                                                    $c_name = $row['c_name'];
                                                    $c_desc = $row['c_desc'];
                                                    $c_status = $row['c_status'];

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $c_name; ?></td>
                                                        <td><?php echo $c_desc; ?></td>
                                                        <td>
                                                            <?php 
                                                            if($c_status == 0){
                                                                echo '<label class="badge badge-success">Active</label>';
                                                            }else{
                                                                echo '<label class="badge badge-danger">Inactive</label>';
                                                            }
                                                            ?>
                                                            
                                                        </td>
                                                        <td>
                                                            <a href="category.php?edit_id=<?php echo $cat_id;?>"><i class="mdi mdi-grease-pencil"></i> </a>
                                                            <a href="" class="ms-2" data-bs-toggle="modal"
                                                                data-bs-target="#delete_id<?php echo $cat_id; ?>"> <i
                                                                    class="mdi mdi-delete text-danger"></i> </a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="delete_id<?php echo $cat_id; ?>" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <div class="modal-body text-center">
                                                                            <h2 class="mb-4">Are You Sure?</h2>
                                                                            <a href="category.php?delete_id=<?php echo $cat_id; ?>" type="button"
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

                        <!-- Body content end here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

    <?php include "includes/footer.php"; ?>
</div>