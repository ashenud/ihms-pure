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
    <link rel="stylesheet" href="./css/mid-vaccine-mark-style.css">

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
                            <a href="../baby/baby-charts.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" aria-hidden="true"></i>
                                </span>
                                <span class="list">වර්ධන සටහන</span>
                            </a>
                        </li>
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
                               
                                <div class="main-timeline">

                                    <!--at birth timeline-->
                                    <div class="timeline">
                
                                         <span class="icon fas fa-syringe"></span>
                                         <div class="timeline-content">

                                            <!--at birth vaccination-->
                                            <div class="title">
                                                <h3>At Birth</h3>
                                            </div>

                                            <div class="description">

                                                <!--BCG-1-->
                                                <?php
                                                mysqli_select_db($conn, 'cs2019g6');
                                                $query1="SELECT * FROM vac_birth WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=1";
                                                $result1=mysqli_query($conn,$query1);
                                                $row1=mysqli_fetch_assoc($result1);
                                                
                                                $sql1="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=1";
                                                $run1=mysqli_query($conn,$sql1);
                                                $data1=mysqli_fetch_assoc($run1);
                                                
                                                    if(!empty($row1['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine1" value="1" checked="checked" disabled>
                                                                <label for="vaccine1">BCG-1</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data1['giving_date'])) && (!empty($row1['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine1" value="1">
                                                                <label for="vaccine1">BCG-1</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='1'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data1['giving_date'])) && (empty($row1['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine1" value="1" disabled>
                                                                <label for="vaccine1">BCG-1</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine1" value="1" disabled>
                                                                <label for="vaccine1">BCG-1</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='1'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                ?>
                                                <!--end BCG-1-->

                                                <!-- BCG-2(if no scar) -->
                                                <?php
                                                if(empty($data1['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine2" value="2" disabled>
                                                            <label for="vaccine2">BCG-2(if no scar)</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query2="SELECT * FROM vac_birth WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=2";
                                                    $result2=mysqli_query($conn,$query2);
                                                    $row2=mysqli_fetch_assoc($result2);
                                                    
                                                    $sql2="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=2";
                                                    $run2=mysqli_query($conn,$sql2);
                                                    $data2=mysqli_fetch_assoc($run2);
                                                    
                                                    if(!empty($row2['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine2" value="2" checked="checked" disabled>
                                                                <label for="vaccine2">BCG-2(if no scar)</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data2['giving_date'])) && (!empty($row2['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine2" value="2" disabled>
                                                                <label for="vaccine2">BCG-2(if no scar)</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='2'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data2['giving_date'])) && (empty($row2['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine2" value="2" disabled>
                                                                <label for="vaccine2">BCG-2(if no scar)</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine2" value="2" disabled>
                                                                <label for="vaccine2">BCG-2(if no scar)</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='2'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end BCG-2(if no scar)-->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- 2 months timeline--->
                                    <div class="timeline">
                
                                         <span class="icon fas fa-syringe"></span>
                                         <div class="timeline-content">

                                            <!--2 months vaccination--->
                                            <div class="title">
                                                <h3>2 Months</h3>
                                            </div>

                                            <div class="description">

                                                <!--DPT_1-->
                                                <?php
                                                if(empty($data2['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine3" value="3" disabled>
                                                            <label for="vaccine3">DPT_1</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query3="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=3";
                                                    $result3=mysqli_query($conn,$query3);
                                                    $row3=mysqli_fetch_assoc($result3);
                                                    
                                                    $sql3="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=3";
                                                    $run3=mysqli_query($conn,$sql3);
                                                    $data3=mysqli_fetch_assoc($run3);
                                                    
                                                    if(!empty($row3['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine3" value="3" checked="checked" disabled>
                                                                <label for="vaccine3">DPT_1</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data3['giving_date'])) && (!empty($row3['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine3" value="3" disabled>
                                                                <label for="vaccine3">DPT_1</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='3'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data3['giving_date'])) && (empty($row3['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine3" value="3" disabled>
                                                                <label for="vaccine3">DPT_1</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine3" value="3" disabled>
                                                                <label for="vaccine3">DPT_1</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='3'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>                                                            
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end DPT_1 -->

                                                <!-- OPV-1 -->
                                                <?php
                                                if(empty($data3['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine4" value="4" disabled>
                                                            <label for="vaccine4">OPV-1</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query4="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=4";
                                                    $result4=mysqli_query($conn,$query4);
                                                    $row4=mysqli_fetch_assoc($result4);
                                                    
                                                    $sql4="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=4";
                                                    $run4=mysqli_query($conn,$sql4);
                                                    $data4=mysqli_fetch_assoc($run4);
                                                    
                                                    if(!empty($row4['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine4" value="4" checked="checked" disabled>
                                                                <label for="vaccine4">OPV-1</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data4['giving_date'])) && (!empty($row4['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine4" value="4" disabled>
                                                                <label for="vaccine4">OPV-1</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='4'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data4['giving_date'])) && (empty($row4['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine4" value="4" disabled>
                                                                <label for="vaccine4">OPV-1</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine4" value="4" disabled>
                                                                <label for="vaccine4">OPV-1</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='4'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- end OPV-1 -->
                                                
                                                <!-- Hepatitis B-1 -->
                                                <?php
                                                if(empty($data4['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine5" value="5" disabled>
                                                            <label for="vaccine5">Hepatitis B-1</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query5="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=5";
                                                    $result5=mysqli_query($conn,$query5);
                                                    $row5=mysqli_fetch_assoc($result5);
                                                    
                                                    $sql5="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=5";
                                                    $run5=mysqli_query($conn,$sql5);
                                                    $data5=mysqli_fetch_assoc($run5);
                                                    
                                                    if(!empty($row5['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine5" value="5" checked="checked" disabled>
                                                                <label for="vaccine5">Hepatitis B-1</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data5['giving_date'])) && (!empty($row5['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine5" value="5" disabled>
                                                                <label for="vaccine5">Hepatitis B-1</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='5'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data5['giving_date'])) && (empty($row5['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine5" value="5" disabled>
                                                                <label for="vaccine5">Hepatitis B-1</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine5" value="5" disabled>
                                                                <label for="vaccine5">Hepatitis B-1</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='5'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end Hepatitis B-1-->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- 4 month timeline--->
                                    <div class="timeline">
                
                                         <span class="icon fas fa-syringe"></span>
                                         <div class="timeline-content">

                                            <!--4 month vaccination-->
                                            <div class="title">
                                                <h3>4 Months</h3>
                                            </div>

                                            <div class="description">

                                                <!--DPT_2-->
                                                <?php
                                                if(empty($data5['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine6" value="6" disabled>
                                                            <label for="vaccine6">DPT_2</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query6="SELECT * FROM vac_4months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=6";
                                                    $result6=mysqli_query($conn,$query6);
                                                    $row6=mysqli_fetch_assoc($result6);
                                                    
                                                    $sql6="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=6";
                                                    $run6=mysqli_query($conn,$sql6);
                                                    $data6=mysqli_fetch_assoc($run6);
                                                    
                                                    if(!empty($row6['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine6" value="6" checked="checked" disabled>
                                                                <label for="vaccine6">DPT_2</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data6['giving_date'])) && (!empty($row6['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine6" value="6" disabled>
                                                                <label for="vaccine6">DPT_2</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='6'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data6['giving_date'])) && (empty($row6['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine6" value="6" disabled>
                                                                <label for="vaccine6">DPT_2</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine6" value="6" disabled>
                                                                <label for="vaccine6">DPT_2</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='6'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end DPT_2 -->

                                                <!-- OPV-2 -->
                                                <?php
                                                if(empty($data6['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine7" value="7" disabled>
                                                            <label for="vaccine7">OPV-2</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query7="SELECT * FROM vac_4months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=7";
                                                    $result7=mysqli_query($conn,$query7);
                                                    $row7=mysqli_fetch_assoc($result7);
                                                    
                                                    $sql7="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=7";
                                                    $run7=mysqli_query($conn,$sql7);
                                                    $data7=mysqli_fetch_assoc($run7);
                                                    
                                                    if(!empty($row7['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine7" value="7" checked="checked" disabled>
                                                                <label for="vaccine7">OPV-2</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data7['giving_date'])) && (!empty($row7['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine7" value="7" disabled>
                                                                <label for="vaccine7">OPV-2</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='7'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data7['giving_date'])) && (empty($row7['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine7" value="7" disabled>
                                                                <label for="vaccine7">OPV-2</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine7" value="7" disabled>
                                                                <label for="vaccine7">OPV-2</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='7'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- end OPV-2 -->
                                                
                                                <!-- Hepatitis B-2 -->
                                                <?php
                                                if(empty($data7['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine8" value="8" disabled>
                                                            <label for="vaccine8">Hepatitis B-2</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query8="SELECT * FROM vac_4months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=8";
                                                    $result8=mysqli_query($conn,$query8);
                                                    $row8=mysqli_fetch_assoc($result8);
                                                    
                                                    $sql8="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=8";
                                                    $run8=mysqli_query($conn,$sql8);
                                                    $data8=mysqli_fetch_assoc($run8);
                                                    
                                                    if(!empty($row8['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine8" value="8" checked="checked" disabled>
                                                                <label for="vaccine8">Hepatitis B-2</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data8['giving_date'])) && (!empty($row8['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine8" value="8" disabled>
                                                                <label for="vaccine8">Hepatitis B-2</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='8'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data8['giving_date'])) && (empty($row8['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine8" value="8" disabled>
                                                                <label for="vaccine8">Hepatitis B-2</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine8" value="8" disabled>
                                                                <label for="vaccine8">Hepatitis B-2</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='8'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end Hepatitis B-2-->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- 6 month timeline--->
                                    <div class="timeline">
                
                                         <span class="icon fas fa-syringe"></span>
                                         <div class="timeline-content">

                                            <!--6 month vaccination-->
                                            <div class="title">
                                                <h3>6 Months</h3>
                                            </div>

                                            <div class="description">

                                                <!--DPT_3-->
                                                <?php
                                                if(empty($data8['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine9" value="9" disabled>
                                                            <label for="vaccine9">DPT_3</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query9="SELECT * FROM vac_6months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=9";
                                                    $result9=mysqli_query($conn,$query9);
                                                    $row9=mysqli_fetch_assoc($result9);
                                                    
                                                    $sql9="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=9";
                                                    $run9=mysqli_query($conn,$sql9);
                                                    $data9=mysqli_fetch_assoc($run9);
                                                    
                                                    if(!empty($row9['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine9" value="9" checked="checked" disabled>
                                                                <label for="vaccine9">DPT_3</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data9['giving_date'])) && (!empty($row9['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine9" value="9" disabled>
                                                                <label for="vaccine9">DPT_3</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='9'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data9['giving_date'])) && (empty($row9['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine9" value="9" disabled>
                                                                <label for="vaccine9">DPT_3</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine9" value="9" disabled>
                                                                <label for="vaccine9">DPT_3</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='9'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end DPT_3 -->

                                                <!-- OPV-3 -->
                                                <?php
                                                if(empty($data9['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine10" value="10" disabled>
                                                            <label for="vaccine10">OPV-3</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query10="SELECT * FROM vac_6months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=10";
                                                    $result10=mysqli_query($conn,$query10);
                                                    $row10=mysqli_fetch_assoc($result10);
                                                    
                                                    $sql10="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=10";
                                                    $run10=mysqli_query($conn,$sql10);
                                                    $data10=mysqli_fetch_assoc($run10);
                                                    
                                                    if(!empty($row10['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine10" value="10" checked="checked" disabled>
                                                                <label for="vaccine10">OPV-3</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data10['giving_date'])) && (!empty($row10['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine10" value="10" disabled>
                                                                <label for="vaccine10">OPV-3</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='10'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data10['giving_date'])) && (empty($row10['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine10" value="10" disabled>
                                                                <label for="vaccine10">OPV-3</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine10" value="10" disabled>
                                                                <label for="vaccine10">OPV-3</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='10'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- end OPV-3 -->
                                                
                                                <!-- Hepatitis B-3 -->
                                                <?php
                                                if(empty($data10['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine11" value="11" disabled>
                                                            <label for="vaccine11">Hepatitis B-3</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query11="SELECT * FROM vac_6months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=11";
                                                    $result11=mysqli_query($conn,$query11);
                                                    $row11=mysqli_fetch_assoc($result11);
                                                    
                                                    $sql11="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=11";
                                                    $run11=mysqli_query($conn,$sql11);
                                                    $data11=mysqli_fetch_assoc($run11);
                                                    
                                                    if(!empty($row11['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine11" value="11" checked="checked" disabled>
                                                                <label for="vaccine11">Hepatitis B-3</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data11['giving_date'])) && (!empty($row11['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine11" value="11" disabled>
                                                                <label for="vaccine11">Hepatitis B-3</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='11'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data11['giving_date'])) && (empty($row11['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine11" value="11" disabled>
                                                                <label for="vaccine11">Hepatitis B-3</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine11" value="11" disabled>
                                                                <label for="vaccine11">Hepatitis B-3</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='11'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end Hepatitis B-3-->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- 9 month timeline--->
                                    <div class="timeline">
                
                                         <span class="icon fas fa-syringe"></span>
                                         <div class="timeline-content">

                                            <!--9 month vaccination-->
                                            <div class="title">
                                                <h3>9 Months</h3>
                                            </div>

                                            <div class="description">

                                                <!--Measles-->
                                                <?php
                                                if(empty($data11['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine12" value="12" disabled>
                                                            <label for="vaccine12">Measles</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query12="SELECT * FROM vac_9months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=12";
                                                    $result12=mysqli_query($conn,$query12);
                                                    $row12=mysqli_fetch_assoc($result12);
                                                    
                                                    $sql12="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=12";
                                                    $run12=mysqli_query($conn,$sql12);
                                                    $data12=mysqli_fetch_assoc($run12);
                                                    
                                                    if(!empty($row12['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine12" value="12" checked="checked" disabled>
                                                                <label for="vaccine12">Measles</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data12['giving_date'])) && (!empty($row12['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine12" value="12" disabled>
                                                                <label for="vaccine12">Measles</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='12'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data12['giving_date'])) && (empty($row12['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine12" value="12" disabled>
                                                                <label for="vaccine12">Measles</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine12" value="12" disabled>
                                                                <label for="vaccine12">Measles</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='12'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end Measles -->

                                                <!-- Vitamin-A -->
                                                <?php
                                                if(empty($data12['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine13" value="13" disabled>
                                                            <label for="vaccine13">Vitamin-A</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query13="SELECT * FROM vac_9months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=13";
                                                    $result13=mysqli_query($conn,$query13);
                                                    $row13=mysqli_fetch_assoc($result13);
                                                    
                                                    $sql13="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=13";
                                                    $run13=mysqli_query($conn,$sql13);
                                                    $data13=mysqli_fetch_assoc($run13);
                                                    
                                                    if(!empty($row13['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine13" value="13" checked="checked" disabled>
                                                                <label for="vaccine13">Vitamin-A</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data13['giving_date'])) && (!empty($row13['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine13" value="13" disabled>
                                                                <label for="vaccine13">Vitamin-A</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='13'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data13['giving_date'])) && (empty($row13['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine13" value="13" disabled>
                                                                <label for="vaccine13">Vitamin-A</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine13" value="13" disabled>
                                                                <label for="vaccine13">Vitamin-A</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='13'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- Vitamin-A -->
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 18 month timeline--->
                                    <div class="timeline">
                
                                         <span class="icon fas fa-syringe"></span>
                                         <div class="timeline-content">

                                            <!--18 month vaccination-->
                                            <div class="title">
                                                <h3>18 Months</h3>
                                            </div>

                                            <div class="description">

                                                <!--DPT_4-->
                                                <?php
                                                if(empty($data13['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine14" value="14" disabled>
                                                            <label for="vaccine14">DPT_4</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query14="SELECT * FROM vac_18months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=14";
                                                    $result14=mysqli_query($conn,$query14);
                                                    $row14=mysqli_fetch_assoc($result14);
                                                    
                                                    $sql14="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=14";
                                                    $run14=mysqli_query($conn,$sql14);
                                                    $data14=mysqli_fetch_assoc($run14);
                                                    
                                                    if(!empty($row14['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine14" value="14" checked="checked" disabled>
                                                                <label for="vaccine14">DPT_4</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data14['giving_date'])) && (!empty($row14['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine14" value="14" disabled>
                                                                <label for="vaccine14">DPT_4</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='14'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data14['giving_date'])) && (empty($row14['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine14" value="14" disabled>
                                                                <label for="vaccine14">DPT_4</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine14" value="14" disabled>
                                                                <label for="vaccine14">DPT_4</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='14'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end DPT_4 -->

                                                <!-- OPV-4 -->
                                                <?php
                                                if(empty($data14['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine15" value="15" disabled>
                                                            <label for="vaccine15">OPV-4</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query15="SELECT * FROM vac_18months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=15";
                                                    $result15=mysqli_query($conn,$query15);
                                                    $row15=mysqli_fetch_assoc($result15);
                                                    
                                                    $sql15="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=15";
                                                    $run15=mysqli_query($conn,$sql15);
                                                    $data15=mysqli_fetch_assoc($run15);
                                                    
                                                    if(!empty($row15['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine15" value="15" checked="checked" disabled>
                                                                <label for="vaccine15">OPV-4</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data15['giving_date'])) && (!empty($row15['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine15" value="15" disabled>
                                                                <label for="vaccine15">OPV-4</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='15'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data15['giving_date'])) && (empty($row15['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine15" value="15" disabled>
                                                                <label for="vaccine15">OPV-4</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine15" value="15" disabled>
                                                                <label for="vaccine15">OPV-4</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='15'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- end OPV-4 -->

                                                <!-- Vitamin-A -->
                                                <?php
                                                if(empty($data15['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine16" value="16" disabled>
                                                            <label for="vaccine16">Vitamin-A</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query16="SELECT * FROM vac_18months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=16";
                                                    $result16=mysqli_query($conn,$query16);
                                                    $row16=mysqli_fetch_assoc($result16);
                                                    
                                                    $sql16="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=16";
                                                    $run16=mysqli_query($conn,$sql16);
                                                    $data16=mysqli_fetch_assoc($run16);
                                                    
                                                    if(!empty($row16['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine16" value="16" checked="checked" disabled>
                                                                <label for="vaccine16">Vitamin-A</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data16['giving_date'])) && (!empty($row16['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine16" value="16" disabled>
                                                                <label for="vaccine16">Vitamin-A</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='16'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data16['giving_date'])) && (empty($row16['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine16" value="16" disabled>
                                                                <label for="vaccine16">Vitamin-A</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine16" value="16" disabled>
                                                                <label for="vaccine16">Vitamin-A</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='16'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- Vitamin-A -->
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 3 year timeline--->
                                    <div class="timeline">
                
                                         <span class="icon fas fa-syringe"></span>
                                         <div class="timeline-content">

                                            <!-- 3 year vaccination-->
                                            <div class="title">
                                                <h3>3 year</h3>
                                            </div>

                                            <div class="description">

                                                <!--Measles & Rubella-->
                                                <?php
                                                if(empty($data16['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine17" value="17" disabled>
                                                            <label for="vaccine17">Measles & Rubella</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query17="SELECT * FROM vac_3years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=17";
                                                    $result17=mysqli_query($conn,$query17);
                                                    $row17=mysqli_fetch_assoc($result17);
                                                    
                                                    $sql17="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=17";
                                                    $run17=mysqli_query($conn,$sql17);
                                                    $data17=mysqli_fetch_assoc($run17);
                                                    
                                                    if(!empty($row17['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine17" value="17" checked="checked" disabled>
                                                                <label for="vaccine17">Measles & Rubella</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data17['giving_date'])) && (!empty($row17['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine17" value="17" disabled>
                                                                <label for="vaccine17">Measles & Rubella</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='17'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data17['giving_date'])) && (empty($row17['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine17" value="17" disabled>
                                                                <label for="vaccine17">Measles & Rubella</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine17" value="17" disabled>
                                                                <label for="vaccine17">Measles & Rubella</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='17'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end Measles & Rubella -->

                                                <!-- Vitamin-A -->
                                                <?php
                                                if(empty($data17['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine18" value="18" disabled>
                                                            <label for="vaccine18">Vitamin-A</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query18="SELECT * FROM vac_3years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=18";
                                                    $result18=mysqli_query($conn,$query18);
                                                    $row18=mysqli_fetch_assoc($result18);
                                                    
                                                    $sql18="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=18";
                                                    $run18=mysqli_query($conn,$sql18);
                                                    $data18=mysqli_fetch_assoc($run18);
                                                    
                                                    if(!empty($row18['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine18" value="18" checked="checked" disabled>
                                                                <label for="vaccine18">Vitamin-A</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data18['giving_date'])) && (!empty($row18['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine18" value="18" disabled>
                                                                <label for="vaccine18">Vitamin-A</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='18'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data18['giving_date'])) && (empty($row18['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine18" value="18" disabled>
                                                                <label for="vaccine18">Vitamin-A</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine18" value="18" disabled>
                                                                <label for="vaccine18">Vitamin-A</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='18'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- Vitamin-A -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- 5 year timeline--->
                                    <div class="timeline">
                
                                         <span class="icon fas fa-syringe"></span>
                                         <div class="timeline-content">

                                            <!-- 5 year vaccination-->
                                            <div class="title">
                                                <h3>5 year</h3>
                                            </div>

                                            <div class="description">

                                                <!-- D.T -->
                                                <?php
                                                if(empty($data18['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine19" value="19" disabled>
                                                            <label for="vaccine19">D.T</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query19="SELECT * FROM vac_5years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=19";
                                                    $result19=mysqli_query($conn,$query19);
                                                    $row19=mysqli_fetch_assoc($result19);
                                                    
                                                    $sql19="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=19";
                                                    $run19=mysqli_query($conn,$sql19);
                                                    $data19=mysqli_fetch_assoc($run19);
                                                    
                                                    if(!empty($row19['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine19" value="19" checked="checked" disabled>
                                                                <label for="vaccine19">D.T</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data19['giving_date'])) && (!empty($row19['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine19" value="19" disabled>
                                                                <label for="vaccine19">D.T</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='19'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data19['giving_date'])) && (empty($row19['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine19" value="19" disabled>
                                                                <label for="vaccine19">D.T</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine19" value="19" disabled>
                                                                <label for="vaccine19">D.T</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='19'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end D.T -->

                                                <!-- OPV-5 -->
                                                <?php
                                                if(empty($data19['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine20" value="20" disabled>
                                                            <label for="vaccine20">OPV-5</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query20="SELECT * FROM vac_5years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=20";
                                                    $result20=mysqli_query($conn,$query20);
                                                    $row20=mysqli_fetch_assoc($result20);
                                                    
                                                    $sql20="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=20";
                                                    $run20=mysqli_query($conn,$sql20);
                                                    $data20=mysqli_fetch_assoc($run20);
                                                    
                                                    if(!empty($row20['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine20" value="20" checked="checked" disabled>
                                                                <label for="vaccine20">OPV-5</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data20['giving_date'])) && (!empty($row20['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine20" value="20" disabled>
                                                                <label for="vaccine20">OPV-5</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='20'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data20['giving_date'])) && (empty($row20['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine20" value="20" disabled>
                                                                <label for="vaccine20">OPV-5</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine20" value="20" disabled>
                                                                <label for="vaccine20">OPV-5</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='20'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- end OPV-5 -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- 10-14 years timeline--->
                                    <div class="timeline">
                
                                         <span class="icon fas fa-syringe"></span>
                                         <div class="timeline-content">

                                            <!-- 10-14 years vaccination-->
                                            <div class="title">
                                                <h3>10-14 years</h3>
                                            </div>

                                            <div class="description">

                                                <!-- Rubella -->
                                                <?php
                                                if(empty($data20['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine21" value="21" disabled>
                                                            <label for="vaccine21">Rubella</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query21="SELECT * FROM vac_10_14years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=21";
                                                    $result21=mysqli_query($conn,$query21);
                                                    $row21=mysqli_fetch_assoc($result21);
                                                    
                                                    $sql21="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=21";
                                                    $run21=mysqli_query($conn,$sql21);
                                                    $data21=mysqli_fetch_assoc($run21);
                                                    
                                                    if(!empty($row21['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine21" value="21" checked="checked" disabled>
                                                                <label for="vaccine21">Rubella</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data21['giving_date'])) && (!empty($row21['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine21" value="21" disabled>
                                                                <label for="vaccine21">Rubella</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='21'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data21['giving_date'])) && (empty($row21['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine21" value="21" disabled>
                                                                <label for="vaccine21">Rubella</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine21" value="21" disabled>
                                                                <label for="vaccine21">Rubella</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='21'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end Rubella -->

                                                <!-- atd -->
                                                <?php
                                                if(empty($data21['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine22" value="22" disabled>
                                                            <label for="vaccine22">ATD</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query22="SELECT * FROM vac_10_14years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=22";
                                                    $result22=mysqli_query($conn,$query22);
                                                    $row22=mysqli_fetch_assoc($result22);
                                                    
                                                    $sql22="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=22";
                                                    $run22=mysqli_query($conn,$sql22);
                                                    $data22=mysqli_fetch_assoc($run22);
                                                    
                                                    if(!empty($row22['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine22" value="22" checked="checked" disabled>
                                                                <label for="vaccine22">ATD</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data22['giving_date'])) && (!empty($row22['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine22" value="22" disabled>
                                                                <label for="vaccine22">ATD</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='22'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data22['giving_date'])) && (empty($row22['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine22" value="22" disabled>
                                                                <label for="vaccine22">ATD</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine22" value="22" disabled>
                                                                <label for="vaccine22">ATD</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='22'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!-- end atd -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Japanese Encephalitis --->
                                    <div class="timeline">
                
                                         <span class="icon fas fa-syringe"></span>
                                         <div class="timeline-content">

                                            <!-- Japanese Encephalitis vaccination-->
                                            <div class="title">
                                                <h3>Japanese Encephalitis</h3>
                                            </div>

                                            <div class="description">

                                                <!-- JE-1 -->
                                                <?php
                                                if(empty($data22['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine23" value="23" disabled>
                                                            <label for="vaccine23">JE-1</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query23="SELECT * FROM vac_japanese_encephalities WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=23";
                                                    $result23=mysqli_query($conn,$query23);
                                                    $row23=mysqli_fetch_assoc($result23);
                                                    
                                                    $sql23="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=23";
                                                    $run23=mysqli_query($conn,$sql23);
                                                    $data23=mysqli_fetch_assoc($run23);
                                                    
                                                    if(!empty($row23['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine23" value="23" checked="checked" disabled>
                                                                <label for="vaccine23">JE-1</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data23['giving_date'])) && (!empty($row23['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine23" value="23" disabled>
                                                                <label for="vaccine23">JE-1</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='23'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data23['giving_date'])) && (empty($row23['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine23" value="23" disabled>
                                                                <label for="vaccine23">JE-1</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine23" value="23" disabled>
                                                                <label for="vaccine23">JE-1</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='23'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end JE-1 -->

                                                <!-- JE-2 -->
                                                <?php
                                                if(empty($data23['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine24" value="24" disabled>
                                                            <label for="vaccine24">JE-2</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query24="SELECT * FROM vac_japanese_encephalities WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=24";
                                                    $result24=mysqli_query($conn,$query24);
                                                    $row24=mysqli_fetch_assoc($result24);
                                                    
                                                    $sql24="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=24";
                                                    $run24=mysqli_query($conn,$sql24);
                                                    $data24=mysqli_fetch_assoc($run24);
                                                    
                                                    if(!empty($row24['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine24" value="24" checked="checked" disabled>
                                                                <label for="vaccine24">JE-2</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data24['giving_date'])) && (!empty($row24['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine24" value="24" disabled>
                                                                <label for="vaccine24">JE-2</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='24'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data24['giving_date'])) && (empty($row24['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine24" value="24" disabled>
                                                                <label for="vaccine24">JE-2</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine24" value="24" disabled>
                                                                <label for="vaccine24">JE-2</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='24'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end JE-2 -->

                                                <!-- JE-3 -->
                                                <?php
                                                if(empty($data24['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine25" value="25" disabled>
                                                            <label for="vaccine25">JE-3</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query25="SELECT * FROM vac_japanese_encephalities WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=25";
                                                    $result25=mysqli_query($conn,$query25);
                                                    $row25=mysqli_fetch_assoc($result25);
                                                    
                                                    $sql25="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=25";
                                                    $run25=mysqli_query($conn,$sql25);
                                                    $data25=mysqli_fetch_assoc($run25);
                                                    
                                                    if(!empty($row25['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine25" value="25" checked="checked" disabled>
                                                                <label for="vaccine25">JE-3</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data25['giving_date'])) && (!empty($row25['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine25" value="25" disabled>
                                                                <label for="vaccine25">JE-3</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='25'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data25['giving_date'])) && (empty($row25['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine25" value="25" disabled>
                                                                <label for="vaccine25">JE-3</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine25" value="25" disabled>
                                                                <label for="vaccine25">JE-3</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='25'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end JE-3 -->

                                                <!-- JE-4 -->
                                                <?php
                                                if(empty($data25['giving_date'])) {    
                                                ?>
                                                    <div class="vaccine">
                                                        <span>
                                                            <input type="checkbox" id="vaccine26" value="26" disabled>
                                                            <label for="vaccine26">JE-4</label>
                                                        </span>
                                                    </div> 
                                                <?php
                                                }
                                                else {
                                                    $query26="SELECT * FROM vac_japanese_encephalities WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=26";
                                                    $result26=mysqli_query($conn,$query26);
                                                    $row26=mysqli_fetch_assoc($result26);
                                                    
                                                    $sql26="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=26";
                                                    $run26=mysqli_query($conn,$sql26);
                                                    $data26=mysqli_fetch_assoc($run26);
                                                    
                                                    if(!empty($row26['status'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine26" value="26" checked="checked" disabled>
                                                                <label for="vaccine26">JE-4</label>
                                                            </span>
                                                            <span class="badge color-given">vac given</span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else if((!empty($data26['giving_date'])) && (!empty($row26['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine26" value="26" disabled>
                                                                <label for="vaccine26">JE-4</label>
                                                            </span>
                                                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='26'>
                                                                <span class="badge badge-danger">mark vac</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                    else if((!empty($data26['giving_date'])) && (empty($row26['approved_doctor_id']))) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine26" value="26" disabled>
                                                                <label for="vaccine26">JE-4</label>
                                                            </span>
                                                            <span class="badge badge-secondary">wait for approval</span>
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine26" value="26" disabled>
                                                                <label for="vaccine26">JE-4</label>
                                                            </span>
                                                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='26'>
                                                                <span class="badge badge-warning">select a date</span>
                                                            </button>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <!--end JE-4 -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Modal vac-mark -->
                                    <div id="vac-mark" class="modal fade">
                                        <div class="modal-dialog modal-confirm">
                                            <div class="modal-content">
                                                <form action="./php/mid-vac-mark-action.php" method="POST" onsubmit="return validation()">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="batch">
                                                            <table>
                                                                <tr>
                                                                    <td><label>Date given:</label></td>
                                                                    <td><input type="date" id="date_given" name="date_given" required></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Enter batch no:</label></td>
                                                                    <td><input type="text" id="batch_no" name="batch_no" required></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                        <input type="hidden" id="baby_id" name="baby_id">
                                                        <input type="hidden" id="vaccine" name="vaccine">
                                                        <button name="mark_vac" type="submit" class="btn btn-danger">Mark vac</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Modal set-date -->
                                    <div id="set-date" class="modal fade">
                                        <div class="modal-dialog modal-confirm">
                                            <div class="modal-content">
                                                <form action="./php/mid-vac-set-date-action.php" method="POST" onsubmit="return validation()">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="batch">
                                                            <table>
                                                                <tr>
                                                                    <td><label>Select a date:</label></td>
                                                                    <td><input type="date" id="giving_date" name="giving_date" required> <br></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                        <input type="hidden" id="baby_id1" name="baby_id">
                                                        <input type="hidden" id="vaccin" name="vaccine">
                                                        <button name="date-set" type="submit" class="btn btn-danger">set date</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div><!--end main-timeline-->
                                
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