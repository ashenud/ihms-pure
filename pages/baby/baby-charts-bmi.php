<?php

    session_start();

    include('../../php/basic/connection.php');

    if(!isset($_SESSION['mother_id']) && !isset($_SESSION['serch_baby_using_nic']) && !isset($_SESSION['doc_serch_baby_using_nic'])) {	
        header('location:/?noPermission=1');
    }

    if(!isset($_SESSION['baby_id'])) {	
       header('location:/baby/select');
    }

    /* @@ for select chart creator and baby name for pdf@@ */
    if(isset($_SESSION['midwife_id'])) {
        $query0="SELECT * FROM midwife WHERE midwife_id='".$_SESSION['midwife_id']."' LIMIT 1";
        $result0 = mysqli_query($conn, $query0);
        $row0 = mysqli_fetch_array($result0);
        $chart_generator="midwife ".$row0['midwife_name'];
    }
    else if(isset($_SESSION['doctor_id'])) {
        $query0="SELECT * FROM doctor WHERE doctor_id='".$_SESSION['doctor_id']."' LIMIT 1";
        $result0 = mysqli_query($conn, $query0);
        $row0 = mysqli_fetch_array($result0);
        $chart_generator="doctor ".$row0['doctor_name'];
    }else if(isset($_SESSION['mother_id'])) {
        $query0="SELECT * FROM mother WHERE mother_nic='".$_SESSION['mother_id']."' LIMIT 1";
        $result0 = mysqli_query($conn, $query0);
        $row0 = mysqli_fetch_array($result0);
        $chart_generator="mother ".$row0['mother_name'];
    }
    $query00="SELECT * FROM baby_register WHERE baby_id='".$_SESSION['baby_id']."' LIMIT 1";
    $result00 = mysqli_query($conn, $query00);
    $row00 = mysqli_fetch_array($result00);
    $chart_baby="baby ".$row00['baby_first_name']." ".$row00['baby_last_name'];


    $user=$_SESSION['baby_id'];

	$weightF24 = '';
	$heightF24 = '';
    $monthF24 = '';
	$weightL36 = '';
	$heightL36 = '';
    $monthL36 = '';

	//query to get data from the table
	$query1 = "SELECT * FROM growth WHERE baby_id='{$user}' ORDER BY baby_age_in_months ASC";
    $result1 = mysqli_query($conn, $query1);

	//loop through the returned data
	while ($row1 = mysqli_fetch_array($result1)) {
        
        if ($row1['baby_age_in_months']<25) {
            $weightF24 = $weightF24 . '"'. $row1['weight'].'",';
            $heightF24 = $heightF24 . '"'. $row1['height'] .'",';
            $monthF24 = $monthF24 . '"'. $row1['baby_age_in_months'] .'",';
        }
        else {
            $weightL36 = $weightL36 . '"'. $row1['weight'].'",';
            $heightL36 = $heightL36 . '"'. $row1['height'] .'",';
            $monthL36 = $monthL36 . '"'. $row1['baby_age_in_months'] .'",';
        }
	}

	$weightF24 = trim($weightF24,",");
	$heightF24 = trim($heightF24,",");
	$monthF24 = trim($monthF24,",");
	$weightL36 = trim($weightL36,",");
	$heightL36 = trim($heightL36,",");
	$monthL36 = trim($monthL36,",");
    $initialChart = "f24m";

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
    
    <link rel="stylesheet" href="/pages/baby/css/baby-chart-all-style.css">

    <?php
        
        $query0 = "SELECT * FROM baby_register WHERE baby_id='{$user}'";
        $result0 = mysqli_query($conn, $query0);
        $row0 = mysqli_fetch_assoc($result0);
        $gender = $row0["baby_gender"];


        if($gender=='M') {
    ?>

    <script>
        var gen = 'male';
        var weightF24 = [<?php echo $weightF24; ?>];
        var heightF24 = [<?php echo $heightF24; ?>];
        var weightL36 = [<?php echo $weightL36; ?>];
        var heightL36 = [<?php echo $heightL36; ?>];
    </script>

    <?php
        }
        else {
    ?>
    
    <script>
        var gen = 'female';
        var weightF24 = [<?php echo $weightF24; ?>];
        var heightF24 = [<?php echo $heightF24; ?>];
        var weightL36 = [<?php echo $weightL36; ?>];
        var heightL36 = [<?php echo $heightL36; ?>];
    </script>
    
    <?php
        }
    ?>
    
    <style>
        .collapse-charts {
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
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="chart-area">
                                <div class="word clearfix">
                                   <p>
                                    <?php
                                        if($gender=='M') {

                                            echo "????????????????????? ????????? ??????????????? ?????? ?????????????????????????????? (??????????????????)";

                                        } 
                                        else {

                                            echo "????????????????????? ????????? ??????????????? ?????? ?????????????????????????????? (??????????????????)";

                                        }

                                    ?>
                                    </p>
                                    <div class="btn-set">
                                        <button type="button" class="btn change-btn btn-sm" data-type="f24m">????????? 0 - 24</button>
                                        <button type="button" class="btn change-btn btn-sm" data-type="l36m">????????? 25 - 60</button>
                                        <button type="button" class="btn change-btn btn-sm download">???????????? ???????????????</button>
                                    </div>
                                </div>
                                <div class="chart-canvas for-bmi-chart">
                                    <canvas id="growth-chart-bmi" class="line-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        
                        <!--<div class="col-xl-3">
                            <div class="container-fluid data-area">
                                <div class="row">
                                    <div class="col-xl-12 col-sm-6 data-range">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">?????? ????????????</h5>
                                                <p><span class="badge color-5">??????????</span>???????????????</p>
                                                <p><span class="badge color-1"><i></i></span>???????????????????????????</p>
                                                <p><span class="badge color-1">??????????</span>?????????????????? ??????</p>
                                                <p><span class="badge color-4">??????????</span>????????? ????????? ??????????????????</p>
                                                <p><span class="badge color-2">??????????</span>????????? ??????</p>
                                                <p><span class="badge color-3">??????????</span>??????????????? ????????? ??????</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
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
   
    <script type="text/javascript" src="/assets/js/charts/Chart.js"></script>
    <script type="text/javascript" src="/assets/js/jspdf.min.js"></script>
    <script type="text/javascript" src="/pages/baby/js/growth-chart-bmi.js"></script>

    
    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.b-hw').addClass('drop-active');
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
            
            $('#baby-charts').on('click', function () {
                $('#charts').toggleClass('collapse-charts d-none');
            });         
        });
    </script>
    <!-- end of writed scripts -->
    
    
    <!-- canvas to pdf -->
    <script>
        
        $(".download").click(function() {
            
            var canvas = document.getElementById('growth-chart-bmi');
            
            var imgData = canvas.toDataURL();
            var doc = new jsPDF({
                orientation: 'landscape'
            });
            doc.setFont("helvetica");
            doc.setFontType("bold");
            doc.setFontSize(12);
            doc.text(10,18, 'Baby BMI Chart');
            doc.setFontSize(6);
            doc.text(258,201, 'Generated on <?php echo date("Y, F j");?>');
            doc.setFontSize(8);
            doc.text(10,200, 'This chart was generated by <?php echo $chart_generator;?> for <?php echo $chart_baby;?>');

            
            var width = (canvas.width * 85) / 240;
            var height = (canvas.height * 85) / 240;

            doc.addImage(imgData, 'JPEG', 25, 30, width, height);
            //doc.output('dataurlnewwindow');     //opens the data uri in new window
            doc.save('baby-bmi-chart.pdf'); //Download the rendered PDF.
        });
    
    </script>
    <!-- end of canvas to pdf -->
    

</body>

</html>


<?php mysqli_close($conn); ?>