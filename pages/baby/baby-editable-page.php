<?php
    session_start();
    if(isset($_SESSION['serch_baby_using_nic'])){}
    else{	
    header('/?noPermission=1');
    }
    include "php/conn.php";
    include "php/selectdb.php";
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
    
    <link rel="stylesheet" href="/pages/baby/css/baby-editable-style.css">

    
    <title>Infant Health Management System</title>
    
    <style>
        .color-1{
            background-color: rgb(159, 159, 253);
        }
        .color-2{
            background-color: pink;
        }
    </style>
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

                <!-- alert section -->
                <div class="alert-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <?php include('./inc/alert-baby-editable.php'); ?>
                            </div>
                            <div class="col-lg-4"></div>
                        </div>
                    </div>
                </div>
                <!-- end of alert section -->


                <div class="container">
                    
                        <?php
                        extract($_POST);
                        $bId=$_SESSION['baby_id'];

                        $sql1="SELECT * FROM baby_register WHERE baby_id='".$bId."'";
                        $result1=mysqli_query($conn,$sql1);
                        $row1=mysqli_fetch_assoc($result1);

                        $sql2="SELECT * FROM mother WHERE mother_nic='".$row1['mother_nic']."'";
                        $result2=mysqli_query($conn,$sql2);
                        $row2=mysqli_fetch_assoc($result2);

                        $sql3="SELECT * FROM birth_details WHERE baby_id='".$bId."'";
                        $result3=mysqli_query($conn,$sql3);
                        $row3=mysqli_fetch_assoc($result3);

                       $gen=$row1['baby_gender'];
                    ?>
                    <!--------------------------------------------------------------------------------------->

                        <div class="form-row d-flex justify-content-center">
                            <div class="form-group col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <div class="  
                                    <?php if($gen=="M"){
                                        echo "card color-1";}
                                        else{ echo "card color-2";
                                        }
                                    ?> ">
                                    <div class="card-body">
                                    <lable style="color: rgb(0, 0, 0);font-size: 25px;">Height & Weight </lable>
                                    
                                    <form method="POST">
                                        <div class="form-row d-flex justify-content-center">
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                    <label><b>Weight</b>(kg)</label>
                                                    <input type="number" min="0" class="form-control" name="bWeight" placeholder="in (kg)" required>
                                            </div>
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                    <label><b>Height</b>(cm)</label>
                                                    <input type="number" min="0" class="form-control" name="bHeight" placeholder="in (cm)" required>
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-center">
                                            <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                <label><b>Age</b>(months)</label>
                                                <?php
                                                    $query01="SELECT MAX(baby_age_in_months) FROM growth WHERE baby_id='".$_SESSION['baby_id']."'";
                                                    $result01=mysqli_query($conn,$query01) ;
                                                    $row01 = mysqli_fetch_assoc($result01) ;
                                                ?>
                                                <input type="number" min="<?php echo $row01["MAX(baby_age_in_months)"]+1; ?>" class="form-control" name="bAge" placeholder="<?php echo $row01["MAX(baby_age_in_months)"]+1; ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-row d-flex justify-content-around">
                                            <div class="form-group col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <input type="submit" name="UpdateWeightHeight" class="btn btn-outline-dark btn-md" value="Update Data">
                                            </div>
                                        </div>  

                                    </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    <!--------------------------------------------------------------------------------------->
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
                                                    <form method="POST" action="/pages/baby/php/baby-editable-action.php">
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
                                                                <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" name="vacDate" required>
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
                                                    <form method="POST" action="/pages/baby/php/baby-editable-action.php">
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
                                                    <form method="POST" action="/pages/baby/php/baby-editable-action.php">
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
                                                                <input type="date" max="<?php echo date('Y-m-d'); ?>" class="form-control" name="date_given" required>
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
                                                    <form method="POST" action="/pages/baby/php/baby-editable-action.php">                                                    
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
                        
                        
                    <!--------------------------------------------------------------------------------------->
                    <div class="form-row d-flex justify-content-center">
                        <div class="form-group col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                            <div class="  
                                <?php if($gen=="M"){
                                    echo "card color-1";}
                                    else{ echo "card color-2";
                                    }
                                ?> ">
                                <div class="card-body">
                                <lable style="color: rgb(0, 0, 0);font-size: 25px;">Thriposha </lable>
                                
                                <form method="POST">
                                    <div class="form-row d-flex justify-content-center">
                                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                <label><b>Quantity</b></label>
                                                <input type="text" class="form-control" name="tQty" placeholder="Packets">
                                        </div>
                                    </div>
                                    <div class="form-row d-flex justify-content-center">
                                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                            <label><b>Date</b></label>
                                            <input type="date" class="form-control" name="tDate" value="<?php echo date("Y-m-d");?>">
                                        </div>
                                    </div>

                                    <div class="form-row d-flex justify-content-around">
                                        <div class="form-group col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                <input type="submit" name="UpdateThriposha" class="btn btn-outline-dark btn-md" value="Update Data">
                                                <input type="button" class="btn btn-outline-dark btn-md" value="History" data-toggle="modal" data-target="#Thriposha">
                                        </div>
                                    </div>  

                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!----------------------------------------modal----------------------------------------------->
                    <div class="modal fade" id="Thriposha" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">History</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div style="overflow-y: auto; height: 200px;">
                                <table class="table">
                                    <tr>
                                        <th>Received Date</th>
                                        <th>Quantity</th>
                                    </tr>
                                   
                                            <?php
                                             
                                            $sql001="SELECT date_given,quantity FROM thriposha_distribution WHERE baby_id='".$bId."'";
                                            $run=mysqli_query($conn,$sql001);
                                            while($newRow=mysqli_fetch_assoc($run)){
                                                echo '<tr>';
                                                echo '<td>'.$newRow['date_given'].'</td>';
                                                echo '<td>'.$newRow['quantity'].'</td>';
                                                echo '</tr>';
                                            }

                                            ?>
                                    
                                </table>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </div>

                    <!--------------------------------------------------------------------------------------->
                        <div class="form-row d-flex justify-content-center">
                            <div class="form-group col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <div class="
                                    <?php if($gen=="M"){
                                        echo "card color-1";}
                                        else{ echo "card color-2";
                                        }
                                    ?> ">
                                
                                    <div class="card-body">
                                    <lable style="color: rgb(0, 0, 0);font-size: 25px;">Baby's Info</lable>
                                   
                                    <form method="POST">
                                        <div class="form-row d-flex justify-content-center">
                                            <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                    <label><b>Baby Id</b></label>
                                                    <input type="text" class="form-control" name="bId" value="<?php echo $row1['baby_id'];?>" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row d-flex justify-content-center">
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                    <label><b>First Name</b></label>
                                                    <input type="text" class="form-control" name="bFn" value="<?php echo $row1['baby_first_name'];?>">
                                            </div>
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                    <label><b>Last Name</b></label>
                                                    <input type="text" class="form-control" name="bLn" value="<?php echo $row1['baby_last_name'];?>">
                                            </div>
                                        </div>

                                        <div class="form-row d-flex justify-content-center">
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">    
                                                    <label><b>Date of Birth</b></label>
                                                    <input type="text" class="form-control" name="bDob" value="<?php echo $row1['baby_dob'];?>">
                                            </div>
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                <label><b>Gender</b></label>
                                                <input type="text" class="form-control" name="bGen" value="<?php echo $row1['baby_gender'];?>">
                                            </div>
                                        </div>

                                        <div class="form-row d-flex justify-content-center">
                                            <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                    <label><b>Mother Age</b></label>
                                                    <input type="text" class="form-control" name="mAge" value="<?php echo $row1['mother_age'];?>">
                                            </div>
                                        </div>

                                        <div class="form-row d-flex justify-content-around">
                                            <div class="form-group col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <input type="submit" name="UpdateBaby" class="btn btn-outline-dark btn-md" value="Update Data">
                                            </div>
                                        </div>   
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
 
                    <!--------------------------------------------------------------------------------------->
                        <div class="form-row d-flex justify-content-center">
                            <div class="form-group col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <div class="
                                    <?php if($gen=="M"){
                                        echo "card color-1";}
                                        else{ echo "card color-2";
                                        }
                                    ?> ">
                                
                                    <div class="card-body">
                                    <lable style="color: rgb(0, 0, 0);font-size: 25px;">Mother's Info</lable>
                            
                                    <form method="POST">
                                        <div class="form-row d-flex justify-content-center">
                                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                <label><b>Mother NIC</b></label>
                                                <input type="text" class="form-control" name="nic" value="<?php echo $row2['mother_nic'];?>" readonly>
                                        </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-center">
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                    <label><b>Mother Name</b></label>
                                                    <input type="text" class="form-control" name="mName" value="<?php echo $row2['mother_name'];?>">
                                            </div>
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                <label><b>Telephone</b></label>
                                                <input type="text" class="form-control" name="mTel" value="<?php echo $row2['telephone'];?>">
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-center">
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                <label><b>Mother Address</b></label>
                                                <input type="text" class="form-control" name="mAddr" value="<?php echo $row2['address'];?>">
                                            </div>
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                <label><b>Email</b></label>
                                                <input type="text" class="form-control" name="mEmail" value="<?php echo $row2['email'];?>">
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-around">
                                            <div class="form-group col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <input type="submit" name="UpdateMother" class="btn btn-outline-dark btn-md" value="Update Data">
                                            </div>
                                        </div>   
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--------------------------------------------------------------------------------------->
                        <div class="form-row d-flex justify-content-center">
                            <div class="form-group col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <div class="
                                <?php if($gen=="M"){
                                        echo "card color-1";}
                                        else{ echo "card color-2";
                                        }
                                    ?> ">
                                    <div class="card-body">
                                    <lable style="color: rgb(0, 0, 0);font-size: 25px;">Baby's Birth Details</lable>
                            
                                    <form method="POST">
                                        <div class="form-row d-flex justify-content-center">
                                        <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                <label><b>Birth Weight</b>(Kg)</label>
                                                <input type="text" class="form-control" name="bWeight" value="<?php echo $row3['birth_weight'];?>">
                                        </div>
                                        <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                    <label><b>Birth Length</b>(cm)</label>
                                                    <input type="text" class="form-control" name="bLength" value="<?php echo $row3['birth_length'];?>">
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-center">
                                            <div class="form-group col-10 col-sm-10 col-md-2 col-lg-2 col-xl-2">
                                                    <label><b>Apgar 1</b></label>
                                                    <input type="text" class="form-control" name="bAp1" value="<?php echo $row3['apgar1'];?>">
                                            </div>
                                            <div class="form-group col-10 col-sm-10 col-md-2 col-lg-2 col-xl-2">
                                                <label><b>Apgar 2</b></label>
                                                <input type="text" class="form-control" name="bAp2" value="<?php echo $row3['apgar2'];?>">
                                            </div>
                                            <div class="form-group col-10 col-sm-10 col-md-2 col-lg-2 col-xl-2">
                                                <label><b>Apgar 3</b></label>
                                                <input type="text" class="form-control" name="bAp3" value="<?php echo $row3['apgar3'];?>">
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-center">
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                    <label><b>Head circumference</b>(cm)</label>
                                                    <input type="text" class="form-control" name="bHead" value="<?php echo $row3['circumference_of_head'];?>">
                                            </div>
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                <label><b>Vitamin K</b>(status)</label>
                                                <input type="text" class="form-control" name="bK" value="<?php echo $row3['vitamin_K_status'];?>">
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-center">
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                    <label><b>Eye Contact</b></label>
                                                    <input type="text" class="form-control" name="bEye" value="<?php echo $row3['eye_contact'];?>">
                                            </div>
                                            <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                <label><b>Milk Position</b></label>
                                                <input type="text" class="form-control" name="bMilk" value="<?php echo $row3['milk_position'];?>">
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-around">
                                            <div class="form-group col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <input type="submit" name="UpdateBirth" class="btn btn-outline-dark btn-md" value="Update Data">
                                            </div>
                                        </div>   
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--------------------------------------------------------------------------------------->
                        <div class="form-row d-flex justify-content-center">
                            <div class="form-group col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <div class="
                                <?php if($gen=="M"){
                                        echo "card color-1";}
                                        else{ echo "card color-2";
                                        }
                                    ?> ">
                                    <div class="card-body">
                                    <lable style="color: rgb(0, 0, 0);font-size: 25px;">Details recorded in home visits</lable>
                            
                                    <div class="registration">
                                        <form name="my-form" action="./php/add-home-visit-action.php" method="POST" onsubmit="return validation()">

                                            <div class="container mt-4">

                                                <div class="form-group row">
                                                    <label for="mother_id" class="col-md-4 col-form-label text-md-right">Baby ID</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="mNic" class="form-control" name="mNic">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="midwife_id" class="col-md-4 col-form-label text-md-right">Midwife ID</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="midwife_id" class="form-control" name="midwife_id">
                                                    </div>
                                                </div>

                                                <!-- Day 01 -->
                                                <h5 class="card-title text-uppercase">Day 01</h5>

                                                <div class="form-group row">
                                                    <label for="month" class="col-md-4 col-form-label text-md-right">Date</label>
                                                    <div class="col-md-6">
                                                        <input type="date" id="date" class="form-control" name="date">
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group row">
                                                    <label for="skin_colour" class="col-md-4 col-form-label text-md-right">Skin Colour</label>
                                                    <div class="col-md-6">
                                                       <select id="scolour" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Pale Yellow">Pale Yellow</option>
                                                        <option value="Yellow">Yellow</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="scolour"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="height" class="col-md-4 col-form-label text-md-right">Eyes</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">Weak</option>
                                                        <option value="Yellow">Yellow</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Nature of the umbilicus</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">Weak</option>
                                                        <option value="Yellow">Yellow</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Temperature</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">High</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Giving only mother's milk</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">High</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Colour of faeces matter</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">High</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="Other allergies" class="col-md-4 col-form-label text-md-right">Other allergies</label>
                                                    <div class="col-md-6">
                                                    <select id="allergies" class="form-control">
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="allergies"> 
                                                    </div>
                                                </div>

                                                <!-- Day 02 -->
                                                <h5 class="card-title text-uppercase">Day 02</h5>

                                                <div class="form-group row" class="form-control">
                                                    <label for="month" class="col-md-4 col-form-label text-md-right">Date</label>
                                                    <div class="col-md-6">
                                                        <input type="date" id="date" class="form-control" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="skin_colour" class="col-md-4 col-form-label text-md-right">Skin Colour</label>
                                                    <div class="col-md-6">
                                                       <select id="scolour" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Pale Yellow">Pale Yellow</option>
                                                        <option value="Yellow">Yellow</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="scolour"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="height" class="col-md-4 col-form-label text-md-right">Eyes</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">Weak</option>
                                                        <option value="Yellow">Yellow</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Nature of the umbilicus</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">Weak</option>
                                                        <option value="Yellow">Yellow</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Temperature</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">High</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Giving only mother's milk</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">High</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Colour of faeces matter</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">High</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="Other allergies" class="col-md-4 col-form-label text-md-right">Other allergies</label>
                                                    <div class="col-md-6">
                                                    <select id="allergies" class="form-control">
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="allergies"> 
                                                    </div>
                                                </div>

                                                <!-- Day 03 -->
                                                <h5 class="card-title text-uppercase">Day 03</h5>

                                                <div class="form-group row">
                                                    <label for="month" class="col-md-4 col-form-label text-md-right">Date</label>
                                                    <div class="col-md-6">
                                                        <input type="date" id="date" class="form-control" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="skin_colour" class="col-md-4 col-form-label text-md-right">Skin Colour</label>
                                                    <div class="col-md-6">
                                                       <select id="scolour" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Pale Yellow">Pale Yellow</option>
                                                        <option value="Yellow">Yellow</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="scolour"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="height" class="col-md-4 col-form-label text-md-right">Eyes</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">Weak</option>
                                                        <option value="Yellow">Yellow</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Nature of the umbilicus</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">Weak</option>
                                                        <option value="Yellow">Yellow</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Temperature</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">High</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Giving only mother's milk</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">High</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Colour of faeces matter</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">High</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="Other allergies" class="col-md-4 col-form-label text-md-right">Other allergies</label>
                                                    <div class="col-md-6">
                                                    <select id="allergies" class="form-control">
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="allergies"> 
                                                    </div>
                                                </div>

                                                <!-- Day 04 -->
                                                <h5 class="card-title text-uppercase">Day 04</h5>

                                                <div class="form-group row">
                                                    <label for="month" class="col-md-4 col-form-label text-md-right">Date</label>
                                                    <div class="col-md-6">
                                                        <input type="date" id="date" class="form-control" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="skin_colour" class="col-md-4 col-form-label text-md-right">Skin Colour</label>
                                                    <div class="col-md-6">
                                                       <select id="scolour" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Pale Yellow">Pale Yellow</option>
                                                        <option value="Yellow">Yellow</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="scolour"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="height" class="col-md-4 col-form-label text-md-right">Eyes</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">Weak</option>
                                                        <option value="Yellow">Yellow</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Nature of the umbilicus</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">Weak</option>
                                                        <option value="Yellow">Yellow</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Temperature</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">High</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Giving only mother's milk</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">High</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="day4" class="col-md-4 col-form-label text-md-right">Colour of faeces matter</label>
                                                    <div class="col-md-6">
                                                    <select id="eyes" class="form-control">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Weak">High</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="eyes"> 
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="Other allergies" class="col-md-4 col-form-label text-md-right">Other allergies</label>
                                                    <div class="col-md-6">
                                                    <select id="allergies" class="form-control">
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="Yellow">Low</option>
                                                        <option value="d">dd</option>
                                                        </select>
                                                    <class="form-control" name="allergies"> 
                                                    </div>
                                                </div>

                                                <div class="col-md-4 offset-md-8">
                                                    <button type="submit" class="btn btn-primary" name="submit">
                                                        Enter
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    

                    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ Form Action @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
                     
                    <?php
                        if(isset($_POST['UpdateBaby'])){
                            extract($_POST);

                            $sql01="UPDATE baby_register SET baby_first_name='".$bFn."',baby_last_name='".$bLn."',baby_dob='".$bDob."',baby_gender='".$bGen."',mother_age='".$mAge."' WHERE baby_id='".$bId."'";
                            if(mysqli_query($conn,$sql01)){
                            echo '<meta http-equiv="refresh" content="0;URL =/baby/editable-page?success=1">';
                            }
                            else {
                                echo '<meta http-equiv="refresh" content="0;URL =/baby/editable-page?error=1">';
                            }
                        }
                        
                        if(isset($_POST['UpdateMother'])){
                            extract($_POST);

                            $sql02="UPDATE mother SET mother_name='".$mName."',telephone='".$mTel."',address='".$mAddr."',email='".$mEmail."' WHERE mother_nic='".$row2['mother_nic']."'";
                            mysqli_query($conn,$sql02);
                            $sql03="UPDATE user SET email='".$mEmail."' WHERE user_id='".$row2['mother_nic']."'";
                            if(mysqli_query($conn,$sql03)){
                                echo '<meta http-equiv="refresh" content="0;URL =/baby/editable-page?success=1">';
                            }
                            else {
                                echo '<meta http-equiv="refresh" content="0;URL =/baby/editable-page?error=1">';
                            }
                        }

                        if(isset($_POST['UpdateBirth'])){
                            extract($_POST);

                            $sql04="UPDATE birth_details SET birth_weight='".$bWeight."',birth_length='".$bLength."',apgar1='".$bAp1."',apgar2='".$bAp2."',apgar3='".$bAp3."',circumference_of_head='".$bHead."',vitamin_K_status='".$bK."',eye_contact='".$bEye."',milk_position='".$bMilk."' WHERE baby_id='".$bId."'";
                            if(mysqli_query($conn,$sql04)){
                                echo '<meta http-equiv="refresh" content="0;URL =/baby/editable-page?success=1">';
                            }
                            else {
                                echo '<meta http-equiv="refresh" content="0;URL =/baby/editable-page?error=1">';
                            }
                        }

                        if(isset($_POST['UpdateWeightHeight'])){
                            extract($_POST);
                            $mId=$_SESSION['midwife_id'];

                            $sql05="SELECT * FROM growth WHERE baby_id='".$bId."' AND baby_age_in_months='".$bAge."'";
                            $takeIt=mysqli_query($conn,$sql05);
                            $check4=mysqli_num_rows($takeIt);

                            if($check4>0){
                                $sql06="UPDATE growth SET weight='".$bWeight."',height='".$bHeight."',baby_age_in_months='".$bAge."' WHERE baby_id='".$bId."' AND baby_age_in_months='".$bAge."'";
                                if(mysqli_query($conn,$sql06)){
                                    echo '<meta http-equiv="refresh" content="0;URL =/baby/editable-page?success=1">';
                                }
                                else {
                                    echo '<meta http-equiv="refresh" content="0;URL =/baby/editable-page?error=1">';
                                }
                            }
                            else{
                                $sql07="INSERT INTO growth(baby_id,midwife_id,weight,height,baby_age_in_months) VALUES('$bId','$mId','$bWeight','$bHeight','$bAge')";
                                if(mysqli_query($conn,$sql07)){
                                    echo '<meta http-equiv="refresh" content="0;URL =/baby/editable-page?success=1">';
                                }
                                else {
                                    echo '<meta http-equiv="refresh" content="0;URL =/baby/editable-page?error=1">';
                                }
                            }
                        }

                        if(isset($_POST['UpdateThriposha'])){
                            extract($_POST);
                            $mId=$_SESSION['midwife_id'];

                            $sql08="SELECT * FROM thriposha_distribution WHERE baby_id='".$bId."' AND date_given='".$tDate."'";
                            $takeIt2=mysqli_query($conn,$sql08);
                            $check5=mysqli_num_rows($takeIt2);

                                                        

                            if($check5>0){
                            $sql09="UPDATE thriposha_distribution SET quantity='".$tQty."' WHERE baby_id='".$bId."' AND date_given='".$tDate."'";
                            mysqli_query($conn,$sql09);

                            $currentMonth=date("Y-m");
                            $sql11="SELECT SUM(quantity) AS qty FROM thriposha_distribution WHERE midwife_id='".$mId."' AND date_given LIKE '%$currentMonth%'";
                            $takeIt3=mysqli_query($conn,$sql11);
                            $row4=mysqli_fetch_assoc($takeIt3);
                            $num=$row4['qty'];

                            $sql12="UPDATE thriposha_storage SET distributed_qty='".$num."' WHERE midwife_id='".$mId."' AND updated_date LIKE '%$currentMonth%'";
                            if(mysqli_query($conn,$sql12)){
                            echo '<meta http-equiv="refresh" content="0;URL =/baby/editable-page?success=1">';
                            }
                            else {
                                echo '<meta http-equiv="refresh" content="0; URL=/baby/editable-page?error=1">';
                            }
                            }
                            else{
                            $currentMonth=date("Y-m");
                            $sql11="SELECT SUM(quantity) AS qty FROM thriposha_distribution WHERE midwife_id='".$mId."' AND date_given LIKE '%$currentMonth%'";
                            $takeIt3=mysqli_query($conn,$sql11);
                            $row4=mysqli_fetch_assoc($takeIt3);
                            $num=$row4['qty'];
                            
                            $sql10="INSERT INTO thriposha_distribution(baby_id,midwife_id,date_given,quantity) VALUES('$bId','$mId','$tDate','$tQty')";
                            mysqli_query($conn,$sql10);
                            $sql12="UPDATE thriposha_storage SET distributed_qty='".$num."' WHERE midwife_id='".$mId."' AND updated_date LIKE '%$currentMonth%'";
                            if(mysqli_query($conn,$sql12)){
                            echo '<meta http-equiv="refresh" content="0; URL=/baby/editable-page?success=1">';
                            }
                            else {
                                echo '<meta http-equiv="refresh" content="0; URL=/baby/editable-page?error=1">';
                            }
                            }
                        }
                    ?>
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
            $('.inner-sidebar-menu ul li a.b-edit').addClass('active');
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