<?php 
include "header.php";
// include "admin/includes/function.php";
?>

<?php 
    $posts_pp       = 3;
    $current_page   = 1;
    
    $starting       = 0;
    if(isset($_GET['pageno'])){
        $current_page = $_GET['pageno'];

        if($current_page == 1){
            $starting = 0;
        }else{
            $starting = ($current_page-1) * $posts_pp;
        }
    }
?>


  <!-- # site-content
  ================================================== -->
  <section id="content" class="s-content">


      <!-- hero -->
      <?php 
      if($current_page == 1){
          ?>
          <div class="hero">

            <div class="hero__slider swiper-container">

                <div class="swiper-wrapper">

                <?php

                $post_query = "SELECT * FROM posts WHERE is_featured = '1' ORDER BY p_id DESC LIMIT 3";
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
                    <article class="hero__slide swiper-slide">
                        <div class="hero__entry-image" style="background-image: url('admin/assets/images/posts/<?php echo $p_thumbnail; ?>');"></div>
                        <div class="hero__entry-text">
                            <div class="hero__entry-text-inner">
                                <div class="hero__entry-meta">
                                    <span class="cat-links">
                                    <span href="#"><?php echo $p_date;?></span>
                                        <a href="#"> <span style="text-transform: lowercase;margin-left: 5px;">by</span>
                                        <?php 
                                        $author_name_sql = "SELECT u_name FROM users WHERE u_id='$p_author'";
                                        $result_u = mysqli_query($conn, $author_name_sql);
                                        $row = mysqli_fetch_array($result_u);
                                        $author_name = $row['u_name'];
                                        
                                        echo $author_name;
                                        ?>
                                        </a>
                                        
                                    </span>
                                </div>
                                <h2 class="hero__entry-title">
                                    <a href="single.php?post_id=<?php echo $p_id;?>">
                                    <?php echo substr($p_title, 0, 30).'...';?>
                                    </a>
                                </h2>
                                <p class="hero__entry-desc">
                                <?php echo substr($p_desc, 0, 200);?>
                                </p>
                                <a class="hero__more-link" href="single.php?post_id=<?php echo $p_id;?>">Read More</a>
                            </div>
                        </div>
                    </article>
                    <?php
                    }

                ?>
                
                </div> <!-- swiper-wrapper -->

                <div class="swiper-pagination"></div>

            </div> <!-- end hero slider -->

            <a href="#bricks" class="hero__scroll-down smoothscroll">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 12H5"></path>
                </svg>
                <span>Scroll</span>
            </a>

            </div>
          <?php
      }
      ?> 
      
      <!-- end hero -->


      <!--  masonry -->
      <div id="bricks" class="bricks">

          <div class="masonry">

              <div class="bricks-wrapper" data-animate-block>

                  <div class="grid-sizer"></div>

                  <?php 

                    $post_query2 = "SELECT * FROM posts WHERE is_featured = '0' ORDER BY p_id DESC LIMIT $starting, $posts_pp";
                    $result = mysqli_query($conn,$post_query2);
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

                        <article class="brick entry" data-animate-el>
                          
                          <div class="entry__thumb">
                              <a href="single.php?post_id=<?php echo $p_id;?>" class="thumb-link">
                                  <img src="admin/assets/images/posts/<?php echo $p_thumbnail;?>" 
                                      alt="">
                              </a>
                          </div> <!-- end entry__thumb -->

                          <div class="entry__text">
                              <div class="entry__header">
                                  <div class="entry__meta">
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
                                      <span class="byline">
                                          By:
                                          <a href="#0">
                                          <?php 
                                            $author_name_sql = "SELECT u_name FROM users WHERE u_id='$p_author'";
                                            $result_u = mysqli_query($conn, $author_name_sql);
                                            $row = mysqli_fetch_array($result_u);
                                            $author_name = $row['u_name'];
                                            
                                            echo $author_name;
                                          ?>
                                          </a>
                                      </span>
                                  </div>
                                  <h1 class="entry__title"><a href="single.php?post_id=<?php echo $p_id;?>"><?php echo substr($p_title, 0, 25).'..'?></a></h1>
                                </div>
                              <div class="entry__excerpt">
                                  <p>
                                  <?php echo substr($p_desc, 0, 200).'...';?>
                                  </p>
                              </div>
                              <a class="entry__more-link" href="single.php?post_id=<?php echo $p_id;?>">Read More</a>
                          </div> <!-- end entry__text -->

                        </article>
                        
                        <?php
                    }
                  
                  ?>

                  

              </div> <!-- end bricks-wrapper -->

          </div> <!-- end masonry-->


          <!-- pagination -->
          <div class="row pagination">
              <div class="column lg-12">
                <nav class="pgn">                      

                  <?php 
                  if($current_page == 1){
                    ?><a href="" class="pgn__prev inactive">Prev</a><?php
                  }
                  else{
                    ?>
                    <a href="index.php?pageno=<?php echo $current_page-1;?>" class="pgn__prev">Prev</a>
                    <?php
                  }
                  ?>
                  

                  <?php 
                    //   count total post
                    $post_read_query = "SELECT * FROM posts WHERE is_featured = '0'";
                    $query_res = mysqli_query($conn, $post_read_query);
                    $total_posts = mysqli_num_rows($query_res);
                    $no_of_page = ceil($total_posts/$posts_pp);
                    // echo $no_of_page;
                    for($i=1; $i<=$no_of_page; $i++){
                        // $current_page = $i;
                        ?>
                        <a href="index.php?pageno=<?php echo $i;?>" class="pgn__num <?php if($current_page == $i) echo 'current'?>"><?php echo $i; ?></a>
                        <?php
                    }

                  ?>                      
                      <!-- <a href="" class="pgn__num current">1</a>
                      <a href="" class="pgn__num ">2</a> -->
                      <?php 
                            if($current_page == $no_of_page){
                                ?><a href="" class="pgn__next inactive">Next</a><?php
                            }
                            else{
                                ?><a href="index.php?pageno=<?php echo $current_page+1;?>" class="pgn__next">Next</a><?php
                            }
                        ?>

                </nav> <!-- end pgn -->
              </div> <!-- end column -->
          </div> <!-- end pagination -->

      </div> <!-- end bricks -->

  </section> <!-- end s-content -->


<?php
include "footer.php";
?>