<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['midwife_id'])) {	
	header('location:/?noPermission=1');
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>
    
    <?php 
    //favicons
    include('../../inc/basic/include-dashboard-fav.php');
    //css
    include('../../inc/basic/include-dashboard-css.php');
    ?>

    <link rel="stylesheet" href="./css/mid-add-babies-style.css">

    <style>
        #map {
            height: 35.6vh;
            margin-top: 10px;
        }
        
        .collapse-manage {
            display: block !important;
        }
        
    </style>

    <title>Baby Registration</title>
        
</head>


<body>

    <div class="wrapper">
       
        <!--top navbar-->
        <?php include('inc/top-navbar.php'); ?>
        <!--end of top navbar-->

        <!-- main body (sidebar and content) -->
        <div class="main-body">

            <!-- sidebar menu -->
            <?php include('inc/sidebar.php'); ?>
            <!-- end of sidebar menu -->
            
            <!-- content -->
            <div class="content">
               
                <!-- alert section -->
                <div class="alert-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-lg-3"></div>
                            <div class="col-md-8 col-lg-6">
                                <?php include('./inc/alert-continue-registration.php'); ?>
                                <?php include('./inc/alert-mother-not-found.php'); ?>
                                <?php include('./inc/alert-registration-success.php'); ?>
                                <?php include('./inc/alert-ragistration-error.php'); ?>
                                <?php include('./inc/alert-mNic-exists-error.php'); ?>
                                <?php include('./inc/alert-tp-exists-error.php'); ?>
                                <?php include('./inc/alert-email-exists-error.php'); ?>
                                <?php include('./inc/alert-bId-exists-error.php'); ?>
                            </div>
                            <div class="col-md-2 col-lg-3"></div>
                        </div>
                    </div>
                </div>
                <!-- end of alert section -->
                
                <div id="show">
                   
                <?php
                if(isset($_GET['idSuccess'])) {
                    include('inc/mid-register-form-section.php');
                }
                else {
                    include('inc/mid-mother-select-section.php');
                }
                ?>

                </div>

            </div>
            <!-- end of content -->

        </div>
        <!-- end of main body (sidebar and content) -->

    </div>
    
    <!-- optional JavaScript -->
    <?php
    //js
    include('../../inc/basic/include-dashboard-js.php');
    ?>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtlwcov50Y0-MKAlkWmzx5sdYJY2HeFh4&callback=initMap"></script>
    <script type="text/javascript" src="./js/reg-validation-script.js"></script>
    <script type="text/javascript" src="./js/register-location-script.js"> </script>

    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.mm-add').addClass('drop-active');
        });
    </script> 
    
    <script>
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(".wrapper").toggleClass("active");
            });
            
            $(".mob-hamburger").click(function() {
                $(".wrapper").toggleClass("mob-active");
            });
            
            $('#manage-users').on('click', function () {
                $('#manage-users').toggleClass('active');
                $('#manage').toggleClass('collapse-manage d-none');
            });          
        });
    </script>
    <!-- end of writed scripts -->
    
    <!-- tooltip scripts -->
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <!-- end of tooltip scripts -->

    <!-- Alert Dismiss scripts -->
    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideToggle(500, function(){
            $(this).remove();
        });
    }, 3500);
    </script>
    <!-- end of Alert Dismiss scripts -->

</body>

</html>


<?php mysqli_close($conn); ?>