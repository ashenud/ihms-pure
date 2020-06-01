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
    <link rel="stylesheet" href="../../assets/css/material-design-iconic-font.min.css">

    <!--css files-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/animate.css">

    <link rel="stylesheet" href="../../assets/css/dashboard-style.css">
    <link rel="stylesheet" href="./css/doc-inbox-style.css">

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
                            <a href="doc-dashboard.php" class="text-uppercase">
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
                            <a href="#" class="text-uppercase active">
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
               
                <!-- alert section -->
                <div class="alert-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <?php include('./inc/alert-doc-readed-msg-delete-success.php'); ?>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
                <!-- end of alert section -->
               
                <div class="container">

                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <div class="card card-inbox">
                                <div class="card-header">
                                    <h3>පැමිණි පණිවිඩ</h3>
                                </div>
                                <div class="card-body">
                                    <div class="b_table">
                                        <table class="table table-responsive-sm">
                                            
                                            <?php
                                                        
                                            $query1="SELECT * FROM doctor_message WHERE doctor_id='".$_SESSION['doctor_id']."' ORDER BY date DESC, time DESC LIMIT 10";
                                            $result1=mysqli_query($conn,$query1);
                                                        
                                            while($row1=mysqli_fetch_assoc($result1)) {
                                                $doc_msg=$row1['doctor_message'];
                                                $msg_date=$row1['date'];
                                                $date=date_create("$msg_date");
                                                $msg_time=$row1['time'];
                                                $time=date_create("$msg_time");
                                                $msg_sender=$row1['sender'];
                                                $status=$row1['status'];
                                            ?>                                            

                                            <tr
                                           <?php
                                                if ($status=='read') {
                                                    echo "style='background-color:#e5e8ef;'";
                                                } 
                                            ?>>
                                                <td class="content">
                                                    <div class="data-icon">
                                                        <?php
                                                            if ($status=='read') {
                                                                echo "<i class='far fa-folder-open'></i>";
                                                            }
                                                            else {
                                                                echo "<i class='far fa-folder'></i>";
                                                            }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="content">
                                                    <div class="data-sender">
                                                        <?php echo $msg_sender; ?>
                                                    </div>
                                                </td>
                                                <td class="content">
                                                    <div class="data-msg">
                                                        <?php echo $doc_msg; ?>
                                                    </div>
                                                </td>
                                                <td class="content">
                                                    <div class="data-date">
                                                        <?php echo date_format($date,"F j,").' '.date_format($time,"g:i a");?>
                                                    </div>
                                                </td>
                                                
                                                <td class="content">
                                                    <div class="data-btn">
                                                        <?php
                                                            if ($status=='read') {
                                                        ?>
                                                                <input type='button' class='btn btn-danger btn-sm' id='doc-delete-btn' data-toggle='modal' href='#doc-delete-msg' data-msg='<?php echo $doc_msg; ?>' data-date='<?php echo $msg_date; ?>' data-time='<?php echo $msg_time; ?>' value='මකන්න'>
                                                        <?php    
                                                            }
                                                            else {
                                                        ?>       
                                                                <input type='button' class='btn btn-warning btn-sm' id='doc-read-btn' data-toggle='modal' href='#doc-read-msg' data-msg='<?php echo $doc_msg; ?>' data-date='<?php echo $msg_date; ?>' data-time='<?php echo $msg_time; ?>' data-showdt='<?php echo date_format($date,"Y F j,").' '.date_format($time,"g:i a");?>' value='කියවන්න'>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>


                                            <!-- model read msg -->
                                            <div class='modal modal-read fade' id='doc-read-msg'>
                                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='ModalTitleMidwife'>පණිවිඩය</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form method='POST' action='php/doc-read-msg-action.php'>
                                                                <div class=row>
                                                                    <div class="col-12">
                                                                        <textarea name='msg_area' id='msg_area' class='form-control' readonly></textarea>
                                                                    </div>
                                                                    <div class='col-12'>
                                                                        <input type="text" id='msg_showdt' class='form-control mt-3' readonly>
                                                                        <input type='hidden' name='msg_date' id='msg_date'>
                                                                        <input type='hidden' name='msg_time' id='msg_time'>
                                                                    </div>
                                                                </div>
                                                                <div class='modal-footer'>
                                                                    <button type='button' class='btn btn-info btn-reader' data-dismiss='modal'>ඉවත් වන්න</button>
                                                                    <input type='submit' name='read-submit' class='btn btn-danger btn-reader' value='කියවූ බව සලකුණු කරන්න'>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- model delete msg -->
                                            <div class='modal modal-read fade' id='doc-delete-msg'>
                                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='ModalTitleMidwife'>පණිවිඩය මැකීම තහවුරු කරන්න</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form method='POST' action='php/doc-read-msg-action.php'>
                                                                <div class=row>
                                                                    <div class='col-12'>
                                                                        <input type='hidden' name='msg_area' id='msg_area2'>
                                                                        <input type='hidden' name='msg_date' id='msg_date2'>
                                                                        <input type='hidden' name='msg_time' id='msg_time2'>
                                                                    </div>
                                                                </div>
                                                                <div class='modal-footer'>
                                                                    <button type='button' class='btn btn-info' data-dismiss='modal'>ඉවත් වන්න</button>
                                                                    <input type='submit' name='delete-submit' class='btn btn-danger' value='මකන්න'>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
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
    <script type="text/javascript" src="../../assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/bootstrap.min.js"></script>

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
    
    <!-- send data to modal scripts -->
    <script>
        $(document).on("click", "#doc-read-btn", function () {
            var getMsg = $(this).data('msg');
            var getDate= $(this).data('date');
            var getTime= $(this).data('time');
            var getShowDateTime= $(this).data('showdt');
            
            $("#msg_area").val(getMsg);
            $("#msg_date").val(getDate);
            $("#msg_time").val(getTime);
            $("#msg_showdt").val(getShowDateTime);
        });
        
        $(document).on("click", "#doc-delete-btn", function () {
            var getMsg = $(this).data('msg');
            var getDate= $(this).data('date');
            var getTime= $(this).data('time');
            
            $("#msg_area2").val(getMsg);
            $("#msg_date2").val(getDate);
            $("#msg_time2").val(getTime);
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



</body>

</html>


<?php mysqli_close($conn); ?>