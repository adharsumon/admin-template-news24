<?php 
 include "admin/includes/function.php";
?>
<aside>
	<!-- recent post -->
	<div class="recent_post">
		<div class="roww r_post_wrap d-flex card ree">
			<h2 class="c_title">Recent Post</h2>

			<?php
				$post_query = "SELECT * FROM posts ORDER BY p_id DESC LIMIT 4";
				$result = mysqli_query($conn,$post_query);
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

					?>
					<div class="ww">
						<div class="coll_left">
							<img src="admin/assets/images/posts/<?php echo $p_thumbnail; ?>" style="width: 80px; height: 80px;" alt="">
						</div>
						<div class="coll_right">
							<a class="s_p_title" href="single.php?post_id=<?php echo $p_id;?>" class="sing_title"><?php echo substr($p_title, 0, 30).'..'; ?></a>
							<a class="ii1" href=""> <i class="fa fa-book"></i>
							<?php 
								$category_name_sql = "SELECT c_name FROM category WHERE cat_id='$p_cat'";
								$result_c = mysqli_query($conn, $category_name_sql);
								$row = mysqli_fetch_array($result_c);
								$category_name = $row['c_name'];
								
								echo $category_name;
							?>
							</a>
							<a class="ii2" href=""><i class="fa fa-comments-o"></i>
							<?php 
								$cmnt_query2 = "SELECT * FROM comments WHERE post_id=$p_id";
								$res2 = mysqli_query($conn, $cmnt_query2);
								$total_cmnts = mysqli_num_rows($res2);

								if($total_cmnts != 0){
									echo $total_cmnts;
								}else{
									echo 'No Comments!';
								}
							?>
							</a>
						</div>
					</div>
					<?php
				}
			?>

			</div>
	</div>

	<!-- recent comment -->
	<div class="recent_post comment">
		<div class="roww r_post_wrap d-flex card ree">
			<h2 class="c_title">Recent Comments</h2>

			

			<?php 
			$cmnt_query = "SELECT * FROM comments ORDER BY cmnt_id DESC LIMIT 4";
			$res = mysqli_query($conn, $cmnt_query);
			while($row = mysqli_fetch_assoc($res)){
				$cmnt_id 		= $row['cmnt_id'];
				$cmnt_author 	= $row['cmnt_author'];
				$post_id 		= $row['post_id'];
				$cmnt_date 		= $row['cmnt_date'];
				$cmnt_details 	= $row['cmnt_details'];

				?>
						<div class="ww">
							<div class="coll_left">

							<?php 
								$img_name = find_img('p_thumbnail', 'posts', 'p_id', $post_id);
								// echo $img_name;
							?>
								
								<img src="admin/assets/images/posts/<?php echo $img_name; ?>" style="width: 80px; height: 80px;">
								<!-- <img src="images/sample-image.jpg"> -->
							</div>
							<div class="coll_right">
								<a class="s_p_title" href="single.php?post_id=<?php echo $post_id;?>">
									<?php

									if(strlen($cmnt_details) > 30){
										echo substr($cmnt_details, 0, 30).'..';
									}else{
										echo $cmnt_details;
									}

									?>
								</a>
								<a class="ii2" href=""><i class="fa fa-clock-o"></i><?php echo $cmnt_date ; ?></a>
							</div>
						</div>
				<?php
			}
			?>

		

		</div>
	</div>

		<!-- categoty -->
	<div class="recent_post comment">
		<div class="roww r_post_wrap d-flex card">
			<h2 class="c_title">Categories</h2>

			<?php 

				$read_query = "SELECT * FROM category";
				$result = mysqli_query($conn,$read_query);
				while($row = mysqli_fetch_assoc($result)){
					$cat_id = $row['cat_id'];
					$c_name = $row['c_name'];
					$c_desc = $row['c_desc'];
					$c_status = $row['c_status'];

					// read no of post for a specific category
					$no_of_post = "SELECT * FROM posts WHERE p_cat='$cat_id'";
					$result4 = mysqli_query($conn,$no_of_post);
					$count_posts = mysqli_num_rows($result4);

					?>
					<div class="ww">
						<div class="coll_left cate">
						<a href="archive.php?cat_id=<?php echo $cat_id;?>"><?php echo $c_name; ?></a>
						</div>
						<div class="coll_right catt">
							<span>(<?php echo $count_posts; ?>)</span>
						</div>
					</div>
					<?php
				}
			
			?>			

		</div>
	</div>
	
</aside>