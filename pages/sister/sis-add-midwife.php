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
    
    <link rel="stylesheet" href="/pages/sister/css/sis-add-midwife-style.css">
    
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
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">Midwife Registration</h5>
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
                                        <form action="/pages/sister/php/add-midwife-action.php" method="POST">
                                            <div class="container mt-4">
                                                <div class="form-group row" >
                                                    <label class="col-md-4 col-form-label text-md-right">Midwife ID</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="id" class="form-control" placeholder=" ID" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row" align="left">
                                                    <label class="col-md-4 col-form-label text-md-right">Midwife Name</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="mname" class="form-control" placeholder=" Name" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row" align="left">
                                                    <label class="col-md-4 col-form-label text-md-right">Midwife Area</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="area" class="form-control" placeholder=" Area" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row" align="left">
                                                    <label class="col-md-4 col-form-label text-md-right">Midwife Email</label>
                                                    <div class="col-md-6">
                                                        <input type="email" name="email" class="form-control" placeholder=" Email" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row" align="left">
                                                    <label class="col-md-4 col-form-label text-md-right">Midwife Password</label>
                                                    <div class="col-md-6">
                                                        <input type="password" name="password" class="form-control" placeholder="password" required><br>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-4 offset-md-8">
                                                    <button class="btn btn-primary" name="insert">Register</button>
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
            $('.inner-sidebar-menu ul li a.ss-add').addClass('drop-active');
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
                $('#manage').toggleClass('collapse-manage d-none');
            });          
        });
    </script>
    <!-- end of writed scripts -->


</body>

</html>


<?php mysqli_close($conn); ?>