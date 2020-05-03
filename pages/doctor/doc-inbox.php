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
                        <img src="./img/doctor.png" width="50" class="rounded-circle">
                        <a href="#" class="text-uppercase"> <?php echo($_SESSION['doctor_id']); ?> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <a href="doc-dashboard.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                </span>
                                <span class="list">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-uppercase" data-toggle="collapse" href="#manage">
                                <span class="icon">
                                    <i class="fas fa-users-cog" aria-hidden="true"></i>
                                </span>
                                <span class="list">Manage</span>
                            </a>
                        </li>
                        <div class="collapse collapse-manage" id="manage">
                            <li>
                                <a href="doc-view-sisters.php" class="text-uppercase drop">
                                    <span class="icon-active">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">view sisters</span>
                                </a>
                            </li>
                            <li>
                                <a href="doc-view-babies.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">view babies</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="doc-charts.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" aria-hidden="true"></i>
                                </span>
                                <span class="list">charts</span>
                            </a>
                        </li>
                        <li>
                            <a href="doc-table.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-table" aria-hidden="true"></i>
                                </span>
                                <span class="list">Tables</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-inbox" aria-hidden="true"></i>
                                    
                                    <?php 
                                        mysqli_select_db($conn, 'cs2019g6');
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
                                <span class="list">Inbox</span>
                            </a>
                        </li>
                        <li>
                            <a href="doc-send-messages.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                </span>
                                <span class="list">Send Messages</span>
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
                                <?php include('./inc/alert-doc-readed-msg-delete-success.php'); ?>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                <!-- end of alert section -->
               
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
                                                    
                                            mysqli_select_db($conn,'cs2019g6');
                                                        
                                            $query1="SELECT * FROM doctor_message WHERE doctor_id='".$_SESSION['doctor_id']."' AND status='unread'";
                                            $result1=mysqli_query($conn,$query1);
                                                        
                                            while($row1=mysqli_fetch_assoc($result1)) {
                                                $doc_msg=$row1['doctor_message'];
                                                $msg_date=$row1['date'];
                                                $msg_time=$row1['time'];
                                            ?>

                                            <tr>
                                                <td>New Message</td>
                                                <td>
                                                    <input type='button' class='btn btn-warning btn-sm' id='doc-read-btn' data-toggle='modal' href='#doc-read-msg' data-msg='<?php echo $doc_msg; ?>' data-date='<?php echo $msg_date; ?>' data-time='<?php echo $msg_time; ?>' value='Read'>
                                                </td>
                                            </tr>


                                            <!-- This is modal -->
                                            <div class='modal fade' id='doc-read-msg'>
                                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='ModalTitleMidwife'>Message</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form method='POST' action='php/doc-read-msg-action.php'>
                                                                <div class=row>
                                                                    <textarea name='msg_area' id='msg_area' class='form-control' readonly style='color:blue;'></textarea>
                                                                </div>
                                                                <div class=row d-flex justify-content-center>
                                                                    <div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>
                                                                        <input type='text' class='form-control' name='msg_date' id='msg_date' readonly>
                                                                    </div>
                                                                    <div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>
                                                                        <input type='text' class='form-control' name='msg_time' id='msg_time' readonly>
                                                                    </div>
                                                                </div>
                                                                <div class='modal-footer'>
                                                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                                    <input type='submit' name='read-submit' class='btn btn-primary' value='Mark as Read'>
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
                    
                    
                    <div class="row d-flex justify-content-center">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <h4>&nbsp;Read Messages</h4>
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
                                                    
                                            mysqli_select_db($conn,'cs2019g6');
                                                        
                                            $query2="SELECT * FROM doctor_message WHERE doctor_id='".$_SESSION['doctor_id']."' AND status='read'";
                                            $result2=mysqli_query($conn,$query2);
                                                        
                                            while($row2=mysqli_fetch_assoc($result2)) {
                                                $doc_msg=$row2['doctor_message'];
                                                $msg_date=$row2['date'];
                                                $msg_time=$row2['time'];
                                            ?>

                                            <tr>
                                                <td>New Message</td>
                                                <td>
                                                    <input type='button' class='btn btn-warning btn-sm' id='doc-read-btn2' data-toggle='modal' href='#doc-read-msg2' data-msg='<?php echo $doc_msg; ?>' data-date='<?php echo $msg_date; ?>' data-time='<?php echo $msg_time; ?>' value='Read'>
                                                </td>
                                            </tr>


                                            <!-- This is modal -->
                                            <div class='modal fade' id='doc-read-msg2'>
                                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='ModalTitleMidwife'>Message</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form method='POST' action='php/doc-read-msg-action.php'>
                                                                <div class=row>
                                                                    <textarea name='msg_area' id='msg_area2' class='form-control' readonly style='color:blue;'></textarea>
                                                                </div>
                                                                <div class=row d-flex justify-content-center>
                                                                    <div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>
                                                                        <input type='text' class='form-control' name='msg_date' id='msg_date2' readonly>
                                                                    </div>
                                                                    <div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>
                                                                        <input type='text' class='form-control' name='msg_time' id='msg_time2' readonly>
                                                                    </div>
                                                                </div>
                                                                <div class='modal-footer'>
                                                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                                    <input type='submit' name='delete-submit' class='btn btn-primary' value='Delete'>
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
    
    <!-- send data to modal scripts -->
    <script>
        $(document).on("click", "#doc-read-btn", function () {
            var getMsg = $(this).data('msg');
            var getDate= $(this).data('date');
            var getTime= $(this).data('time');
            
            $("#msg_area").val(getMsg);
            $("#msg_date").val(getDate);
            $("#msg_time").val(getTime);
        });
        
        $(document).on("click", "#doc-read-btn2", function () {
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