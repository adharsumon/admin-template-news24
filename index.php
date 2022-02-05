<?php 
include "header.php";
?>


  <!-- # site-content
  ================================================== -->
  <section id="content" class="s-content">


      <!-- hero -->
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
                                  <a href="single-standard.html">
                                  <?php echo substr($p_title, 0, 30).'...';?>
                                  </a>
                              </h2>
                              <p class="hero__entry-desc">
                                <?php echo substr($p_desc, 0, 200);?>
                              </p>
                              <a class="hero__more-link" href="single-standard.html">Read More</a>
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

      </div> <!-- end hero -->


      <!--  masonry -->
      <div id="bricks" class="bricks">

          <div class="masonry">

              <div class="bricks-wrapper" data-animate-block>

                  <div class="grid-sizer"></div>

                  <?php 

                    $post_query2 = "SELECT * FROM posts WHERE is_featured = '0' ORDER BY p_id DESC";
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
                              <a href="single-standard.html" class="thumb-link">
                                  <img src="admin/assets/images/posts/<?php echo $p_thumbnail;?>" 
                                      alt="">
                              </a>
                          </div> <!-- end entry__thumb -->

                          <div class="entry__text">
                              <div class="entry__header">
                                  <div class="entry__meta">
                                      <span class="cat-links">
                                          <a href="#">
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
                                  <h1 class="entry__title"><a href="single-standard.html"><?php echo substr($p_title, 0, 25).'..'?></a></h1>
                                </div>
                              <div class="entry__excerpt">
                                  <p>
                                  <?php echo substr($p_desc, 0, 200).'...';?>
                                  </p>
                              </div>
                              <a class="entry__more-link" href="#0">Read More</a>
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
                      <ul>
                          <li>
                              <a class="pgn__prev" href="#0">
                                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 12H5"></path>
                                  </svg>
                              </a>
                          </li>
                          <li><a class="pgn__num current" href="#0">1</a></li>
                          <li><span class="pgn__num ">2</span></li>
                          <li><a class="pgn__num" href="#0">3</a></li>
                          <li><a class="pgn__num" href="#0">4</a></li>
                          <li><a class="pgn__num" href="#0">5</a></li>
                          <li><span class="pgn__num dots">…</span></li>
                          <li><a class="pgn__num" href="#0">8</a></li>
                          <li>
                              <a class="pgn__next" href="#0">
                                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.75 6.75L19.25 12L13.75 17.25"></path>
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 12H4.75"></path>
                                  </svg>
                              </a>
                          </li>
                      </ul>
                  </nav> <!-- end pgn -->
              </div> <!-- end column -->
          </div> <!-- end pagination -->

      </div> <!-- end bricks -->

  </section> <!-- end s-content -->


<?php
include "footer.php";
?>