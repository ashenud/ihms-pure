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
    <link rel="stylesheet" href="./css/doc-send-messages-style.css">

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
                            <a href="#" class="text-uppercase active">
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
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <?php include('./inc/alert-doc-send-msg-to-sis-success.php'); ?>
                                <?php include('./inc/alert-doc-send-msg-to-mid-success.php'); ?>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                <!-- end of alert section -->
               
                <div class="container">

                    <!-- Send SMS to Sister section -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <hr style="border: none; border-bottom: 10px solid green;">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-8 col-sm-8 col-md-4 col-lg-2 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/sister.png" alt="sister" width="110px" height="115px">
                                    <figcaption class=" text-center text-success">Sister</figcaption>
                                </div>
                            </div>
                        </div>
                        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                            <br>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="b_table">
                                        <table class="table">
                                            <tr>
                                                <th>Name</th>
                                                <th>Send Messages</th>
                                            </tr>


                                            <?php
                                                $query1="SELECT doctor_moh_division FROM doctor WHERE doctor_id='".$_SESSION['doctor_id']."'";
                                                $result1=mysqli_query($conn,$query1);
                                                $row1=mysqli_fetch_assoc($result1);
                                            
                                                $query2="SELECT sister_name, sister_id FROM sister WHERE sister_moh_division='".$row1['doctor_moh_division']."'";
                                                $result2=mysqli_query($conn,$query2);
                                                        
                                                while($row2=mysqli_fetch_assoc($result2)) {
                                                    $sister_id=$row2['sister_id'];
                                                    
                                            ?>
                                            
                                            <tr>
                                                <td> <?php echo $row2['sister_name']; ?> </td>
                                                <td>
                                                    <input type='button' name='smsSister' class='btn btn-success btn-sm' id='send_sis_msg_btn' data-toggle='modal' href='#sisterSMS' data-id='<?php echo $sister_id; ?>' value='Send'>
                                                </td>
                                            </tr>        
                                                    
                                                        
                                                            
                                            <!-- This is modal -->
                                            <div class='modal fade' id='sisterSMS'>
                                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='ModalTitleSister'>Send Message</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form method='POST' action='php/doc-send-msg-action.php'>
                                                                <div class='row d-flex justify-content-around'>
                                                                    <div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
                                                                        <lable>From:</lable>
                                                                        <input type='text' class='form-control' name='sender' value='<?php echo $_SESSION['doctor_id']; ?>' readonly>
                                                                    </div>
                                                                </div>

                                                                <textarea name='sister_msg' class='form-control' placeholder='Type here....'></textarea>
                                                                <input type='hidden' name='sister_id' id='sister_id'>

                                                                <div class='modal-footer'>
                                                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                                    <input type='submit' name='submit-to-sis' class='btn btn-success' value='Send'>
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

                    <!-- Send SMS to Midwife section -->

                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <hr style="border: none; border-bottom: 10px solid blue;">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-8 col-sm-8 col-md-4 col-lg-2 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/midwife.png" alt="midwife" width="110px" height="115px">
                                    <figcaption class=" text-center text-primary">Midwife</figcaption>
                                </div>
                            </div>
                        </div>
                        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                            <br>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="b_table">
                                        <table class="table">
                                            <tr>
                                                <th>Name</th>
                                                <th>Send Messages</th>
                                            </tr>


                                            <?php
                                                $query3="SELECT doctor_moh_division FROM doctor WHERE doctor_id='".$_SESSION['doctor_id']."'";
                                                $result3=mysqli_query($conn,$query3);
                                                $row3=mysqli_fetch_assoc($result3);
                                                        
                                                $query4="SELECT midwife_name, midwife_id FROM midwife WHERE midwife_moh_division='".$row3['doctor_moh_division']."'";
                                                $result4=mysqli_query($conn,$query4);

                                                while($row4=mysqli_fetch_assoc($result4)) {
                                                    $midwife_id=$row4['midwife_id'];
                                            ?>
                                                           
                                            <tr>
                                                <td><?php echo $row4['midwife_name']; ?></td>
                                                <td>
                                                    <input type='button' class='btn btn-primary btn-sm' id='send_mid_msg_btn' data-toggle='modal' href='#send_mid_msg' data-id='<?php echo $midwife_id; ?>' value='Send'>
                                                </td>
                                            </tr>
                                                        
                                                            
                                            <!-- This is modal -->  
                                            <div class='modal fade' id='send_mid_msg'>
                                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='ModalTitleMidwife'>Send Message</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form method='POST' action='php/doc-send-msg-action.php'>
                                                                <div class='row d-flex justify-content-around'>
                                                                    <div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
                                                                        <lable>From:</lable>
                                                                        <input type='text' class='form-control' name='sender' value='<?php echo $_SESSION['doctor_id']; ?>' readonly>
                                                                    </div>
                                                                </div>
                                                                
                                                                <input type='hidden' name='midwife_id' id='midwife_id'>
                                                                <textarea name='midwife_msg' class='form-control' placeholder='Type here....'></textarea>
                                                                
                                                                
                                                                <div class='modal-footer'>
                                                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                                    <input type='submit' name='submit-to-mid' class='btn btn-primary' value='Send'>
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
        $(document).on("click", "#send_mid_msg_btn", function () {
            var getId = $(this).data('id');
            $("#midwife_id").val(getId);
        });
        
        $(document).on("click", "#send_sis_msg_btn", function () {
            var getId = $(this).data('id');
            $("#sister_id").val(getId);
        });
    </script>
    <!-- end of send data to modal scripts -->
    
    



</body>

</html>


<?php mysqli_close($conn); ?>