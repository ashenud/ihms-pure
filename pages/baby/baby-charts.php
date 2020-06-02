<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['mother_id']) && !isset($_SESSION['serch_baby_using_nic']) && !isset($_SESSION['doc_serch_baby_using_nic'])) {	
    header('/?noPermission=1');
}
if(!isset($_SESSION['baby_id'])) {	
   header('location:./baby-select.php');
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
    
    <link rel="stylesheet" href="./css/baby-charts-style.css">

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
                        <div class="col-md-6">
                            <div class="card card-table">
                                <div class="card-header"><p>ප්‍රස්ථාරය තෝරන්න</p></div>
                                <div class="card-body">
                                    <div class="items">
                                        <div class="list-group-flush">
                                            <div class="list-group-item">
                                                <a class="btn" href="./baby-charts-weight.php">දරුවාගේ බර ප්‍රස්ථාරය</a>
                                            </div>
                                            <div class="list-group-item">
                                                <a class="btn" href="./baby-charts-height.php">දරුවාගේ උස ප්‍රස්ථාරය</a>
                                            </div>
                                            <div class="list-group-item">
                                                <a class="btn" href="./baby-charts-bmi.php">දරුවාගේ උසට සරිලන බර ප්‍රස්ථාරය</a>
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
            $('.inner-sidebar-menu ul li a.b-chart').addClass('active');
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