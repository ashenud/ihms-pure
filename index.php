<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>

    <!--favicons-->
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">

    <!--fonts and icons-->        
    <link rel="stylesheet" href="./assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="./assets/css/unicode-fonts.css">
    <link rel="stylesheet" href="./assets/css/english-fonts.css">
    <link rel="stylesheet" href="./assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="./assets/css/material-icons.css">

    <!--css files-->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
    <link rel="stylesheet" href="./assets/css/now-ui-kit.css?v=1.3.0">
    
    <link rel="stylesheet" href="./assets/css/index-style.css">

    <title>Infant Health Management System</title>

</head>

<body class="index-page sidebar-collapse">
    
    <!--navbar-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="#" rel="tooltip" data-placement="bottom">
                    <img src="assets/img/icon.png">
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar top-bar"></span>
                    <span class="navbar-toggler-bar middle-bar"></span>
                    <span class="navbar-toggler-bar bottom-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">
                            <i class="now-ui-icons travel_info"></i>
                            <p>අප ගැන</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#our-services">
                            <i class="now-ui-icons ui-1_settings-gear-63"></i>
                            <p>අපගේ සේවාවන්</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#our-facilities">
                            <i class="now-ui-icons objects_diamond"></i>
                            <p>අප සපයන පහසුකම්</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">
                            <i class="now-ui-icons business_badge"></i>
                            <p>අපව සම්බන්ද කරගන්න</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php 
                        if(isset($_SESSION['mother_id'])) {                            
                        ?>  
                        
                        <button type="button" class="nav-link btn btn-neutral btn-round" onclick="window.location.href ='./pages/baby/baby-select.php';">
					        <i class="now-ui-icons users_circle-08 lgn-icn login-icon"></i> <p>දත්ත පුවරුව</p>
				        </button>
                       
                        <?php
                        }
                        else if(isset($_SESSION['midwife_id'])) {
                        ?>  
                        
                        <button type="button" class="nav-link btn btn-neutral btn-round" onclick="window.location.href ='./pages/midwife/mid-dashboard.php';">
					        <i class="now-ui-icons users_circle-08 lgn-icn login-icon"></i> <p>දත්ත පුවරුව</p>
				        </button>
                       
                        <?php
                        }
                        else if(isset($_SESSION['sister_id'])) {
                        ?>
                        
                        <button type="button" class="nav-link btn btn-neutral btn-round" onclick="window.location.href ='./pages/sister/sis-dashboard.php';">
					        <i class="now-ui-icons users_circle-08 lgn-icn login-icon"></i> <p>දත්ත පුවරුව</p>
				        </button>
                      
                        <?php
                        }
                        else if(isset($_SESSION['doctor_id'])) {
                        ?>
                        
                        <button type="button" class="nav-link btn btn-neutral btn-round" onclick="window.location.href ='./pages/doctor/doc-dashboard.php';">
					        <i class="now-ui-icons users_circle-08 lgn-icn login-icon"></i> <p>දත්ත පුවරුව</p>
				        </button>
                      
                        <?php
                        }
                        else {
                        ?>
                            
                        <button type="button" class="nav-link btn btn-neutral btn-round" data-toggle="modal" data-target="#userlogin">
					        <i class="now-ui-icons users_circle-08 lgn-icn login-icon"></i> <p>පිවිසෙන්න</p>
				        </button>  
                            
                        <?php
                        }
                        ?>
                       
                        
                    </li>                    
                    <?php 
                    foreach ($_SESSION as $key=>$val);
                    if(isset($val)) {
                    ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="නික්මෙන්න" data-placement="bottom" href="./php/logout.php">
                            <i class="material-icons sign-out-icon">settings_power</i>
                            <p class="d-lg-none d-xl-none">නික්මෙන්න</p>
                        </a>
                    </li>
                    
                    <?php
                        }
                    ?>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!--end navbar-->
    
    <!--login model-->
    <div class="modal fade" id="userlogin" tabindex="-1" role="dialog" aria-labelledby="examplemodellable1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="wrap-login">
                    <form action="php/login.php" method="POST"  class="login-form validate-form">

                        <img class="login-form-logo" src="./assets/img/icon-login.png" alt="">
                        <span class="login-form-title">
                            පිවිසීම
                        </span>

                        <div class="wrap-input">
                            <input class="input" type="text" name="user_id" placeholder="පරිශීලක නම" required>
                            <span class="focus-input" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input">
                            <input class="input" type="password" id="pwd" name="password" placeholder="මුරපදය" required>
                            <span class="focus-input" data-placeholder="&#xf191;"></span>
                            <span toggle="#pwd" class="far fa-fw fa-eye password-icon"></span>
                        </div>

                        <!--
                        <div class="contact-form-checkbox">
                            <input class="input-checkbox" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox" for="ckb1">
                                Remember me
                            </label>
                        </div>
                        -->

                        <div class="container-login-form-btn">
                            <button type="submit" name="submit" class="login-form-btn text-uppercase">
                                පිවිසෙන්න
                            </button>
                        </div>
                        
                        <div class="froget-password text-center mt-1">
                            <a href="./froget-password/froget-password.php"> මුරපදය අමතකද? </a>
                        </div>

                        <div class="text-center">
                            <p class="reg">
                                ලියාපදිංචි වීමට ඔබ ප්‍රදේශයට අයත් සෞඛ්‍ය වෛද්‍ය නිලධාරී කාර්යාලය කාර්යාලයට පිවිසෙන්න!
                            </p>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    <!--end login model-->
 
    <!--wrapper (header) -->
    <div class="wrapper">

        <!--header with carousel-->
        <div class="header">
           
            <div class="carousel slide carousel-fade" data-ride="carousel" id="cng">
                <ol class="carousel-indicators">
                    <li data-target="#cng" data-slide-to="0" class="d-none d-md-inline"></li>
                    <li data-target="#cng" data-slide-to="1" class="d-none d-md-inline"></li>
                    <li data-target="#cng" data-slide-to="2" class="d-none d-md-inline"></li>
                    <li data-target="#cng" data-slide-to="3" class="d-none d-md-inline"></li>
                    <li data-target="#cng" data-slide-to="4" class="d-none d-md-inline"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./assets/img/c_carousel1.jpg" class="d-block w-100">

                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="animated bounceInLeft" style="animation-delay:1s">Welcome to Baby Care System</h2>
                            <p class="animated bounceInRight" style="animation-delay:2s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/c_carousel2.jpg" class="d-block w-100">

                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="animated bounceInLeft" style="animation-delay:1s">Welcome to Baby Care System</h2>
                            <p class="animated bounceInRight" style="animation-delay:2s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/c_carousel3.jpg" class="d-block w-100">

                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="animated bounceInLeft" style="animation-delay:1s">Welcome to Baby Care System</h2>
                            <p class="animated bounceInRight" style="animation-delay:2s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/c_carousel4.jpg" class="d-block w-100">

                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="animated bounceInLeft" style="animation-delay:1s">Welcome to Baby Care System</h2>
                            <p class="animated bounceInRight" style="animation-delay:2s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/c_carousel5.jpg" class="d-block w-100">

                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="animated bounceInLeft" style="animation-delay:1s">Welcome to Baby Care System</h2>
                            <p class="animated bounceInRight" style="animation-delay:2s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <a href="#cng" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>

                <a href="#cng" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            
            <div class="container hero-section">
                <div class="jumbotron  wow fadeInUp">
                    <h1>ළමා සෞඛ්‍ය කළමනාකරණ පද්ධතිය</h1>
                    <p class="lead">ඔබගේ දරුවා නීරෝගීව තබා ගැනීමට උපකාරී වීම අපගේ ඒකායන අභිමතාර්ථයයි.</p>
                    <hr class="my-2">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <p class="lead">
                        <a class="btn btn-info btn-lg" href="#" role="button">Learn more</a>
                    </p>
                </div>
            </div>
             
            <!-- alert section -->  
            <div class="alert-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <?php include('./assets/inc/alert-pass-error.php'); ?>
                            <?php include('./assets/inc/alert-logout.php'); ?>
                            <?php include('./assets/inc/alert-pass-changed.php'); ?>
                            <?php include('./assets/inc/alert-mail-success.php'); ?>
                            <?php include('./assets/inc/alert-no-permission.php'); ?>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>  
            </div>
            <!-- end of alert section -->
                
        </div>
        <!--end header and carousel-->

    </div>
    <!--end wrapper-->
    
    <!--content-->
    <div class="content">

        <!-- about -->
        <div class="container about" id="about">
            <div class="row mt-5 row-about">
                <div class="col-md-3 text-center wow fadeInLeft">
                    <img src="./assets/img/index/about.png" class="about-pic">
                </div>
                <div class="about-system col-md-9 colum-about wow fadeInRight">
                    <h1 class="text-uppercase mb-3">about the system</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores temporibus, recusandae nesciunt et laborum, dolorum? Tempora iste repudiandae dolore libero! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci iusto numquam architecto. Pariatur aut, voluptatum voluptas veniam, architecto, nobis hic libero harum provident mollitia beatae cupiditate rem rerum ipsum ex. Repudiandae tenetur aut nihil obcaecati nobis magni accusamus </p>
                </div> <!--about system-->
            </div>
            <div class="row mt-5">
                <div class="about-objective col-md-7 wow fadeInLeft">
                    <h3 class="text-uppercase mb-3">General Objective</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores temporibus, recusandae nesciunt et laborum, dolorum? Tempora iste repudiandae dolore libero! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci iusto numquam architecto. Pariatur aut, voluptatum voluptas veniam, architecto, nobis hic libero harum provident mollitia beatae cupiditate rem rerum ipsum ex. Repudiandae tenetur aut nihil obcaecati nobis magni accusamus </p>
                </div>
                <div class="col-md-5 text-center wow fadeInRight">
                    <img src="./assets/img/index/objective.png" class="object-pic">
                </div> <!--about system-->
            </div>
        </div>
        <!--end of about-->
       
        <!--our service-->
        <div class="container our-services mt-5" id="our-services">
           
            <h1 class="text-center text-uppercase mb-3">our Offerd Services</h1>
            <p class="text-center mt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
            Lorem ipsum dolor sit amet, consectetur adipisicing s orem ipsum.</p>
            
            <div class="service-cards">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-center wow zoomIn">
                            <div class="service-icon">
                                <span class="icon">
                                    <i class="fas fa-baby" aria-hidden="true"></i>
                                </span>
                                <div class="card-body">
                                    <h4 class="card-title text-uppercase">service one</h4>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center wow zoomIn">
                            <div class="service-icon">
                                <span class="icon">
                                    <i class="fas fa-baby-carriage" aria-hidden="true"></i>
                                </span>
                                <div class="card-body">
                                    <h4 class="card-title text-uppercase">service two</h4>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center wow zoomIn">
                            <div class="service-icon">
                                <span class="icon">
                                    <i class="fas fa-user-nurse" aria-hidden="true"></i>
                                </span>
                                <div class="card-body">
                                    <h4 class="card-title text-uppercase">service three</h4>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center wow zoomIn">
                            <div class="service-icon">
                                <span class="icon">
                                    <i class="fas fa-notes-medical" aria-hidden="true"></i>
                                </span>
                                <div class="card-body">
                                    <h4 class="card-title text-uppercase">service four</h4>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            
            
        </div>
        <!--end of our service-->
        
        <!-- our facilities -->
        <div class="container our-facilities mt-5" id="our-facilities">
           
            <h1 class="text-center text-uppercase mb-3">our offerd facilities</h1>
            <p class="text-center mt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
            Lorem ipsum dolor sit amet, consectetur adipisicing s orem ipsum.</p>
            
            <div class="facilities mb-5">
                <div class="row">
                    <div class="col-md-1  wow fadeInLeft"></div>
                    <div class="c1 col-md-5 mt-4 text-center  wow fadeInLeft">
                        <span class="facility-icon">
                                <i class="fas fa-baby" aria-hidden="true"></i>
                        </span>
                        <div class="facility-body text-justify mx-4">
                            <h6 class="facility-title text-uppercase mt-0 mb-0">Managing users</h6>
                            <p class="facility-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                    <div class="c2 col-md-5 mt-4 wow fadeInRight">
                        <span class="facility-icon">
                                <i class="fas fa-baby" aria-hidden="true"></i>
                        </span>
                        <div class="facility-body text-justify mx-4">
                            <h6 class="facility-title text-uppercase mt-0 mb-0">Managing users</h6>
                            <p class="facility-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                    <div class="col-md-1 wow fadeInRight"></div>
                </div>
                <div class="row">
                    <div class="col-md-1 wow fadeInLeft"></div>
                    <div class="c1 col-md-5 mt-4 text-center wow fadeInLeft">
                        <span class="facility-icon">
                                <i class="fas fa-baby" aria-hidden="true"></i>
                        </span>
                        <div class="facility-body text-justify mx-4">
                            <h6 class="facility-title text-uppercase mt-0 mb-0">Managing users</h6>
                            <p class="facility-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                    <div class="c2 col-md-5 mt-4 wow fadeInRight">
                        <span class="facility-icon">
                                <i class="fas fa-baby" aria-hidden="true"></i>
                        </span>
                        <div class="facility-body text-justify mx-4">
                            <h6 class="facility-title text-uppercase mt-0 mb-0">Managing users</h6>
                            <p class="facility-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                    <div class="col-md-1 wow fadeInRight"></div>
                </div>
                <div class="row">
                    <div class="col-md-1 wow fadeInLeft"></div>
                    <div class="c1 col-md-5 mt-4 text-center wow fadeInLeft">
                        <span class="facility-icon">
                                <i class="fas fa-baby" aria-hidden="true"></i>
                        </span>
                        <div class="facility-body text-justify mx-4">
                            <h6 class="facility-title text-uppercase mt-0 mb-0">Managing users</h6>
                            <p class="facility-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                    <div class="c2 col-md-5 mt-4 wow fadeInRight">
                        <span class="facility-icon">
                                <i class="fas fa-baby" aria-hidden="true"></i>
                        </span>
                        <div class="facility-body text-justify mx-4">
                            <h6 class="facility-title text-uppercase mt-0 mb-0">Managing users</h6>
                            <p class="facility-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                    <div class="col-md-1 wow fadeInRight"></div>
                </div>
                <div class="row">
                    <div class="col-md-1 wow fadeInLeft"></div>
                    <div class="c1 col-md-5 mt-4 text-center wow fadeInLeft">
                        <span class="facility-icon">
                                <i class="fas fa-baby" aria-hidden="true"></i>
                        </span>
                        <div class="facility-body text-justify mx-4">
                            <h6 class="facility-title text-uppercase mt-0 mb-0">Managing users</h6>
                            <p class="facility-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                    <div class="c2 col-md-5 mt-4 wow fadeInRight">
                        <span class="facility-icon">
                                <i class="fas fa-baby" aria-hidden="true"></i>
                        </span>
                        <div class="facility-body text-justify mx-4">
                            <h6 class="facility-title text-uppercase mt-0 mb-0">Managing users</h6>
                            <p class="facility-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                    <div class="col-md-1 wow fadeInRight"></div>
                </div>
                <div class="row">
                    <div class="col-md-1 wow fadeInLeft"></div>
                    <div class="c1 col-md-5 mt-4 text-center wow fadeInLeft">
                        <span class="facility-icon">
                                <i class="fas fa-baby" aria-hidden="true"></i>
                        </span>
                        <div class="facility-body text-justify mx-4">
                            <h6 class="facility-title text-uppercase mt-0 mb-0">Managing users</h6>
                            <p class="facility-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                    <div class="c2 col-md-5 mt-4 wow fadeInRight">
                        <span class="facility-icon">
                                <i class="fas fa-baby" aria-hidden="true"></i>
                        </span>
                        <div class="facility-body text-justify mx-4">
                            <h6 class="facility-title text-uppercase mt-0 mb-0">Managing users</h6>
                            <p class="facility-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                    <div class="col-md-1 wow fadeInRight"></div>
                </div>
             </div>
            
            
        </div>
        <!--end if our facilities-->
        
        <!--contact-->
        <div class="contact-us pb-5" id="contact">
            <h1 class="text-center text-uppercase">Contact us</h1>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing s orem ipsum.</p>
            
            <div class="container contact text-center">
                <div class="row">
                    <div class="col-md-4">
                        <i class="fas fa-phone"></i>
                        <p>+94 37 224 9278</p>
                    </div>
                    <div class="col-md-4">
                        <i class="fas fa-envelope"></i>
                        <p>ihms@gmai.com</p>
                    </div>
                    <div class="col-md-4">
                        <i class="fas fa-home"></i>
                        <p class="address">Medical Officer of Health <br> (MOH) Office - Narammala</p>
                    </div>
                </div> <!--Contac info-->
                
                <button type="button" class="btn btn-primary"><i class="fa fa-download"></i>Document</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-rocket"></i>Hire US</button>
            </div>            
        </div>
        <!--end of contact-->
        
        <!--footer-->
        <div class="footer text-center mt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <img src="./assets/img/icon-black.png" class="footer-logo">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi esse nostrum rem obcaecati neque doloribus </p>
                    </div>
                    <div class="col-md-3">
                        <h4>Features</h4>
                        <p>Deals and Offers</p>
                        <p>Customer Reviews</p>
                        <p>Canceation Policy</p>
                    </div>
                    <div class="col-md-3">
                        <h4>Quick Contact</h4>
                        <p><i class="fa fa-phone-square"></i> +94 37 224 9278</p>
                        <p><i class="fa fa-envelope"></i> ihms@gmai.com</p>
                        <p><i class="fa fa-home"></i> Medical Officer of Health (MOH) Office - Narammala</p>
                    </div>
                    <div class="col-md-3">
                        <h4>Folloe us on</h4>
                        <p><i class="fab fa-facebook"></i> Facebook</p>
                        <p><i class="fab fa-youtube"></i> Youtube</p>
                        <p><i class="fab fa-twitter"></i> Twitter</p>
                    </div>
                </div>

                <hr>

                <p class="copy-right">Made by csg06</p>

            </div>
        </div>
        <!--end of footer-->
        
        
    </div>
    <!--end content-->
    
    
    
    
    <!--core js files-->
    <script type="text/javascript" src="./assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="./assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="./assets/js/core/bootstrap.min.js"></script>
    <script type="text/javascript" src="./assets/js/wow.min.js"></script>

    <script type="text/javascript" src="./assets/js/now-ui-kit.js?v=1.3.0"></script>
    <!--end ofcore js files-->
    
    <!-----------------Smooth scroll----------------->
	<script type="text/javascript">
	    $('.js-scroll-trigger').click(function() {
	        $('.navbar-collapse').collapse('hide');
	    });
	</script>
   
   <!--- password show hide ------>
   <script>
        $(".password-icon").click(function () {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
    
    <!-- activate wow -->
    <script>
      if ($(window).width() <= 1200){ 
          $(".wow").addClass('zoomIn').removeClass('rotateInDownLeft');
          $(".wow").addClass('zoomIn').removeClass('rotateInDownRight');
          $(".wow").addClass('zoomIn').removeClass('fadeInLeft');
          $(".wow").addClass('zoomIn').removeClass('fadeInRight');
      }

      new WOW().init();
    </script>
    
</body>

</html>