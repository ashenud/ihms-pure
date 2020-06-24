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
    //table css
    include('../../inc/basic/include-dashboard-table-css.php');
    ?>
    
    <link rel="stylesheet" href="/assets/css/calendar/calendar.css">
    <link rel="stylesheet" href="/pages/doctor/css/doc-dashboard-style.css">

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
                            <a class="text-decoration-none" href="/doctor/view-babies">
                                <div class="card card-stats">
                                    <div class="card-header stat-header">
                                        <div class="card-icon icon-color">
                                            <i class="fas fa-baby"></i>
                                        </div>
                                        <p class="card-category">ක්‍රියාකාරී ළදරුවන්</p>

                                        <?php 

                                            $query1="SELECT * FROM baby_register WHERE status='active'";
                                            $result1=mysqli_query($conn, $query1);
                                            $num_rows=mysqli_num_rows($result1);

                                        ?>

                                        <h3 class="card-title counter"><?php echo $num_rows; ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                            <a class="text-decoration-none" href="/doctor/inbox">
                                <div class="card card-stats">
                                    <div class="card-header stat-header">
                                        <div class="card-icon icon-color">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                        <p class="card-category">එන පණිවිඩ</p>

                                        <?php
                                            $query4="SELECT COUNT(status) AS unreadSMS FROM doctor_message WHERE status='unread' AND doctor_id='".$_SESSION['doctor_id']."'";
                                            $result4=mysqli_query($conn,$query4);
                                            $row4=mysqli_fetch_assoc($result4);
                                        ?>

                                        <h3 class="card-title counter"><?php echo $row4['unreadSMS']; ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                            <div class="card card-stats">
                                <div class="card-header stat-header">
                                    <div class="card-icon icon-color">
                                        <i class="fas fa-stethoscope"></i>
                                    </div>
                                    <p class="card-category">පැවරී ඇති රාජකාරි</p>
                                    <h3 class="card-title"><span class="counter">5</span></h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                            <div class="card card-stats">
                                <div class="card-header stat-header">
                                    <div class="card-icon icon-color">
                                        <i class="fas fa-handshake"></i>
                                    </div>
                                    <p class="card-category">රැස්වීම්</p>
                                    <h3 class="card-title"><span class="counter">4</span></h3>
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
                    <div class="row mb-5 parent">
                      
                        <div class="col-lg-6 mb-2">
                            <div class="card search-babies">
                                <form method="POST" action="/pages/doctor/php/doc-search-baby-by-mNIC.php">
                                    <div class="card-header">
                                        <h6 class="font-weight-bold">ළදරුවන් නිරීක්ෂණය කිරීම</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="search-input">
                                            <input type="text" name="searchUser" class="form-control" placeholder="සෙවීම සඳහා මවගේ හැඳුනුම් අංකය ඇතුළත් කරන්න..." required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" value="SEARCH" class="btn btn-sm text-light" name="searchBabyUsingMnic">
                                    </div>
                                </form>
                            </div>
                        </div>
                       
                        <div class="col-lg-6 mb-2">
                            <div class="card card-chart">
                                <div class="card-header chart-header">
                                    
                                    <?php
                                    
                                        $age_count = '';

                                        $query1 = "CREATE TEMPORARY TABLE IF NOT EXISTS ages AS (SELECT FLOOR(DATEDIFF(CURDATE(),baby_dob)/30) AS age 
                                                   FROM baby_register WHERE status='active')";
                                        $result1= mysqli_query($conn,$query1);
                                    
                                            if($result1) {
                                                $query2 = "SELECT IF(rng='1-6','0-6',rng) 'range', IFNULL(B.rngcount,0) 'count' 
                                                           FROM (
                                                                SELECT '1 - 6' rng UNION
                                                                SELECT '7 - 12' UNION
                                                                SELECT '13 - 18' UNION
                                                                SELECT '18 - 24' UNION
                                                                SELECT '25 - 30' UNION
                                                                SELECT '31 - 36' ) 
                                                           A LEFT JOIN (
                                                                SELECT CONCAT(FLOOR(age/6)*6+1,' - ',FLOOR(age/6)*6+6) rng, COUNT(1) rngcount 
                                                                FROM ages GROUP BY rng) 
                                                           B USING (rng)";
                                                
                                                $result2= mysqli_query($conn,$query2);
                                                
                                                while ($row1 = mysqli_fetch_assoc($result2)) {
                                                    $age_count = $age_count . '"'. $row1['count'].'",';
                                                }
                                                
                                                $age_count = trim($age_count,",");
                                            }
                                    
                                    
                                        $query3= "DROP TEMPORARY TABLE IF EXISTS ages";
                                        $result3= mysqli_query($conn,$query3);
                                    
                                    
                                    ?>
                                    
                                    <canvas id="chart-age" class="line-chart"></canvas>
                                </div>
                                <div class="card-body chart-body">
                                    <h3 class="chart-title">ළදරුවන්</h3>
                                    <p class="chart-category">එක් එක් වයස්(මාස) කාණ්ඩයේ සිටින ළදරුවන් සංඛ්‍යාව</p>
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                    <div class="row mb-5">
                       
                        <div class="col-md-6 mt-5 mb-2">
                                                      
                            <?php //include('inc/low-high-weight-table.php'); ?>
                            
                        </div>
                        
                        <div class="col-md-6 mt-5">
                                                      
                            <?php //include('inc/low-high-height-table.php'); ?>
                            
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
    //table js
    include('../../inc/basic/include-dashboard-table-js.php');
    ?>
    
    <script type="text/javascript" src="/assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="/assets/css/calendar/calendar.js"></script>
    <script type="text/javascript" src="/assets/js/charts/Chart.min.js"></script>

   
    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.d-dash').addClass('active');
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
            
            //counting up
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>
    
    <!-- chart --> 
    <script>
        var ChartAge = {
                type: 'bar',
                data: {
                    labels: ['0-6', '7-12', '13-18', '19-24', '25-30', '31-36'],
                    datasets: [{
                        label: 'Number of Babies',
                        data: [<?php echo $age_count; ?>],
                        backgroundColor: '#ffa7ba',
                        borderColor: '#ffa7ba',
                        borderWidth: 1,
                        barPercentage: 0.8,
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1,
                                fontColor: '#fff',
                                fontSize: 9,
                                padding: 10,
                            },
                            gridLines: {
                                color: 'rgba(255, 167, 186, 1)',
                                borderDash: [3, 2],
                                zeroLineColor: '#ffa7ba'
                            }

                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: '#fff',
                                fontSize: 9,
                            },
                            gridLines: {
                                color: 'rgba(255, 167, 186, 0.5)',
                                borderDash: [3, 2],
                                zeroLineColor: '#ffa7ba'
                            }
                        }]
                    }
                }
            }

        var ctxAge = document.getElementById('chart-age').getContext('2d');
        new Chart(ctxAge, ChartAge);
        
    </script> 
    
    <!-- end of writed scripts -->



</body>

</html>


<?php mysqli_close($conn); ?>