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
    
    <link rel="stylesheet" href="/pages/doctor/css/doc-baby-data-style.css">
    
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
                        <img src="/pages/doctor/img/baby.png" class="rounded-circle">
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
                                    <a href="/doctor/dashboard" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">????????????????????? ??????????????????</span>
                                    </a>
                            <?php
                                }
                                else if(isset($_SESSION['sister_id'])) {
                            ?>
                                    <a href="/sister/dashboard" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">????????????????????? ??????????????????</span>
                                    </a>
                            <?php
                                }
                                else if(isset($_SESSION['midwife_id'])) {
                            ?>
                                    <a href="/midwife/dashboard" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">????????????????????? ??????????????????</span>
                                    </a>
                            <?php
                                }
                                else if(isset($_SESSION['admin_id'])) {
                            ?>
                                    <a href="/admin/dashboard" class="text-uppercase">
                                    <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">????????????????????? ??????????????????</span>
                                    </a>
                            <?php
                                }
                            ?>
                        </li>
                        <li>
                            <a href="/doctor/vac-permission" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-syringe" aria-hidden="true"></i>
                                </span>
                                <span class="list">?????????????????? ???????????????</span>
                            </a>

                        </li>
                        <li>
                            <a class="text-uppercase" data-toggle="collapse" href="#charts" id="baby-charts">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" aria-hidden="true"></i>
                                </span>
                                <span class="list">??????????????? ???????????????</span>
                            </a>
                        </li>
                        <div class="collapse collapse-charts" id="charts">
                            <li>
                                <a href="/baby/baby-charts-weight" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">?????? ??????????????????????????????</span>
                                </a>
                            </li>
                            <li>
                                <a href="/baby/baby-charts-height" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">?????? ??????????????????????????????</span>
                                </a>
                            </li>
                            <li>
                                <a href="/baby/baby-charts-bmi" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">????????? ??????????????? ?????? ??????????????????????????????</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="/doctor/baby-data-page" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-file-medical-alt" aria-hidden="true"></i>
                                </span>
                                <span class="list">????????? ?????????????????? ????????????</span>
                            </a>
                        </li>
                        <li>
                            <a href="/baby/select" class="text-uppercase">
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
                    
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <div class="card card-data">
                                <div class="card-header">
                                    <h3>????????? ?????????????????? ????????????</h3>
                                </div>
                                <div class="card-body">
                                    <div class="data_table">
                                       
                                    <?php
                                    
                                    for ($i = 1; $i <= 9; $i++) {
                                        $query[$i]="SELECT * FROM child_health_note WHERE baby_id='".$_SESSION['baby_id']."' AND baby_age_group_id=$i";
                                        $result[$i]= mysqli_query($conn,$query[$i]);
                                        $row[$i]=mysqli_fetch_assoc($result[$i]);
                                    }
                                        
                                    ?>
                                       
                                        <table class="table table-responsive-xl">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">????????????????????? ?????????</th>
                                                    <th scope="col">????????? 1</th>
                                                    <th scope="col">????????? 2</th>
                                                    <th scope="col">????????? 4</th>
                                                    <th scope="col">????????? 6</th>
                                                    <th scope="col">????????? 9</th>
                                                    <th scope="col">????????? 12</th>
                                                    <th scope="col">????????? 18</th>
                                                    <th scope="col">?????????. 3</th>
                                                    <th scope="col">?????????. 5</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">?????????????????? ?????????????????? ????????????</th>
                                        <?php
                                        for ($a = 1; $a <= 9; $a++) {
                                            if(isset($row[$a]['clinic_date'])) {
                                              $clinic_date=$row[$a]['clinic_date'];
                                              $date=date_create("$clinic_date");
                                              echo "<td class='date-data'>".date_format($date,'Y F j')."</td>";
                                            }
                                        }
                                        ?>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">????????? ????????????????????????</th>
                                        <?php
                                        for ($b = 1; $b <= 9; $b++) {
                                            if(isset($row[$b]['eye_size'])) {
                                              echo "<td>".$row[$b]['eye_size']."</td>";
                                            }
                                        }
                                        ?>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">????????? ????????????</th>
                                        <?php
                                        for ($b = 1; $b <= 9; $b++) {
                                            if(isset($row[$b]['squint'])) {
                                              echo "<td>".$row[$b]['squint']."</td>";
                                            }
                                        }
                                        ?>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">???????????????????????? ???????????? ?????????</th>
                                        <?php
                                        for ($b = 1; $b <= 9; $b++) {
                                            if(isset($row[$b]['retina'])) {
                                              echo "<td>".$row[$b]['retina']."</td>";
                                            }
                                        }
                                        ?>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">?????????????????? ???????????? ?????????</th>
                                        <?php
                                        for ($b = 1; $b <= 9; $b++) {
                                            if(isset($row[$b]['cornea'])) {
                                              echo "<td>".$row[$b]['cornea']."</td>";
                                            }
                                        }
                                        ?>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">????????? ????????????</th>
                                        <?php
                                        for ($b = 1; $b <= 9; $b++) {
                                            if(isset($row[$b]['eye_movement'])) {
                                              echo "<td>".$row[$b]['eye_movement']."</td>";
                                            }
                                        }
                                        ?>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">????????????</th>
                                        <?php
                                        for ($b = 1; $b <= 9; $b++) {
                                            if(isset($row[$b]['hearing'])) {
                                              echo "<td>".$row[$b]['hearing']."</td>";
                                            }
                                        }
                                        ?>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">?????? ???????????????</th>
                                        <?php
                                        for ($b = 1; $b <= 9; $b++) {
                                            if(isset($row[$b]['weight'])) {
                                              echo "<td>".$row[$b]['weight']."</td>";
                                            }
                                        }
                                        ?>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">?????? ???????????????</th>
                                        <?php
                                        for ($b = 1; $b <= 9; $b++) {
                                            if(isset($row[$b]['height'])) {
                                              echo "<td>".$row[$b]['height']."</td>";
                                            }
                                        }
                                        ?>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">????????????????????????</th>
                                        <?php
                                        for ($b = 1; $b <= 9; $b++) {
                                            if(isset($row[$b]['development'])) {
                                              echo "<td>".$row[$b]['development']."</td>";
                                            }
                                        }
                                        ?>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">???????????? ?????????</th>
                                        <?php
                                        for ($b = 1; $b <= 9; $b++) {
                                            if(isset($row[$b]['heart'])) {
                                              echo "<td>".$row[$b]['heart']."</td>";
                                            }
                                        }
                                        ?>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">??????????????? ??????????????????</th>
                                        <?php
                                        for ($b = 1; $b <= 9; $b++) {
                                            if(isset($row[$b]['hip'])) {
                                              echo "<td>".$row[$b]['hip']."</td>";
                                            }
                                        }
                                        ?>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="card card-note">
                                <div class="card-body">
                                    <h2 class="card-title">??????????????????</h2>
                                    <p>?????????????????? ?????? = N | ????????? ?????? = OW | ?????????????????? ???????????? = O | ??????????????? == X | ??????????????? ??????????????? = XX</p>
                                    <p>?????????????????? ?????? = NH | ???????????????????????? ???????????? ?????? == S | ??????????????? ???????????? = SS</p>
                                    <p>????????? ?????????????????? ????????????????????? ???????????? ???????????? ?????????????????? X ??????????????? ????????????????????? O ??????????????? ???????????? ??????</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
            <?php 

            $query001="SELECT * FROM baby_register WHERE baby_id='".$_SESSION['baby_id']."'";
            $result001= mysqli_query($conn,$query001);
            $row001=mysqli_fetch_assoc($result001);

            $birth_date=$row001['baby_dob'];
            $b_date=date_create("$birth_date");
            $brt_date=date_format($b_date,'Y-m-d');
            $today=date("Y-m-d");

            $day_diff=date_diff(date_create($brt_date),date_create($today));

            $diference=$day_diff->format('%a');

            $query002="SELECT * FROM child_health_note WHERE baby_id='".$_SESSION['baby_id']."' AND baby_age_group_id=5";
            $result002= mysqli_query($conn,$query002);
            $num_row002=mysqli_num_rows($result002);

            $query003="SELECT * FROM child_health_note WHERE baby_id='".$_SESSION['baby_id']."' AND baby_age_group_id=6";
            $result003= mysqli_query($conn,$query003);
            $num_row003=mysqli_num_rows($result003);



            if($diference>365) {
                if($num_row002==1) {
                    if($num_row003==0) {
                    
            ?>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-data-enter">
                                <div class="card-body">
                                    <h2 class="card-title">12 ?????? ???????????? ???????????????????????? ?????? ????????? ???????????? ???????????? ?????????????????? ?????? ????????????????????? ???????????????</h2>
                                    <button class="btn data-btn" id='health-data-btn' data-toggle='modal' href='#helth-data' data-baby='<?php echo $_SESSION['baby_id'];?>' data-group='6'>
                                        ???????????? ?????????????????? ???????????????
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- give approval model-with-data -->
                    <div id="helth-data" class="modal fade">
                        <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                                <form action="/pages/doctor/php/vac-permission-action.php" method="POST">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="batch">
                                            <table>
                                                <tr>
                                                    <td><label>?????????????????? ?????????????????? ????????????:</label></td>
                                                    <td><input class="form-control" max="<?php echo date('Y-m-d'); ?>" type="date" id="date_came" name="date_came" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label>????????? ????????????????????????:</label></td>
                                                    <td>
                                                        <select class="form-control form-control-md" name="eye1" id="eye1">
                                                            <option value="O">???????????? ???????????????(O)</option>
                                                            <option value="X">???????????? ??????(X)</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>????????? ????????????:</label></td>
                                                    <td>
                                                        <select class="form-control form-control-md" name="eye2" id="eye2">
                                                            <option value="O">???????????? ???????????????(O)</option>
                                                            <option value="X">???????????? ??????(X)</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>???????????????????????? ???????????? ?????????:</label></td>
                                                    <td>
                                                        <select class="form-control form-control-md" name="eye3" id="eye3">
                                                            <option value="O">???????????? ???????????????(O)</option>
                                                            <option value="X">???????????? ??????(X)</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>?????????????????? ???????????? ?????????:</label></td>
                                                    <td>
                                                        <select class="form-control form-control-md" name="eye4" id="eye4">
                                                            <option value="O">???????????? ???????????????(O)</option>
                                                            <option value="X">???????????? ??????(X)</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>????????? ????????????:</label></td>
                                                    <td>
                                                        <select class="form-control form-control-md" name="eye5" id="eye5">
                                                            <option value="O">???????????? ???????????????(O)</option>
                                                            <option value="X">???????????? ??????(X)</option>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><label>????????????:</label></td>
                                                    <td>
                                                        <select class="form-control form-control-md" name="hearing" id="hearing">
                                                            <option value="O">???????????? ???????????????(O)</option>
                                                            <option value="X">???????????? ??????(X)</option>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><label>?????? ???????????????:</label></td>
                                                    <td>
                                                        <select class="form-control form-control-md" name="weight" id="weight">
                                                            <option value="N">?????????????????? ??????(N)</option>
                                                            <option value="OW">????????? ??????(OW)</option>
                                                            <option value="O">?????????????????? ????????????(O)</option>
                                                            <option value="X">????????? ??????(X)</option>
                                                            <option value="XX">??????????????? ????????? ??????(XX)</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>?????? ???????????????:</label></td>
                                                    <td>
                                                        <select class="form-control form-control-md" name="height" id="height">
                                                            <option value="NH">?????????????????? ??????(NH)</option>
                                                            <option value="S">???????????????????????? ???????????? ??????(S)</option>
                                                            <option value="SS">??????????????? ???????????? ??????(SS)</option>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><label>????????????????????????:</label></td>
                                                    <td>
                                                        <select class="form-control form-control-md" name="development" id="development">
                                                            <option value="O">???????????? ???????????????(O)</option>
                                                            <option value="X">???????????? ??????(X)</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>???????????? ?????????:</label></td>
                                                    <td>
                                                        <select class="form-control form-control-md" name="heart" id="heart">
                                                            <option value="O">???????????? ???????????????(O)</option>
                                                            <option value="X">???????????? ??????(X)</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>??????????????? ??????????????????:</label></td>
                                                    <td>
                                                        <select class="form-control form-control-md" name="hip" id="hip">
                                                            <option value="O">???????????? ???????????????(O)</option>
                                                            <option value="X">???????????? ??????(X)</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>???????????????:</label></td>
                                                    <td>
                                                        <textarea class="form-control form-control-md" name="other" id="other"> </textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">???????????? ????????????</button>
                                        <input type="hidden" id="baby_id" name="baby_id">
                                        <input type="hidden" id="group_id" name="group_id">
                                        <button name="submit-helth-data" type="submit" class="btn btn-danger">????????????????????? ??????????????? ???????????????</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                     
            <?php
                    }
                }
            }
            ?>
                    

                     
  
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
    
    <!-- send data to modal scripts -->
    <script>
        $(document).on("click", "#health-data-btn", function () {
            var getBaby = $(this).data('baby');
            var getGrp= $(this).data('group');
            
            $("#baby_id").val(getBaby);
            $("#group_id").val(getGrp);
        });
    </script>


</body>

</html>


<?php mysqli_close($conn); ?>