<?php session_start();
?>
<?php include('../../php/basic/connection.php'); ?>

<?php if(!isset($_SESSION['midwife_id'])) {	
	header('location:../../index.php?noPermission=1');
	}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>

    <!--favicons-->
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">

    <!--fonts and icons-->
    <link rel="stylesheet" href="../../assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../../assets/css/unicode-fonts.css">
    <link rel="stylesheet" href="../../assets/css/material-design-iconic-font.min.css">

    <!--css files-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/animate.css">

    <link rel="stylesheet" href="../../assets/css/dashboard-style.css">
    <link rel="stylesheet" href="./css/mid-inbox-style.css">
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
            <div class="sidebar-menu">
                <div class="inner-sidebar-menu">

                    <div class="user-area pb-2 mb-3">
                        <img src="./img/midwife.png" class="rounded-circle">
                        <?php
                            $query1 = "SELECT * FROM midwife WHERE midwife_id='".$_SESSION['midwife_id']."'";
                            $result1= mysqli_query($conn,$query1);
                            $row=mysqli_fetch_assoc($result1);
                        ?>
                        <a href="#"> <span><?php echo $row['midwife_name'];?></span> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <a href="mid-dashboard.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                </span>
                                <span class="list">තොරතුරු පුවරුව</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-uppercase" data-toggle="collapse" href="#manage" id="manage-users">
                                <span class="icon">
                                    <i class="fas fa-users-cog" aria-hidden="true"></i>
                                </span>
                                <span class="list">කළමනාකරණය</span>
                            </a>
                        </li>
                        <div class="collapse collapse-manage" id="manage">
                            <li>
                                <a href="#" class="text-uppercase drop-active">
                                    <span class="icon-active">
                                        <i class="fas fa-user-plus" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">ළමුන් ඇතුලත් කිරීම</span>
                                </a>
                            </li>
                            <li>
                                <a href="mid-view-babies.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">ළමුන් බලන්න</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="mid-charts.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" aria-hidden="true"></i>
                                </span>
                                <span class="list">වර්ධන සටහන</span>
                            </a>
                        </li>
                        <li>
                            <a href="mid-inbox.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-inbox" aria-hidden="true"></i>
                                    
                                    <?php 
                                        include "php/selectdb.php";
                                        $sql001="SELECT COUNT(status) AS unreadSMS FROM midwife_message WHERE status='unread' AND midwife_id='".$_SESSION['midwife_id']."'";
                                        $run001=mysqli_query($conn,$sql001);
                                        $row001=mysqli_fetch_assoc($run001);
                                        $count=$row001['unreadSMS'];

                                        if(0<$count && $count<=9) {
                                            echo "<span class='badge badge-danger'>";
                                            echo $count;
                                            echo "</span>";
                                        }
                                        else if($count>9) {
                                            echo "<span class='badge badge-danger'>";
                                            echo "9+";
                                            echo "</span>";
                                        }
                                    ?>
                                    
                                </span>
                                <span class="list">එන පණිවිඩ</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-uppercase" data-toggle="collapse" href="#location">
                                <span class="icon">
                                    <i class="fas fa-map" aria-hidden="true"></i>
                                </span>
                                <span class="list">සිතියම්</span>
                            </a>
                        </li>
                        <div class="collapse collapse-location" id="location">
                            <li>
                                <a href="mid-visit-today.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-map-pin" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">අදට නියමිත ස්ථාන</span>
                                </a>
                            </li>
                            <li>
                                <a href="mid-give-directions.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-map-signs" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">දිශාව දැක්වීම</span>
                                </a>
                            </li>
                            <li>
                                <a href="mid-show-all-locations.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">සියලුම ස්ථාන</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="mid-visiting-record.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-location-arrow" aria-hidden="true"></i>
                                </span>
                                <span class="list">නිවාසවලට යෑම්</span>
                            </a>
                        </li>
                    </ul>
                    <!--end of sidebar items-->

                    <!--normal and mobile hamburgers-->
                    <div class="hamburger">
                        <div class="inner-hamburger">
                            <span class="arrow">
                                <i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i>
                                <i class="fas fa-long-arrow-alt-right" aria-hidden="true" style="display: none;"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mob-hamburger" style="display: none;">
                        <div class="mob-inner-hamburger">
                            <span class="mob-arrow">
                                <i class="fas fa-long-arrow-alt-left" aria-hidden="true" style="display: none;"></i>
                                <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <!--end ofnormal and mobile hamburgers-->

                </div>
            </div>
            <!-- end of sidebar menu -->
            
            <!-- content -->
            <div class="content">
               
                <!-- alert section -->
                <div class="alert-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <?php include('./inc/alert-continue-registration.php'); ?>
                                <?php include('./inc/alert-mother-not-found.php'); ?>
                                <?php include('./inc/alert-registration-success.php'); ?>
                                <?php include('./inc/alert-ragistration-error.php'); ?>
                                <?php include('./inc/alert-mNic-exists-error.php'); ?>
                                <?php include('./inc/alert-tp-exists-error.php'); ?>
                                <?php include('./inc/alert-email-exists-error.php'); ?>
                                <?php include('./inc/alert-bId-exists-error.php'); ?>
                            </div>
                            <div class="col-md-4"></div>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/bootstrap.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtlwcov50Y0-MKAlkWmzx5sdYJY2HeFh4&callback=initMap"></script>
    
    <script type="text/javascript" src="./js/reg-validation-script.js"></script>
    <script type="text/javascript" src="./js/register-location-script.js"> </script>
    <!--end core js files-->

    <!-- writed scripts -->
    <script>
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(".wrapper").toggleClass("active");
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".mob-hamburger").click(function() {
                $(".wrapper").toggleClass("mob-active");
            });
        });
    </script>
    
    <script>
        $('#manage-users').on('click', function () {
            $('#manage').toggleClass('collapse-manage d-none');
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