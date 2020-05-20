<?php session_start(); ?>
<?php include('../../php/basic/connection.php'); ?>

<?php if(!isset($_SESSION['sister_id'])) {	
	header('location:../../index.php?noPermission=1');
	}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>

    <!--favicons-->
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">

    <!--fonts and icons-->
    <link rel="stylesheet" href="../../assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../../assets/css/unicode-fonts.css">
    <link rel="stylesheet" href="../../assets/css/material-design-iconic-font.min.css">

    <!--css files-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/animate.css">

    <link rel="stylesheet" href="../../assets/css/dashboard-style.css">

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
                        <img src="./img/sister.png" class="rounded-circle">
                        <?php
                            $query00 = "SELECT * FROM sister WHERE sister_id='".$_SESSION['sister_id']."'";
                            $result00= mysqli_query($conn,$query00);
                            $row00=mysqli_fetch_assoc($result00);
                        ?>
                        <a href="#"> <span><?php echo $row00['sister_name'];?></span> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <a href="sis-dashboard.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                </span>
                                <span class="list">තොරතුරු පුවරුව</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-uppercase" data-toggle="collapse" href="#manage">
                                <span class="icon">
                                    <i class="fas fa-users-cog" aria-hidden="true"></i>
                                </span>
                                <span class="list">කළමනාකරණය</span>
                            </a>
                        </li>
                        <div class="collapse collapse-manage" id="manage">
                            <li>
                                <a href="sis-add-midwife.php" class="text-uppercase drop">
                                    <span class="icon-active">
                                        <i class="fas fa-user-plus" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">වින්නඹුවන් එක් කරන්න</span>
                                </a>
                            </li>
                            <li>
                                <a href="sis-view-midwife.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">වින්නඹුවන් බලන්න</span>
                                </a>
                            </li>
                            <li>
                                <a href="sis-view-babies.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">ළමුන් බලන්න</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="#" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-table" aria-hidden="true"></i>
                                </span>
                                <span class="list">දත්ත වගු</span>
                            </a>
                        </li>
                        <li>
                            <a href="sis-inbox.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-inbox" aria-hidden="true"></i>
                                </span>
                                <span class="list">එන පණිවිඩ</span>
                            </a>
                        </li>
                        <li>
                            <a href="sis-send-messages.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                </span>
                                <span class="list">පණිවිඩ යවන්න</span>
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
               
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-header">Featured</div>
                                <div class="card-body">
                                    <h4 class="card-title">Special title treatment</h4>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                                <div class="card-footer text-muted">2 days ago</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-header">Featured</div>
                                <div class="card-body">
                                    <h4 class="card-title">Special title treatment</h4>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                                <div class="card-footer text-muted">2 days ago</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-header">Featured</div>
                                <div class="card-body">
                                    <h4 class="card-title">Special title treatment</h4>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                                <div class="card-footer text-muted">2 days ago</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mt-4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum consectetur possimus neque quia debitis illo asperiores nisi velit excepturi esse ipsa culpa, suscipit maiores deleniti hic magni commodi aliquam sequi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde suscipit nostrum velit fuga, voluptate adipisci debitis praesentium voluptates dolorem maxime vitae, saepe numquam soluta ducimus voluptas deserunt? Labore consequuntur, veritatis.
                        </div>
                        <div class="col-md-4 mt-4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum consectetur possimus neque quia debitis illo asperiores nisi velit excepturi esse ipsa culpa, suscipit maiores deleniti hic magni commodi aliquam sequi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde suscipit nostrum velit fuga, voluptate adipisci debitis praesentium voluptates dolorem maxime vitae, saepe numquam soluta ducimus voluptas deserunt? Labore consequuntur, veritatis.
                        </div>
                        <div class="col-md-4 mt-4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum consectetur possimus neque quia debitis illo asperiores nisi velit excepturi esse ipsa culpa, suscipit maiores deleniti hic magni commodi aliquam sequi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde suscipit nostrum velit fuga, voluptate adipisci debitis praesentium voluptates dolorem maxime vitae, saepe numquam soluta ducimus voluptas deserunt? Labore consequuntur, veritatis.
                        </div>
                    </div>
                </div>

            </div>
            <!-- end of content -->

        </div>
        <!-- end of main body (sidebar and content) -->

    </div>


    <!-- optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/bootstrap.min.js"></script>

    <script type="text/javascript" src="../../assets/js/script.js"> </script>
    <!--end core js files-->

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