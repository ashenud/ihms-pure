<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['admin_id'])) {	
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
    
    <link rel="stylesheet" href="/pages/admin-doctor/css/admin-doc-dashboard-style.css">

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
                    <div class="row mt-4 mb-5">
                        <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                            <a class="text-decoration-none" href="/doctor/view-babies">
                                <div class="card card-stats">
                                    <div class="card-header stat-header">
                                        <div class="card-icon icon-color">
                                            <i class="fas fa-stethoscope"></i>
                                        </div>
                                        <p class="card-category">Registered Doctors</p>

                                        <?php

                                        $query1="SELECT COUNT('doc_id') AS docCount FROM doctor";
                                        $result1=mysqli_query($conn, $query1);
                                        $row1=mysqli_fetch_assoc($result1);

                                        ?>

                                        <h3 class="card-title counter"><?php echo $row1['docCount']; ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                            <a class="text-decoration-none" href="/doctor/inbox">
                                <div class="card card-stats">
                                    <div class="card-header stat-header">
                                        <div class="card-icon icon-color">
                                            <i class="fas fa-stethoscope"></i>
                                        </div>
                                        <p class="card-category">Registered Sisters</p>
                                        <?php

                                        $query2="SELECT COUNT('sis_id') AS sisCount FROM sister";
                                        $result2=mysqli_query($conn, $query2);
                                        $row2=mysqli_fetch_assoc($result2);

                                        ?>
                                        <h3 class="card-title counter"><?php echo $row2['sisCount']; ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                            <div class="card card-stats">
                                <div class="card-header stat-header">
                                    <div class="card-icon icon-color text-center">
                                        <p class="card-category"><i class="fas fa-eye"></i> Vision</p>
                                    </div>
                                    
                                    <p class="card-text text-center">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                            <div class="card card-stats">
                                <div class="card-header stat-header">
                                    <div class="card-icon icon-color text-center">
                                        <p class="card-category"><i class="fas fa-globe"></i> Mission</p>
                                    </div>
                                    
                                    <p class="card-text text-center">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 mb-5">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p>Reminders</p>
                                        </div>
                                        <div class="col-md-4">
                                            <a data-toggle="modal" href="#reminderModal"
                                                class="btn btn-primary align-right">Add reminders</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mt-3 mb-0 text-sm">
                                        <?php

                                        $query1="SELECT * FROM admin_reminder WHERE admin_id='".$_SESSION['admin_id']."'";
                                        $result1=mysqli_query($conn, $query1);
                                        $num_rows1=mysqli_num_rows($result1);

                                        ?>
                                        <span class="text-nowrap">You have <?php echo $num_rows1; ?> reminders</span>
                                    </p>
                                    <table class="table mdl-data-table table-responsive bordered" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>Date Time</th>
                                                <th>Reminder</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                if ($result1) {
                                    while ($row = mysqli_fetch_assoc($result1)) {
                                        ?>

                                            <tr>
                                                <td><?php echo $row['date_time']; ?></td>
                                                <td><?php echo $row['admin_reminder']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                }
                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for add Reminders -->
                        <div id="reminderModal" class="modal fade">
                            <div class="modal-dialog modal-reminder">
                                <div class="modal-content card card-image">
                                    <form action="/pages/admin-doctor/php/add-reminder-action.php" method="POST">
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
                                                    <input type="datetime-local" name="dateTime" class="form-control"
                                                        required>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="submitReminder"
                                                class="btn btn-primary pull-right" value="Save">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- model end -->

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header text-center">
                                    <p>Monthly Schedule</p>
                                </div>
                                <div class="card-body text-center">
                                    <a href="/pages/admin-doctor/admin-doc-add-schedule.php" class="btn btn-primary">Update</a>
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
            $('.inner-sidebar-menu ul li a.a-dash').addClass('active');
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