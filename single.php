<?php

    include "single_header.php";

?>

<!-- # site-content
================================================== -->
<div id="content" class="s-content s-content--blog resss">

   <?php
   if(isset($_GET['post_id'])){
       $post_id = $_GET['post_id'];
       $post_id2 = $_GET['post_id'];
       $post_query3 = "SELECT * FROM posts WHERE p_id='$post_id'";
        $result = mysqli_query($conn,$post_query3);
        while($row = mysqli_fetch_assoc($result)){
            $p_title     	= $row['p_title'];
            $p_desc     	= $row['p_desc'];
            $p_thumbnail    = $row['p_thumbnail'];
            $p_author  		= $row['p_author'];
            $p_cat    		= $row['p_cat'];
            $p_date  		= $row['p_date'];
            $p_tags   		= $row['p_tags'];
            $p_status  		= $row['p_status'];
        }
    ?>
    <div class="row entry-wrap">
        
        <div class="column lg-12 f_basis_75">

            <article class="entry format-standard">

                <header class="entry__header">

                    <h1 class="entry__title">
                        <?php echo $p_title; ?>
                    </h1>

                    <div class="entry__meta">
                        <div class="entry__meta-author">
                            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="3.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.8475 19.25H17.1525C18.2944 19.25 19.174 18.2681 18.6408 17.2584C17.8563 15.7731 16.068 14 12 14C7.93201 14 6.14367 15.7731 5.35924 17.2584C4.82597 18.2681 5.70558 19.25 6.8475 19.25Z"></path>
                            </svg>
                            <?php 
                             $user_query = "SELECT * FROM users WHERE u_id='$p_author'";
                             $result5 = mysqli_query($conn,$user_query);
                             while($row = mysqli_fetch_assoc($result5)){
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
                            ?>
                            <a href="#" style="text-transform: capitalize;"><?php echo $u_name ;?></a> 
                        </div>
                        <div class="entry__meta-date">
                            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <!-- August 15, 2021  -->
                            <?php echo $p_date; ?>
                        </div>
                        <div class="entry__meta-cat">
                            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 17.25V9.75C19.25 8.64543 18.3546 7.75 17.25 7.75H4.75V17.25C4.75 18.3546 5.64543 19.25 6.75 19.25H17.25C18.3546 19.25 19.25 18.3546 19.25 17.25Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 7.5L12.5685 5.7923C12.2181 5.14977 11.5446 4.75 10.8127 4.75H6.75C5.64543 4.75 4.75 5.64543 4.75 6.75V11"></path>
                            </svg>
                                
                            <span class="cat-links">
                                <a href="archive.php?cat_id=<?php echo $p_cat;?>">
                                <?php 
                                    $category_name_sql = "SELECT c_name FROM category WHERE cat_id='$p_cat'";
                                    $result_c = mysqli_query($conn, $category_name_sql);
                                    $row = mysqli_fetch_array($result_c);
                                    $category_name = $row['c_name'];
                                                                        
                                    echo $category_name;
                                   
                                ?>
                                </a>
                            </span>
                        </div>
                    </div>
                </header>

                <div class="entry__media">
                    <figure class="featured-image">
                        <img src="admin/assets/images/posts/<?php echo $p_thumbnail; ?>" 
                             alt="">
                    </figure>
                </div>

                <div class="content-primary">

                    <div class="entry__content">
                        <p class="lead">
                        <?php echo $p_desc; ?>
                        </p> 
            
                        <p class="entry__tags">
                            <strong>Tags:</strong>
        
                            <span class="entry__tag-list">
                            <?php 
                                $tags = explode(',', $p_tags);
                                foreach($tags as $tag){
                                    echo '<a href="#0">'.$tag.'</a>';
                                }

                            ?>
                            </span>
            
                        </p>

                        <div class="entry__author-box">
                            <?php 
                             $user_query = "SELECT * FROM users WHERE u_id='$p_author'";
                             $result5 = mysqli_query($conn,$user_query);
                             while($row = mysqli_fetch_assoc($result5)){
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
                            ?>
                            <figure class="entry__author-avatar">

                            <?php 
                              if(empty($u_image)){
                                ?>
                                <img src="admin/assets/images/users/default.png" width="80px">
                                <?php
                              }else{
                                ?>
                                <img src="admin/assets/images/users/<?php echo $u_image; ?>" width="80px">
                                <?php
                              }
                            ?>
                                
                                
                            </figure>
                            <div class="entry__author-info">
                                <h5 class="entry__author-name">
                                    <a href="#0" style="text-transform: capitalize;">
                                        <?php echo $u_name ;?> 
                                    </a>
                                </h5>
                                <p>
                                <?php echo $u_biodata ;?> 
                                </p>
                                <a class="u_profile" href="">View Profile</a>
                            </div>
                        </div>

                    </div> <!-- end entry-content -->

                </div> <!-- end content-primary -->

            </article> <!-- end entry -->

            <!-- comments -->
            <div class="comments-wrap">

                <div id="comments">
                    <div class="large-12">

                    

                        <?php 
								$cmnt_query2 = "SELECT * FROM comments WHERE post_id='$post_id2'";
								$res2 = mysqli_query($conn, $cmnt_query2);
								$total_cmnts = mysqli_num_rows($res2);

                                echo '<h3>'.$total_cmnts.' Comments</h3>';
                                echo '<ol class="commentlist">';

								while($row = mysqli_fetch_assoc($res2)){
                                    $cmnt_id 		= $row['cmnt_id'];
                                    $cmnt_author 	= $row['cmnt_author'];
                                    $post_id 		= $row['post_id'];
                                    $cmnt_date 		= $row['cmnt_date'];
                                    $cmnt_details 	= $row['cmnt_details'];

                                    ?>
                                    <li class="depth-1 comment">

                                        <div class="comment__avatar">
                                        <?php 

                                            $user_query = "SELECT * FROM users WHERE u_id = '$cmnt_author'";
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

                                                ?>
                                                
                                                <?php
                                                 }
                                                 
                                                 
                                            ?>

                                            <?php 
                                            if(empty($u_image)){
                                                ?>
                                                <img src="admin/assets/images/users/default.png" width="80px">
                                                <?php
                                            }else{
                                                ?>
                                                <img src="admin/assets/images/users/<?php echo $u_image; ?>" width="80px">
                                                <?php
                                            }
                                            ?>
                                            
                                        </div>

                                        <div class="comment__content">

                                            <div class="comment__info">
                                                <?php 
                                                	$author_name_sql = "SELECT u_name FROM users WHERE u_id='$cmnt_author'";
                                                    $result_u = mysqli_query($conn, $author_name_sql);
                                                    $row = mysqli_fetch_array($result_u);
                                                    $author_name = $row['u_name'];
                                                    ?>
                                                    <div class="comment__author" style="text-transform: capitalize;"><?php echo $author_name;?></div>
                                                    <?php
                                                ?>
                                                

                                                <div class="comment__meta">
                                                    <div class="comment__time"><?php echo $cmnt_date; ?></div>
                                                    <div class="comment__reply">
                                                        <a class="comment-reply-link" href="#0">Reply</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="comment__text">
                                            <p><?php echo $cmnt_details;?></p>
                                            </div>

                                        </div>

                                        </li> 
                                    <?php
                                }
							?>
                        </ol>
                        <!-- END commentlist -->

                    </div> <!-- end col-full -->
                </div> <!-- end comments -->


               

<!-- ============================================= -->
                <div class="comment-respond">

                    <?Php 
                        $current_user = $_SESSION['u_id'];
                        if(empty($current_user)){
                            echo '<h5 style="display: inline-block;text-transform: capitalize;">please login to submit a comment.</h5>  <a href="admin/index.php">Login</a>';
                        }else{
                            ?>
                                <div id="respond">

                                    <h3>
                                    Add Comment 
                                    <span>Your email address will not be published.</span>
                                    </h3>

                                    <form name="contactForm" id="contactForm" method="POST" autocomplete="off">
                                        <fieldset class="row">                            

                                            <div class="column lg-12 message form-field">
                                                <textarea name="cMessage" id="cMessage" class="u-fullwidth" placeholder="Your Message"></textarea>
                                            </div>

                                            <div class="column lg-12">
                                                <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large u-fullwidth" value="Add Comment" type="submit">
                                            </div>

                                        </fieldset>
                                    </form> <!-- end form -->

                                    <?php
                                        if(isset($_POST['submit'])){
                                        $cMessage = mysqli_real_escape_string($conn,$_POST['cMessage']);

                                        $comts_query = "INSERT INTO comments (cmnt_author, post_id, cmnt_date, cmnt_details) VALUES ('$current_user', '$post_id', now(), '$cMessage')";
                                        $result_cmnt = mysqli_query($conn, $comts_query);
                                        if($result_cmnt){
                                            echo '<script>window.location="single.php?post_id='.$post_id.'"</script>';
                                            
                                        }else{
                                            die('Comment Insert Error!'.mysqli_error($conn));
                                        }

                                        }
                                    ?>

                                    </div>
                            <?php
                        }
                    ?>                    

                </div> 

<!-- ============================================= -->





            </div> <!-- end comments-wrap -->

        </div>

        <div class="sidebar_wrap f_basis_25">
            <?php
            include "sidebar.php";
            ?>
        </div>
    </div>
<?php
   }else{
    ?>
    <div class="row">
        <div class="alert">
            <span>NO Post Found!</span>
            <a href="index.php">Go To HomePage!</a>
        </div>
    </div>
    <?php
   }
   ?>


</section> <!-- end s-content -->


<?php
include "footer.php";
?>