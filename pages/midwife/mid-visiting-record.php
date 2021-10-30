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

    <style>
        #map {
            height: 35.6vh;
            margin-top: 10px;
        }
    </style>


    <title>Infant Health Management System</title>
    
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
               
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">Recording Details to Visit Homes</h5>
                                    <p>
                                        <?php
                                        if(isset($_GET['success'])){
                                            echo  " <i style='color :green;'>* User Added. </i>";
                                        }
                                        elseif (isset($_GET['error'])){
                                            echo " <i style='color :red;'>* Invalid Fields </i>";
                                        }
                                        ?>
                                    </p>
                                    <div class="registration">
                                        <form name="my-form" action="/pages/midwife/php/add-home-visit-action.php" method="POST" onsubmit="return validation()">

                                            <div class="container mt-4">



                                                <div class="form-group row">
                                                    <label for="mother_id" class="col-md-4 col-form-label text-md-right">Mother ID</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="mNic" class="form-control" name="mNic">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="midwife_id" class="col-md-4 col-form-label text-md-right">Midwife ID</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="midwife_id" class="form-control" name="midwife_id">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="month" class="col-md-4 col-form-label text-md-right">First Visit(1-5 days from birth)</label>
                                                    <div class="col-md-6">
                                                        <input type="date" id="day1" class="form-control" name="day1">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="weight" class="col-md-4 col-form-label text-md-right">Second Visit(6-10 days from birth)</label>
                                                    <div class="col-md-6">
                                                        <input type="date" id="day2" class="form-control" name="day2">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="height" class="col-md-4 col-form-label text-md-right">Third Visit(14-21 days from birth)</label>
                                                    <div class="col-md-6">
                                                        <input type="date" id="day3" class="form-control" name="day3">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Fourth Visit(around 42 days from birth)</label>
                                                    <div class="col-md-6">
                                                        <input type="date" id="day4" class="form-control" name="day4">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

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
    <script type="text/javascript" src="/pages/midwife/js/register-location-script.js"> </script>

    
    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.mm-record').addClass('active');
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
        });
    </script>



</body>

</html>


<?php mysqli_close($conn); ?>