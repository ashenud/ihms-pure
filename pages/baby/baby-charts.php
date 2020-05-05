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

	$weight = '';
	$height = '';
    $month = '';

	//query to get data from the table
	$query1 = "SELECT * FROM growth WHERE baby_id='{$user}'";
    $result1 = mysqli_query($conn, $query1);

	//loop through the returned data
	while ($row1 = mysqli_fetch_array($result1)) {

		$weight = $weight . '"'. $row1['weight'].'",';
		$height = $height . '"'. $row1['height'] .'",';
		$month = $month . '"'. $row1['baby_age_in_months'] .'",';
	}

	$weight = trim($weight,",");
	$height = trim($height,",");
	$month = trim($month,",");
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
    <link rel="stylesheet" href="./css/baby-charts-style.css">

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
                        <img src="./img/baby.png" width="50" class="rounded-circle">
                        <a href="#" class="text-uppercase"> <?php echo($_SESSION['baby_id']); ?> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <?php
                                if(isset($_SESSION['doctor_id'])){
                                    echo '<a href="../doctor/doc-dashboard.php" class="text-uppercase">';
                                    echo '<span class="icon">';
                                    echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                                    echo '</span>';
                                    echo '<span class="list">Doctor</span>';
                                    echo '</a>';
                                }
                                if(isset($_SESSION['sister_id'])){
                                    echo '<a href="../sister/sis-dashboard.php" class="text-uppercase">';
                                    echo '<span class="icon">';
                                    echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                                    echo '</span>';
                                    echo '<span class="list">Sister</span>';
                                    echo '</a>';
                                }
                                if(isset($_SESSION['midwife_id'])){
                                    echo '<a href="../midwife/mid-dashboard.php" class="text-uppercase">';
                                    echo '<span class="icon">';
                                    echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                                    echo '</span>';
                                    echo '<span class="list">Midwife</span>';
                                    echo '</a>';
                                }
                                if(isset($_SESSION['admin_id'])){
                                    echo '<a href="../admin-doctor/admin-doc-dashboard.php" class="text-uppercase">';
                                    echo '<span class="icon">';
                                    echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                                    echo '</span>';
                                    echo '<span class="list">Admin Doctor</span>';
                                    echo '</a>';
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
                                <span class="list">Vaccinations</span>
                            </a>
                        <?php
                        }
                        else if(isset($_SESSION['midwife_id'])) {
                        ?>
                            <a href="../midwife/mid-vaccine-mark.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-syringe" aria-hidden="true"></i>
                                </span>
                                <span class="list">Vaccinations</span>
                            </a>
                        <?php
                        }
                        else {
                        ?>
                            <a href="baby-vaccinations.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-syringe" aria-hidden="true"></i>
                                </span>
                                <span class="list">Vaccinations</span>
                            </a>
                        <?php
                        }
                        ?>

                        </li>
                        <li>
                            <a href="#" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" aria-hidden="true"></i>
                                </span>
                                <span class="list">charts</span>
                            </a>
                        </li>
                        <li>
                        <?php
                                    if(isset($_SESSION['sister_id'])){
                                        echo '<a href="baby-editable-page.php" class="text-uppercase">';
                                        echo '<span class="icon">';
                                        echo '<i class="fas fa-table" aria-hidden="true"></i>';
                                        echo '</span>';
                                        echo '<span class="list">Edit Data</span>';
                                        echo '</a>';
                                    }
                                    elseif(isset($_SESSION['midwife_id'])){
                                        echo '<a href="baby-editable-page.php" class="text-uppercase">';
                                        echo '<span class="icon">';
                                        echo '<i class="fas fa-table" aria-hidden="true"></i>';
                                        echo '</span>';
                                        echo '<span class="list">Edit Data</span>';
                                        echo '</a>';
                                    }
                                    elseif(isset($_SESSION['admin_id'])){
                                        echo '<a href="baby-editable-page.php" class="text-uppercase">';
                                        echo '<span class="icon">';
                                        echo '<i class="fas fa-table" aria-hidden="true"></i>';
                                        echo '</span>';
                                        echo '<span class="list">Edit Data</span>';
                                        echo '</a>';
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
                                        echo '<a href="baby-inbox.php" class="text-uppercase">';
                                        echo '<span class="icon">';
                                        echo '<i class="fas fa-inbox" aria-hidden="true"></i>';
                                        echo '</span>';
                                        echo '<span class="list">Inbox</span>';
                                        echo '</a>';
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
                                        echo '<a href="baby-send-messages.php" class="text-uppercase">';
                                        echo '<span class="icon">';
                                        echo '<i class="fas fa-inbox" aria-hidden="true"></i>';
                                        echo '</span>';
                                        echo '<span class="list">Send Messages</span>';
                                        echo '</a>';
                                    }

                            ?>
                        </li>
                        <li>
                            <a href="baby-select.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-baby" aria-hidden="true"></i>
                                </span>
                                <span class="list">Select Baby</span>
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
                               
                                <?php
                                    $query2 = "SELECT * FROM baby_register WHERE baby_id='{$user}'";
                                    $result2 = mysqli_query($conn, $query2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $gender = $row2["baby_gender"];


                                    if($gender=='M') {
                                ?>
                                <div class="word"><p>දරුවාගේ වැඩීමේ ප්‍රස්ථාරය (පිරිමි)</p></div>
                                <canvas id="lineChartM" class="line-chart"></canvas>
                                    
                                <?php
                                    }
                                    else {
                                ?>
                                <div class="word"><p>දරුවාගේ වැඩීමේ ප්‍රස්ථාරය (ගැහැණු)</p></div>
                                <canvas id="lineChartF" class="line-chart"></canvas>
                                
                                <?php
                                    }
                                ?>
                                
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
                                            <p><span class="badge color-1"><i>- - -</i></span>මධ්‍යස්ථය</p>
                                            <p><span class="badge color-2">     </span>මිටි බවට අවදානම</p> 
                                            <p><span class="badge color-3">     </span>මිටි බව</p>                        
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-xl-12 col-sm-6 data-range">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">බර සටහන</h5>
                                            <p><span class="badge color-5">     </span>අධිබර</p>  
                                            <p><span class="badge color-1"><i>- - -</i></span>මධ්‍යස්ථය</p>  
                                            <p><span class="badge color-1">     </span>නියමිත බර</p>  
                                            <p><span class="badge color-4">     </span>මද බර අඩු</p>
                                            <p><span class="badge color-2">     </span>මධ්‍යස්ථ බර අඩු</p> 
                                            <p><span class="badge color-3">     </span>උග්‍ර බර අඩු</p>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../assets/js/charts/Chart.js"></script>
    <script type="text/javascript" src="../../assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/bootstrap.min.js"></script>
    <!--end core js files-->

    
    
    <!-- writed scripts -->
    
    
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
    
    
    <!-- charts -->
        
    <?php
        $query3 = "SELECT * FROM baby_register WHERE baby_id='{$user}'";
        $result3 = mysqli_query($conn, $query3);
        $row3 = mysqli_fetch_assoc($result3);
        $gender = $row3["baby_gender"];


        if($gender=='M') {
    ?>

    <!-- male chart -->
    <script>

            Chart.defaults.global.defaultFontFamily = 'Helvetica';
            Chart.defaults.global.defaultFontFamily = 'abhaya';
            var maleChart = {
                type: ['line'],
                data: {        
                        labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59', '60',],
                        datasets: [ 
                                    {
                                        label: [''],
                                        yAxisID: 'A',
                                        data: [1.6, 1.5, 1.7, 2.1, 2.7, 3.3, 3.9, 4.4, 4.8, 5.2, 5.5, 5.8, 6, 6.2, 6.3, 6.4, 6.5, 6.6, 6.7, 6.8, 6.85, 6.95, 7, 7.1, 7.2, 7.4, 7.55, 7.7, 7.8, 7.9, 7.95, 8, 8, 8, 8.05, 8.1, 8.15, 8.2, 8.3, 8.35, 8.4, 8.5, 8.55, 8.6, 8.7, 8.8, 8.9, 9, 9.1, 9.2, 9.3, 9.4, 9.5, 9.6, 9.7, 9.8, 9.9, 10, 10.1, 10.2, 10.2],
                                        fill: false,
                                        lineTension: 0.5,
                                        borderWidth: 1,
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['උග්‍ර බර අඩු'],
                                        yAxisID: 'A',
                                        data: [2, 2.2, 2.5, 3, 3.6, 4.2, 4.8, 5.3, 5.7, 6.0, 6.4, 6.7, 7, 7.2, 7.4, 7.5, 7.6, 7.8, 7.9, 8, 8.1, 8.2, 8.35, 8.4, 8.5, 8.7, 8.85, 9, 9.1, 9.2, 9.3, 9.4, 9.45, 9.5, 9.6, 9.7, 9.8, 9.9, 10, 10.1, 10.15, 10.2, 10.3, 10.4, 10.5, 10.6, 10.7, 10.8, 10.9, 11, 11.2, 11.3, 11.4, 11.5, 11.6, 11.7, 11.8, 12, 12.1, 12.2, 12.2],
                                        backgroundColor: ['rgba(235,75,10, 1)'],
                                        borderWidth: 1,
                                        fill: '-1',
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['මධ්‍යස්ථ බර අඩු'],
                                        yAxisID: 'A',
                                        data: [2.4, 2.8, 3.4, 4, 4.6, 5.2, 5.8, 6.3, 6.7, 7.0, 7.4, 7.7, 8, 8.2, 8.45, 8.65, 8.8, 8.9, 9, 9.2, 9.3, 9.45, 9.6, 9.8, 10, 10.15, 10.25, 10.35, 10.5, 10.6, 10.7, 10.8, 10.9, 11, 11.1, 11.2, 11.4, 11.5, 11.6, 11.7, 11.85, 12, 12.1, 12.2, 12.4, 12.5, 12.6, 12.75, 12.85, 13, 13.15, 13.25, 13.4, 13.5, 13.65, 13.75, 13.9, 14, 14.15, 14.25, 14.4],
                                        backgroundColor: ['rgba(232,121,70, 1)'],
                                        borderWidth: 1,
                                        fill: '-1',
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['මද බර අඩු'],
                                        yAxisID: 'A',
                                        data: [2.8, 3.4, 4.2, 5, 5.6, 6.2, 6.8, 7.3, 7.7, 8.0, 8.4, 8.7, 9, 9.2, 9.45, 9.65, 9.8, 9.9, 10, 10.2, 10.3, 10.45, 10.6, 10.8, 11, 11.15, 11.25, 11.35, 11.5, 11.6, 11.7, 11.8, 11.9, 12, 12.1, 12.2, 12.4, 12.5, 12.6, 12.7, 12.85, 13, 13.1, 13.2, 13.4, 13.5, 13.6, 13.75, 13.85, 14, 14.15, 14.25, 14.4, 14.5, 14.65, 14.75, 14.9, 15, 15.15, 15.25, 15.4],
                                        backgroundColor: ['rgba(230,168,140, 1)'],
                                        borderWidth: 1,
                                        fill: '-1',
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['නියමිත බර'],
                                        yAxisID: 'A',
                                        data: [4.2, 5.4, 6.4, 7.5, 8.3, 9, 9.7, 10.3, 10.7, 11.2, 11.6, 12, 12.3, 12.6, 12.9, 13.1, 13.5, 13.8, 14, 14.2, 14.4, 14.7, 14.9, 15.1, 15.3, 15.5, 15.8, 16.1, 16.4, 16.7, 16.9, 17.1, 17.3, 17.5, 17.7, 18, 18.2, 18.4, 18.6, 18.8, 19.1, 19.3, 19.6, 19.8, 20, 20.2, 20.4, 20.6, 20.8, 21, 21.2, 21.4, 21.7, 21.9, 22.1, 22.4, 22.6, 22.9, 23.1, 23.3, 23.5],
                                        backgroundColor: ['rgba(201,242,189, 1)'],
                                        borderWidth: 1,
                                        fill: '-1',
                                        pointRadius: 0
                                    },
                            
                                    {
                                        label: ['# of Votes'],
                                        yAxisID: 'A',
                                        data: [3.4, 4.2, 5, 6, 6.6, 7.2, 7.8, 8.4, 8.7, 9.2, 9.5, 9.8, 10.1, 10.4, 10.6, 10.8, 11, 11.2, 11.4, 11.6, 11.8, 12, 12.2, 12.4, 12.5, 12.6, 12.8, 12.9, 13, 13.2, 13.4, 13.6, 13.8, 14, 14.2, 14.4, 14.6, 14.8, 15, 15.1, 15.2, 15.4, 15.6, 15.8, 16, 16.1, 16.3, 16.5, 16.6, 16.8, 17, 17.2, 17.3, 17.4, 17.6, 17.8, 18, 18.1, 18.3, 18.4, 18.6],
                                        fill: false,
                                        lineTension: 0.5,
                                        borderDash: [10,5],
                                        borderColor: ['rgba(7,163,48, 0.3)'],
                                        borderWidth: 2,
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['අධිබර'],
                                        yAxisID: 'A',
                                        data: [4.8, 6.2, 7.4, 8.6, 9.4, 10, 10.7, 11.3, 11.7, 12.2, 12.6, 13, 13.4, 13.8, 14.1, 14.4, 14.6, 14.9, 15.1, 15.4, 15.7, 15.9, 16.1, 16.3, 16.6, 16.9, 17.2, 17.6, 18, 18.2, 18.4, 18.6, 18.8, 19.1, 19.3, 19.6, 19.8, 20, 20.3, 20.4, 20.7, 20.9, 21.1, 21.4, 21.6, 21.8, 22.1, 22.4, 22.6, 22.8, 23.1, 23.3, 23.6, 23.8, 24, 24.3, 24.5, 24.8, 25, 25.3, 25.5],
                                        backgroundColor: ['rgba(237,173,234, 1)'],
                                        borderWidth: 1,
                                        borderColor: ['rgba(235, 77, 227, 1)'],
                                        fill: '-1',
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['# of Votes'],
                                        yAxisID: 'A',
                                        data: [12, 13.3, 15.2, 16.5, 17.7, 18.8, 19.8, 20.7, 21.5, 22.2, 22.8, 23.4, 24, 24.4, 24.9, 25.4, 25.9, 26.2, 26.6, 26.9, 27.2, 27.4, 27.6, 27.8, 28, 28.3, 28.6, 29, 29.3, 29.6, 30, 30.3, 30.6, 30.9, 31.2, 31.5, 31.8, 32.1, 32.4, 32.7, 33, 33.2, 33.5, 33.8, 34.1, 34.3, 34.6, 34.9, 35.1, 35.4, 35.6, 35.9, 36.1, 36.4, 36.8, 36.9, 37.1, 37.3, 37.6, 37.9, 38],
                                        borderWidth: 1,
                                        fill: false,
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['මිටි බව'],
                                        yAxisID: 'A',
                                        data: [13, 14.4, 16.2, 17.7, 19, 20.1, 21, 22.1, 22.8, 23.4, 24.2, 24.7, 25.2, 25.7, 26.2, 26.8, 27.3, 27.7, 28.1, 28.4, 28.7, 29, 29.3, 29.5, 29.7, 30, 30.3, 30.6, 31, 31.4, 31.7, 32, 32.4, 32.7, 33, 33.4, 33.7, 34, 34.3, 34.6, 34.9, 35.2, 35.5, 35.8, 36, 36.3, 36.6, 37, 37.2, 37.4, 37.7, 38, 38.3, 38.6, 38.9, 39.1, 39.3, 39.6, 39.9, 40.2, 40.4],
                                        borderWidth: 1,
                                        backgroundColor: ['rgba(235,75,10, 1)'],
                                        fill: '-1',
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['මිටි බවට අවදානම'],
                                        yAxisID: 'A',
                                        data: [14, 15.7, 17.6, 19.0, 20.4, 21.6, 22.5, 23.4, 24.0, 24.6, 25.3, 26, 26.5, 27.2, 27.7, 28.2, 28.6, 29.2, 29.6, 30, 30.2, 30.5, 30.8, 31, 31.2, 31.5, 32, 32.3, 32.7, 33.1, 33.5, 33.8, 34.2, 34.5, 34.9, 35.1, 35.5, 35.9, 36.2, 36.5, 36.8, 37.1, 37.5, 37.8, 38.1, 38.4, 38.8, 39.1, 39.4, 39.6, 39.9, 40.2, 40.5, 40.8, 41, 41.3, 41.6, 41.9, 42.2, 42.4,42.6],
                                        borderWidth: 1,
                                        backgroundColor: ['rgba(232,121,70, 1)'],
                                        fill: '-1',
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['නියමිත උස'],
                                        yAxisID: 'A',
                                        data: [17.3, 19.7, 21.4, 23.3, 24.4, 25.3, 26.5, 27.5, 28.2, 29, 29.6, 30.2, 30.8, 31.4, 32, 32.5, 33, 33.5, 33.9, 34.3, 34.7, 35, 35.4, 35.7, 36, 36.4, 36.9, 37.4, 37.8, 38.2, 38.7, 39.1, 39.6, 40, 40.5, 40.9, 41.3, 41.7, 42.1, 42.5, 42.9, 43.3, 43.6, 44, 44.4, 44.7, 45, 45.4, 45.7, 46.1, 46.4, 46.7, 47, 47.4, 47.7, 48, 48.3, 48.6, 49, 49.3, 49.6],
                                        borderWidth: 1,
                                        borderColor: ['rgba(235, 77, 227, 1)'],
                                        backgroundColor: ['rgba(201,242,189, 1)'],
                                        fill: '-1',
                                        pointRadius: 0
                                    },
                            
                                    {
                                        label: ['# of Votes'],
                                        yAxisID: 'A',
                                        data: [15.3, 17, 18.3, 20.3, 21.6, 22.6, 23.8, 24.6, 25.3, 26, 26.8, 27.3, 28, 28.6, 29.2, 29.7, 30.2, 30.6, 31, 31.4, 31.8, 32, 32.3, 32.6, 32.9, 33.2, 33.6, 34, 34.4, 34.8, 35.2, 35.6, 36, 36.4, 36.7, 37, 37.4, 37.8, 38.2, 38.5, 38.9, 39.2, 39.6, 39.9, 40.2, 40.6, 40.9, 41.2, 41.5, 41.8, 42.1, 42.4, 42.7, 43, 43.3, 43.6, 43.9, 44.2, 44.4, 44.7, 45],
                                        fill: false,
                                        lineTension: 0.5,
                                        borderDash: [10,5],
                                        borderColor: ['rgba(7,163,48, 0.3)'],
                                        borderWidth: 2,
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['බර'],
                                        yAxisID: 'A',
                                        data: [<?php echo $weight; ?>],
                                        fill: false,
                                        backgroundColor: 'rgba(0, 16, 85, 1)',
                                        borderColor: 'rgba(0, 16, 85, 1)',
                                        lineTension: 0,
                                        borderWidth: 2,
                                        pointRadius: 3,
                                        
                                    },

                                    {
                                        label: ['උස'],
                                        yAxisID: 'B',
                                        data: [<?php echo $height; ?>],
                                        fill: false,
                                        backgroundColor: 'rgba(0, 16, 85, 1)',
                                        borderColor: 'rgba(0, 16, 85, 1)',
                                        lineTension: 0,
                                        borderWidth: 2,
                                        pointRadius: 3,
                                    }
                                  ]
                       },
                options: {
                    legend: {
                        display: false
                    },
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [ 
                            {
                                id: 'A',
                                type: 'linear',
                                position: 'left',
                                ticks: {
                                    fontSize: 10,
                                    beginAtZero: true,
                                    stepSize: 1,
                                    fontFamily: 'Helvetica',
                                    fontColor: '#000',
                                },
                                gridLines: {
                                    lineWidth: 1,
                                    color: 'rgba(0, 0, 0, 0.2)',
                                    z: 1
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: "බර (කි. ග්‍රෑ.)",
                                    fontColor: '#000',
                                    fontSize: 14,
                                }
                            },
                            
                            {
                                id: 'B',
                                type: 'linear',
                                position: 'right',
                                ticks: {
                                    fontSize: 10,
                                    beginAtZero: true,
                                    min: 20,
                                    max: 120,
                                    stepSize: 2,
                                    fontFamily: 'Helvetica',
                                    fontColor: '#000'
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: "උස (සෙ.මි.)",
                                    fontColor: '#000',
                                    fontSize: 14,
                                }
                            }
                               
                        ],
                        xAxes: [ 
                            {
                                ticks: {
                                    fontSize: 6,
                                    stepSize: 1,
                                    fontFamily: 'Helvetica',
                                    fontColor: '#000',
                                    maxRotation: 0,
                                },
                                gridLines: {
                                    lineWidth: 1,
                                    color: 'rgba(0, 0, 0, 0.2)',
                                    z: 1
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: "වයස (මාස)",
                                    fontColor: '#000',
                                    fontSize: 14,
                                }
                            }]
                    },
                    tooltips: false,
                    responsive: true      
                }
            }
            
            var ctxMaleChart = document.getElementById('lineChartM').getContext('2d');
            new Chart(ctxMaleChart, maleChart);
            
    </script>
    <!-- end of male chart -->

    <?php
        }
        else {
    ?>
    <!-- female chart -->
    <script>
            
            Chart.defaults.global.defaultFontFamily = 'Helvetica';
            Chart.defaults.global.defaultFontFamily = 'abhaya';
            var femaleChart = {
                type: ['line'],
                data: {        
                        labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59', '60',],
                        datasets: [ 
                                    {
                                        label: [''],
                                        yAxisID: 'A',
                                        data: [1.2, 1.6, 2, 2.4, 2.8, 3.3, 3.7, 4, 4.4, 4.6, 5, 5.2, 5.4, 5.5, 5.6, 5.7, 5.9, 6, 6.1, 6.2, 6.4, 6.5, 6.7, 6.8, 7, 7.2, 7.3, 7.4, 7.5, 7.6, 7.7, 7.8, 7.8, 7.9, 7.9, 8, 8.1, 8.2, 8.3, 8.4, 8.4, 8.5, 8.6, 8.7, 8.8, 8.8, 8.9, 9, 9.1, 9.2, 9.3, 9.3, 9.4, 9.4, 9.5, 9.6, 9.6, 9.7, 9.7, 9.8, 9.8],
                                        fill: false,
                                        lineTension: 0.5,
                                        borderWidth: 1,
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['උග්‍ර බර අඩු'],
                                        yAxisID: 'A',
                                        data: [1.8, 2.1, 2.6, 3.1, 3.6, 4.2, 4.5, 5, 5.2, 5.5, 5.9, 6.1, 6.3, 6.5, 6.7, 6.8, 6.9, 7, 7.2, 7.4, 7.6, 7.7, 7.8, 7.9, 8.1, 8.3, 8.4, 8.6, 8.7, 8.8, 8.9, 9, 9.2, 9.3, 9.4, 9.5, 9.6, 9.7, 9.8, 9.8, 9.9, 10, 10.1, 10.2, 10.3, 10.5, 10.6, 10.7, 10.8, 10.8, 10.9, 11, 11.1, 11.2, 11.3, 11.4, 11.5, 11.7, 11.7, 11.8, 11.8],
                                        backgroundColor: ['rgba(235,75,10, 1)'],
                                        borderWidth: 1,
                                        fill: '-1',
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['මධ්‍යස්ථ බර අඩු'],
                                        yAxisID: 'A',
                                        data: [2.4, 2.8, 3.4, 4, 4.6, 5.2, 5.8, 6.3, 6.7, 7.0, 7.4, 7.7, 8, 8.2, 8.45, 8.65, 8.8, 8.9, 9, 9.2, 9.3, 9.45, 9.6, 9.8, 10, 10.15, 10.25, 10.35, 10.5, 10.6, 10.7, 10.8, 10.9, 11, 11.1, 11.2, 11.4, 11.5, 11.6, 11.7, 11.85, 12, 12.1, 12.2, 12.4, 12.5, 12.6, 12.75, 12.85, 13, 13.15, 13.25, 13.4, 13.5, 13.65, 13.75, 13.9, 14, 14.15, 14.25, 14.4],
                                        backgroundColor: ['rgba(232,121,70, 1)'],
                                        borderWidth: 1,
                                        fill: '-1',
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['මද බර අඩු'],
                                        yAxisID: 'A',
                                        data: [2.8, 3.4, 4.2, 5, 5.6, 6.2, 6.8, 7.3, 7.7, 8.0, 8.4, 8.7, 9, 9.2, 9.45, 9.65, 9.8, 9.9, 10, 10.2, 10.3, 10.45, 10.6, 10.8, 11, 11.15, 11.25, 11.35, 11.5, 11.6, 11.7, 11.8, 11.9, 12, 12.1, 12.2, 12.4, 12.5, 12.6, 12.7, 12.85, 13, 13.1, 13.2, 13.4, 13.5, 13.6, 13.75, 13.85, 14, 14.15, 14.25, 14.4, 14.5, 14.65, 14.75, 14.9, 15, 15.15, 15.25, 15.4],
                                        backgroundColor: ['rgba(230,168,140, 1)'],
                                        borderWidth: 1,
                                        fill: '-1',
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['නියමිත බර'],
                                        yAxisID: 'A',
                                        data: [4.2, 5.4, 6.4, 7.5, 8.3, 9, 9.7, 10.3, 10.7, 11.2, 11.6, 12, 12.3, 12.6, 12.9, 13.1, 13.5, 13.8, 14, 14.2, 14.4, 14.7, 14.9, 15.1, 15.3, 15.5, 15.8, 16.1, 16.4, 16.7, 16.9, 17.1, 17.3, 17.5, 17.7, 18, 18.2, 18.4, 18.6, 18.8, 19.1, 19.3, 19.6, 19.8, 20, 20.2, 20.4, 20.6, 20.8, 21, 21.2, 21.4, 21.7, 21.9, 22.1, 22.4, 22.6, 22.9, 23.1, 23.3, 23.5],
                                        backgroundColor: ['rgba(201,242,189, 1)'],
                                        borderWidth: 1,
                                        fill: '-1',
                                        pointRadius: 0
                                    },
                            
                                    {
                                        label: [''],
                                        yAxisID: 'A',
                                        data: [3.4, 4.2, 5, 6, 6.6, 7.2, 7.8, 8.4, 8.7, 9.2, 9.5, 9.8, 10.1, 10.4, 10.6, 10.8, 11, 11.2, 11.4, 11.6, 11.8, 12, 12.2, 12.4, 12.5, 12.6, 12.8, 12.9, 13, 13.2, 13.4, 13.6, 13.8, 14, 14.2, 14.4, 14.6, 14.8, 15, 15.1, 15.2, 15.4, 15.6, 15.8, 16, 16.1, 16.3, 16.5, 16.6, 16.8, 17, 17.2, 17.3, 17.4, 17.6, 17.8, 18, 18.1, 18.3, 18.4, 18.6],
                                        fill: false,
                                        lineTension: 0.5,
                                        borderDash: [10,5],
                                        borderColor: ['rgba(7,163,48, 0.3)'],
                                        borderWidth: 2,
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['අධිබර'],
                                        yAxisID: 'A',
                                        data: [4.8, 6.2, 7.4, 8.6, 9.4, 10, 10.7, 11.3, 11.7, 12.2, 12.6, 13, 13.4, 13.8, 14.1, 14.4, 14.6, 14.9, 15.1, 15.4, 15.7, 15.9, 16.1, 16.3, 16.6, 16.9, 17.2, 17.6, 18, 18.2, 18.4, 18.6, 18.8, 19.1, 19.3, 19.6, 19.8, 20, 20.3, 20.4, 20.7, 20.9, 21.1, 21.4, 21.6, 21.8, 22.1, 22.4, 22.6, 22.8, 23.1, 23.3, 23.6, 23.8, 24, 24.3, 24.5, 24.8, 25, 25.3, 25.5],
                                        backgroundColor: ['rgba(237,173,234, 1)'],
                                        borderWidth: 1,
                                        borderColor: ['rgba(235, 77, 227, 1)'],
                                        fill: '-1',
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['# of Votes'],
                                        yAxisID: 'A',
                                        data: [12, 13.3, 15.2, 16.5, 17.7, 18.8, 19.8, 20.7, 21.5, 22.2, 22.8, 23.4, 24, 24.4, 24.9, 25.4, 25.9, 26.2, 26.6, 26.9, 27.2, 27.4, 27.6, 27.8, 28, 28.3, 28.6, 29, 29.3, 29.6, 30, 30.3, 30.6, 30.9, 31.2, 31.5, 31.8, 32.1, 32.4, 32.7, 33, 33.2, 33.5, 33.8, 34.1, 34.3, 34.6, 34.9, 35.1, 35.4, 35.6, 35.9, 36.1, 36.4, 36.8, 36.9, 37.1, 37.3, 37.6, 37.9, 38],
                                        borderWidth: 1,
                                        fill: false,
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['මිටි බව'],
                                        yAxisID: 'A',
                                        data: [13, 14.4, 16.2, 17.7, 19, 20.1, 21, 22.1, 22.8, 23.4, 24.2, 24.7, 25.2, 25.7, 26.2, 26.8, 27.3, 27.7, 28.1, 28.4, 28.7, 29, 29.3, 29.5, 29.7, 30, 30.3, 30.6, 31, 31.4, 31.7, 32, 32.4, 32.7, 33, 33.4, 33.7, 34, 34.3, 34.6, 34.9, 35.2, 35.5, 35.8, 36, 36.3, 36.6, 37, 37.2, 37.4, 37.7, 38, 38.3, 38.6, 38.9, 39.1, 39.3, 39.6, 39.9, 40.2, 40.4],
                                        borderWidth: 1,
                                        backgroundColor: ['rgba(235,75,10, 1)'],
                                        fill: '-1',
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['මිටි බවට අවදානම'],
                                        yAxisID: 'A',
                                        data: [14, 15.7, 17.6, 19.0, 20.4, 21.6, 22.5, 23.4, 24.0, 24.6, 25.3, 26, 26.5, 27.2, 27.7, 28.2, 28.6, 29.2, 29.6, 30, 30.2, 30.5, 30.8, 31, 31.2, 31.5, 32, 32.3, 32.7, 33.1, 33.5, 33.8, 34.2, 34.5, 34.9, 35.1, 35.5, 35.9, 36.2, 36.5, 36.8, 37.1, 37.5, 37.8, 38.1, 38.4, 38.8, 39.1, 39.4, 39.6, 39.9, 40.2, 40.5, 40.8, 41, 41.3, 41.6, 41.9, 42.2, 42.4,42.6],
                                        borderWidth: 1,
                                        backgroundColor: ['rgba(232,121,70, 1)'],
                                        fill: '-1',
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['නියමිත උස'],
                                        yAxisID: 'A',
                                        data: [17.3, 19.7, 21.4, 23.3, 24.4, 25.3, 26.5, 27.5, 28.2, 29, 29.6, 30.2, 30.8, 31.4, 32, 32.5, 33, 33.5, 33.9, 34.3, 34.7, 35, 35.4, 35.7, 36, 36.4, 36.9, 37.4, 37.8, 38.2, 38.7, 39.1, 39.6, 40, 40.5, 40.9, 41.3, 41.7, 42.1, 42.5, 42.9, 43.3, 43.6, 44, 44.4, 44.7, 45, 45.4, 45.7, 46.1, 46.4, 46.7, 47, 47.4, 47.7, 48, 48.3, 48.6, 49, 49.3, 49.6],
                                        borderWidth: 1,
                                        borderColor: ['rgba(235, 77, 227, 1)'],
                                        backgroundColor: ['rgba(201,242,189, 1)'],
                                        fill: '-1',
                                        pointRadius: 0
                                    },
                            
                                    {
                                        label: ['# of Votes'],
                                        yAxisID: 'A',
                                        data: [15.3, 17, 18.3, 20.3, 21.6, 22.6, 23.8, 24.6, 25.3, 26, 26.8, 27.3, 28, 28.6, 29.2, 29.7, 30.2, 30.6, 31, 31.4, 31.8, 32, 32.3, 32.6, 32.9, 33.2, 33.6, 34, 34.4, 34.8, 35.2, 35.6, 36, 36.4, 36.7, 37, 37.4, 37.8, 38.2, 38.5, 38.9, 39.2, 39.6, 39.9, 40.2, 40.6, 40.9, 41.2, 41.5, 41.8, 42.1, 42.4, 42.7, 43, 43.3, 43.6, 43.9, 44.2, 44.4, 44.7, 45],
                                        fill: false,
                                        lineTension: 0.5,
                                        borderDash: [10,5],
                                        borderColor: ['rgba(7,163,48, 0.3)'],
                                        borderWidth: 2,
                                        pointRadius: 0
                                    },

                                    {
                                        label: ['බර'],
                                        yAxisID: 'A',
                                        data: [<?php echo $weight; ?>],
                                        fill: false,
                                        backgroundColor: 'rgba(0, 16, 85, 1)',
                                        borderColor: 'rgba(0, 16, 85, 1)',
                                        lineTension: 0,
                                        borderWidth: 2,
                                        pointRadius: 3,
                                        
                                    },

                                    {
                                        label: ['උස'],
                                        yAxisID: 'B',
                                        data: [<?php echo $height; ?>],
                                        fill: false,
                                        backgroundColor: 'rgba(0, 16, 85, 1)',
                                        borderColor: 'rgba(0, 16, 85, 1)',
                                        lineTension: 0,
                                        borderWidth: 2,
                                        pointRadius: 3,
                                    }
                                  ]
                       },
                options: {
                    legend: {
                        display: false
                    },
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [ 
                            {
                                id: 'A',
                                type: 'linear',
                                position: 'left',
                                ticks: {
                                    fontSize: 10,
                                    beginAtZero: true,
                                    stepSize: 1,
                                    fontFamily: 'Helvetica',
                                    fontColor: '#000',
                                },
                                gridLines: {
                                    lineWidth: 1,
                                    color: 'rgba(0, 0, 0, 0.2)',
                                    z: 1
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: "බර (කි. ග්‍රෑ.)",
                                    fontColor: '#000',
                                    fontSize: 14,
                                }
                            },
                            
                            {
                                id: 'B',
                                type: 'linear',
                                position: 'right',
                                ticks: {
                                    fontSize: 10,
                                    beginAtZero: true,
                                    min: 20,
                                    max: 120,
                                    stepSize: 2,
                                    fontFamily: 'Helvetica',
                                    fontColor: '#000',
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: "උස (සෙ.මි.)",
                                    fontColor: '#000',
                                    fontSize: 14,
                                }
                            }
                               
                        ],
                        xAxes: [ 
                            {
                                ticks: {
                                    fontSize: 6,
                                    stepSize: 1,
                                    fontFamily: 'Helvetica',
                                    fontColor: '#000',
                                    maxRotation: 0,
                                },
                                gridLines: {
                                    lineWidth: 1,
                                    color: 'rgba(0, 0, 0, 0.2)',
                                    z: 1
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: "වයස (මාස)",
                                    fontColor: '#000',
                                    fontSize: 14,
                                }
                            }]
                    },
                    tooltips: false,
                    responsive: true      
                }
            }
            
            var ctxFemaleChart = document.getElementById('lineChartF').getContext('2d');
            new Chart(ctxFemaleChart, femaleChart);
    </script>
    <!-- end of female chart -->

    <?php
        }
    ?>
    
    <!-- end of charts -->
    
    <!-- end of writed scripts -->



</body>

</html>


<?php mysqli_close($conn); ?>