<?php 
    ob_start();
?>

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

<?php 
    ob_end_flush();
?>