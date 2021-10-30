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
    ?>
    
    <link rel="stylesheet" href="/pages/doctor/css/doc-send-messages-style.css">

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
               
                <!-- alert section -->
                <div class="alert-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <?php include('./inc/alert-doc-send-msg-to-sis-success.php'); ?>
                                <?php include('./inc/alert-doc-send-msg-to-mid-success.php'); ?>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
                <!-- end of alert section -->
               
                <div class="container">

                    <!-- Send SMS to Sister section -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="card card-send-msg">
                                <div class="card-header">
                                    <h3>හෙදියක්(Sister) හට පණිවිඩයක් යවන්න</h3>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4 img-col">
                                                <div class="img-area">
                                                    <img src="/pages/doctor/img/sister.png" alt="midwife" width="110px" height="115px">
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="b_table">
                                                    <table class="table table-responsive-xl">
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
                                                            <td class="content">
                                                                <div class="data-receiver">
                                                                    <?php echo $row2['sister_name']; ?>
                                                                </div>
                                                                
                                                            </td>
                                                            <td class="content">
                                                                <div class="data-btn">
                                                                    <input type='button' name='smsSister' class='btn btn-success btn-sm' id='send_sis_msg_btn' data-toggle='modal' href='#sisterSMS' data-id='<?php echo $sister_id; ?>' value='යවන්න'>
                                                                </div>
                                                            </td>
                                                        </tr>



                                                        <!-- This is modal -->
                                                        <div class='modal model-send-msg fade' id='sisterSMS'>
                                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title' id='ModalTitleSister'>පණිවිඩය යවන්න</h5>
                                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                            <span aria-hidden='true'>&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        <form method='POST' action='/pages/doctor/php/doc-send-msg-action.php'>
                                                                            <div class='row d-flex justify-content-around'>
                                                                                <div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
                                                                                    <lable>විසින්:</lable>
                                                                                    <input type='text' class='form-control mb-2' name='sender' value='<?php echo $_SESSION['doctor_id']; ?>' readonly>
                                                                                </div>
                                                                            </div>

                                                                            <textarea name='sister_msg' class='form-control' placeholder='මෙහි ටයිප් කරන්න....'></textarea>
                                                                            <input type='hidden' name='sister_id' id='sister_id'>

                                                                            <div class='modal-footer'>
                                                                                <button type='button' class='btn btn-info' data-dismiss='modal'>ඉවත් වන්න</button>
                                                                                <input type='submit' name='submit-to-sis' class='btn btn-success' value='යවන්න'>
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
                    </div>
                    
                    <!-- Send SMS to Midwife section -->
                    <div class="row d-flex justify-content-center mt-5">
                        <div class="col-md-8">
                            <div class="card card-send-msg">
                                <div class="card-header">
                                    <h3>වින්නඹුවක්(Midwife) හට පණිවිඩයක් යවන්න</h3>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4 img-col">
                                                <div class="img-area">
                                                    <img src="/pages/doctor/img/midwife.png" alt="midwife" width="110px" height="115px">
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="b_table">
                                                    <table class="table table-responsive-xl">
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
                                                            <td class="content">
                                                                <div class="data-receiver">
                                                                <?php echo $row4['midwife_name']; ?>
                                                                </div>
                                                            </td>
                                                            <td class="content">
                                                                <div class="data-btn">
                                                                    <input type='button' class='btn btn-success btn-sm' id='send_mid_msg_btn' data-toggle='modal' href='#send_mid_msg' data-id='<?php echo $midwife_id; ?>' value='යවන්න'>
                                                                </div>
                                                            </td>
                                                        </tr>


                                                        <!-- This is modal -->
                                                        <div class='modal model-send-msg fade' id='send_mid_msg'>
                                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title' id='ModalTitleMidwife'>පණිවිඩය යවන්න</h5>
                                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                            <span aria-hidden='true'>&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        <form method='POST' action='/pages/doctor/php/doc-send-msg-action.php'>
                                                                            <div class='row d-flex justify-content-around'>
                                                                                <div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
                                                                                    <lable>විසින්:</lable>
                                                                                    <input type='text' class='form-control mb-2' name='sender' value='<?php echo $_SESSION['doctor_id']; ?>' readonly>
                                                                                </div>
                                                                            </div>

                                                                            <input type='hidden' name='midwife_id' id='midwife_id'>
                                                                            <textarea name='midwife_msg' class='form-control' placeholder='මෙහි ටයිප් කරන්න....'></textarea>


                                                                            <div class='modal-footer'>
                                                                                <button type='button' class='btn btn-info' data-dismiss='modal'>ඉවත් වන්න</button>
                                                                                <input type='submit' name='submit-to-mid' class='btn btn-success' value='යවන්න'>
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

    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.d-send').addClass('active');
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