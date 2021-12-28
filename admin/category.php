<?php include "includes/header.php"; ?>

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
                                        <form class="forms-sample">
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2"
                                                    class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputUsername2"
                                                        placeholder="Name" required="required" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="desc" class="col-sm-3 col-form-label">Description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="custom_text w-100" name="desc" id=""
                                                        rows="8" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                            <div class="cat_btn text-end">
                                                <button type="submit" class="btn btn-lg btn-success me-2 text-light">Add
                                                    New</button>
                                                <button class="btn btn-lg btn-light me-0">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
                                                    <tr>
                                                        <td>Jacob</td>
                                                        <td>Photoshop</td>
                                                        <td><label class="badge badge-danger">Pending</label></td>
                                                        <td>
                                                            <a href=""><i class="mdi mdi-grease-pencil"></i> </a>
                                                            <a href="" class="ms-2" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal"> <i
                                                                    class="mdi mdi-delete text-danger"></i> </a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <div class="modal-body text-center">
                                                                            <h2 class="mb-4">Are You Sure?</h2>
                                                                            <button type="button"
                                                                                class="btn btn-lg btn-danger text-light">Yes</button>
                                                                            <button type="button"
                                                                                class="btn btn-lg btn-secondary"
                                                                                data-bs-dismiss="modal">No</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Jacob</td>
                                                        <td>Photoshop</td>
                                                        <td><label class="badge badge-danger">Pending</label></td>
                                                        <td>
                                                            <a href=""> <i class="mdi mdi-grease-pencil"></i> </a>
                                                            <a href="" class="ms-2" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal"> <i
                                                                    class="mdi mdi-delete text-danger"></i> </a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <div class="modal-body text-center">
                                                                            <h2 class="mb-4">Are You Sure?</h2>
                                                                            <button type="button"
                                                                                class="btn btn-lg btn-danger text-light">Yes</button>
                                                                            <button type="button"
                                                                                class="btn btn-lg btn-secondary"
                                                                                data-bs-dismiss="modal">No</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Jacob</td>
                                                        <td>Photoshop</td>
                                                        <td><label class="badge badge-danger">Pending</label></td>
                                                        <td>
                                                            <a href=""> <i class="mdi mdi-grease-pencil"></i> </a>
                                                            <a href="" class="ms-2" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal"> <i
                                                                    class="mdi mdi-delete text-danger"></i> </a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <div class="modal-body text-center">
                                                                            <h2 class="mb-4">Are You Sure?</h2>
                                                                            <button type="button"
                                                                                class="btn btn-lg btn-danger text-light">Yes</button>
                                                                            <button type="button"
                                                                                class="btn btn-lg btn-secondary"
                                                                                data-bs-dismiss="modal">No</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Jacob</td>
                                                        <td>Photoshop</td>
                                                        <td><label class="badge badge-danger">Pending</label></td>
                                                        <td>
                                                            <a href=""> <i class="mdi mdi-grease-pencil"></i> </a>
                                                            <a href="" class="ms-2" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal"> <i
                                                                    class="mdi mdi-delete text-danger"></i> </a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <div class="modal-body text-center">
                                                                            <h2 class="mb-4">Are You Sure?</h2>
                                                                            <button type="button"
                                                                                class="btn btn-lg btn-danger text-light">Yes</button>
                                                                            <button type="button"
                                                                                class="btn btn-lg btn-secondary"
                                                                                data-bs-dismiss="modal">No</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

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