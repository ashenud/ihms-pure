<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['mother_id'])) {	
	header('location:/?noPermission=1');
}
if(!isset($_SESSION['baby_id'])) {	
   header('location:/baby/select');
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
    
    <link rel="stylesheet" href="/pages/baby/css/baby-dashboard-style.css">
    <link rel="stylesheet" href="/assets/css/calendar/calendar.css">

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
                
                <div class="row mt-4 mb-5">
                    <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                        <div class="card card-stats">
                            <div class="card-header header-warning">
                                <div class="card-icon icon-color">
                                    <i class="fas fa-syringe"></i>
                                </div>
                                <h6 class="card-title text-muted font-weight-bold mb-0">මීළඟ එන්නත</h6>
                                
                                <?php 
                                    $query1="SELECT MAX(giving_date) AS max_date FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."'";
                                    $result1=mysqli_query($conn, $query1);
                                    $date_given=mysqli_fetch_assoc($result1);
                                    
                                ?>
                                  <br>                                  
                                <h6 class="card-title counter"><?php echo $date_given['max_date']; ?></h6>
                            </div>
                            <div class="card-footer item-footer">
                            <hr style="background-color: black;">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="card-icon icon-color">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <h6 class="card-title text-muted font-weight-bold mb-0">දැනට පවතින බර</h6>
                                
                                <?php 
                                    $query11="SELECT MAX(date) AS max_date FROM growth WHERE baby_id='".$_SESSION['baby_id']."'";
                                    $result111=mysqli_query($conn,$query11);
                                    $row80=mysqli_fetch_assoc($result111);
                                    $query4="SELECT * FROM growth WHERE baby_id='".$_SESSION['baby_id']."' AND date='".$row80['max_date']."'";
                                    $result4=mysqli_query($conn,$query4);
                                    $row4=mysqli_fetch_assoc($result4);
                                ?>
                                <br>
                                <h5 class="card-title counter"><?php echo $row4['weight']; ?></h5>
                            </div>
                            <div class="card-footer item-footer">
                                <hr style="background-color: black;">
                            </div>
                        </div>
                    </div>
                
                    <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="card-icon icon-color">
                                    <i class="fas fa-user-nurse"></i>
                                </div>
                                <h6 class="card-title text-muted font-weight-bold mb-0">දැනට පවතින උස</h6>

                                <?php 
                                    $query11="SELECT MAX(date) AS max_date FROM growth WHERE baby_id='".$_SESSION['baby_id']."'";
                                    $result111=mysqli_query($conn,$query11);
                                    $row80=mysqli_fetch_assoc($result111);
                                    $query4="SELECT * FROM growth WHERE baby_id='".$_SESSION['baby_id']."' AND date='".$row80['max_date']."'";
                                    $result4=mysqli_query($conn,$query4);
                                    $row4=mysqli_fetch_assoc($result4);
                                ?>
                                <br>
                            <h5 class="card-title"><span class="counter"><?php echo $row4['height']; ?></span></h5>
                            </div>
                            <div class="card-footer item-footer">
                            <hr style="background-color: black;">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="card-icon icon-color">
                                    <i class="fas fa-user-nurse"></i>
                                </div>
                                <p class="card-category">වින්නඹුවන් (Midwife) ලියාපදිංචිය</p>
                                <h3 class="card-title"><span class="counter"> </span></h3>
                            </div>
                            <div class="card-footer item-footer">
                                <div class="stats">
                                    <a href="/sister/add-midwife">වින්නඹුවන්(Midwife) ලියාප්දිංචි කිරීම...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-2">
                        <div class="card card-cal" style="height: 100%;width:100%;">
                            <div class="calendar calendar-first" id="calendar_first">
                                <div class="calendar_header">
                                    <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
                                    <h2></h2>
                                    <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
                                </div>
                                <div class="calendar_weekdays"></div>
                                <div class="calendar_content"></div>
                            </div>
                        </div>
                    </div>
                    
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

    <script type="text/javascript" src="/assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="/assets/css/calendar/calendar.js"></script>

    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.b-dash').addClass('active');
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
    <!-- end of writed scripts -->



</body>

</html>


<?php mysqli_close($conn); ?>