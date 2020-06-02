<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['doctor_id'])) {	
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
    
    <link rel="stylesheet" href="./css/doc-baby-editable-style.css">
    
    <style>
        .color-1{
            background-color: rgb(159, 159, 253);
        }
        .color-2{
            background-color: pink;
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
            <div class="sidebar-menu">
                <div class="inner-sidebar-menu">

                    <div class="user-area pb-2 mb-3">
                        <img src="./img/baby.png" class="rounded-circle">
                        <?php
                            $query00 = "SELECT * FROM baby_register WHERE baby_id='".$_SESSION['baby_id']."'";
                            $result00= mysqli_query($conn,$query00);
                            $row00=mysqli_fetch_assoc($result00);
                        ?>
                        <a href="#"> <span><?php echo $row00['baby_first_name']." ".$row00['baby_last_name'];?></span> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <?php
                                if(isset($_SESSION['doctor_id'])) {
                            ?>
                                    <a href="./doc-dashboard.php" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">තොරතුරු පුවරුව</span>
                                    </a>
                            <?php
                                }
                                else if(isset($_SESSION['sister_id'])) {
                            ?>
                                    <a href="../sister/sis-dashboard.php" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">තොරතුරු පුවරුව</span>
                                    </a>
                            <?php
                                }
                                else if(isset($_SESSION['midwife_id'])) {
                            ?>
                                    <a href="../midwife/mid-dashboard.php" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">තොරතුරු පුවරුව</span>
                                    </a>
                            <?php
                                }
                                else if(isset($_SESSION['admin_id'])) {
                            ?>
                                    <a href="../admin-doctor/admin-doc-dashboard.php" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">තොරතුරු පුවරුව</span>
                                    </a>
                            <?php
                                }
                            ?>
                        </li>
                        <li>
                            <a href="./doc-vac-permission.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-syringe" aria-hidden="true"></i>
                                </span>
                                <span class="list">එන්නත් කිරීම</span>
                            </a>

                        </li>
                        <li>
                            <a class="text-uppercase" data-toggle="collapse" href="#charts" id="baby-charts">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" aria-hidden="true"></i>
                                </span>
                                <span class="list">වර්ධන සටහන්</span>
                            </a>
                        </li>
                        <div class="collapse collapse-charts" id="charts">
                            <li>
                                <a href="../baby/baby-charts-weight.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">බර ප්‍රස්ථාරය</span>
                                </a>
                            </li>
                            <li>
                                <a href="../baby/baby-charts-height.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">උස ප්‍රස්ථාරය</span>
                                </a>
                            </li>
                            <li>
                                <a href="../baby/baby-charts-bmi.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">උසට සරිලන බර ප්‍රස්ථාරය</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="#" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-table" aria-hidden="true"></i>
                                </span>
                                <span class="list">දත්ත සංස්කරණය</span>
                            </a>
                        </li>
                        <li>
                            <a href="../baby/baby-select.php" class="text-uppercase">
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
              
                <!-- alert section -->
                <div class="alert-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <?php include('./inc/alert-vac-approvel-success.php'); ?>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                <!-- end of alert section -->
               
                <div class="container">
                    
                    <?php
                        $bId=$_SESSION['baby_id'];

                        $sql1="SELECT * FROM baby_register WHERE baby_id='".$bId."'";
                        $result1=mysqli_query($conn,$sql1);
                        $row1=mysqli_fetch_assoc($result1);
                        $gen=$row1['baby_gender'];
                    ?>

                    <div class="form-row d-flex justify-content-center">
                        <div class="form-group col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                            <div class="
                                <?php if($gen=="M"){
                                        echo "card color-1";}
                                        else{ echo "card color-2";
                                        }
                                    ?> ">
                                <div class="card-body">
                                    <lable style="color: rgb(0, 0, 0);font-size: 25px;">එන්නත් කිරීමේ විස්තර</lable>

                                    <div class="row">
                                        <div class="col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                            <div class="edit-vac">
                                                <h5>එන්නත් කිරීමේ දිනය වෙනස් කිරීම</h5>
                                                <form method="POST" action="">
                                                    <div class="form-row d-flex justify-content-center">
                                                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                            <label>එන්නත තෝරන්න</label>
                                                            <select class="form-control" name="vacName" id="vacName" required>
                                                                <option value="">------</option>
                                                                <option value="2">BCG-2</option>
                                                                <option value="3">Pentavalent-1</option>
                                                                <option value="4">OPV-1</option>
                                                                <option value="5">fIPV-1</option>
                                                                <option value="6">Pentavalent-2</option>
                                                                <option value="7">OPV-2</option>
                                                                <option value="8">fIPV-2</option>
                                                                <option value="9">Pentavalent-3</option>
                                                                <option value="10">OPV-3</option>
                                                                <option value="11">MMR-1</option>
                                                                <option value="12">Live JE</option>
                                                                <option value="13">DPT</option>
                                                                <option value="14">OPV-4</option>
                                                                <option value="15">MMR-2</option>
                                                                <option value="16">D.T</option>
                                                                <option value="17">OPV-5</option>
                                                                <?php 
                                                                if($gen=="M") {
                                                                ?>
                                                                <option value="20">aTd</option>
                                                                <?php
                                                                }
                                                                else {
                                                                ?>
                                                                <option value="18">HPV-1</option>
                                                                <option value="19">HPV-2</option>
                                                                <option value="20">aTd</option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-flex justify-content-center">
                                                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                            <label>නව දිනයක් තෝරන්න</label>
                                                            <input type="date" class="form-control" name="vacDate" required>
                                                            <input type="hidden" name="baby_id" value="<?php echo $_SESSION['baby_id']?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-flex justify-content-around">
                                                        <div class="form-group col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                            <input type="submit" name="UpdateVacDate" class="btn btn-outline-dark btn-md" value="වෙනස් කරන්න">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                            <div class="edit-vac">
                                                <h5>එන්නත් කිරීමෙන් පසු අතුරු අබාධ ඇත්නම්</h5>
                                                <form method="POST" action="./php/baby-editable-action.php">
                                                    <div class="form-row d-flex justify-content-center">
                                                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                            <label>එන්නත තෝරන්න</label>
                                                            <select class="form-control" name="vaccine" id="vaccine" required>
                                                                <option value="">------</option>
                                                                <option value="1">BCG-1</option>
                                                                <option value="2">BCG-2</option>
                                                                <option value="3">Pentavalent-1</option>
                                                                <option value="4">OPV-1</option>
                                                                <option value="5">fIPV-1</option>
                                                                <option value="6">Pentavalent-2</option>
                                                                <option value="7">OPV-2</option>
                                                                <option value="8">fIPV-2</option>
                                                                <option value="9">Pentavalent-3</option>
                                                                <option value="10">OPV-3</option>
                                                                <option value="11">MMR-1</option>
                                                                <option value="12">Live JE</option>
                                                                <option value="13">DPT</option>
                                                                <option value="14">OPV-4</option>
                                                                <option value="15">MMR-2</option>
                                                                <option value="16">D.T</option>
                                                                <option value="17">OPV-5</option>
                                                                <?php 
                                                                if($gen=="M") {
                                                                ?>
                                                                <option value="20">aTd</option>
                                                                <?php
                                                                }
                                                                else {
                                                                ?>
                                                                <option value="18">HPV-1</option>
                                                                <option value="19">HPV-2</option>
                                                                <option value="20">aTd</option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-flex justify-content-center">
                                                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                            <label>සටහනක් තබන්න</label>
                                                            <textarea class="form-control" name="vacSideEffNote" required></textarea>
                                                            <input type="hidden" name="baby_id" value="<?php echo $_SESSION['baby_id']?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-flex justify-content-around">
                                                        <div class="form-group col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                            <input type="submit" name="VacSideEff" class="btn btn-outline-dark btn-md" value="සටහන තබන්න">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                            <div class="other-vac">
                                                <h5>වෙනත් එන්නත් ලබා දුන්නේ නම්</h5>
                                                <form method="POST" action="./php/baby-editable-action.php">
                                                    <div class="form-row d-flex justify-content-center">
                                                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                            <label>එන්නතේ නම</label>
                                                            <input type="text" class="form-control" name="vac_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-flex justify-content-center">
                                                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                            <label>කාණ්ඩ අංකය</label>
                                                            <input type="text" class="form-control" name="batch_no" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-flex justify-content-center">
                                                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                            <label>ලබා දුන් දිනය</label>
                                                            <input type="date" class="form-control" name="date_given" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-flex justify-content-around">
                                                        <div class="form-group col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                            <input type="hidden" name="baby_id" value="<?php echo $_SESSION['baby_id']?>">
                                                            <input type="submit" name="otherVacc" class="btn btn-outline-dark btn-md" value="සටහන් කරන්න">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                            <div class="bcg-scar">
                                                <h5>බී.සී.ජී. කැළැල ඇත්නම්(පමණක්)</h5>
                                                <form method="POST" action="./php/baby-editable-action.php">
                                                    <div class="form-row d-flex justify-content-center">
                                                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                            <input class="form-check-input" type="checkbox" value="1" name="scar" id="scar" required>
                                                            <label class="form-check-label" for="scar">
                                                                කැළැල ඇත
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-flex justify-content-around">
                                                        <div class="form-group col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                            <input type="hidden" name="baby_id" value="<?php echo $_SESSION['baby_id']?>">
                                                            <input type="submit" name="bcgScar" class="btn btn-outline-dark btn-md" value="ලකුණු කරන්න">
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
                    
                </div><!--end container-fluid-->



            </div>
            <!-- end of content -->

        </div>
        <!-- end of main body (sidebar and content) -->

    </div>
        <!--end wrapper-->


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
            
            $(".mob-hamburger").click(function() {
                $(".wrapper").toggleClass("mob-active");
            });
        });
    </script>
    
    <!-- Alert Dismiss scripts -->
    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideToggle(500, function(){
            $(this).remove();
        });
    }, 3500);
    </script>
    <!-- end of Alert Dismiss scripts -->
    



</body>

</html>


<?php mysqli_close($conn); ?>