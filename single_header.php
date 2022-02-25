<?php

	include "admin/includes/connection.php";
    session_start();

?>

<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News24.</title>

    <script>
        document.documentElement.classList.remove('no-js');
        document.documentElement.classList.add('js');
    </script>

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/customm.css">

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons8.png">
    <!-- <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"> -->
    <link rel="manifest" href="site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body id="top">


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- page wrap
    ================================================== -->
    <div id="page" class="s-pagewrap">


        <!-- # site header 
        ================================================== -->
        <header id="masthead" class="s-header">

            <div class="s-header__branding">
                <p class="site-title">
                    <a href="index.php" rel="">News24.</a>                    
                </p>
            </div>

            <div id="c_nav" class="row s-header__navigation r00">

                <nav id="c_001" class="s-header__nav-wrap r11">
    
                    <h3 class="s-header__nav-heading">Navigate to</h3>
    
                    <ul class="s-header__nav c_nav">

                    <?php 
                    $read_query = "SELECT * FROM category WHERE c_status = '0' ORDER BY c_name ASC";
                    $result2 = mysqli_query($conn,$read_query);
                    while($row = mysqli_fetch_assoc($result2)){
                        $cat_id = $row['cat_id'];
                        $c_name = $row['c_name'];
                        $c_desc = $row['c_desc'];
                        $c_status = $row['c_status'];
                        ?>
                        <li class=""><a href="archive.php?cat_id=<?php echo $cat_id;?>" title=""><?php echo $c_name; ?></a></li>
                        <?php
                    }
                    ?>
                       


                        <!-- <li class="has-children current-menu-item">
                            <a href="#0" title="" class="">Categories</a>
                            <ul class="sub-menu">
                                <li><a href="category.html">Design</a></li>
                                <li><a href="category.html">Lifestyle</a></li>
                                <li><a href="category.html">Inspiration</a></li>
                                <li><a href="category.html">Work</a></li>
                                <li><a href="category.html">Health</a></li>
                                <li><a href="category.html">Photography</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#0" title="" class="">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="single-standard.html">Standard Post</a></li>
                                <li><a href="single-video.html">Video Post</a></li>
                                <li><a href="single-audio.html">Audio Post</a></li>
                            </ul>
                        </li> -->
                        <!-- <li><a href="styles.html" title="">Styles</a></li>
                        <li><a href="about.html" title="">About</a></li>
                        <li><a href="contact.html" title="">Contact</a></li> -->
                    </ul> <!-- end s-header__nav -->

                </nav> <!-- end s-header__nav-wrap -->
    
            </div> <!-- end s-header__navigation -->

            <div class="s-header__search">

                <div class="s-header__search-inner">
                    <div class="row">
    
                        <form role="search" method="GET" class="s-header__search-form" action="search.php">
                            <label>
                                <span class="u-screen-reader-text">Search for:</span>
                                <input type="search" class="s-header__search-field" placeholder="Search for..." value="" name="q" title="Search for:" autocomplete="off">
                            </label>
                            <input type="submit" class="s-header__search-submit" value="Search"> 
                        </form>
    
                        <a href="#0" title="Close Search" class="s-header__search-close">Close</a>
    
                    </div> <!-- end row -->
                </div> <!-- s-header__search-inner -->
    
            </div> <!-- end s-header__search -->

            <div class="trigger">
            <a class="s-header__search-trigger" href="#"><i class="fa fa-search"></i></a>
                        
                        <?php 
                        if(empty($_SESSION['u_id'])){
                            ?>
                            <a class="s-header__search-trigger login" href="admin/index.php">Login</a>
                            <?php
                        }else{
                            $user_id = $_SESSION['u_id'];
                            ?>

                            <div class="comment__avatarr ml">

                           


                            <?php 

                                $user_query = "SELECT * FROM users WHERE u_id = '$user_id'";
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
                            <nav class="s-header__nav-wrap">
                                <ul class="s-header__nav">
                                <li class="has-children ">
                                <a class="s-header__search-trigger logout rr2" style="width: 50px; height: 50px;"><img src="admin/assets/images/users/default.png" width="80px">
                                </a>
                                <ul class="sub-menu mb-5">
                                    <li><a href="admin/includes/logout.php">Logout</a></li>
                                </ul>
                                </li>
                                </ul>
                            </nav>
                                   
                                    
                                    <?php
                                }else{
                                    ?>
                            <nav class="s-header__nav-wrap">
                                <ul class="s-header__nav">
                                <li class="has-children ">
                                <a class="s-header__search-trigger logout" style="width: 50px; height: 50px;">
                                <img src="admin/assets/images/users/<?php echo $u_image; ?>" > 
                                </a>
                                <ul class="sub-menu mb-5">
                                    <li><a href="admin/includes/logout.php">Logout</a></li>
                                </ul>
                                </li>
                                </ul>
                            </nav>                                    
                                    
                                    <?php
                                }
                                ?>
                              
                                
                            </div>
                            <?php
                        }
                        ?>
                    
                
                    <!-- <a class="s-header__search-trigger login" href="">Login</a> -->
            <a class="s-header__menu-toggle" href="#0"><span>Menu</span></a>
            </div>

        </header> <!-- end s-header -->