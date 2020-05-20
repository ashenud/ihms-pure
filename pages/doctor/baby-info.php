<?php session_start(); ?>
<?php include('../../php/basic/connection.php'); ?>

<?php if(!isset($_SESSION['doctor_id'])) {	
	header('location:../../index.php?noPermission=1');
	}
?>

<?php 

    $_SESSION['view_id']=$_POST['view-id'];
    $view_id=$_SESSION['view_id'];
    
    $query1="SELECT * FROM baby_register WHERE baby_id='$view_id'";
    $result1=mysqli_query($conn,$query1);
        
    $data1=mysqli_fetch_assoc($result1);
        
    $mother_name=$data1['mother_name'];
    $mother_id=$data1['mother_id'];
    $mother_age=$data1['mother_age'];
    $address=$data1['address'];
        
    $baby_first_name=$data1['baby_first_name'];
    $baby_last_name=$data1['baby_last_name'];
    $baby_id=$data1['baby_id'];
    $baby_dob=$data1['baby_dob'];
        
    $query2="SELECT * FROM birth_details WHERE baby_id='$view_id'";
    $result2=mysqli_query($conn,$query2);
        
    $data2=mysqli_fetch_assoc($result2);
        
    $birth_weight=$data2['birth_weight'];
    $birth_length=$data2['birth_length'];
    $health_states=$data2['health_states'];
    $circumference_of_head=$data2['circumference_of_head'];
    $vitamin_K_states=$data2['vitamin_K_states'];
    $eye_contact=$data2['eye_contact'];
    $milk_position=$data2['milk_position'];
    
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
    <link rel="stylesheet" href="./css/baby-info-style.css">

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
                        <img src="./img/doctor.png" width="50" class="rounded-circle">
                        <a href="#" class="text-uppercase"> <?php echo($_SESSION['doctor_id']); ?> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                       <li>
                            <a href="./doc-view-babies.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-search" aria-hidden="true"></i>
                                </span>
                                <span class="list">view babies</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-key" aria-hidden="true"></i>
                                </span>
                                <span class="list">Baby Info</span>
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
               
            <?php
            $query3="SELECT baby_gender FROM baby_register WHERE baby_id='$view_id'";
            $result3=mysqli_query($conn,$query3);
            $data3=mysqli_fetch_assoc($result3);
            $gender=$data3['baby_gender'];

            if($gender=='M') {
            ?>

                <div class="background-area pt-3 pb-4" style="background-image: linear-gradient(90deg, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0.1) 50%, rgba(0,0,0,0.15) 100%), url('./img/backgroud-boy.jpg');">
                    <div class="container mt-1">

                        <div class="card" style="background: rgba(227, 242, 253, 0.7);">
                            <div class="card-body">
                                <h3 class="card-title text-uppercase">baby details</h3>

                                <div class="container">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                                <div class="card-body">
                                                    <h5 class="card-title text-uppercase">Mother details</h5>
                                                    <div class="mother-details">

                                                        <table class="table" cellpadding="10">
                                                            <tr>
                                                                <th>Mother Name</th>
                                                                <td><?php echo $mother_name; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mother ID</th>
                                                                <td><?php echo $mother_id; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mother Age</th>
                                                                <td><?php echo $mother_age; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Address</th>
                                                                <td><?php echo $address; ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                                <div class="card-body">
                                                    <h5 class="card-title text-uppercase">Baby details</h5>
                                                    <div class="baby-details">

                                                        <table class="table">
                                                            <tr>
                                                                <th>First Name</th>
                                                                <td><?php echo $baby_first_name; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Last Name</th>
                                                                <td><?php echo $baby_last_name; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Baby ID</th>
                                                                <td><?php echo $baby_id; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Date of Birth</th>
                                                                <td><?php echo $baby_dob; ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                                <div class="card-body">
                                                    <h5 class="card-title text-uppercase">Birth details</h5>
                                                    <div class="birth-details">

                                                        <table class="table">
                                                            <tr>
                                                                <th>Birth Weigth</th>
                                                                <td><?php echo $birth_weight; ?>KG</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Birth Lenght</th>
                                                                <td><?php echo $birth_length; ?>CM</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Helth States</th>
                                                                <td><?php echo $health_states; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Circumference of Head</th>
                                                                <td><?php echo $circumference_of_head; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Vitamin K States</th>
                                                                <td><?php echo $vitamin_K_states; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Eye Contact</th>
                                                                <td><?php echo $eye_contact; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Milk Posisiton</th>
                                                                <td><?php echo $milk_position; ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-1"></div>
                                        <div class="col-md-2 icon-btn d-flex justify-content-center">
                                            <button type="submit" class="btn">
                                                <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                                    <div class="card-body">
                                                        <i class="fas fa-chart-bar"></i>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="col-md-2 icon-btn d-flex justify-content-center">
                                            <button type="submit" class="btn">
                                                <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                                    <div class="card-body">
                                                        <i class="fas fa-syringe"></i>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="col-md-1 justify-content-end mt-auto">
                                            <a href="../doctor/doc-view-babies.php">
                                                <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                                    <div class="card-body">
                                                        <i class="fas fa-list"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            <?php
            } 
            else {
            ?>    
 
                <div class="background-area pt-3 pb-4" style="background-image: linear-gradient(90deg, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0.1) 50%, rgba(0,0,0,0.15) 100%), url('./img/backgroud-girl.jpg');">
                    <div class="container pt-1">

                        <div class="card" style="background: rgba(248,187,208, 0.7);">
                            <div class="card-body">
                                <h3 class="card-title text-uppercase">baby details</h3>

                                <div class="container">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card" style="background: rgba(248,187,208, 0.1);">
                                                <div class="card-body">
                                                    <h5 class="card-title text-uppercase">Mother details</h5>
                                                    <div class="mother-details">

                                                        <table class="table" cellpadding="10">
                                                            <tr>
                                                                <th>Mother Name</th>
                                                                <td><?php echo $mother_name; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mother ID</th>
                                                                <td><?php echo $mother_id; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mother Age</th>
                                                                <td><?php echo $mother_age; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Address</th>
                                                                <td><?php echo $address; ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="card" style="background: rgba(248,187,208, 0.1);">
                                                <div class="card-body">
                                                    <h5 class="card-title text-uppercase">Baby details</h5>
                                                    <div class="baby-details">

                                                        <table class="table">
                                                            <tr>
                                                                <th>First Name</th>
                                                                <td><?php echo $baby_first_name; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Last Name</th>
                                                                <td><?php echo $baby_last_name; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Baby ID</th>
                                                                <td><?php echo $baby_id; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Date of Birth</th>
                                                                <td><?php echo $baby_dob; ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="card" style="background: rgba(248,187,208, 0.1);">
                                                <div class="card-body">
                                                    <h5 class="card-title text-uppercase">Birth details</h5>
                                                    <div class="birth-details">

                                                        <table class="table">
                                                            <tr>
                                                                <th>Birth Weigth</th>
                                                                <td><?php echo $birth_weight; ?>KG</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Birth Lenght</th>
                                                                <td><?php echo $birth_length; ?>CM</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Helth States</th>
                                                                <td><?php echo $health_states; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Circumference of Head</th>
                                                                <td><?php echo $circumference_of_head; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Vitamin K States</th>
                                                                <td><?php echo $vitamin_K_states; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Eye Contact</th>
                                                                <td><?php echo $eye_contact; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Milk Posisiton</th>
                                                                <td><?php echo $milk_position; ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-1"></div>
                                        <div class="col-md-2 icon-btn d-flex justify-content-center">
                                            <button type="submit" class="btn">
                                                <div class="card" style="background: rgba(248,187,208, 0.1);">
                                                    <div class="card-body">
                                                        <i class="fas fa-chart-bar"></i>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="col-md-2 icon-btn d-flex justify-content-center">
                                            <button type="submit" class="btn">
                                                <div class="card" style="background: rgba(248,187,208, 0.1);">
                                                    <div class="card-body">
                                                        <i class="fas fa-syringe"></i>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="col-md-1 justify-content-end mt-auto">
                                            <a href="../doctor/doc-view-babies.php">
                                                <div class="card" style="background: rgba(248,187,208, 0.1);">
                                                    <div class="card-body">
                                                        <i class="fas fa-list"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
    
            <?php   
            } 
            ?>


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
    <script type="text/javascript" src="./js/pwd-validation-script.js"> </script>
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