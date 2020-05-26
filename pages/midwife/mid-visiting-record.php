<?php session_start(); ?>
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
    <link rel="stylesheet" href="./css/mid-charts-style.css">
    

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
                            <a class="text-uppercase" data-toggle="collapse" href="#manage">
                                <span class="icon">
                                    <i class="fas fa-users-cog" aria-hidden="true"></i>
                                </span>
                                <span class="list">කළමනාකරණය</span>
                            </a>
                        </li>
                        <div class="collapse collapse-manage" id="manage">
                            <li>
                                <a href="mid-add-babies.php" class="text-uppercase drop">
                                    <span class="icon">
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
                                    <i class="fas fa-map-marked-alt" aria-hidden="true"></i>
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
                            <a href="#" class="text-uppercase active">
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
                                        <form name="my-form" action="./php/add-home-visit-action.php" method="POST" onsubmit="return validation()">
                                        
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
<!--map part---------------------------------------------------------------------------------------->                                              
                                               <div class="card-body">
                                                    <div class="form-row d-flex justify-content-start">
                                                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                            <h5 class="card-title">Location Details:</h5>
                                                        </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <img src="./img/wizard-img5.png" alt="">
                                                    </div>
                                                
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                               
                                                    <div class="container map-area"
                                                        <?php
                                                            if(isset($_SESSION['mNic'])){
                                                            echo"style='pointer-events: none; cursor: no-drop;'";
                                                            }
                                                        ?>>

                                                        <div id="map"></div>
                                                    </div>
                                                </div>   
                                                
<!--catching data from the map---------------------------------------------------------------------------------------->                                                                      
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">        
                                                <label>Latitude of your location:</label>
                                                    <input type="text" name="latInput" class="form-control" id="latInput" readonly
                                                    value="<?php
                                                        if(isset($_SESSION['mNic'])){
                                                            echo '0.000000000000000';
                                                                }
                                                            ?>">
                                                <span id="input17" class="error-tooltip lat-error">
                                                    <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                                    title='<div class="card">
                                                            <div class="card-body">
                                                                <p class="card-text">click map to select latitude</p>
                                                            </div>
                                                        </div>'>
                                                    </i>
                                                </span>
                                                </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <label>Longitude of your location:</label>
                                                    <input type="text" name="longInput" class="form-control" id="longInput" readonly
                                                    value="<?php
                                                        if(isset($_SESSION['mNic'])){
                                                            echo '0.000000000000000';
                                                                }
                                                        ?>">
                                                <span id="input18" class="error-tooltip long-error">
                                                    <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                                        title='<div class="card">
                                                            <div class="card-body">
                                                                <p class="card-text">click map to select longitude</p>
                                                            </div>
                                                        </div>'>
                                                    </i>
                                                </span>
                                        </div>


                                    
<!-------------------------------------------------------------------------------------------->




                                                <div class="col-md-4 offset-md-8">
                                                    <button type="submit" class="btn btn-primary" name="submit">
                                                    Enter
                                                    </button>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/bootstrap.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtlwcov50Y0-MKAlkWmzx5sdYJY2HeFh4&callback=initMap"></script> 
    <script type="text/javascript" src="../../assets/js/script.js"> </script>

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
    <!-- end of writed scripts -->



</body>

</html>


<?php mysqli_close($conn); ?>