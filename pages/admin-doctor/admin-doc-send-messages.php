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
    ?>

    <?php
    //css
    include('../../inc/basic/include-dashboard-css.php');
    ?>

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
    <?php
    //js
    include('../../inc/basic/include-dashboard-js.php');
    ?>

    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.a-send').addClass('active');
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