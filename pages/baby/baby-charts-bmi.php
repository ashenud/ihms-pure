<?php

    session_start();

    include('../../php/basic/connection.php');

    if(!isset($_SESSION['mother_id']) && !isset($_SESSION['serch_baby_using_nic']) && !isset($_SESSION['doc_serch_baby_using_nic'])) {	
        header('location:/?noPermission=1');
    }

    if(!isset($_SESSION['baby_id'])) {	
       header('location:./baby-select.php');
    }

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

                                            echo "දරුවාගේ උසට සරිලන බර ප්‍රස්ථාරය (පිරිමි)";

                                        } 
                                        else {

                                            echo "දරුවාගේ උසට සරිලන බර ප්‍රස්ථාරය (ගැහැණු)";

                                        }

                                    ?>
                                    </p>
                                    <div class="btn-set">
                                        <button type="button" class="btn change-btn btn-sm" data-type="f24m">මාස 0 - 24</button>
                                        <button type="button" class="btn change-btn btn-sm" data-type="l36m">මාස 25 - 60</button>
                                        <button type="button" class="btn change-btn btn-sm download">බාගත කරන්න</button>
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
                                                <h5 class="card-title">බර සටහන</h5>
                                                <p><span class="badge color-5">     </span>අධිබර</p>
                                                <p><span class="badge color-1"><i></i></span>මධ්‍යස්ථය</p>
                                                <p><span class="badge color-1">     </span>නියමිත බර</p>
                                                <p><span class="badge color-4">     </span>අඩු බරට අවදානම</p>
                                                <p><span class="badge color-2">     </span>අඩු බර</p>
                                                <p><span class="badge color-3">     </span>උග්‍ර අඩු බර</p>
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
   
    <script type="text/javascript" src="../../assets/js/charts/Chart.js"></script>
    <script type="text/javascript" src="../../assets/js/jspdf.min.js"></script>
    <script type="text/javascript" src="./js/growth-chart-bmi.js"></script>

    
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
            
            var width = (canvas.width * 65) / 240;
            var height = (canvas.height * 65) / 240;

            doc.addImage(imgData, 'JPEG', 15, 18, width, height);
            doc.output('dataurlnewwindow');     //opens the data uri in new window
            //doc.save('baby-bmi-chart.pdf'); //Download the rendered PDF.
        });
    
    </script>
    <!-- end of canvas to pdf -->
    

</body>

</html>


<?php mysqli_close($conn); ?>