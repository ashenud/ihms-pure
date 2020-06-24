<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['mother_id'])) {	
	header('location:/?noPermission=1');
}
if(isset($_SESSION['doctor_id'])) {
    header('/?noPermission=1');
}
elseif(isset($_SESSION['sister_id'])) {
    header('/?noPermission=1');
}
elseif(isset($_SESSION['midwife_id'])) {
    header('/?noPermission=1');
}
elseif(isset($_SESSION['admin_id'])) {
    header('/?noPermission=1');
}
else{}
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
    
    <link rel="stylesheet" href="/pages/baby/css/baby-password-change-style.css">

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
            <div class="sidebar-menu">
                <div class="inner-sidebar-menu">

                    <div class="user-area pb-2 mb-3">
                        <img src="/pages/baby/img/mother.png" class="rounded-circle">
                        <?php
                            $query00 = "SELECT * FROM mother WHERE mother_nic='".$_SESSION['mother_id']."'";
                            $result00= mysqli_query($conn,$query00);
                            $row00=mysqli_fetch_assoc($result00);
                        ?>
                        <a href="#"> <span><?php echo $row00['mother_name'];?></span> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                       <li>
                            <a href="/baby/dashboard" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                </span>
                                <span class="list">තොරතුරු පුවරුව</span>
                            </a>
                        </li>
                        <li>
                            <a href="/baby/password-change" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-key" aria-hidden="true"></i>
                                </span>
                                <span class="list">මුරපදය වෙනස් කරන්න</span>
                            </a>
                        </li>
                    </ul>
                    <!--end of sidebar items-->

                    <!--normal and mobile hamburgers-->
                    <div class="hamburger">
                        <div class="inner-hamburger">
                            <span class="arrow">
                                <i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i>
                                <i class="fas fa-long-arrow-alt-right" aria-hidden="true" style="display: none;"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mob-hamburger" style="display: none;">
                        <div class="mob-inner-hamburger">
                            <span class="mob-arrow">
                                <i class="fas fa-long-arrow-alt-left" aria-hidden="true" style="display: none;"></i>
                                <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <!--end ofnormal and mobile hamburgers-->

                </div>
            </div>
            <!-- end of sidebar menu -->

            
            <!-- content -->
            <div class="content">
               
                <div class="container">
                  
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="menu">
                                <h4 class="text-uppercase font-weight-bold mb-4">මුරපදය වෙනස් කරන්න</h4>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                            <form action="/pages/baby/php/password-change.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="old_password">
                                        පැරණි මුරපදය
                                        <?php include('inc/alert-old-pass.php'); ?>                                    
                                    </label>
                                    <input type="password" class="form-control" name="old_password" placeholder="පැරණි මුරපදය ඇතුළත් කරන්න" required>
                                </div>
                                <div class="form-group">
                                    <label for="new_password">
                                        නව මුරපදය
                                        <?php include('inc/alert-new-pass.php'); ?>
                                    </label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="නව මුරපදය ඇතුළත් කරන්න" required>
                                    <span toggle="#new_password" class="far fa-fw fa-eye password-icon"></span>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">මුරපදය තහවුරු කරන්න</label>
                                    <input type="password" class="form-control" name="confirm_password" placeholder="නව මුරපදය නැවත ඇතුළත් කරන්න" required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">ඉදිරිපත් කරන්න</button>
                            </form>
                        </div>
                        <div class="col-md-4 pwd-validate">
                            <?php include('inc/pwd-validation-msg.php'); ?>
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
    
    <script type="text/javascript" src="/pages/baby/js/pwd-validation-script.js"> </script>

    <!-- writed scripts -->
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
    
    <!--- password show hide ------>
    <script>
        $(".password-icon").click(function () {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
    
    <!-- end of writed scripts -->



</body>

</html>


<?php mysqli_close($conn); ?>