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
            height: 90vh;
            margin-top: -10px;
        }

        .collapse-location{
            display: block !important;
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
                    <div id="map"></div>
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
    <script type="text/javascript" src="./js/location-view-script.js"> </script>

   
    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.mm-visit').addClass('drop-active');
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
            
            $('#map-location').on('click', function () {
                $('#map-location').toggleClass('active');
                $('#location').toggleClass('collapse-location d-none');
            });          
        });
    </script>
    <!-- end of writed scripts -->

</body>

</html>


<?php mysqli_close($conn); ?>