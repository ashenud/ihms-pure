<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['sister_id'])) {	
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


                    <!------------------------Doctor Send SMS section---------------------------------------------->
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <hr style="border: none; border-bottom: 10px solid gold;">
                        </div>  
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-8 col-sm-8 col-md-4 col-lg-2 col-xl-2">
                        <div class="card">
                        <div class="card-body">
                            <img src="/pages/midwife/img/doctor.png" alt="doctor" width="110px" height="115px">
                            <figcaption  class=" text-center text-warning">Doctor</figcaption>
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
                                        <table class="table" >
                                            <tr>
                                                <th>Name</th>
                                                <th>Send message</th>
                                            </tr>
                                            
                                                
                                                    <?php
                                                        $sql00="SELECT sister_moh_division FROM sister WHERE sister_id='".$_SESSION['sister_id']."'";
                                                        $take00=mysqli_query($conn,$sql00);
                                                        $row00=mysqli_fetch_assoc($take00);
                                                        $sql01="SELECT doctor_name,doctor_id FROM doctor WHERE doctor_moh_division='".$row00['sister_moh_division']."'";
                                                        $take01=mysqli_query($conn,$sql01);
                                                        while($row01=mysqli_fetch_assoc($take01)){
                                                            $dId=$row01['doctor_id'];
                                                            echo "<tr>";
                                                            echo "<td>". $row01['doctor_name']."</td>";
                                                            echo  "<td>";
                                                            echo  "<input type='button' name='smsDoctor' class='btn btn-warning btn-sm' id='sendDataDoctor' data-toggle='modal' href='#doctorSMS' data-id='".$dId."' value='Send'>";
                                                        
                                                            
                                                    //--------------------------------This is modal------------------------------------------  
                                                    echo "<div class='modal fade' id='doctorSMS'>";
                                                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                    echo "<div class='modal-content'>";
                                                    echo "<div class='modal-header'>";
                                                    echo "<h5 class='modal-title' id='ModalTitleMidwife'>Send Message</h5>";
                                                    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                                    echo "<span aria-hidden='true'>&times;</span>";
                                                    echo "</button>";
                                                    echo "</div>";
                                                    echo "<div class='modal-body'>";
                                                    echo "<form method='POST' action='/pages/sister/php/sis-send-sms-action.php'>";
                                                    echo "<div class='row d-flex justify-content-around'>";
                                                    echo "<div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>";
                                                    echo "<lable>From:</lable>";
                                                    echo "<input type='text' class='form-control' name='sender' value='".$_SESSION['sister_id']."' readonly>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                    echo "<div class='row'>";
                                                    echo "<div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>";
                                                    echo "<input type='text' name='date' class='form-control' id='date1' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>";
                                                    echo "<input type='text' name='time' class='form-control' id='time1' readonly>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                    echo "<textarea name='doctorSMS' class='form-control' placeholder='Type here....'></textarea>";
                                                    echo "<input type='hidden' name='dId' id='dId'>";
                                                    echo "</div>";
                                                    echo "<div class='modal-footer'>";
                                                    echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                                    echo "<input type='submit' name='toDoctorSubmit' class='btn btn-warning' value='Send'>";
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
                    <!-----------------------------Sister Send SMS section-------------------------------------------->                        
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <hr style="border: none; border-bottom: 10px solid green;">
                        </div>  
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-8 col-sm-8 col-md-4 col-lg-2 col-xl-2">
                        <div class="card">
                        <div class="card-body">
                            <img src="/pages/midwife/img/sister.png" alt="sister" width="110px" height="115px">
                            <figcaption  class=" text-center text-success">Sister</figcaption>
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
                                        <table class="table" >
                                            <tr>
                                                <th>Name</th>
                                                <th>Send message</th>
                                            </tr>
                                            
                                                
                                                    <?php
                                                        $sql00="SELECT sister_moh_division FROM sister WHERE sister_id='".$_SESSION['sister_id']."'";
                                                        $take00=mysqli_query($conn,$sql00);
                                                        $row00=mysqli_fetch_assoc($take00);
                                                        $sql01="SELECT sister_name,sister_id FROM sister WHERE sister_moh_division='".$row00['sister_moh_division']."'";
                                                        $take01=mysqli_query($conn,$sql01);
                                                        while($row01=mysqli_fetch_assoc($take01)){

                                                            if($row01['sister_id']==$_SESSION['sister_id']){

                                                            }
                                                            else{
                                                            $sId=$row01['sister_id'];
                                                            echo "<tr>";
                                                            echo "<td>". $row01['sister_name']."</td>";
                                                            echo  "<td>";
                                                            echo  "<input type='button' name='smsSister' class='btn btn-success btn-sm' id='sendDataSister' data-toggle='modal' href='#sisterSMS' data-id='".$sId."' value='Send'>";
                                                            
                                                            
                                                    //--------------------------------This is modal------------------------------------------  
                                                        echo "<div class='modal fade' id='sisterSMS'>";
                                                        echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                        echo "<div class='modal-header'>";
                                                        echo "<h5 class='modal-title' id='ModalTitleSister'>Send Message</h5>";
                                                        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                                        echo "<span aria-hidden='true'>&times;</span>";
                                                        echo "</button>";
                                                        echo "</div>";
                                                        echo "<div class='modal-body'>";
                                                        echo "<form method='POST' action='/pages/sister/php/sis-send-sms-action.php'>";
                                                        echo "<div class='row d-flex justify-content-around'>";
                                                        echo "<div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>";
                                                        echo "<lable>From:</lable>";
                                                        echo "<input type='text' class='form-control' name='sender' value='".$_SESSION['sister_id']."' readonly>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                        echo "<div class='row'>";
                                                        echo "<div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>";
                                                        echo "<input type='text' name='date' class='form-control' id='date2' readonly>";
                                                        echo "</div>";
                                                        echo "<div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>";
                                                        echo "<input type='text' name='time' class='form-control' id='time2' readonly>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                        echo "<textarea name='sisterSMS' class='form-control' placeholder='Type here....'></textarea>";
                                                        echo "<input type='hidden' name='sId' id='sId'>";
                                                        echo "</div>";
                                                        echo "<div class='modal-footer'>";
                                                        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                                        echo "<input type='submit' name='toSisterSubmit' class='btn btn-success' value='Send'>";
                                                        echo "</div>";
                                                        echo "</form>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                        echo  "</td>";
                                                        echo  "</tr>";

                                                        }
                                                    }
                                                    ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-----------------------------Midwife Send SMS section------------------------------------------>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <hr style="border: none; border-bottom: 10px solid blue;">
                        </div>  
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-8 col-sm-8 col-md-4 col-lg-2 col-xl-2">
                        <div class="card">
                        <div class="card-body">
                            <img src="/pages/midwife/img/midwife.png" alt="midwife" width="110px" height="115px">
                            <figcaption  class=" text-center text-primary">Midwife</figcaption>
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
                                        <table class="table" >
                                            <tr>
                                                <th>Name</th>
                                                <th>Send message</th>
                                            </tr>
                                            
                                                
                                                    <?php
                                                        $sql00="SELECT sister_moh_division FROM sister WHERE sister_id='".$_SESSION['sister_id']."'";
                                                        $take00=mysqli_query($conn,$sql00);
                                                        $row00=mysqli_fetch_assoc($take00);
                                                        $sql01="SELECT midwife_name,midwife_id FROM midwife WHERE midwife_moh_division='".$row00['sister_moh_division']."'";
                                                        $take01=mysqli_query($conn,$sql01);

                                                        while($row01=mysqli_fetch_assoc($take01)){

                                                            $mId=$row01['midwife_id'];
                                                            echo "<tr>";
                                                            echo "<td>". $row01['midwife_name']."</td>";
                                                            echo  "<td>";
                                                            echo  "<input type='button' name='smsMidwife' class='btn btn-primary btn-sm' id='sendDataMidwife' data-toggle='modal' href='#midwifeSMS' data-id='".$mId."' value='Send'>";
                                                        
                                                            
                                                    //--------------------------------This is modal------------------------------------------  
                                                        echo "<div class='modal fade' id='midwifeSMS'>";
                                                        echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                                                        echo "<div class='modal-content'>";
                                                        echo "<div class='modal-header'>";
                                                        echo "<h5 class='modal-title' id='ModalTitleMidwife'>Send Message</h5>";
                                                        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                                        echo "<span aria-hidden='true'>&times;</span>";
                                                        echo "</button>";
                                                        echo "</div>";
                                                        echo "<div class='modal-body'>";
                                                        echo "<form method='POST' action='/pages/sister/php/sis-send-sms-action.php'>";
                                                        echo "<div class='row d-flex justify-content-around'>";
                                                        echo "<div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>";
                                                        echo "<lable>From:</lable>";
                                                        echo "<input type='text' class='form-control' name='sender' value='".$_SESSION['sister_id']."' readonly>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                        echo "<div class='row'>";
                                                        echo "<div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>";
                                                        echo "<input type='text' name='date' class='form-control' id='date3' readonly>";
                                                        echo "</div>";
                                                        echo "<div class='col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6'>";
                                                        echo "<input type='text' name='time' class='form-control' id='time3' readonly>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                        echo "<textarea name='midwifeSMS' class='form-control' placeholder='Type here....'></textarea>";
                                                        echo "<input type='hidden' name='mId' id='mId'>";
                                                        echo "</div>";
                                                        echo "<div class='modal-footer'>";
                                                        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                                                        echo "<input type='submit' name='toMidwifeSubmit' class='btn btn-primary' value='Send'>";
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
    <?php
    //js
    include('../../inc/basic/include-dashboard-js.php');
    ?>

    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.ss-send').addClass('active');
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

    <script type="text/javascript">

        $(document).on("click", "#sendDataDoctor", function () {
        var dId = $(this).data('id');
        $("#dId").val( dId );
        var dt1 = new Date();
        var time1 = dt1.getHours() + ":" + dt1.getMinutes() + ":" + dt1.getSeconds();
        var date1 = dt1.getFullYear()+ "-" + (dt1.getMonth()+1) + "-" + dt1.getDate();
        $("#time1").val(time1);
        $("#date1").val(date1);

        });

        $(document).on("click", "#sendDataSister", function () {
        var sId = $(this).data('id');
        $("#sId").val( sId );
        var dt2 = new Date();
        var time2 = dt2.getHours() + ":" + dt2.getMinutes() + ":" + dt2.getSeconds();
        var date2 = dt2.getFullYear()+ "-" + (dt2.getMonth()+1) + "-" + dt2.getDate();
        $("#time2").val(time2);
        $("#date2").val(date2);

        });

        $(document).on("click", "#sendDataMidwife", function () {
        var mId = $(this).data('id');
        $("#mId").val( mId );
        var dt3 = new Date();
        var time3 = dt3.getHours() + ":" + dt3.getMinutes() + ":" + dt3.getSeconds();
        var date3 = dt3.getFullYear()+ "-" + (dt3.getMonth()+1) + "-" + dt3.getDate();
        $("#time3").val(time3);
        $("#date3").val(date3);
        });
    </script>

</body>

</html>


<?php mysqli_close($conn); ?>