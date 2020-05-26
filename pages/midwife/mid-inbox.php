<?php session_start();
?>
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
    <link rel="stylesheet" href="css/mid-inbox-style.css">

    <title>Midwife Home</title>
    
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
                        <img src="./img/midwife.png" class="rounded-circle">
                        <?php
                            $query1 = "SELECT * FROM midwife WHERE midwife_id='".$_SESSION['midwife_id']."'";
                            $result1= mysqli_query($conn,$query1);
                            $row=mysqli_fetch_assoc($result1);
                        ?>
                        <a href="#"> <span><?php echo $row['midwife_name'];?></span> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <a href="mid-dashboard.php" class="text-uppercase">
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
                                <a href="mid-add-babies.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-user-plus" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">ළමුන් ඇතුලත් කිරීම</span>
                                </a>
                            </li>
                            <li>
                                <a href="mid-view-babies.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">ළමුන් බලන්න</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="mid-charts.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" aria-hidden="true"></i>
                                </span>
                                <span class="list">වර්ධන සටහන</span>
                            </a>
                        </li>
                        <li>
                            <a href="mid-inbox.php" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-inbox" aria-hidden="true"></i>
                                    
                                    <?php
                                        $sql001="SELECT COUNT(status) AS unreadSMS FROM midwife_message WHERE status='unread' AND midwife_id='".$_SESSION['midwife_id']."'";
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
                            <a class="text-uppercase" data-toggle="collapse" href="#location">
                                <span class="icon">
                                    <i class="fas fa-map" aria-hidden="true"></i>
                                </span>
                                <span class="list">සිතියම්</span>
                            </a>
                        </li>
                        <div class="collapse collapse-location" id="location">
                            <li>
                                <a href="mid-visit-today.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-map-pin" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">අදට නියමිත ස්ථාන</span>
                                </a>
                            </li>
                            <li>
                                <a href="mid-give-directions.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-map-signs" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">දිශාව දැක්වීම</span>
                                </a>
                            </li>
                            <li>
                                <a href="mid-show-all-locations.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">සියලුම ස්ථාන</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="mid-visiting-record.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-location-arrow" aria-hidden="true"></i>
                                </span>
                                <span class="list">නිවාසවලට යෑම්</span>
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
 
                <div class="row d-flex justify-content-center">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                      <h4>&nbsp;Unread Messages</h4>  
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="b_table">
                                    <table class="table">
                                        <tr>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php
                                                    include "php/selectdb.php";
                                                        $sql00="SELECT * FROM midwife_message WHERE midwife_id='".$_SESSION['midwife_id']."' AND status='unread'";
                                                        $take00=mysqli_query($conn,$sql00);
                                                        while($row00=mysqli_fetch_assoc($take00)){
                                                            $dMsg=$row00['midwife_message'];
                                                            $dDate=$row00['date'];
                                                            $dTime=$row00['time'];
                                                            
                                                            echo  "<tr>";
                                                            echo  "<td>New Message</td>";
                                                            echo  "<td>";
                                                            echo  "<input type='button' name='readMidwife' class='btn btn-warning btn-sm' id='readMidwife' data-toggle='modal' href='#readSMS' data-msgid='".$dMsg."' data-dateid='".$dDate."' data-timeid='".$dTime."' value='Read'>";
                                                        
                                                            
                                                    //--------------------------------This is modal------------------------------------------  
                                                    echo "<div class='modal fade' id='readSMS'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                    echo "<div class='modal-content'>";
                                                    echo "<div class='modal-header'>";
                                                    echo "<h5 class='modal-title' id='ModalTitleMidwife'>Message</h5>";
                                                    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                                    echo "<span aria-hidden='true'>&times;</span>";
                                                    echo "</button>";
                                                    echo "</div>";
                                                    echo "<div class='modal-body'>";
                                                    echo "<form method='POST' action='php/mid-msg-read-action.php'>";
                                                    echo "<div class=row>";
                                                    echo "<textarea name='messageArea' id='messageArea' class='form-control' readonly style='color:blue;'></textarea>";
                                                    echo "</div>";
                                                    echo "<div class=row d-flex justify-content-center>";
                                                    echo "<div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>";
                                                    echo "<input type='text' class='form-control' name='date' id='date' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>";
                                                    echo "<input type='text' class='form-control' name='time' id='time' readonly>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                    echo "<div class='modal-footer'>";
                                                    echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                                    echo "<input type='submit' name='readSubmit' class='btn btn-primary' value='Mark as Read'>";
                                                    echo "</div>";
                                                    echo "</form>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                    echo  "</td>";
                                                    echo  "</tr>";

                                                        }
                                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                      <h4>&nbsp;&nbsp;Read Messages</h4>  
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="b_table">
                                    <table class="table">
                                        <tr>
                                            <th>Message</th>
                                            <th>View</th>
                                        </tr>
                                        <?php

                                            include "php/selectdb.php";
                                            $sql1="SELECT * FROM midwife_message WHERE midwife_id='".$_SESSION['midwife_id']."' AND status='read'";
                                                        $take1=mysqli_query($conn,$sql1);
                                                        while($row1=mysqli_fetch_assoc($take1)){
                                                            $dMsg=$row1['midwife_message'];
                                                            $dDate=$row1['date'];
                                                            $dTime=$row1['time'];
                                                            
                                                            echo  "<tr>";
                                                            echo  "<td>New Message</td>";
                                                            echo  "<td>";
                                                            echo  "<input type='button' name='viewMidwife' class='btn btn-success btn-sm' id='viewMidwife' data-toggle='modal' href='#viewSMS' data-msgid='".$dMsg."' data-dateid='".$dDate."' data-timeid='".$dTime."' value='View'>";
                                                        
                                                       
                                                            //--------------------------------This is readSMS modal------------------------------------------  
                                                            echo "<div class='modal fade' id='viewSMS'>";
                                                            echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                            echo "<div class='modal-content'>";
                                                            echo "<div class='modal-header'>";
                                                            echo "<h5 class='modal-title' id='ModalTitleMidwife'>Message</h5>";
                                                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                                            echo "<span aria-hidden='true'>&times;</span>";
                                                            echo "</button>";
                                                            echo "</div>";
                                                            echo "<div class='modal-body'>";
                                                            echo "<form method='POST' action='php/mid-msg-read-action.php'>";
                                                            echo "<div class=row>";
                                                            echo "<textarea name='messageArea' id='messageAreaView' class='form-control' readonly style='color:blue;'></textarea>";
                                                            echo "</div>";
                                                            echo "<div class=row d-flex justify-content-center>";
                                                            echo "<div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>";
                                                            echo "<input type='text' class='form-control' name='date' id='dateView' readonly>";
                                                            echo "</div>";
                                                            echo "<div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>";
                                                            echo "<input type='text' class='form-control' name='time' id='timeView' readonly>";
                                                            echo "</div>";
                                                            echo "</div>";
                                                            echo "<div class='modal-footer'>";
                                                            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                                            echo "<input type='submit' name='deleteSubmit' class='btn btn-danger' value='Delete'>";
                                                            echo "</div>";
                                                            echo "</form>";
                                                            echo "</div>";
                                                            echo "</div>";
                                                            echo "</div>";
                                                            echo  "</td>";
                                                            echo  "</tr>";

                                                        }
        
                                            
                                        
                                        ?>
                                    </table>
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
    <script type="text/javascript">

        $(document).on("click", "#readMidwife", function () {
        var dId = $(this).data('msgid');
        var getDate= $(this).data('dateid');
        var getTime= $(this).data('timeid');
        $("#date").val(getDate);
        $("#time").val(getTime);
        $("#messageArea").val( dId );

        });

        $(document).on("click", "#viewMidwife", function () {
        var dId = $(this).data('msgid');
        var getDate= $(this).data('dateid');
        var getTime= $(this).data('timeid');
        $("#dateView").val(getDate);
        $("#timeView").val(getTime);
        $("#messageAreaView").val( dId );

        });

        
    </script>


</body>

</html>

<?php mysqli_close($conn); ?>