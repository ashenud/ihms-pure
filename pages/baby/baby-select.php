<?php session_start(); ?>
<?php include('../../php/basic/connection.php'); ?>

<?php  
    if(!isset($_SESSION['mother_id'])) {	
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
    <link rel="stylesheet" href="./css/baby-dashboard-style.css">
    <link rel="stylesheet" href="./css/baby-select-style.css">

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
                        <img src="./img/mother.png" width="50" class="rounded-circle">
                        <?php
                            mysqli_select_db($conn, 'cs2019g6');

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
                                    echo '<a href="../doctor/doc-dashboard.php" class="text-uppercase">';
                                    echo '<span class="icon">';
                                    echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                                    echo '</span>';
                                    echo '<span class="list">තොරතුරු පුවරුව</span>';
                                    echo '</a>';
                                }
                                if(isset($_SESSION['sister_id'])){
                                    echo '<a href="../sister/sis-dashboard.php" class="text-uppercase">';
                                    echo '<span class="icon">';
                                    echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                                    echo '</span>';
                                    echo '<span class="list">තොරතුරු පුවරුව</span>';
                                    echo '</a>';
                                }
                                if(isset($_SESSION['midwife_id'])){
                                    echo '<a href="../midwife/mid-dashboard.php" class="text-uppercase">';
                                    echo '<span class="icon">';
                                    echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                                    echo '</span>';
                                    echo '<span class="list">තොරතුරු පුවරුව</span>';
                                    echo '</a>';
                                }
                                if(isset($_SESSION['admin_id'])){
                                    echo '<a href="../admin-doctor/admin-doc-dashboard.php" class="text-uppercase">';
                                    echo '<span class="icon">';
                                    echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                                    echo '</span>';
                                    echo '<span class="list">තොරතුරු පුවරුව</span>';
                                    echo '</a>';
                                }

                            ?>
                        </li>
                        <li>
                            <a href="#" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-baby" aria-hidden="true"></i>
                                </span>
                                <span class="list">දරුවා තෝරන්න</span>
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
                            mysqli_select_db($conn, 'cs2019g6');    
                        
                            $mother_nic=$_SESSION['mother_id'];
                            $query1="SELECT * FROM baby_register WHERE mother_nic='{$mother_nic}'";
                            $result1=mysqli_query($conn, $query1);
                        
                            while ($row = mysqli_fetch_assoc($result1)) {
                                $baby_id = $row["baby_id"];
                                $gender = $row["baby_gender"];
                                $name = $row["baby_first_name"];
                                
                                if($gender=='M') {
                                    
                                

                        ?>
                            
                                    <div class="col-md-auto">
                                        <form action="./php/baby-select-action.php" method="POST">
                                            <button type="submit" class="btn" name="baby_id" value="<?php echo $baby_id;?>">
                                                <div class="card card-common">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <i class="fas fa-baby" style="color: #1565c0;"></i>
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
                                        <form action="./php/baby-select-action.php" method="POST">
                                            <button type="submit" class="btn" name="baby_id" value="<?php echo $baby_id;?>">
                                                <div class="card card-common">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <i class="fas fa-baby" style="color: #c2185b;"></i>
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