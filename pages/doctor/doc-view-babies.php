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
    //table css
    include('../../inc/basic/include-dashboard-table-css.php');
    ?>
    
    <link rel="stylesheet" href="./css/doc-view-babies-style.css">
    
    <style>
        .collapse-manage {
            display: block !important;
        }
    </style>
    
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
                   <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">සියලුම ළදරුවන්</h5>
                                    
                                    <div class="table-for-data" style="margin-top: 30px">
                        
                                        <?php

                                        $query1 = "SELECT 
                                                       mother_nic, 
                                                       baby_id,
                                                       baby_first_name,
                                                       baby_last_name,
                                                       baby_dob,
                                                           CONCAT_WS ( ', ',
                                                           CASE WHEN years = 0 THEN NULL ELSE CONCAT(years,' years') END, 
                                                           CASE WHEN months = 0 THEN NULL ELSE CONCAT(months, ' months') END,
                                                           CASE WHEN days = 0 THEN NULL ELSE CONCAT(days, ' days') END)
                                                       age
                                                       
                                                    FROM (SELECT 
                                                            mother_nic,
                                                            baby_id,
                                                            baby_first_name,
                                                            baby_last_name,
                                                            baby_dob,
                                                            FLOOR(DATEDIFF(CURDATE(),baby_dob)/365) years,
                                                            
                                                            FLOOR((DATEDIFF(CURDATE(),baby_dob)/365 - FLOOR(DATEDIFF(CURDATE(),baby_dob)/365))* 12) months,
                                                            
                                                            CEILING((((DATEDIFF(CURDATE(),baby_dob)/365 - FLOOR(DATEDIFF(CURDATE(),baby_dob)/365))* 12) - FLOOR((DATEDIFF(CURDATE(),baby_dob)/365 - FLOOR(DATEDIFF(CURDATE(),baby_dob)/365))* 12))* 30) days
                                                          FROM baby_register WHERE status='active') x";
                                        $result1= mysqli_query($conn,$query1);

                                        ?>

                                        <table class="mdl-data-table table-responsive-xl bordered" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Mother NIC</th>
                                                    <th>Baby ID</th>
                                                    <th>Name</th>
                                                    <th>Age</th>
                                                    <th>View</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                        <?php
                                        if ($result1) {
                                            while ($row = mysqli_fetch_assoc($result1)) {
                                        ?>        

                                                <tr>
                                                    <td><?php echo $row['mother_nic']; ?></td>
                                                    <td><?php echo $row['baby_id']; ?></td>
                                                    <td><?php echo $row['baby_first_name']." ".$row['baby_last_name']; ?></td>
                                                    <td><?php echo $row['age']; ?></td>
                                                    <td>
                                                        <form action="../general/view-data.php" method="POST">
                                                            <input type="hidden" name="view-id" value="<?php echo $row['baby_id']; ?>">
                                                            <button type="submit" name="view-btn" class="btn view-btn"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                        </form>
                                                    </td>
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
                        </div>
                        <div class="col-md-1"></div>
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
    //table js
    include('../../inc/basic/include-dashboard-table-js.php');
    ?>

    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.d-baby').addClass('drop-active');
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
            
            $('#manage-users').on('click', function () {
                $('#manage-users').toggleClass('active');
                $('#manage').toggleClass('collapse-manage d-none');
            });          
        });
    </script>
    <!-- end of writed scripts -->



</body>

</html>


<?php mysqli_close($conn); ?>