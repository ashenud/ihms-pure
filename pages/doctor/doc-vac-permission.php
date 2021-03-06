<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['doctor_id'])) {	
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
    
    <link rel="stylesheet" href="/pages/doctor/css/doc-vac-permission-style.css">
    
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
                        <img src="/pages/doctor/img/baby.png" class="rounded-circle">
                        <?php
                            $query00 = "SELECT * FROM baby_register WHERE baby_id='".$_SESSION['baby_id']."'";
                            $result00= mysqli_query($conn,$query00);
                            $row00=mysqli_fetch_assoc($result00);
                        ?>
                        <a href="#"> <span><?php echo $row00['baby_first_name']." ".$row00['baby_last_name'];?></span> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <?php
                                if(isset($_SESSION['doctor_id'])) {
                            ?>
                                    <a href="/doctor/dashboard" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">????????????????????? ??????????????????</span>
                                    </a>
                            <?php
                                }
                                else if(isset($_SESSION['sister_id'])) {
                            ?>
                                    <a href="/sister/dashboard" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">????????????????????? ??????????????????</span>
                                    </a>
                            <?php
                                }
                                else if(isset($_SESSION['midwife_id'])) {
                            ?>
                                    <a href="/midwife/dashboard" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">????????????????????? ??????????????????</span>
                                    </a>
                            <?php
                                }
                                else if(isset($_SESSION['admin_id'])) {
                            ?>
                                    <a href="/admin/dashboard" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">????????????????????? ??????????????????</span>
                                    </a>
                            <?php
                                }
                            ?>
                        </li>
                        <li>
                            <a href="/doctor/vac-permission" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-syringe" aria-hidden="true"></i>
                                </span>
                                <span class="list">?????????????????? ???????????????</span>
                            </a>

                        </li>
                        <li>
                            <a class="text-uppercase" data-toggle="collapse" href="#charts" id="baby-charts">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" aria-hidden="true"></i>
                                </span>
                                <span class="list">??????????????? ???????????????</span>
                            </a>
                        </li>
                        <div class="collapse collapse-charts" id="charts">
                            <li>
                                <a href="/baby/charts-weight" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">?????? ??????????????????????????????</span>
                                </a>
                            </li>
                            <li>
                                <a href="/baby/charts-height" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">?????? ??????????????????????????????</span>
                                </a>
                            </li>
                            <li>
                                <a href="/baby/charts-bmi" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">????????? ??????????????? ?????? ??????????????????????????????</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="/doctor/baby-data-page" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-file-medical-alt" aria-hidden="true"></i>
                                </span>
                                <span class="list">????????? ?????????????????? ????????????</span>
                            </a>
                        </li>
                        <li>
                            <a href="/baby/select" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-baby" aria-hidden="true"></i>
                                </span>
                                <span class="list">??????????????? ??????????????????</span>
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
                                <?php include('./inc/alert-vac-approvel-success.php'); ?>
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
                                        include('inc/vaccination-boy.php');
                                    }
                                    else {
                                        //main-timeline female
                                        include('inc/vaccination-girl.php');
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
        });
        
        // Handler for .ready() called to acctive vaccine.
        $('html, body').animate({
            scrollTop: $('.badge-secondary').last().offset().top - 160
        }, 'slow');
    </script>
    <!-- end of writed scripts -->
    
    
    <!-- send data to modal scripts -->
    <script>
        $(document).on("click", "#vac-approvel", function () {
            var getBaby = $(this).data('baby');
            var getVac= $(this).data('vac');
            
            $("#baby_id").val(getBaby);
            $("#vaccine").val(getVac);
        });
    </script>
    
    <script>
        $(document).on("click", "#vac-approvel-with-data", function () {
            var getBaby = $(this).data('baby');
            var getVac= $(this).data('vac');
            
            $("#baby_id-with-data").val(getBaby);
            $("#vaccine-with-data").val(getVac);
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


</body>

</html>


<?php mysqli_close($conn); ?>