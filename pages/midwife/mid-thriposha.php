<?php session_start(); ?>
<?php include('../../php/basic/connection.php'); ?>

<?php if(!isset($_SESSION['midwife_id'])) {	
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
    <link rel="stylesheet" href="../../assets/css/material-design-iconic-font.min.css">

    <!--css files-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/animate.css">

    <link rel="stylesheet" href="../../assets/css/dashboard-style.css">
    
    <!--for charts-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    

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
                        <img src="./img/midwife.png" width="50" class="rounded-circle">
                        <a href="#" class="text-uppercase"> <?php echo($_SESSION['midwife_id']); ?> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <a href="mid-dashboard.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                </span>
                                <span class="list">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-cookie-bite" aria-hidden="true"></i>
                                </span>
                                <span class="list">Thriposha</span>
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
 
                    <div class="row d-flex justify-content-between">
                        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                            <label style="color:rgb(255, 166, 0);font-size: 4vw;">Thriposha</label><br>
                        </div>
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label style="outline-style:groove; outline-color: rgb(24, 23, 23);color:blue;font-size: 35px;">
                                <?php
                                    include "php/selectdb.php";
                                    $currentYMonth=date("Y-m");

                                    $sql1="SELECT available_qty,MAX(distributed_qty) FROM thriposha_storage WHERE midwife_id='".$_SESSION['midwife_id']."' AND updated_date LIKE'%$currentYMonth%'";
                                    $run=mysqli_query($conn,$sql1);
                                    $get=mysqli_fetch_assoc($run);
                                    $reminder=$get['available_qty']-$get['MAX(distributed_qty)'];
                                    echo $reminder;
                                ?>
                            </label>
                        </div>
                    </div>            
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8">
                            <div class="card bg-secondary">
                                <div class="card-header" style="font-size:22px;color:rgb(255, 255, 255);">Update Form
                                </div>
                                <div class="card-body">
                                    <div class="card">
                                        <div class="class-body">
                                            <form method="POST" action="php/update-thriposha-action.php">
                                                <div class="form-row d-flex justify-content-center">
                                                    <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                        <p style="color:green;">
                                                            <?php
                                                                if(isset($_GET['success'])){
                                                                echo 'Updated';
                                                }
                                                            ?>
                                                        </p>
                                                        <label>midwife ID</label>
                                                        <input type="text" class="form-control" value="<?php echo $_SESSION['midwife_id'];?>" style="color:blue;" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-row d-flex justify-content-center">
                                                    <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                        <label>Available Quantity</label>
                                                        <input type="number" name="availableQty" class="form-control" placeholder="include earlier month thiposha balance">
                                                    </div>
                                                </div>
                                                <div class="form-row d-flex justify-content-center">
                                                    <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                        <label>Update Date</label>
                                                        <input type="date" name="today" style="color: blue;" class="form-control" value="<?php echo date("Y-m-d");?>">
                                                    </div>
                                                </div>
                                                <div class="form-row d-flex justify-content-center">
                                                    <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                        <input type="submit" name="submitThriposha" class="btn btn-primary" value="Update">
                                                        <input type="reset" class="btn btn-secondary" value="Clear">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <hr style="border-color: coral;">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <label style="color:rgb(255, 22, 92);font-size: 20px;">Usage of Thriposha</label>
                        </div>
                    </div>
                    <br><br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <div class="card bg-warning">
                                <div class="card-body">
                                    <div id="chart_div3"></div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <div class="card bg-secondary">
                                <div class="card-body">
                                    <div id="chart_div2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <div class="card bg-secondary">
                                <div class="card-body">
                                    <div id="chart_div1">
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
    <script type="text/javascript" src="../../assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/bootstrap.min.js"></script>

    <script type="text/javascript" src="../../assets/js/script.js"> </script>
    <!--end core js files-->

    <!-- writed scripts -->
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
    <!-- end of writed scripts -->
    
    
    <script>
        google.charts.load('current', {
            packages: ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(drawLineColors1);
        google.charts.setOnLoadCallback(drawLineColors2);
        google.charts.setOnLoadCallback(drawLineColors3);


        function drawLineColors1() {
            var data1 = new google.visualization.DataTable();

            data1.addColumn('string', 'X');
            <?php
            $year=date("Y");
            $lastYear1= $year-1;
            $lastYear2=$lastYear1-1;

            echo " data1.addColumn('number', $lastYear2)";
            ?>



            data1.addRows([
                <?php
                    include "php/selectdb.php";
                    $sql03="SELECT MONTH(updated_date) AS getM,distributed_qty FROM thriposha_storage WHERE midwife_id='".$_SESSION['midwife_id']."' AND updated_date LIKE '%$lastYear2%'";
                    $take1=mysqli_query($conn,$sql03);
                    
            
                        while($row1=mysqli_fetch_assoc($take1)){ 
                            if($row1['getM']==1){
                                $row1['getM']="Jan";
                            }
                            elseif ($row1['getM']==2) {
                                $row1['getM']="Feb";
                            }
                            elseif ($row1['getM']==3) {
                                $row1['getM']="Mar";
                            }
                            elseif ($row1['getM']==4) {
                                $row1['getM']="Apr";
                            }
                            elseif ($row1['getM']==5) {
                                $row1['getM']="May";
                            }
                            elseif ($row1['getM']==6) {
                                $row1['getM']="Jun";
                            }
                            elseif ($row1['getM']==7) {
                                $row1['getM']="Jul";
                            }
                            elseif ($row1['getM']==8) {
                                $row1['getM']="Aug";
                            }
                            elseif ($row1['getM']==9) {
                                $row1['getM']="Sep";
                            }
                            elseif ($row1['getM']==10) {
                                $row1['getM']="Oct";
                            }
                            elseif ($row1['getM']==11) {
                                $row1['getM']="Nov";
                            }
                            else{
                                $row1['getM']="Dec";
                            }
                            echo "['".$row1['getM']."',".$row1['distributed_qty']."],";
                        }
                ?>
            ]);

            var options1 = {
                hAxis: {
                    title: 'Month',
                    textStyle: {
                        color: '#000000',
                        fontSize: 12,
                        fontName: 'Arial',
                        bold: true,
                        italic: true
                    },
                    titleTextStyle: {
                        color: '#0a29f5',
                        fontSize: 16,
                        fontName: 'Arial',
                        bold: true,

                    }
                },

                vAxis: {
                    title: 'Distributed Quantity',
                    textStyle: {
                        color: '#000000',
                        fontSize: 12,
                        bold: true
                    },
                    titleTextStyle: {
                        color: '#0a29f5',
                        fontSize: 16,
                        bold: true
                    }
                },
                colors: ['#000000'],
                backgroundColor: '#f5f6f7'
            };

            var chart1 = new google.visualization.LineChart(document.getElementById('chart_div1'));
            chart1.draw(data1, options1);
        }

        function drawLineColors2() {
            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'X');

            <?php
                echo " data2.addColumn('number', $lastYear1)";
            ?>

            data2.addRows([
                <?php
                    include "php/selectdb.php";
                    $sql02="SELECT MONTH(updated_date) AS getM,distributed_qty FROM thriposha_storage WHERE midwife_id='".$_SESSION['midwife_id']."' AND updated_date LIKE '%$lastYear1%'";
                    $take2=mysqli_query($conn,$sql02);
                    
            
                        while($row2=mysqli_fetch_assoc($take2)){
                                                        
                            if($row2['getM']==1){
                                $row2['getM']="Jan";
                            }
                            elseif ($row2['getM']==2) {
                                $row2['getM']="Feb";
                            }
                            elseif ($row2['getM']==3) {
                                $row2['getM']="Mar";
                            }
                            elseif ($row2['getM']==4) {
                                $row2['getM']="Apr";
                            }
                            elseif ($row2['getM']==5) {
                                $row2['getM']="May";
                            }
                            elseif ($row2['getM']==6) {
                                $row2['getM']="Jun";
                            }
                            elseif ($row2['getM']==7) {
                                $row2['getM']="Jul";
                            }
                            elseif ($row2['getM']==8) {
                                $row2['getM']="Aug";
                            }
                            elseif ($row2['getM']==9) {
                                $row2['getM']="Sep";
                            }
                            elseif ($row2['getM']==10) {
                                $row2['getM']="Oct";
                            }
                            elseif ($row2['getM']==11) {
                                $row2['getM']="Nov";
                            }
                            else{
                                $row2['getM']="Dec";
                            }
                            echo "['".$row2['getM']."',".$row2['distributed_qty']."],";
                        }
                ?>
            ]);

            var options2 = {
                hAxis: {
                    title: 'Month',
                    textStyle: {
                        color: '#000000',
                        fontSize: 12,
                        fontName: 'Arial',
                        bold: true,
                        italic: true
                    },
                    titleTextStyle: {
                        color: '#0a29f5',
                        fontSize: 16,
                        fontName: 'Arial',
                        bold: true,

                    }
                },

                vAxis: {
                    title: 'Distributed Quantity',
                    textStyle: {
                        color: '#000000',
                        fontSize: 12,
                        bold: true
                    },
                    titleTextStyle: {
                        color: '#0a29f5',
                        fontSize: 16,
                        bold: true
                    }
                },
                colors: ['#000000'],
                backgroundColor: '#f5f6f7'
            };

            var chart2 = new google.visualization.LineChart(document.getElementById('chart_div2'));
            chart2.draw(data2, options2);
        }

        function drawLineColors3() {

            var data3 = new google.visualization.DataTable();

            data3.addColumn('string', 'X');
            <?php
            echo " data3.addColumn('number', $year)";
            ?>



            data3.addRows([
                <?php
                    include "php/selectdb.php";
                    $sql01="SELECT MONTH(updated_date) AS getM,distributed_qty FROM thriposha_storage WHERE midwife_id='".$_SESSION['midwife_id']."' AND updated_date LIKE '%$year%'";
                    $take3=mysqli_query($conn,$sql01);
                    
            
                        while($row3=mysqli_fetch_assoc($take3)){ 
                            if($row3['getM']==1){
                                $row3['getM']="Jan";
                            }
                            elseif ($row3['getM']==2) {
                                $row3['getM']="Feb";
                            }
                            elseif ($row3['getM']==3) {
                                $row3['getM']="Mar";
                            }
                            elseif ($row3['getM']==4) {
                                $row3['getM']="Apr";
                            }
                            elseif ($row3['getM']==5) {
                                $row3['getM']="May";
                            }
                            elseif ($row3['getM']==6) {
                                $row3['getM']="Jun";
                            }
                            elseif ($row3['getM']==7) {
                                $row3['getM']="Jul";
                            }
                            elseif ($row3['getM']==8) {
                                $row3['getM']="Aug";
                            }
                            elseif ($row3['getM']==9) {
                                $row3['getM']="Sep";
                            }
                            elseif ($row3['getM']==10) {
                                $row3['getM']="Oct";
                            }
                            elseif ($row3['getM']==11) {
                                $row3['getM']="Nov";
                            }
                            else{
                                $row3['getM']="Dec";
                            }
                            echo "['".$row3['getM']."',".$row3['distributed_qty']."],";
                        }
                ?>
            ]);

            var options3 = {
                hAxis: {
                    title: 'Month',
                    textStyle: {
                        color: '#000000',
                        fontSize: 12,
                        fontName: 'Arial',
                        bold: true,
                        italic: true
                    },
                    titleTextStyle: {
                        color: '#0a29f5',
                        fontSize: 16,
                        fontName: 'Arial',
                        bold: true,

                    }
                },

                vAxis: {
                    title: 'Distributed Quantity',
                    textStyle: {
                        color: '#000000',
                        fontSize: 12,
                        bold: true
                    },
                    titleTextStyle: {
                        color: '#0a29f5',
                        fontSize: 16,
                        bold: true
                    }
                },
                colors: ['#19b06c']
            };

            var chart3 = new google.visualization.LineChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);
        }
    </script>



</body>

</html>


<?php mysqli_close($conn); ?>