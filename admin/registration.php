<?php 

include "includes/connection.php";
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form News24</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="login-assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- CSS LINK -->
   <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <!-- Main css -->
    <link rel="stylesheet" href="login-assets/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form" style="padding-left: 0 !important;">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required="required"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>

                        <?php
                            if(isset($_POST['signup'])){
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $pass = $_POST['pass'];
                                $re_pass = $_POST['re_pass'];

                                $pass_count = strlen($pass);
                                if($pass_count < 8){
                                    echo '<div class="alert alert-danger"><span>Password minimum 8 digits..</span></div>';
                                }else{
                                    if($pass != $re_pass){
                                        echo '<div class="alert alert-danger"><span>Password Not Matched</span></div>';
                                    }else{
                                        $hass_pass = sha1($pass);

                                        $reg_query = "INSERT INTO users(u_name,u_mail,u_pass,user_role,u_status) VALUES('$name', '$email', '$hass_pass', 0, 0)";
                                        $result = mysqli_query($conn, $reg_query);
                                        if($result){
                                            header('Location: index.php');
                                        }else{
                                            die('User Registration Error..'.mysqli_error($conn));
                                        }
                                    }
                                }
                            }
                            // if
                        ?>


                    </div>
                    <div class="signup-image">
                        <figure><img src="login-assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="login-assets/vendor/jquery/jquery.min.js"></script>
    <script src="login-assets/js/main.js"></script>
    <?php ob_end_flush(); ?>
</body>
</html>