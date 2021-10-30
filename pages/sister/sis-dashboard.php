<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['sister_id'])) {	
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

    <link rel="stylesheet" href="/assets/css/calendar/calendar.css"> 
    <link rel="stylesheet" href="/pages/sister/css/sis-dashboard-style.css">
    
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
                                        <i class="fas fa-baby"></i>
                                    </div>
                                    <p class="card-category">ක්‍රියාකාරී ළදරුවන්</p>
                                    
                                    <?php 
                                        $query1="SELECT * FROM baby_register";
                                        $result1=mysqli_query($conn, $query1);
                                        $num_rows1=mysqli_num_rows($result1);
                                    ?>
                                                                        
                                    <h3 class="card-title counter"><?php echo $num_rows1; ?></h3>
                                </div>
                                <div class="card-footer item-footer">
                                    <div class="stats">
                                        <a href="/sister/view-babies">ළමුන්ගේ තොරතුරු බලන්න</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="card-icon icon-color">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <p class="card-category">ලැබුනු පණිවුඩ</p>
                                    
                                    <?php 
                                        $query4="SELECT COUNT(status) AS unreadSMS FROM sister_message WHERE status='unread' AND sister_id='".$_SESSION['sister_id']."'";
                                        $result4=mysqli_query($conn,$query4);
                                        $row4=mysqli_fetch_assoc($result4);
                                    ?>
                                    
                                    <h3 class="card-title counter"><?php echo $row4['unreadSMS']; ?></h3>
                                </div>
                                <div class="card-footer item-footer">
                                    <div class="stats">
                                        <a href="/sister/inbox">පණිවුඩ බලන්න</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="card-icon icon-color">
                                        <i class="fas fa-user-nurse"></i>
                                    </div>
                                    <p class="card-category">ක්‍රියාකාරී වින්නඹුවන් (Midwife)</p>
                                    <?php 
                                    
                                    $query1="SELECT * FROM midwife";
                                    $result1=mysqli_query($conn, $query1);
                                    $num_rows2=mysqli_num_rows($result1);
                                    
                                    ?>
                                <h3 class="card-title"><span class="counter"><?php echo $num_rows2; ?></span></h3>
                                </div>
                                <div class="card-footer item-footer">
                                    <div class="stats">
                                        <a href="/sister/view-midwife">වින්නඹුවන්ගේ (Midwife) තොරතුරු බලන්න</a>
                                    </div>
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
            $('.inner-sidebar-menu ul li a.ss-dash').addClass('active');
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