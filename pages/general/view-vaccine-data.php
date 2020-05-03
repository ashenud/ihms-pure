<?php session_start(); ?>
<?php include('../../php/basic/connection.php'); ?>


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

    <link rel="stylesheet" href="./css/view-vaccine-data-style.css">




    <title>Infant Health Management System</title>
    
</head>

<body>

    <?php
    
    mysqli_select_db($conn, 'cs2019g6');
    
    if(isset($_POST['submit'])) {
        $vac_id=$_POST['vac_id'];
        
    }

    mysqli_select_db($conn,'cs2019g6');
    ?>    

    <div class="background-area pt-1 pb-4" style="background-image:  url('./img/backgroud-boy.jpg');">
        <div class="container mt-3">

            <div class="card" style="background: rgba(227, 242, 253, 0.5);">
                <div class="card-body">
                    <h3 class="card-title text-uppercase">baby details</h3>

                    <div class="container">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-timeline">

                                    <!--at birth timeline-->
                                    <div class="timeline">

                                        <span class="icon fas fa-syringe"></span>
                                        <div class="timeline-content">

                                            <!--at birth vaccination-->                                        
                                            <?php
                                                 $query1="SELECT MAX(giving_date) AS next_date FROM vaccine_date WHERE baby_id='".$vac_id."' AND age_group_id=1";
                                                 $result1=mysqli_query($conn,$query1);
                                                 $row1=mysqli_fetch_assoc($result1);
                                            ?>
                                            
                                            <?php
                                                 $query2="SELECT * FROM vac_birth WHERE baby_id='".$vac_id."'";
                                                 $result2=mysqli_query($conn,$query2);
                                                 $row2=mysqli_fetch_assoc($result2);
                                            ?>                                                                                        

                                            <form class="description" action="./php/mark-vaccine-action.php" method="POST" onsubmit="return validation()">
                                                
                                                <?php
                                                               
                                                    if(isset($row1['next_date'])) {
                                                ?>
                                                        <div class="title">
                                                           <h3>At Birth</h3>
                                                           <span><?php echo $row1['next_date'];?></span>                                 
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="title">
                                                           <h3>At Birth</h3>
                                                           <span>not deside</span>                                 
                                                        </div>                                                       
                                                <?php
                                                    }
                                                ?>       

                                                <!--bcg-1-->                                            
                                                <?php
                                                    if($row2['vac_name']=='BCG-1') {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine1" value="1" checked="checked" disabled>
                                                                <label for="vaccine1">BCG-1</label>
                                                            </span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else {
                                                ?>
                                                
                                                <?php
                                                    $query3="SELECT giving_date FROM vaccine_date WHERE baby_id='".$vac_id."' AND vaccine_name='BCG-1'";
                                                    $result3=mysqli_query($conn,$query3);
                                                    $row3=mysqli_fetch_assoc($result3);

                                                    if(empty($row3['giving_date'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine1" name='bcg1' value="1" disabled>
                                                                <label for="vaccine1">BCG-1</label>
                                                            </span>                                                            
                                                            <span>
                                                                <input type="hidden" name="bcg1_name" value="BCG-1">
                                                                <input type="date" name="giving_date_bcg1">
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                    else {
                                                ?>        
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine1" name='bcg1' value="1">
                                                                <label for="vaccine1">BCG-1</label>
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                ?>
                                                            
                                                <?php        
                                                    }
                                                ?>
                                                <!--end bcg-1-->

                                                <!--bcg-2-->
                                                <?php
                                                    if($row2['vac_name']=='BCG-2') {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine2" value="1" checked="checked" disabled>
                                                                <label for="vaccine2">BCG-2(if no scar)</label>
                                                            </span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else {
                                                ?>
                                                
                                                <?php
                                                    $query4="SELECT giving_date FROM vaccine_date WHERE baby_id='".$vac_id."' AND vaccine_name='BCG-2'";
                                                    $result4=mysqli_query($conn,$query4);
                                                    $row4=mysqli_fetch_assoc($result4);

                                                    if(empty($row4['giving_date'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine2" name='bcg2' value="1" disabled>
                                                                <label for="vaccine2">BCG-2(if no scar)</label>
                                                            </span>                                                            
                                                            <span>
                                                                <input type="hidden" name="bcg2_name" value="BCG-2">
                                                                <input type="date" name="giving_date_bcg2">
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                    else {
                                                ?>        
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine2" name='bcg2' value="1">
                                                                <label for="vaccine2">BCG-2(if no scar)</label>
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                ?>
                                                            
                                                <?php        
                                                    }
                                                ?>
                                                <!--end bcg-2-->

                                                <!--bcg scar-->
                                                <?php
                                                    if($row2['vac_name']=='SCAR') {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine3" value="1" checked="checked" disabled>
                                                                <label for="vaccine3">BCG Scar</label>
                                                            </span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else {
                                                ?>
                                                
                                                <?php
                                                    $query5="SELECT giving_date FROM vaccine_date WHERE baby_id='".$vac_id."' AND vaccine_name='SCAR'";
                                                    $result5=mysqli_query($conn,$query5);
                                                    $row5=mysqli_fetch_assoc($result5);

                                                    if(empty($row5['giving_date'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine3" name='scar' value="1" disabled>
                                                                <label for="vaccine3">BCG Scar</label>
                                                            </span>                                                            
                                                            <span>
                                                                <input type="hidden" name="scar_name" value="SCAR">
                                                                <input type="date" name="giving_date_scar">
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                    else {
                                                ?>        
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine3" name='scar' value="1">
                                                                <label for="vaccine3">BCG Scar</label>
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                ?>
                                                            
                                                <?php        
                                                    }
                                                ?>
                                                <!--end bcg scar-->

                                                <!-- side effects-->
                                                <?php
                                                    if($row2['vac_name']=='Side Eff') {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine4" value="1" checked="checked" disabled>
                                                                <label for="vaccine4">Side Effects</label>
                                                            </span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine4" name='side_eff' value="1">
                                                                <label for="vaccine4">Side Effects</label>
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                ?>
                                                <!--end side effects-->
                                                
                                                <input type="hidden" name="baby_id" value="<?php echo $vac_id; ?>">
                                                <button type="submit" name="submitB" class="btn view-btn"><i class="fas fa-syringe"></i></button>
                                            </form>
                                        </div>
                                    </div>

                                    <!--at 2months timeline-->
                                    <div class="timeline">

                                        <span class="icon fas fa-syringe"></span>
                                        <div class="timeline-content">

                                            <!--at 2months vaccination-->                                        
                                            <?php
                                                 $query6="SELECT MAX(giving_date) AS next_date FROM vaccine_date WHERE baby_id='".$vac_id."' AND age_group_id=2";
                                                 $result6=mysqli_query($conn,$query6);
                                                 $row6=mysqli_fetch_assoc($result6);
                                            ?>
                                            
                                            <?php
                                                 $query7="SELECT * FROM vac_2months WHERE baby_id='".$vac_id."'";
                                                 $result7=mysqli_query($conn,$query7);
                                                 $row7=mysqli_fetch_assoc($result7);
                                            ?>                                                                                        

                                            <form class="description" action="./php/mark-vaccine-action.php" method="POST" onsubmit="return validation()"
                                             
                                                <?php
                                                                
                                                    if(empty($row5['giving_date'])) {
                                                        echo "style='pointer-events: none;'";
                                                    }

                                                ?>
                                                 
                                            >
                                                
                                                <?php
                                                               
                                                    if(isset($row6['next_date'])) {
                                                ?>
                                                        <div class="title">
                                                           <h3>At Birth</h3>
                                                           <span><?php echo $row6['next_date'];?></span>                                 
                                                        </div>
                                                <?php
                                                    }
                                                    else {
                                                ?>
                                                        <div class="title">
                                                           <h3>At Birth</h3>
                                                           <span>not deside</span>                                 
                                                        </div>                                                       
                                                <?php
                                                    }
                                                ?>       

                                                <!--dpt-1-->                                            
                                                <?php
                                                    if(!empty($row7['DPT_1'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine5" value="1" checked="checked" disabled>
                                                                <label for="vaccine5">DPT-1</label>
                                                            </span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else {
                                                ?>
                                                
                                                <?php
                                                    $query8="SELECT giving_date FROM vaccine_date WHERE baby_id='".$vac_id."' AND vaccine_name='DPT-1'";
                                                    $result8=mysqli_query($conn,$query8);
                                                    $row8=mysqli_fetch_assoc($result8);

                                                    if(empty($row8['giving_date'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine5" name='dpt1' value="1" disabled>
                                                                <label for="vaccine5">DPT-1</label>
                                                            </span>                                                            
                                                            <span>
                                                                <input type="date" name="giving_date_dpt1">
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                    else {
                                                ?>        
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine5" name='dpt1' value="1">
                                                                <label for="vaccine5">DPT-1</label>
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                ?>
                                                            
                                                <?php        
                                                    }
                                                ?>
                                                <!--end dpt-1-->

                                                <!--opv-1-->
                                                <?php
                                                    if(!empty($row7['OPV_1'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine6" value="1" checked="checked" disabled>
                                                                <label for="vaccine6">OPV-1</label>
                                                            </span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else {
                                                ?>
                                                
                                                <?php
                                                    $query9="SELECT giving_date FROM vaccine_date WHERE baby_id='".$vac_id."' AND vaccine_name='OPV-1'";
                                                    $result9=mysqli_query($conn,$query9);
                                                    $row9=mysqli_fetch_assoc($result9);

                                                    if(empty($row9['giving_date'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine6" name='opv1' value="1" disabled>
                                                                <label for="vaccine6">OPV-1</label>
                                                            </span>                                                            
                                                            <span>
                                                                <input type="date" name="giving_date_opv1">
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                    else {
                                                ?>        
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine6" name='opv1' value="1">
                                                                <label for="vaccine6">OPV-1</label>
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                ?>
                                                            
                                                <?php        
                                                    }
                                                ?>
                                                <!--end bcg-2-->

                                                <!--bcg scar-->
                                                <?php
                                                    if(!empty($row7['hepatitis_B1'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine7" value="1" checked="checked" disabled>
                                                                <label for="vaccine7">Hepatitis B-1</label>
                                                            </span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else {
                                                ?>
                                                
                                                <?php
                                                    $query10="SELECT giving_date FROM vaccine_date WHERE baby_id='".$vac_id."' AND vaccine_name='Hepatitis B-1'";
                                                    $result10=mysqli_query($conn,$query10);
                                                    $row10=mysqli_fetch_assoc($result10);

                                                    if(empty($row10['giving_date'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine7" name='hepatitis_B1' value="1" disabled>
                                                                <label for="vaccine7">Hepatitis B-1</label>
                                                            </span>                                                            
                                                            <span>
                                                                <input type="date" name="giving_date_hepaB1">
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                    else {
                                                ?>        
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine7" name='hepatitis_B1' value="1">
                                                                <label for="vaccine7">Hepatitis B-1</label>
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                ?>
                                                            
                                                <?php        
                                                    }
                                                ?>
                                                <!--end bcg scar-->

                                                <!-- side effects-->
                                                <?php
                                                    if(!empty($row7['side_effects'])) {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine8" value="1" checked="checked" disabled>
                                                                <label for="vaccine8">Side Effects</label>
                                                            </span>
                                                        </div>
                                                <?php 
                                                    }
                                                    else {
                                                ?>
                                                        <div class="vaccine">
                                                            <span>
                                                                <input type="checkbox" id="vaccine8" name='side_eff' value="1">
                                                                <label for="vaccine8">Side Effects</label>
                                                            </span>
                                                        </div>
                                                <?php        
                                                    }
                                                ?>
                                                <!--end side effects-->
                                                
                                                <input type="hidden" name="baby_id" value="<?php echo $vac_id; ?>">
                                                <button type="submit" name="submit2M" class="btn view-btn"><i class="fas fa-syringe"></i></button>
                                            </form>
                                        </div>
                                    </div>


                                </div>
                                <!--end main-timeline-->
                            </div>
                            <!--end col-md-12-->
                        </div>
                        <!--end row-->
                        
                    </div>

                </div>
            </div>

        </div>
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