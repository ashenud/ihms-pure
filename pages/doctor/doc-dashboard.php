<?php session_start(); ?>
<?php include('../../php/basic/connection.php'); ?>

<?php if(!isset($_SESSION['doctor_id'])) {	
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
    <link rel="stylesheet" href="../../assets/css/english-fonts.css">
    <link rel="stylesheet" href="../../assets/css/material-design-iconic-font.min.css">
    
    <!-- for datatable -->
    <link rel="stylesheet" href="../../assets/css/material.min.css">
    <link rel="stylesheet" href="../../assets/css/custom-table-style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.material.min.css">

    <!--css files-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/animate.css">
    <link rel="stylesheet" href="../../assets/css/calendar/calendar.css">

    <link rel="stylesheet" href="../../assets/css/dashboard-style.css">
    <link rel="stylesheet" href="./css/doc-dashboard-style.css">

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
                        <img src="./img/doctor.png" class="rounded-circle">
                        <?php
                            $query00 = "SELECT * FROM doctor WHERE doctor_id='".$_SESSION['doctor_id']."'";
                            $result00= mysqli_query($conn,$query00);
                            $row00=mysqli_fetch_assoc($result00);
                        ?>
                        <a href="#"> <span><?php echo $row00['doctor_name'];?></span> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <a href="#" class="text-uppercase active">
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
                                <a href="doc-view-sisters.php" class="text-uppercase drop">
                                    <span class="icon-active">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">හෙදියන් බලන්න</span>
                                </a>
                            </li>
                            <li>
                                <a href="doc-view-babies.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">ළමුන් බලන්න</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="doc-table.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-table" aria-hidden="true"></i>
                                </span>
                                <span class="list">දත්ත වගු</span>
                            </a>
                        </li>
                        <li>
                            <a href="doc-inbox.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-inbox" aria-hidden="true"></i>
                                    
                                    <?php
                                        $sql001="SELECT COUNT(status) AS unreadSMS FROM doctor_message WHERE status='unread' AND doctor_id='".$_SESSION['doctor_id']."'";
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
                            <a href="doc-send-messages.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                </span>
                                <span class="list">පණිවිඩ යවන්න</span>
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
                    <div class="row mt-4 mb-5">
                       
                        <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                            <a class="text-decoration-none" href="./doc-view-babies.php">
                                <div class="card card-stats">
                                    <div class="card-header stat-header">
                                        <div class="card-icon icon-color">
                                            <i class="fas fa-baby"></i>
                                        </div>
                                        <p class="card-category">Active Babies</p>

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
                            <a class="text-decoration-none" href="./doc-inbox.php">
                                <div class="card card-stats">
                                    <div class="card-header stat-header">
                                        <div class="card-icon icon-color">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                        <p class="card-category">inbox</p>

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
                                    <p class="card-category">work to do</p>
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
                                    <p class="card-category">meetings</p>
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
                                <form method="POST" action="./php/doc-search-baby-by-mNIC.php">
                                    <div class="card-header">
                                        <h6 class="font-weight-bold">Search Mother</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="search-input">
                                            <input type="text" name="searchUser" class="form-control" placeholder="enter mother nic for search..." required>
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
                                    <h3 class="chart-title">Babies</h3>
                                    <p class="chart-category">number of babies to age in monts</p>
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
    <script type="text/javascript" src="../../assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/charts/Chart.js"></script>
    <script type="text/javascript" src="../../assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="../../assets/css/calendar/calendar.js"></script>
         <!-- for data table -->
    <script type="text/javascript" src="../../assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./js/normal-table-script.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.material.min.js"></script>

    <script type="text/javascript" src="../../assets/js/script.js"> </script>
    <!--end core js files-->

    <!-- writed scripts -->
    
    <!-- show hide sidebar -->
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
    
    <!-- counting up -->
    <script>
        jQuery(document).ready(function() {
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
                        borderWidth: 1
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
                            barPercentage: 0.6,
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