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

    <link rel="stylesheet" href="/pages/midwife/css/mid-dashboard-style.css">

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
               
                <!-- alert section -->
                <div class="alert-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <?php include('./inc/alert-reminder-success.php'); ?>
                                <?php include('./inc/alert-reminder-error.php'); ?>
                                <?php include('./inc/alert-email-send-success.php'); ?>
                                <?php include('./inc/alert-email-send-error.php'); ?>
                                <?php include('./inc/alert-reminder-delete-success.php'); ?>
                                <?php include('./inc/alert-reminder-delete-error.php'); ?>
                            </div>
                            <div class="col-lg-4"></div>
                        </div>
                    </div>
                </div>
                <!-- end of alert section -->
                
                <div class="container">
                    
                    <div class="row mt-4 mb-5">
                        
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">
                            <a data-toggle="modal" href="#reminderModal" class="text-decoration-none">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col title">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Add</h5>
                                                <span class="h5 text-uppercase font-weight-bold mb-0">Reminder</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card-icon icon-color">
                                                    <i class="far fa-clipboard"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-sm">
                                            <?php 

                                                $query1="SELECT * FROM midwife_reminder WHERE midwife_id='".$_SESSION['midwife_id']."'";
                                                $result1=mysqli_query($conn, $query1);
                                                $num_rows1=mysqli_num_rows($result1);

                                            ?>
                                            <span class="text-nowrap">You have <?php echo $num_rows1; ?> reminders</span>
                                        </p>

                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">
                            <a class="text-decoration-none" href="/midwife/view-babies">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col title">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Registerd</h5>
                                                <span class="h5 text-uppercase font-weight-bold mb-0">Babies</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card-icon icon-color">
                                                    <i class="fas fa-baby"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-sm">
                                            <?php 
                                    
                                                $query3="SELECT * FROM baby_register WHERE midwife_id='".$_SESSION['midwife_id']."'";
                                                $result3=mysqli_query($conn, $query3);
                                                $num_rows3=mysqli_num_rows($result3);

                                            ?>
                                            <span class="text-nowrap"><?php echo $num_rows3; ?> babies have registrated</span>
                                        </p>

                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">
                            <a class="text-decoration-none" href="/midwife/thriposha">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col title">
                                                <h6 class="card-title text-uppercase text-muted mb-0">distributing</h6>
                                                <span class="h5 text-uppercase font-weight-bold mb-0">thriposha</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card-icon icon-color">
                                                    <i class="fas fa-cookie-bite"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-sm">
                                            <?php
                                            
                                                $currentYMonth=date("Y-m");
                                                $query4="SELECT available_qty,MAX(distributed_qty) FROM thriposha_storage WHERE midwife_id='".$_SESSION['midwife_id']."' AND updated_date LIKE'%$currentYMonth%'";
                                                $result4=mysqli_query($conn,$query4);
                                                $row4=mysqli_fetch_assoc($result4);
                                                $reminder=$row4['available_qty']-$row4['MAX(distributed_qty)'];
                                                
                                            ?>
                                            <span class="text-nowrap"><?php echo $reminder; ?> packets are remain</span>
                                        </p>

                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">
                            <a class="text-decoration-none" href="/midwife/contact-staff">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col title">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Contact</h5>
                                                <span class="h5 text-uppercase font-weight-bold mb-0">staff</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card-icon icon-color">
                                                    <i class="fas fa-address-book"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-sm">
                                            <span class="text-nowrap">Send short messages</span>
                                        </p>

                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Modal for add Reminders -->
                        <div id="reminderModal" class="modal fade">
                            <div class="modal-dialog modal-reminder">
                                <div class="modal-content card card-image">
                                    <form action="/pages/midwife/php/add-reminder-action.php" method="POST">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-uppercase">Add Reminder</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <i class="far fa-window-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="text-uppercase">discription</label>
                                                <input type="text" name="reminder" class="form-control" required>
                                            </div>
                                            <div class="form-group">

                                                <div class="clearfix">
                                                    <label class="text-uppercase">date and time</label>
                                                    <input type="datetime-local" name="dateTime" class="form-control" required>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="submitReminder" class="btn btn-primary pull-right" value="Save">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- model end -->
                        
                    </div>

                    <div class="row mt-4 mb-5">

                        <!-- search baby section -->
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3">
                            <div class="card search-babies">
                                <form method="POST" action="/pages/midwife/php/mid-search-baby-by-mNIC.php">
                                    <div class="card-header">
                                        <h6 class="font-weight-bold">Search Mother</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="search-input">
                                            <input type="text" name="searchUser" class="form-control" placeholder="enter mother nic for search..." required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" value="SEARCH" class="btn btn-sm text-light" name="searchBabyUsingMnic">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- message section -->
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3">
                            <div class="card compose-mail">
                                <form method="POST" action="/pages/midwife/php/send-mail-action.php">
                                    <div class="card-header">
                                        <h6 class="font-weight-bold">Send message to all mothers via email</h6>
                                    </div>
                                    <div class="card-body">
                                        <table>
                                            <tr>
                                                <td>
                                                    <label class="table-data">Subject</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="subject" class="form-control form-control-sm" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="table-data">Message</label>
                                                </td>
                                                <td>
                                                    <textarea rows="2" cols="50" name="message" class="form-control form-control-sm" required></textarea>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" value="SEND" class="btn btn-sm text-light" name="submit2">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    
                    <div class="row mt-4 mb-5">

                        <!-- vaccination table section -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3">
                            <div class="card view-vaccine">
                                <div class="card-header">
                                    <h6 class="font-weight-bold">Vaccination Date</h6>
                                </div>
                                <div class="card-body">
                                    <div class="b_table" id="newDiv">
                                        <table class="table table-responsive-xl">
                                            <thead class="thead-theme">
                                                <tr class="b_text5">
                                                    <th>Baby Id</th>
                                                    <th>Vaccine</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            
                                            <?php 
                                                include "php/selectdb.php";

                                                $mid=$_SESSION["midwife_id"];
                                                $currentDate= date("Y-m-d");
                                                $expireDate = date('Y-m-d', strtotime("+5 days"));

                                                //$sqlDel="DELETE FROM vaccine_date WHERE giving_date < DATE_SUB(curdate(), INTERVAL 7 DAY)";
                                                //mysqli_query($conn,$sqlDel);

                                                $sql5="SELECT * FROM vaccine_date WHERE midwife_id='".$mid."' AND (giving_date >='".$currentDate."') AND (giving_date <='".$expireDate."') order by giving_date ASC ";
                                                $data=mysqli_query($conn,$sql5);
                                            
                                                while ($result=mysqli_fetch_assoc($data)) {
                                                    echo  "<tr class='b_text3' style='color:black'>";
                                                    echo  "<td>".$result['baby_id']."</td>";
                                                    echo  "<td>".$result['vac_name']."</td>";
                                                    echo  "<td>".$result['giving_date']."</td>";
                                                    echo  "</tr>";
                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                    
                        </div>

                        <!-- reminder table section -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3">
                            <div class="card view-reminders">
                                <div class="card-header">
                                    <h6 class="font-weight-bold">Reminders</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-container">
                                        <table class="table table-reminder table-responsive-xl">

                                        <?php
                                        
                                        $mid_id=$_SESSION["midwife_id"];
                                        $query2="SELECT * FROM midwife_reminder WHERE midwife_id='".$mid_id."' order by date_time DESC ";
                                        $result2=mysqli_query($conn,$query2);

                                        while ($row2=mysqli_fetch_assoc($result2)) {
                                    
                                        ?>
                                           
                                            <form method='POST' action="/pages/midwife/php/delete-reminder-action.php">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img class="media-photo" src="/pages/midwife/img/reminder-icon.webp">
                                                        </td>
                                                        <td>
                                                            <span class="discription"><?php echo $row2['midwife_reminder']; ?></span>
                                                        </td>
                                                        <td>
                                                            <span class="date pull-right"><?php echo $row2['date_time']; ?></span>
                                                        </td>
                                                        <td>
                                                            <input type='hidden' name='date_time' value='<?php echo $row2['date_time']; ?>'>
                                                            <input type='submit' name='submit3' class='btn text-light' value='Delete'>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </form>

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
    <?php
    //js
    include('../../inc/basic/include-dashboard-js.php');
    ?>

    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.mm-dash').addClass('active');
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


</body>

</html>

<?php mysqli_close($conn); ?>