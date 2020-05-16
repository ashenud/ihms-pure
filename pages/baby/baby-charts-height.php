<?php session_start(); ?>

<?php if(!isset($_SESSION['mother_id']) && !isset($_SESSION['serch_baby_using_nic']) && !isset($_SESSION['doc_serch_baby_using_nic'])) {	
	header('location:../../index.php?noPermission=1');
    }
    
?>

<?php

    $user=$_SESSION['baby_id'];

	/* Database connection settings */
	include('../../php/basic/connection.php');
    mysqli_select_db($conn, 'cs2019g6');

	$height = '';


	//query to get data from the table
	$query1 = "SELECT * FROM growth WHERE baby_id='{$user}' ORDER BY baby_age_in_months ASC";
    $result1 = mysqli_query($conn, $query1);

	//loop through the returned data
	while ($row1 = mysqli_fetch_array($result1)) {
        $height = $height . '"'. $row1['height'] .'",';
	}

	$height = trim($height,",");
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
    <link rel="stylesheet" href="../../assets/css/english-fonts.css">

    <!--css files-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/animate.css">

    <link rel="stylesheet" href="../../assets/css/dashboard-style.css">
    <link rel="stylesheet" href="./css/baby-chart-all-style.css">

    <?php
        
        $query0 = "SELECT * FROM baby_register WHERE baby_id='{$user}'";
        $result0 = mysqli_query($conn, $query0);
        $row0 = mysqli_fetch_assoc($result0);
        $gender = $row0["baby_gender"];


        if($gender=='M') {
    ?>

    <script>
        var gen = 'male';
        var height = [<?php echo $height; ?>];
    </script>

    <?php
        }
        else {
    ?>
    
    <script>
        var gen = 'female';
        var height = [<?php echo $height; ?>];
    </script>
    
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
                            mysqli_select_db($conn, 'cs2019g6');

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
                                    <a href="./baby-dashboard.php" class="text-uppercase">
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
                        <?php
                            if(isset($_SESSION['doctor_id'])) {
                        ?>
                            <a href="../doctor/doc-vac-permission.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-syringe" aria-hidden="true"></i>
                                </span>
                                <span class="list">එන්නත් කිරීම</span>
                            </a>
                        <?php
                        }
                        else if(isset($_SESSION['midwife_id'])) {
                        ?>
                            <a href="../midwife/mid-vaccine-mark.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-syringe" aria-hidden="true"></i>
                                </span>
                                <span class="list">එන්නත් කිරීම</span>
                            </a>
                        <?php
                        }
                        else {
                        ?>
                            <a href="baby-vaccinations.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-syringe" aria-hidden="true"></i>
                                </span>
                                <span class="list">එන්නත් කිරීම</span>
                            </a>
                        <?php
                        }
                        ?>

                        </li>
                        <li>
                            <a href="./baby-charts.php" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" aria-hidden="true"></i>
                                </span>
                                <span class="list">වර්ධන සටහන</span>
                            </a>
                        </li>
                        <li>
                            <?php
                                if(isset($_SESSION['sister_id'])) {
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
                        <?php
                            if(isset($_SESSION['doctor_id'])){
                            }
                            elseif(isset($_SESSION['sister_id'])){
                            }
                            elseif(isset($_SESSION['midwife_id'])){
                            }
                            elseif(isset($_SESSION['admin_id'])){
                            }
                            else{
                        ?>
                                <a href="baby-inbox.php" class="text-uppercase">
                                <span class="icon">
                                <i class="fas fa-inbox" aria-hidden="true"></i>
                                </span>
                                <span class="list">එන පණිවිඩ</span>
                                </a>
                        <?php
                            }
                        ?>
                        </li>
                        <li>
                        <?php
                            if(isset($_SESSION['doctor_id'])){
                            }
                            elseif(isset($_SESSION['sister_id'])){
                            }
                            elseif(isset($_SESSION['midwife_id'])){
                            }
                            elseif(isset($_SESSION['admin_id'])){
                            }
                            else{
                        ?>
                                <a href="baby-send-messages.php" class="text-uppercase">
                                <span class="icon">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                </span>
                                <span class="list">පණිවිඩ යවන්න</span>
                                </a>
                        <?php
                            }
                        ?>
                        </li>
                        <li>
                            <a href="baby-select.php" class="text-uppercase">
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
                                          
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="chart-area">
                                <div class="word clearfix">
                                   <p>
                                    <?php
                                        if($gender=='M') {

                                            echo "දරුවාගේ උස ප්‍රස්ථාරය (පිරිමි)";

                                        } 
                                        else {

                                            echo "දරුවාගේ උස ප්‍රස්ථාරය (ගැහැණු)";

                                        }

                                    ?>
                                    </p>
                                    <button type="button" class="btn change-btn btn-sm download">බාගත කරන්න</button>
                                </div>
                                <div class="chart-canvas">
                                    <canvas id="growth-chart-height" class="line-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3">
                            <div class="container-fluid data-area">
                                <div class="row">
                                    <div class="col-xl-12 col-sm-6 data-range">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">උස සටහන</h5>
                                                <p><span class="badge color-1">     </span>නියමිත උස</p>
                                                <p><span class="badge color-1"><i></i></span>මධ්‍යස්ථය</p>
                                                <p><span class="badge color-4">     </span>මිටි බවට අවදානම</p>
                                                <p><span class="badge color-2">     </span>මිටි බව</p>
                                                <p><span class="badge color-3">     </span>මිටි බව</p>
                                            </div>
                                        </div>
                                    </div>
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
    <script type="text/javascript" src="../../assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/charts/Chart.js"></script>
    <script type="text/javascript" src="../../assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../assets/js/jspdf.min.js"></script>

    <script type="text/javascript" src="./js/growth-chart-height.js"></script>
    <!--end core js files-->
    
    
    <!-- sidebar collapse -->   
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
    <!-- end of sidebar collapse -->
    
    <!-- canvas to pdf -->
    <script>
        
        $(".download").click(function() {
            
            var canvas = document.getElementById('growth-chart-height');
            
            var imgData = canvas.toDataURL();
            var doc = new jsPDF('p', 'mm', 'a4');
            
            var width = (canvas.width * 36) / 240;
            var height = (canvas.height * 36) / 240;

            doc.addImage(imgData, 'JPEG', 31, 11, width, height);
            doc.output('dataurlnewwindow');     //opens the data uri in new window
            //doc.save('baby-height-chart.pdf'); //Download the rendered PDF.
        });
    
    </script>
    <!-- end of canvas to pdf -->
    

</body>

</html>


<?php mysqli_close($conn); ?>