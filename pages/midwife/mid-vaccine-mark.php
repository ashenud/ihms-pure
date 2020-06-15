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

    <link rel="stylesheet" href="./css/mid-vaccine-mark-style.css">
    
    
    <?php

        $sql0 = "SELECT * FROM baby_register WHERE baby_id='".$_SESSION['baby_id']."'";
        $run0 = mysqli_query($conn, $sql0);
        $data0 = mysqli_fetch_assoc($run0);
        $gender0 = $data0["baby_gender"];

            if($gender0=='M') {
    ?>
    
        <style>
            .main-timeline:before {
                background: #c2255c;
            }
            .main-timeline .timeline {
                border-top: 7px solid #c2255c;
                border-right: 7px solid #c2255c;
            }
            .main-timeline .icon {
                background: #bac8ff;
            }
            .main-timeline .timeline-content {
                background: #bac8ff;
            }
            .main-timeline .timeline-content:before,
            .main-timeline .timeline-content:after {
                background: #bac8ff;
            }
            .main-timeline .timeline:nth-child(2n) {
                border-left: 7px solid #c2255c;
            }
        </style>
        
    <?php
        }
        else {
    ?>
        <style>
            .main-timeline:before {
                background: #084772;
            }
            .main-timeline .timeline {
                border-top: 7px solid #084772;
                border-right: 7px solid #084772;
            }
            .main-timeline .icon {
                background: #f8bbd0;
            }
            .main-timeline .timeline-content {
                background: #f8bbd0;
            }
            .main-timeline .timeline-content:before,
            .main-timeline .timeline-content:after {
                background: #f8bbd0;
            }
            .main-timeline .timeline:nth-child(2n) {
                border-left: 7px solid #084772;
            }
        </style>
    <?php
        }
    ?>
    

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
                        <img src="./img/baby.png" class="rounded-circle">
                        <?php
                            $query1 = "SELECT * FROM baby_register WHERE baby_id='".$_SESSION['baby_id']."'";
                            $result1= mysqli_query($conn,$query1);
                            $row=mysqli_fetch_assoc($result1);
                        ?>
                        <a href="#"> <span><?php echo $row['baby_first_name']." ".$row['baby_last_name'];?></span> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <?php
                                if(isset($_SESSION['doctor_id'])) {
                            ?>
                                    <a href="../doctor/doc-dashboard.php" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">තොරතුරු පුවරුව</span>
                                    </a>
                            <?php
                                }
                                else if(isset($_SESSION['sister_id'])) {
                            ?>
                                    <a href="../sister/sis-dashboard.php" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">තොරතුරු පුවරුව</span>
                                    </a>
                            <?php
                                }
                                else if(isset($_SESSION['midwife_id'])) {
                            ?>
                                    <a href="../midwife/mid-dashboard.php" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">තොරතුරු පුවරුව</span>
                                    </a>
                            <?php
                                }
                                else if(isset($_SESSION['admin_id'])) {
                            ?>
                                    <a href="../admin-doctor/admin-doc-dashboard.php" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">තොරතුරු පුවරුව</span>
                                    </a>
                            <?php
                                }
                                else {
                            ?>
                                    <a href="#" class="text-uppercase active">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">තොරතුරු පුවරුව</span>
                                    </a>
                            <?php
                                }
                            ?>
                        </li>
                        <li>
                            <a href="#" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-syringe" aria-hidden="true"></i>
                                </span>
                                <span class="list">එන්නත් කිරීම</span>
                            </a>

                        </li>
                        <li>
                            <a class="text-uppercase" data-toggle="collapse" href="#charts" id="baby-charts">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" aria-hidden="true"></i>
                                </span>
                                <span class="list">වර්ධන සටහන්</span>
                            </a>
                        </li>
                        <div class="collapse collapse-charts" id="charts">
                            <li>
                                <a href="../baby/baby-charts-weight.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">බර ප්‍රස්ථාරය</span>
                                </a>
                            </li>
                            <li>
                                <a href="../baby/baby-charts-height.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">උස ප්‍රස්ථාරය</span>
                                </a>
                            </li>
                            <li>
                                <a href="../baby/baby-charts-bmi.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">උසට සරිලන බර ප්‍රස්ථාරය</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <?php
                                if(isset($_SESSION['doctor_id'])) {
                            ?>
                                    <a href="baby-editable-page.php" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-table" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">දත්ත සංස්කරණය</span>
                                    </a>
                            <?php
                                }
                                elseif(isset($_SESSION['sister_id'])) {
                            ?>
                                    <a href="baby-editable-page.php" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-table" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">දත්ත සංස්කරණය</span>
                                    </a>
                            <?php
                                }
                                elseif(isset($_SESSION['midwife_id'])) {
                            ?>
                                    <a href="../baby/baby-editable-page.php" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-table" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">දත්ත සංස්කරණය</span>
                                    </a>
                            <?php
                                }
                                elseif(isset($_SESSION['admin_id'])) {
                            ?>
                                    <a href="baby-editable-page.php" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-table" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">දත්ත සංස්කරණය</span>
                                    </a>
                            <?php
                                }
                            ?>
                        </li>
                        <li>
                            <a href="../baby/baby-select.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-baby" aria-hidden="true"></i>
                                </span>
                                <span class="list">දරුවා තෝරන්න</span>
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
                                <?php include('./inc/alert-vac-mark-success.php'); ?>
                                <?php include('./inc/alert-vac-set-date-success.php'); ?>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                <!-- end of alert section -->
               
                <div class="container-fluid">

                    <div class="container">
                   
                        <div class="row">
                           
                            <div class="col-md-12">
                               
                                <?php
                                
                                $query0 = "SELECT * FROM baby_register WHERE baby_id='".$_SESSION['baby_id']."'";
                                $result0 = mysqli_query($conn, $query0);
                                $row0 = mysqli_fetch_assoc($result0);
                                $gender = $row0["baby_gender"];


                                    if($gender=='M') {
                                        //main-timeline male
                                        include('inc/vaccination-male.php');
                                    }
                                    else {
                                        //main-timeline female
                                        include('inc/vaccination-female.php');
                                    }
                                ?>
                                
                            </div><!--end col-md-12-->
                            
                        </div><!--end row-->
                        
                    </div><!--end container-->
                    
                </div><!--end container-fluid-->



            </div>
            <!-- end of content -->

        </div>
        <!-- end of main body (sidebar and content) -->

    </div>
        <!--end wrapper-->


    <!-- optional JavaScript -->
    <?php
    //js
    include('../../inc/basic/include-dashboard-js.php');
    ?>

    <!-- writed scripts -->
    <script>
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(".wrapper").toggleClass("active");
            });
            
            $(".mob-hamburger").click(function() {
                $(".wrapper").toggleClass("mob-active");
            });
            
            // Handler for .ready() called to acctive vaccine.
            $('html, body').animate({
                scrollTop: $('.color-given').last().offset().top - 160
            }, 'slow');
        });
    </script>
    
    
    <!-- send data to modal scripts -->
    <script>
        $(document).on("click", "#mark-vac-btn", function () {
            var getBaby = $(this).data('baby');
            var getVac= $(this).data('vac');
            
            $("#baby_id").val(getBaby);
            $("#vaccine").val(getVac);
        });
    </script>
    <script>
        $(document).on("click", "#set-date-btn", function () {
            var getBaby = $(this).data('baby');
            var getVac= $(this).data('vac');
            
            $("#baby_id1").val(getBaby);
            $("#vaccin").val(getVac);
        });
    </script>
    <!-- end of send data to modal scripts -->
    
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
    
    <!-- end of writed scripts -->



</body>

</html>


<?php mysqli_close($conn); ?>