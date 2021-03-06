<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['mother_id'])) {	
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
    
    <link rel="stylesheet" href="/pages/baby/css/baby-select-style.css">

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
                        <img src="/pages/baby/img/mother.png" width="50" class="rounded-circle">
                        <?php
                            $query1 = "SELECT * FROM mother WHERE mother_nic='".$_SESSION['mother_id']."'";
                            $result1= mysqli_query($conn,$query1);
                            $row=mysqli_fetch_assoc($result1);
                        ?>
                        <a href="#"> <span><?php echo $row['mother_name'];?></span> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <?php
                                if(isset($_SESSION['doctor_id'])){
                                    echo '<a href="/doctor/dashboard" class="text-uppercase">';
                                    echo '<span class="icon">';
                                    echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                                    echo '</span>';
                                    echo '<span class="list">????????????????????? ??????????????????</span>';
                                    echo '</a>';
                                }
                                if(isset($_SESSION['sister_id'])){
                                    echo '<a href="/sister/dashboard" class="text-uppercase">';
                                    echo '<span class="icon">';
                                    echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                                    echo '</span>';
                                    echo '<span class="list">????????????????????? ??????????????????</span>';
                                    echo '</a>';
                                }
                                if(isset($_SESSION['midwife_id'])){
                                    echo '<a href="/midwife/dashboard" class="text-uppercase">';
                                    echo '<span class="icon">';
                                    echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                                    echo '</span>';
                                    echo '<span class="list">????????????????????? ??????????????????</span>';
                                    echo '</a>';
                                }
                                if(isset($_SESSION['admin_id'])){
                                    echo '<a href="/admin/dashboard" class="text-uppercase">';
                                    echo '<span class="icon">';
                                    echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                                    echo '</span>';
                                    echo '<span class="list">????????????????????? ??????????????????</span>';
                                    echo '</a>';
                                }

                            ?>
                        </li>
                        <li>
                            <a href="/baby/select" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-baby" aria-hidden="true"></i>
                                </span>
                                <span class="list">??????????????? ??????????????????</span>
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
                        <?php
                            $mother_nic=$_SESSION['mother_id'];
                            $query1="SELECT * FROM baby_register WHERE mother_nic='{$mother_nic}' AND status='active'";
                            $result1=mysqli_query($conn, $query1);
                        
                            while ($row = mysqli_fetch_assoc($result1)) {
                                $baby_id = $row["baby_id"];
                                $gender = $row["baby_gender"];
                                $name = $row["baby_first_name"];
                                
                                if($gender=='M') {
                        ?>
                            
                                    <div class="col-md-auto">
                                        <form action="/pages/baby/php/baby-select-action.php" method="POST">
                                            <button type="submit" class="btn" name="baby_id" value="<?php echo $baby_id;?>">
                                                <div class="card card-common">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <i class="fas fa-baby" style="color: #2a94c3;"></i>
                                                        </div>
                                                    </div>
                                                    <div class="c-footer py-1 text-center">
                                                        <center><p style="color: #1565c0;">
                                                            <?php echo $name;?>
                                                        </p></center>
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    </div>

                        <?php
                                }
                                else {
                        ?>
                                    <div class="col-md-auto">
                                        <form action="/pages/baby/php/baby-select-action.php" method="POST">
                                            <button type="submit" class="btn" name="baby_id" value="<?php echo $baby_id;?>">
                                                <div class="card card-common">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <i class="fas fa-baby" style="color: #bd445d;"></i>
                                                        </div>
                                                    </div>
                                                    <div class="c-footer py-1 text-center">
                                                        <center><p style="color: #c2185b;">
                                                            <?php echo $name;?>
                                                        </p></center>
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                    
                        <?php
                                }
                            }
                        ?>
                       
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
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(".wrapper").toggleClass("active");
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".mob-hamburger").click(function() {
                $(".wrapper").toggleClass("mob-active");
            });
        });
    </script>
    <!-- end of writed scripts -->



</body>

</html>


<?php mysqli_close($conn); ?>