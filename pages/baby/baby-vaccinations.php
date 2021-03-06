<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['mother_id'])) {	
	header('location:/?noPermission=1');
}
if(!isset($_SESSION['baby_id'])) {	
   header('location:/baby/select');
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
    
    <link rel="stylesheet" href="/pages/baby/css/baby-vaccinations-style.css">

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
                border-top: 7px solid #084772;
                border-right: 7px solid #084772;
            }
            .main-timeline .icon {
                background: #17a2b8;
            }
            .main-timeline .timeline-content {
                background: #bac8ff;
            }
            .main-timeline .timeline-content:before,
            .main-timeline .timeline-content:after {
                background: #bac8ff;
            }
            .main-timeline .timeline:nth-child(2n) {
                border-left: 7px solid #084772;
            }
        </style>

        <!--male badge color-->
        <style>
            .color-given 
            {
                background: linear-gradient(60deg, #fdd835, #ffbb33);
            }
            .badge-secondary
            {
                background: linear-gradient(60deg, #929fba, #7283a7);
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
                border-top: 7px solid #bd477d;
                border-right: 7px solid #bd477d;
            }
            .main-timeline .icon {
                background: #ea6aa5;
            }
            .main-timeline .timeline-content {
                background: #f8bbd0;
            }
            .main-timeline .timeline-content:before,
            .main-timeline .timeline-content:after {
                background: #f8bbd0;
            }
            .main-timeline .timeline:nth-child(2n) {
                border-left: 7px solid #bd477d;
            }
        </style>

        <!--female badge color-->
        <style>
            .color-given 
            {
                background: linear-gradient(60deg, #fdd835, #ffbb33);
            }
            .badge-secondary
            {
                background: linear-gradient(60deg, #929fba, #7283a7);
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
            <?php include('inc/sidebar.php'); ?>
            <!-- end of sidebar menu -->
            
            <!-- content -->
            <div class="content">
               
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
                                ?>
                                    <!--main-timeline male-->
                                    <div class="main-timeline">

                                        <!--at birth timeline-->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!--at birth vaccination-->
                                                <div class="title">
                                                    <h3>??????????????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!--BCG-1-->
                                                    <?php
                                                    $query1="SELECT * FROM vac_birth WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=1";
                                                    $result1=mysqli_query($conn,$query1);
                                                    $row1=mysqli_fetch_assoc($result1);
                                                        
                                                        //vaccin eka dunnanam(!empty=not empty)
                                                        if(!empty($row1['status'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine1" value="1" checked="checked" disabled>
                                                                    <label for="vaccine1">??????.??????.??????.<br>(B.C.G.)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row1['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine1" value="1" disabled>
                                                                    <label for="vaccine1">??????.??????.??????.<br>(B.C.G.)</label>
                                                                </span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!--end BCG-1-->

                                                    <!-- BCG-2(if no scar) -->
                                                    <?php
                                                        $query2="SELECT * FROM vac_birth WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=2";
                                                        $result2=mysqli_query($conn,$query2);
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        $sql2="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=2";
                                                        $run2=mysqli_query($conn,$sql2);
                                                        $data2=mysqli_fetch_assoc($run2);
                                                        
                                                        //bcg-2 not empty=diilanam 
                                                        if(!empty($row2['status'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine2" value="2" checked="checked" disabled>
                                                                    <label for="vaccine2">??????.??????.??????. ???????????? ????????????????????????<br>(B.C.G. 2nd dose)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row2['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        //bcg-2 dilanam && scar tyeinam
                                                        else if((!empty($row1['status'])) && (!empty($row1['scar']))) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                                    <label for="vaccine2">??????.??????.??????. ???????????? ????????????????????????<br>(B.C.G. 2nd dose)</label>
                                                                </span>
                                                                <span class="badge badge-secondary">??????.??????.??????. ??????????????? ??????.</span>
                                                            </div>
                                                    <?php
                                                        }
                                                        //bcg-2 date ekak dilanam
                                                        else if(!empty($data2['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                                    <label for="vaccine2">??????.??????.??????. ???????????? ????????????????????????<br>(B.C.G. 2nd dose)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data2['giving_date']; ?></span>
                                                            </div> 
                                                    <?php
                                                        }
                                                        //bcg-2 date ekak dila nattan
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                                    <label for="vaccine2">??????.??????.??????. ???????????? ????????????????????????<br>(B.C.G. 2nd dose)</label>
                                                                </span>                                                          
                                                            </div>
                                                    <?php
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
                                                    <h3>2 ?????? ???????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- Pentavalent 1 -->
                                                    <?php
                                        
                                                        $query3="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=3";
                                                        $result3=mysqli_query($conn,$query3);
                                                        $row3=mysqli_fetch_assoc($result3);

                                                        $sql3="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=3";
                                                        $run3=mysqli_query($conn,$sql3);
                                                        $data3=mysqli_fetch_assoc($run3);

                                                        //status eka empty nattan(=1 nam) vaccine krapu dine denna oni
                                                        if(!empty($row3['status'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine3" value="3" checked="checked" disabled>
                                                                    <label for="vaccine3">????????? ?????????????????? ??????????????? 1<br>(Pentavalent 1)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row3['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        //dunnu dine not emptinam diya yutu dinaya denna oni 
                                                        else if(!empty($data3['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine3" value="3" disabled>
                                                                    <label for="vaccine3">????????? ?????????????????? ??????????????? 1<br>(Pentavalent 1)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data3['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        //dunnu dine emtynm nikanma tiyanna oni
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine3" value="3" disabled>
                                                                    <label for="vaccine3">????????? ?????????????????? ??????????????? 1<br>(Pentavalent 1)</label>
                                                                </span>                                                          
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!--end Pentavalent 1-->

                                                    <!-- OPV-1 -->
                                                    <?php
                                        
                                                        $query4="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=4";
                                                        $result4=mysqli_query($conn,$query4);
                                                        $row4=mysqli_fetch_assoc($result4);

                                                        $sql4="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=4";
                                                        $run4=mysqli_query($conn,$sql4);
                                                        $data4=mysqli_fetch_assoc($run4);

                                                        //status eka 1 nam dunnu dinaya display wennoni
                                                        if(!empty($row4['status'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine4" value="4" checked="checked" disabled>
                                                                    <label for="vaccine4">????????? ?????????????????? 1<br>(OPV 1)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row4['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        //giving_date ekak dilanam diya yuthu dine display wenna oni
                                                        else if(!empty($data4['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine4" value="4" disabled>
                                                                    <label for="vaccine4">????????? ?????????????????? 1<br>(OPV 1)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data4['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        //giving_date ekai,status=0 nam nikanma vaccine eka pennanna tianna
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine4" value="4" disabled>
                                                                    <label for="vaccine4">????????? ?????????????????? 1<br>(OPV 1)</label>
                                                                </span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!-- end OPV-1 -->

                                                    <!-- fIPV 1 -->
                                                    <?php
                                                    
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
                                                                    <label for="vaccine5">??????????????? ?????????????????? 1<br>(fIPV 1)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row5['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        else if(!empty($data5['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine5" value="5" disabled>
                                                                    <label for="vaccine5">??????????????? ?????????????????? 1<br>(fIPV 1)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data5['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine5" value="5" disabled>
                                                                    <label for="vaccine5">??????????????? ?????????????????? 1<br>(fIPV 1)</label>
                                                                </span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!--end fIPV 1-->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 4 month timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!--4 month vaccination-->
                                                <div class="title">
                                                    <h3>4 ?????? ???????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- Pentavalent 2 -->
                                                    <?php
                                
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
                                                                    <label for="vaccine6">????????? ?????????????????? ??????????????? 2<br>(Pentavalent 2)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row6['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        else if(!empty($data6['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine6" value="6" disabled>
                                                                    <label for="vaccine6">????????? ?????????????????? ??????????????? 2<br>(Pentavalent 2)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data6['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine6" value="6" disabled>
                                                                    <label for="vaccine6">????????? ?????????????????? ??????????????? 2<br>(Pentavalent 2)</label>
                                                                </span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!--Pentavalent 2 -->

                                                    <!-- OPV-2 -->
                                                    <?php
                                                    
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
                                                                    <label for="vaccine7">????????? ?????????????????? 2<br>(OPV 2)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row7['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        else if(!empty($data7['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine7" value="7" disabled>
                                                                    <label for="vaccine7">????????? ?????????????????? 2<br>(OPV 2)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data7['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine7" value="7" disabled>
                                                                    <label for="vaccine7">????????? ?????????????????? 2<br>(OPV 2)</label>
                                                                </span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!-- end OPV-2 -->

                                                    <!-- fIPV 2 -->
                                                    <?php
                     
                                                        $query8="SELECT * FROM vac_4months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=8";
                                                        $result8=mysqli_query($conn,$query8);
                                                        $row8=mysqli_fetch_assoc($result8);

                                                        $sql8="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=8";
                                                        $run8=mysqli_query($conn,$sql8);
                                                        $data8=mysqli_fetch_assoc($run8);

                                                        //status = 1 nam dunnu dine display wennoni
                                                        if(!empty($row8['status'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine8" value="8" checked="checked" disabled>
                                                                    <label for="vaccine8">??????????????? ?????????????????? 2<br>(fIPV 2)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row8['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        
                                                        //giving date ekak dilanam diya yuthu dinaya(giving date eka) display wennoni 
                                                        else if(!empty($data8['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine8" value="8" disabled>
                                                                    <label for="vaccine8">??????????????? ?????????????????? 2<br>(fIPV 2)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data8['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        //giving date & tatus dila nattan vaacine eka witrak disply wenna tiyanna
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine8" value="8" disabled>
                                                                    <label for="vaccine8">??????????????? ?????????????????? 2<br>(fIPV 2)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!--end fIPV 2-->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 6 month timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!--6 month vaccination-->
                                                <div class="title">
                                                    <h3>6 ?????? ???????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!--Pentavalent 3-->
                                                    <?php
                                                   
                                                        $query9="SELECT * FROM vac_6months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=9";
                                                        $result9=mysqli_query($conn,$query9);
                                                        $row9=mysqli_fetch_assoc($result9);

                                                        $sql9="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=9";
                                                        $run9=mysqli_query($conn,$sql9);
                                                        $data9=mysqli_fetch_assoc($run9);

                                                        //status=1 nam dunnu dine display wennoni
                                                        if(!empty($row9['status'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine9" value="9" checked="checked" disabled>
                                                                    <label for="vaccine9">????????? ?????????????????? ??????????????? 3<br>(Pentavalent 3)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row9['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }

                                                        //giving date eka dilnm dennoni dine display wennoni
                                                        else if(!empty($data9['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine9" value="9" disabled>
                                                                    <label for="vaccine9">????????? ?????????????????? ??????????????? 3<br>(Pentavalent 3)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data9['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }

                                                        //status=0 & giving date ekat dila nattan vaccine eka nikanma diplay wennoni
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine9" value="9" disabled>
                                                                    <label for="vaccine9">????????? ?????????????????? ??????????????? 3<br>(Pentavalent 3)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!--end Pentavalent 3 -->

                                                    <!-- OPV-3 -->
                                                    <?php
                                                   
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
                                                                    <label for="vaccine10">????????? ?????????????????? 3<br>(OPV 3)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row10['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                    
                                                        else if(!empty($data10['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine10" value="10" disabled>
                                                                    <label for="vaccine10">????????? ?????????????????? 3<br>(OPV 3)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data10['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine10" value="10" disabled>
                                                                    <label for="vaccine10">????????? ?????????????????? 3<br>(OPV 3)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!-- end OPV-3 -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 9 month timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!--9 month vaccination-->
                                                <div class="title">
                                                    <h3>9 ?????? ???????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- MMR 1 -->
                                                    <?php
                                                   
                                                        $query11="SELECT * FROM vac_9months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=11";
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
                                                                    <label for="vaccine11">???????????????, ??????????????????????????????,<br>???????????????????????? 1<br>(MMR 1)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row11['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        
                                                        }
                                                        else if(!empty($data11['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine11" value="11" disabled>
                                                                    <label for="vaccine11">???????????????, ??????????????????????????????,<br>???????????????????????? 1<br>(MMR 1)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data11['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine11" value="11" disabled>
                                                                    <label for="vaccine11">???????????????, ??????????????????????????????,<br>???????????????????????? 1<br>(MMR 1)</label>
                                                                </span>
                                                               
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!--end MMR 1-->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 12 month timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!--12 month vaccination-->
                                                <div class="title">
                                                    <h3>12 ?????? ???????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!--Live JE-->
                                                    <?php
                                                    
                                                        $query12="SELECT * FROM vac_12months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=12";
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
                                                                    <label for="vaccine12">???????????? ???????????????????????????????????????????????????<br>(Live JE)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row12['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        
                                                        else if(!empty($data12['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine12" value="12" disabled>
                                                                    <label for="vaccine12">???????????? ???????????????????????????????????????????????????<br>(Live JE)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data12['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine12" value="12" disabled>
                                                                    <label for="vaccine12">???????????? ???????????????????????????????????????????????????<br>(Live JE)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!--end Live JE -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 18 months timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!-- 18 months vaccination-->
                                                <div class="title">
                                                    <h3>18 ?????? ???????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- DPT -->
                                                    <?php
                                                    
                                                        $query13="SELECT * FROM vac_18months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=13";
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
                                                                    <label for="vaccine13">????????????????????????<br>(DPT)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row13['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        
                                                        else if(!empty($data13['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine13" value="13" disabled>
                                                                    <label for="vaccine13">????????????????????????<br>(DPT)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data13['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine13" value="13" disabled>
                                                                    <label for="vaccine13">????????????????????????<br>(DPT)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!-- DPT -->


                                                    <!--OPV 4-->
                                                    <?php
                                                    
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
                                                                    <label for="vaccine14">????????? ?????????????????? 4<br>(OPV 4)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row14['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                       
                                                        else if(!empty($data14['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine14" value="14" disabled>
                                                                    <label for="vaccine14">????????? ?????????????????? 4<br>(OPV 4)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data14['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine14" value="14" disabled>
                                                                    <label for="vaccine14">????????? ?????????????????? 4<br>(OPV 4)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!--end OPV 4 -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 3 year timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!-- 3 year vaccination-->
                                                <div class="title">
                                                    <h3>3 ?????? ???????????????????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- MMR 2 -->
                                                    <?php
                                                   
                                                        $query15="SELECT * FROM vac_3years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=15";
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
                                                                    <label for="vaccine15">???????????????, ??????????????????????????????,<br>???????????????????????? 2<br>(MMR 2)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row15['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        
                                                        }
                                                        else if(!empty($data15['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine15" value="15" disabled>
                                                                    <label for="vaccine15">???????????????, ??????????????????????????????,<br>???????????????????????? 2<br>(MMR 2)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data15['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine15" value="15" disabled>
                                                                    <label for="vaccine15">???????????????, ??????????????????????????????,<br>???????????????????????? 2<br>(MMR 2)</label>
                                                                </span>
                                                               
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!-- end MMR 2 -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 5 years timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!-- 5 years vaccination-->
                                                <div class="title">
                                                    <h3>5 ?????? ???????????????????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">


                                                    <!-- D.T -->
                                                    <?php
                                                    
                                                        $query16="SELECT * FROM vac_5years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=16";
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
                                                                    <label for="vaccine16">?????????????????????<br>(D.T)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row16['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                       
                                                        }
                                                        else if(!empty($data16['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine16" value="16" disabled>
                                                                    <label for="vaccine16">?????????????????????<br>(D.T)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data16['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine16" value="16" disabled>
                                                                    <label for="vaccine16">?????????????????????<br>(D.T)</label>
                                                                </span>
                                                               
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!-- end D.T -->


                                                    <!--OPV 5-->
                                                    <?php
                                                    
                                                        $query17="SELECT * FROM vac_5years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=17";
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
                                                                    <label for="vaccine17">????????? ?????????????????? 5<br>(OPV 5)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row17['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                      
                                                        else if(!empty($data17['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine17" value="17" disabled>
                                                                    <label for="vaccine17">????????? ?????????????????? 5<br>(OPV 5)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data17['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine17" value="17" disabled>
                                                                    <label for="vaccine17">????????? ?????????????????? 5<br>(OPV 5)</label>
                                                                </span>
                                                               
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!--end OPV 5 -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 11 years timeline --->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!-- 11 years vaccination -->
                                                <div class="title">
                                                    <h3>11 ?????? ???????????????????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- aTd -->
                                                    <?php
                                                    
                                                        $query20="SELECT * FROM vac_11years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=20";
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
                                                                    <label for="vaccine20">???????????????????????? ???????????????????????? ??????<br>?????????????????????????????? (aTd)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row20['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        
                                                        }
                                                        else if(!empty($data20['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine20" value="20" disabled>
                                                                    <label for="vaccine20">???????????????????????? ???????????????????????? ??????<br>?????????????????????????????? (aTd)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data20['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine20" value="20" disabled>
                                                                    <label for="vaccine20">???????????????????????? ???????????????????????? ??????<br>?????????????????????????????? (aTd)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!-- end aTd -->                                                
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end main-timeline male-->
                                <?php
                                    }
                                    else {
                                ?>   
                                    <!--main-timeline female-->
                                    <div class="main-timeline">

                                        <!--at birth timeline-->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!--at birth vaccination-->
                                                <div class="title">
                                                    <h3>??????????????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!--BCG-1-->
                                                    <?php
                                                    $query1="SELECT * FROM vac_birth WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=1";
                                                    $result1=mysqli_query($conn,$query1);
                                                    $row1=mysqli_fetch_assoc($result1);
                                                        
                                                        //vaccin eka dunnanam(!empty=not empty)
                                                        if(!empty($row1['status'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine1" value="1" checked="checked" disabled>
                                                                    <label for="vaccine1">??????.??????.??????.<br>(B.C.G.)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row1['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine1" value="1" disabled>
                                                                    <label for="vaccine1">??????.??????.??????.<br>(B.C.G.)</label>
                                                                </span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!--end BCG-1-->

                                                    <!-- BCG-2(if no scar) -->
                                                    <?php
                                                        $query2="SELECT * FROM vac_birth WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=2";
                                                        $result2=mysqli_query($conn,$query2);
                                                        $row2=mysqli_fetch_assoc($result2);

                                                        $sql2="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=2";
                                                        $run2=mysqli_query($conn,$sql2);
                                                        $data2=mysqli_fetch_assoc($run2);
                                                        
                                                        //bcg-2 not empty=diilanam 
                                                        if(!empty($row2['status'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine2" value="2" checked="checked" disabled>
                                                                    <label for="vaccine2">??????.??????.??????. ???????????? ????????????????????????<br>(B.C.G. 2nd dose)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row2['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        //bcg-2 dilanam && scar tyeinam
                                                        else if((!empty($row1['status'])) && (!empty($row1['scar']))) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                                    <label for="vaccine2">??????.??????.??????. ???????????? ????????????????????????<br>(B.C.G. 2nd dose)</label>
                                                                </span>
                                                                <span class="badge badge-secondary">??????.??????.??????. ??????????????? ??????.</span>
                                                            </div>
                                                    <?php
                                                        }
                                                        //bcg-2 date ekak dilanam
                                                        else if(!empty($data2['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                                    <label for="vaccine2">??????.??????.??????. ???????????? ????????????????????????<br>(B.C.G. 2nd dose)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data2['giving_date']; ?></span>
                                                            </div> 
                                                    <?php
                                                        }
                                                        //bcg-2 date ekak dila nattan
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                                    <label for="vaccine2">??????.??????.??????. ???????????? ????????????????????????<br>(B.C.G. 2nd dose)</label>
                                                                </span>                                                          
                                                            </div>
                                                    <?php
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
                                                    <h3>2 ?????? ???????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- Pentavalent 1 -->
                                                    <?php
                                        
                                                        $query3="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=3";
                                                        $result3=mysqli_query($conn,$query3);
                                                        $row3=mysqli_fetch_assoc($result3);

                                                        $sql3="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=3";
                                                        $run3=mysqli_query($conn,$sql3);
                                                        $data3=mysqli_fetch_assoc($run3);

                                                        //status eka empty nattan(=1 nam) vaccine krapu dine denna oni
                                                        if(!empty($row3['status'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine3" value="3" checked="checked" disabled>
                                                                    <label for="vaccine3">????????? ?????????????????? ??????????????? 1<br>(Pentavalent 1)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row3['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        //dunnu dine not emptinam diya yutu dinaya denna oni 
                                                        else if(!empty($data3['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine3" value="3" disabled>
                                                                    <label for="vaccine3">????????? ?????????????????? ??????????????? 1<br>(Pentavalent 1)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data3['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        //dunnu dine emtynm nikanma tiyanna oni
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine3" value="3" disabled>
                                                                    <label for="vaccine3">????????? ?????????????????? ??????????????? 1<br>(Pentavalent 1)</label>
                                                                </span>                                                          
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!--end Pentavalent 1-->

                                                    <!-- OPV-1 -->
                                                    <?php
                                        
                                                        $query4="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=4";
                                                        $result4=mysqli_query($conn,$query4);
                                                        $row4=mysqli_fetch_assoc($result4);

                                                        $sql4="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=4";
                                                        $run4=mysqli_query($conn,$sql4);
                                                        $data4=mysqli_fetch_assoc($run4);

                                                        //status eka 1 nam dunnu dinaya display wennoni
                                                        if(!empty($row4['status'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine4" value="4" checked="checked" disabled>
                                                                    <label for="vaccine4">????????? ?????????????????? 1<br>(OPV 1)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row4['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        //giving_date ekak dilanam diya yuthu dine display wenna oni
                                                        else if(!empty($data4['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine4" value="4" disabled>
                                                                    <label for="vaccine4">????????? ?????????????????? 1<br>(OPV 1)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data4['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        //giving_date ekai,status=0 nam nikanma vaccine eka pennanna tianna
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine4" value="4" disabled>
                                                                    <label for="vaccine4">????????? ?????????????????? 1<br>(OPV 1)</label>
                                                                </span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!-- end OPV-1 -->

                                                    <!-- fIPV 1 -->
                                                    <?php
                                                    
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
                                                                    <label for="vaccine5">??????????????? ?????????????????? 1<br>(fIPV 1)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row5['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        else if(!empty($data5['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine5" value="5" disabled>
                                                                    <label for="vaccine5">??????????????? ?????????????????? 1<br>(fIPV 1)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data5['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine5" value="5" disabled>
                                                                    <label for="vaccine5">??????????????? ?????????????????? 1<br>(fIPV 1)</label>
                                                                </span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!--end fIPV 1-->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 4 month timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!--4 month vaccination-->
                                                <div class="title">
                                                    <h3>4 ?????? ???????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- Pentavalent 2 -->
                                                    <?php
                                
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
                                                                    <label for="vaccine6">????????? ?????????????????? ??????????????? 2<br>(Pentavalent 2)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row6['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        else if(!empty($data6['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine6" value="6" disabled>
                                                                    <label for="vaccine6">????????? ?????????????????? ??????????????? 2<br>(Pentavalent 2)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data6['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine6" value="6" disabled>
                                                                    <label for="vaccine6">????????? ?????????????????? ??????????????? 2<br>(Pentavalent 2)</label>
                                                                </span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!--Pentavalent 2 -->

                                                    <!-- OPV-2 -->
                                                    <?php
                                                    
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
                                                                    <label for="vaccine7">????????? ?????????????????? 2<br>(OPV 2)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row7['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        else if(!empty($data7['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine7" value="7" disabled>
                                                                    <label for="vaccine7">????????? ?????????????????? 2<br>(OPV 2)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data7['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine7" value="7" disabled>
                                                                    <label for="vaccine7">????????? ?????????????????? 2<br>(OPV 2)</label>
                                                                </span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!-- end OPV-2 -->

                                                    <!-- fIPV 2 -->
                                                    <?php
                     
                                                        $query8="SELECT * FROM vac_4months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=8";
                                                        $result8=mysqli_query($conn,$query8);
                                                        $row8=mysqli_fetch_assoc($result8);

                                                        $sql8="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=8";
                                                        $run8=mysqli_query($conn,$sql8);
                                                        $data8=mysqli_fetch_assoc($run8);

                                                        //status = 1 nam dunnu dine display wennoni
                                                        if(!empty($row8['status'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine8" value="8" checked="checked" disabled>
                                                                    <label for="vaccine8">??????????????? ?????????????????? 2<br>(fIPV 2)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row8['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        
                                                        //giving date ekak dilanam diya yuthu dinaya(giving date eka) display wennoni 
                                                        else if(!empty($data8['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine8" value="8" disabled>
                                                                    <label for="vaccine8">??????????????? ?????????????????? 2<br>(fIPV 2)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data8['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        //giving date & tatus dila nattan vaacine eka witrak disply wenna tiyanna
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine8" value="8" disabled>
                                                                    <label for="vaccine8">??????????????? ?????????????????? 2<br>(fIPV 2)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!--end fIPV 2-->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 6 month timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!--6 month vaccination-->
                                                <div class="title">
                                                    <h3>6 ?????? ???????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!--Pentavalent 3-->
                                                    <?php
                                                   
                                                        $query9="SELECT * FROM vac_6months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=9";
                                                        $result9=mysqli_query($conn,$query9);
                                                        $row9=mysqli_fetch_assoc($result9);

                                                        $sql9="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=9";
                                                        $run9=mysqli_query($conn,$sql9);
                                                        $data9=mysqli_fetch_assoc($run9);

                                                        //status=1 nam dunnu dine display wennoni
                                                        if(!empty($row9['status'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine9" value="9" checked="checked" disabled>
                                                                    <label for="vaccine9">????????? ?????????????????? ??????????????? 3<br>(Pentavalent 3)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row9['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }

                                                        //giving date eka dilnm dennoni dine display wennoni
                                                        else if(!empty($data9['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine9" value="9" disabled>
                                                                    <label for="vaccine9">????????? ?????????????????? ??????????????? 3<br>(Pentavalent 3)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data9['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }

                                                        //status=0 & giving date ekat dila nattan vaccine eka nikanma diplay wennoni
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine9" value="9" disabled>
                                                                    <label for="vaccine9">????????? ?????????????????? ??????????????? 3<br>(Pentavalent 3)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!--end Pentavalent 3 -->

                                                    <!-- OPV-3 -->
                                                    <?php
                                                   
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
                                                                    <label for="vaccine10">????????? ?????????????????? 3<br>(OPV 3)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row10['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                    
                                                        else if(!empty($data10['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine10" value="10" disabled>
                                                                    <label for="vaccine10">????????? ?????????????????? 3<br>(OPV 3)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data10['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine10" value="10" disabled>
                                                                    <label for="vaccine10">????????? ?????????????????? 3<br>(OPV 3)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!-- end OPV-3 -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 9 month timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!--9 month vaccination-->
                                                <div class="title">
                                                    <h3>9 ?????? ???????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- MMR 1 -->
                                                    <?php
                                                   
                                                        $query11="SELECT * FROM vac_9months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=11";
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
                                                                    <label for="vaccine11">???????????????, ??????????????????????????????,<br>???????????????????????? 1<br>(MMR 1)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row11['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        
                                                        }
                                                        else if(!empty($data11['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine11" value="11" disabled>
                                                                    <label for="vaccine11">???????????????, ??????????????????????????????,<br>???????????????????????? 1<br>(MMR 1)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data11['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine11" value="11" disabled>
                                                                    <label for="vaccine11">???????????????, ??????????????????????????????,<br>???????????????????????? 1<br>(MMR 1)</label>
                                                                </span>
                                                               
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!--end MMR 1-->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 12 month timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!--12 month vaccination-->
                                                <div class="title">
                                                    <h3>12 ?????? ???????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!--Live JE-->
                                                    <?php
                                                    
                                                        $query12="SELECT * FROM vac_12months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=12";
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
                                                                    <label for="vaccine12">???????????? ???????????????????????????????????????????????????<br>(Live JE)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row12['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        
                                                        else if(!empty($data12['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine12" value="12" disabled>
                                                                    <label for="vaccine12">???????????? ???????????????????????????????????????????????????<br>(Live JE)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data12['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine12" value="12" disabled>
                                                                    <label for="vaccine12">???????????? ???????????????????????????????????????????????????<br>(Live JE)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!--end Live JE -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 18 months timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!-- 18 months vaccination-->
                                                <div class="title">
                                                    <h3>18 ?????? ???????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- DPT -->
                                                    <?php
                                                    
                                                        $query13="SELECT * FROM vac_18months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=13";
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
                                                                    <label for="vaccine13">????????????????????????<br>(DPT)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row13['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        
                                                        else if(!empty($data13['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine13" value="13" disabled>
                                                                    <label for="vaccine13">????????????????????????<br>(DPT)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data13['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine13" value="13" disabled>
                                                                    <label for="vaccine13">????????????????????????<br>(DPT)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!-- DPT -->


                                                    <!--OPV 4-->
                                                    <?php
                                                    
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
                                                                    <label for="vaccine14">????????? ?????????????????? 4<br>(OPV 4)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row14['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                       
                                                        else if(!empty($data14['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine14" value="14" disabled>
                                                                    <label for="vaccine14">????????? ?????????????????? 4<br>(OPV 4)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data14['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine14" value="14" disabled>
                                                                    <label for="vaccine14">????????? ?????????????????? 4<br>(OPV 4)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!--end OPV 4 -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 3 year timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!-- 3 year vaccination-->
                                                <div class="title">
                                                    <h3>3 ?????? ???????????????????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- MMR 2 -->
                                                    <?php
                                                   
                                                        $query15="SELECT * FROM vac_3years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=15";
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
                                                                    <label for="vaccine15">???????????????, ??????????????????????????????,<br>???????????????????????? 2<br>(MMR 2)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row15['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        
                                                        }
                                                        else if(!empty($data15['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine15" value="15" disabled>
                                                                    <label for="vaccine15">???????????????, ??????????????????????????????,<br>???????????????????????? 2<br>(MMR 2)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data15['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine15" value="15" disabled>
                                                                    <label for="vaccine15">???????????????, ??????????????????????????????,<br>???????????????????????? 2<br>(MMR 2)</label>
                                                                </span>
                                                               
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!-- end MMR 2 -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 5 years timeline--->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!-- 5 years vaccination-->
                                                <div class="title">
                                                    <h3>5 ?????? ???????????????????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">


                                                    <!-- D.T -->
                                                    <?php
                                                    
                                                        $query16="SELECT * FROM vac_5years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=16";
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
                                                                    <label for="vaccine16">?????????????????????<br>(D.T)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row16['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                       
                                                        }
                                                        else if(!empty($data16['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine16" value="16" disabled>
                                                                    <label for="vaccine16">?????????????????????<br>(D.T)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data16['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine16" value="16" disabled>
                                                                    <label for="vaccine16">?????????????????????<br>(D.T)</label>
                                                                </span>
                                                               
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!-- end D.T -->


                                                    <!--OPV 5-->
                                                    <?php
                                                    
                                                        $query17="SELECT * FROM vac_5years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=17";
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
                                                                    <label for="vaccine17">????????? ?????????????????? 5<br>(OPV 5)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row17['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                      
                                                        else if(!empty($data17['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine17" value="17" disabled>
                                                                    <label for="vaccine17">????????? ?????????????????? 5<br>(OPV 5)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data17['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine17" value="17" disabled>
                                                                    <label for="vaccine17">????????? ?????????????????? 5<br>(OPV 5)</label>
                                                                </span>
                                                               
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!--end OPV 5 -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 10 years timeline --->
                                        <div class="timeline">

                                            <span class="icon fas fa-syringe"></span>
                                            <div class="timeline-content">

                                                <!-- 10 years vaccination -->
                                                <div class="title">
                                                    <h3>10 ?????? ???????????????????????? ???????????????????????? ?????? ?????????(??????????????????)</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- HPV-1 -->
                                                    <?php
                                                    
                                                        $query18="SELECT * FROM vac_10years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=18";
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
                                                                    <label for="vaccine18">?????????. ??????. ??????. ??????????????? 1<br>(HPV Vaccine 1)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row18['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        }
                                                        
                                                        else if(!empty($data18['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine18" value="18" disabled>
                                                                    <label for="vaccine18">?????????. ??????. ??????. ??????????????? 1<br>(HPV Vaccine 1)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data18['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine18" value="18" disabled>
                                                                    <label for="vaccine18">?????????. ??????. ??????. ??????????????? 1<br>(HPV Vaccine 1)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!-- end HPV-1 -->


                                                    <!-- HPV-2 -->
                                                    <?php
                                                    
                                                        $query19="SELECT * FROM vac_10years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=19";
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
                                                                    <label for="vaccine19">?????????. ??????. ??????. ??????????????? 2<br>(HPV Vaccine 2)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data19['giving_date']; ?></span>
                                                            </div>
                                                    <?php 
                                                       
                                                        }
                                                        else if(!empty($data19['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine19" value="19" disabled>
                                                                    <label for="vaccine19">?????????. ??????. ??????. ??????????????? 2<br>(HPV Vaccine 2)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data19['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine19" value="19" disabled>
                                                                    <label for="vaccine19">?????????. ??????. ??????. ??????????????? 2<br>(HPV Vaccine 2)</label>
                                                                </span>
                                                              
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!--end HPV-2 -->                                                
                                                </div>
                                            </div>
                                        </div>


                                        <!-- 11 years timeline --->
                                        <div class="timeline">

                                             <span class="icon fas fa-syringe"></span>
                                             <div class="timeline-content">

                                                <!-- 11 years vaccination -->
                                                <div class="title">
                                                    <h3>11 ?????? ???????????????????????? ???????????????????????? ?????? ?????????</h3>
                                                </div>

                                                <div class="description">

                                                    <!-- aTd -->
                                                    <?php
                                                    
                                                        $query20="SELECT * FROM vac_11years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=20";
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
                                                                    <label for="vaccine20">???????????????????????? ???????????????????????? ??????<br>?????????????????????????????? (aTd)</label>
                                                                </span>
                                                                <span class="badge color-given"><?php echo "????????? ???????????? ????????????: ".$row20['date_given']; ?></span>
                                                            </div>
                                                    <?php 
                                                        
                                                        }
                                                        else if(!empty($data20['giving_date'])) {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine20" value="20" disabled>
                                                                    <label for="vaccine20">???????????????????????? ???????????????????????? ??????<br>?????????????????????????????? (aTd)</label>
                                                                </span>
                                                                <span class="badge badge-red"><?php echo "????????? ???????????? ????????????: ".$data20['giving_date']; ?></span>
                                                            </div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
                                                            <div class="vaccine">
                                                                <span>
                                                                    <input type="checkbox" id="vaccine20" value="20" disabled>
                                                                    <label for="vaccine20">???????????????????????? ???????????????????????? ??????<br>?????????????????????????????? (aTd)</label>
                                                                </span>
                                                                
                                                            </div>
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                    <!-- end aTd -->                                                
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end main-timeline female-->

                                <?php    
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
        $(function() {
            $('.inner-sidebar-menu ul li a.b-vacc').addClass('active');
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
        });
    </script>
    <!-- end of writed scripts -->



</body>

</html>


<?php mysqli_close($conn); ?>