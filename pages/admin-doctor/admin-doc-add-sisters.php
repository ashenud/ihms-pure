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
    
    <link rel="stylesheet" type="text/css" href="/pages/admin-doctor/css/admin-doc-add-sisters-style.css">

    <style>
        .collapse-manage {
            display: block !important;
        }
    </style>

    <title>Sister Registration</title>


    
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
                        <div class="col-10">
                            <div class="card card-insert-user">
                                <div class="card-header">
                                    <h3 class="text-uppercase">Sister Registration</h3>
                                </div>
                                <div class="card-body">
                                    <p>
                                        <?php
                                        if(isset($_GET['success'])){
                                            echo  " <i style='color :green; z-index: 10;
                                            position: absolute; margin-top: -10px;'>* User Added. </i>";
                                        }
                                        elseif (isset($_GET['error'])){
                                            echo " <i style='color :red; z-index: 10;
                                            position: absolute; margin-top: -10px;'>* Invalid Fields </i>";
                                        }
                                        elseif (isset($_GET['userIdError'])){
                                            echo " <i style='color :red; z-index: 10;
                                            position: absolute; margin-top: -10px;'>* Sister ID you have entered is already existed </i>";
                                        }
                                        ?>
                                    </p>
                                    <div class="registration">
                                        <form name="my-form" action="/pages/admin-doctor/php/add-sister-action.php" method="POST" onsubmit="return validation()">
                                        
                                            <div class="container mt-4">

                                                <div class="form-group row">
                                                    <label for="user_id" class="col-md-4 col-form-label text-md-right">User ID</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="user_id" class="form-control" name="user_id" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="sister_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="sister_name" class="form-control" name="sister_name" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                                    <div class="col-md-6">
                                                        <input type="email" id="email" class="form-control" name="email" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                                    <div class="col-md-6">
                                                        <input type="password" id="password" class="form-control" name="password" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="sister_division" class="col-md-4 col-form-label text-md-right">Sister Division</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="sister_division" class="form-control" name="sister_division" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="sister_moh_division" class="col-md-4 col-form-label text-md-right">Sister MOH Division</label>
                                                    <div class="col-md-6">
                                                        <input type="number" min="0" id="sister_moh_division" class="form-control" name="sister_moh_division" required>
                                                    </div>
                                                </div>
                                                                                        
                                                <div class="col-md-4 offset-md-8">
                                                    <button type="submit" class="btn submit-btn btn-primary" name="submit">
                                                    Register
                                                    </button>
                                                </div>
                                            </div>    
                                            
                                        </form>
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
            $('.inner-sidebar-menu ul li a.a-add').addClass('drop-active');
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
    
    <script>
        
    </script>
    
    <!-- end of writed scripts -->


</body>

</html>


<?php mysqli_close($conn); ?>