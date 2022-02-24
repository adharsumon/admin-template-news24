<?php include "includes/header.php"; ?>

<?php 
if(isset($_GET['delete_id'])){
	$del_id = $_GET['delete_id'];

	$table = 'comments';
	$key = 'cmnt_id';
	$redirect = 'comments.php';

	  // Delete user info from database
	  delete($table,$key,$del_id,$redirect);
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
						<div class="col-lg-12 d-flex flex-column">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">All User Information</h4>
										<p class="card-description">Users info <code>.table-hover</code></p>
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Comments</th>
														<th>Post</th>
														<th>Author</th>
														<th>Date</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
						
		
												<?php 
							$comnts_query = "SELECT * FROM comments";
							$cmnts_result = mysqli_query($conn, $comnts_query);
							while($row = mysqli_fetch_assoc($cmnts_result)){
								$cmnt_id = $row['cmnt_id'];
								$cmnt_author = $row['cmnt_author'];
								$post_id = $row['post_id'];
								$cmnt_date = $row['cmnt_date'];
								$cmnt_details = $row['cmnt_details'];

								?>
								<tr>
									<td><?php echo substr($cmnt_details, 0, 40).'..' ; ?></td>
									<td>
									<?php 
										$author_name_sql = "SELECT p_title FROM posts WHERE p_id='$post_id'";
										$result_u = mysqli_query($conn, $author_name_sql);
										$row = mysqli_fetch_array($result_u);
										$p_title = $row['p_title'];
										
										echo $p_title;
									?>
									</td>
									<td>
									<?php 
										$author_name_sql = "SELECT u_name FROM users WHERE u_id='$cmnt_author'";
										$result_u = mysqli_query($conn, $author_name_sql);
										$row = mysqli_fetch_array($result_u);
										$author_name = $row['u_name'];
										
										echo $author_name;
									?>
									</td>
									<td><?php echo $cmnt_date; ?></td>
									<td>
										<a href="" class="ms-2" data-bs-toggle="modal"
											data-bs-target="#delete_id<?php echo $cmnt_id?>"> <i
												class="mdi mdi-delete text-danger"></i> 
										</a>

										<!-- Modal -->
										<div class="modal fade" id="delete_id<?php echo $cmnt_id?>" tabindex="-1"
											aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">

													<div class="modal-body text-center">
														<h2 class="mb-4">Are You Sure?</h2>
														<a href="comments.php?delete_id=<?php echo $cmnt_id?>" type="button"
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