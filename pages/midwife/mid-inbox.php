<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['midwife_id'])) {	
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

    <link rel="stylesheet" href="/pages/midwife/css/mid-inbox-style.css">

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
            <?php include('inc/sidebar.php'); ?>
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
    <?php
    //js
    include('../../inc/basic/include-dashboard-js.php');
    ?>

    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.mm-inbox').addClass('active');
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