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
                    
                    <div class="row d-flex justify-content-center">
                        <div class="col-10">
                            <div class="card card-insert-user">
                                <div class="card-header">
                                    <h3 class="text-uppercase">Midwife Registration</h3>
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
                                            position: absolute; margin-top: -10px;'>* Midwife ID you have entered is already existed </i>";
                                        }
                                        ?>
                                    </p>
                                    <div class="registration">
                                        <form action="/pages/sister/php/add-midwife-action.php" method="POST">
                                            <div class="container mt-4">
                                                <div class="form-group row" >
                                                    <label class="col-md-4 col-form-label text-md-right">Midwife ID</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="midwife_id" class="form-control" placeholder=" ID" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row" align="left">
                                                    <label class="col-md-4 col-form-label text-md-right">Midwife Name</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="midwife_name" class="form-control" placeholder=" Name" required>
                                                    </div>
                                                </div>
                                                <?php
                                                    $query10="SELECT * FROM sister WHERE sister_id='".$_SESSION['sister_id']."' LIMIT 1";
                                                    $result10=mysqli_query($conn,$query10);
                                                    $row10=mysqli_fetch_assoc($result10);
                                                ?>
                                                <div class="form-group row" align="left">
                                                    <label class="col-md-4 col-form-label text-md-right">Midwife Area</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="midwife_area" value="<?php echo $row10['sister_division'];?>" class="form-control" placeholder=" Area" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row" align="left">
                                                    <label class="col-md-4 col-form-label text-md-right">Midwife MOH Division</label>
                                                    <div class="col-md-6">
                                                        <input type="number" min="0" name="midwife_moh_division" value="<?php echo $row10['sister_moh_division'];?>" class="form-control" placeholder="MOH Division"  required>
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
                                                    <button class="btn submit-btn btn-primary" name="insert">Register</button>
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