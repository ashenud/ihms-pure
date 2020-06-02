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

    <link rel="stylesheet" href="./css/mid-charts-style.css">

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
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">Sister Registration</h5>
                                    <p>
                                        <?php
                                        if(isset($_GET['success'])){
                                            echo  " <i style='color :green;'>* User Added. </i>";
                                        }
                                        elseif (isset($_GET['error'])){
                                            echo " <i style='color :red;'>* Invalid Fields </i>";
                                        }
                                        ?>
                                    </p>
                                    <div class="registration">
                                        <form name="my-form" action="./php/add-chart-data-action.php" method="POST" onsubmit="return validation()">
                                        
                                            <div class="container mt-4">

                                                <div class="form-group row">
                                                    <label for="user_id" class="col-md-4 col-form-label text-md-right">Baby ID</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="user_id" class="form-control" name="user_id">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="month" class="col-md-4 col-form-label text-md-right">Age in Months</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="month" class="form-control" name="month">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="weight" class="col-md-4 col-form-label text-md-right">Weight</label>
                                                    <div class="col-md-6">
                                                        <input type="textr" id="weight" class="form-control" name="weight">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="height" class="col-md-4 col-form-label text-md-right">Height</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="height" class="form-control" name="height">
                                                    </div>
                                                </div> 
                                                                                      
                                                <div class="col-md-4 offset-md-8">
                                                    <button type="submit" class="btn btn-primary" name="submit">
                                                    Enter
                                                    </button>
                                                </div>
                                            </div>    
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
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
            $('.inner-sidebar-menu ul li a.mm-chart').addClass('active');
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