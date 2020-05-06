<?php session_start(); ?>
<?php include('../../php/basic/connection.php'); ?>

<?php if(!isset($_SESSION['mother_id'])) {	
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


    <link rel="stylesheet" href="css/baby-vaccinations-style.css">




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
                            mysqli_select_db($conn, 'cs2019g6');

                            $query1 = "SELECT * FROM baby_register WHERE baby_id='".$_SESSION['baby_id']."'";
                            $result1= mysqli_query($conn,$query1);
                            $row=mysqli_fetch_assoc($result1);
                        ?>
                        <a href="#"> <span><?php echo $row['baby_first_name']." ".$row['baby_last_name'];?></span> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <?php
                                if(isset($_SESSION['doctor_id'])) {
                            ?>
                                    <a href="../doctor/doc-dashboard.php" class="text-uppercase">
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
                                else {
                            ?>
                                    <a href="./baby-dashboard.php" class="text-uppercase">
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
                            <a href="#" class="text-uppercase active">
                                <span class="icon">
                                    <i class="fas fa-syringe" aria-hidden="true"></i>
                                </span>
                                <span class="list">එන්නත් කිරීම</span>
                            </a>

                        </li>
                        <li>
                            <a href="baby-charts.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" aria-hidden="true"></i>
                                </span>
                                <span class="list">වර්ධන සටහන</span>
                            </a>
                        </li>
                        <li>
                            <?php
                                    if(isset($_SESSION['sister_id'])){
                                        echo '<a href="baby-editable-page.php" class="text-uppercase">';
                                        echo '<span class="icon">';
                                        echo '<i class="fas fa-table" aria-hidden="true"></i>';
                                        echo '</span>';
                                        echo '<span class="list">දත්ත සංස්කරණය</span>';
                                        echo '</a>';
                                    }
                                    elseif(isset($_SESSION['midwife_id'])){
                                        echo '<a href="baby-editable-page.php" class="text-uppercase">';
                                        echo '<span class="icon">';
                                        echo '<i class="fas fa-table" aria-hidden="true"></i>';
                                        echo '</span>';
                                        echo '<span class="list">දත්ත සංස්කරණය</span>';
                                        echo '</a>';
                                    }
                                    elseif(isset($_SESSION['admin_id'])){
                                        echo '<a href="baby-editable-page.php" class="text-uppercase">';
                                        echo '<span class="icon">';
                                        echo '<i class="fas fa-table" aria-hidden="true"></i>';
                                        echo '</span>';
                                        echo '<span class="list">දත්ත සංස්කරණය</span>';
                                        echo '</a>';
                                    }
                                ?>
                            
                        </li>
                        <li>
                        <?php
                            if(isset($_SESSION['doctor_id'])){
                            }
                            elseif(isset($_SESSION['sister_id'])){
                            }
                            elseif(isset($_SESSION['midwife_id'])){
                            }
                            elseif(isset($_SESSION['admin_id'])){
                            }
                            else{
                        ?>
                                <a href="baby-inbox.php" class="text-uppercase">
                                <span class="icon">
                                <i class="fas fa-inbox" aria-hidden="true"></i>
                                </span>
                                <span class="list">එන පණිවිඩ</span>
                                </a>
                        <?php
                            }
                        ?>
                        </li>
                        <li>
                        <?php
                            if(isset($_SESSION['doctor_id'])){
                            }
                            elseif(isset($_SESSION['sister_id'])){
                            }
                            elseif(isset($_SESSION['midwife_id'])){
                            }
                            elseif(isset($_SESSION['admin_id'])){
                            }
                            else{
                        ?>
                                <a href="baby-send-messages.php" class="text-uppercase">
                                <span class="icon">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                </span>
                                <span class="list">පණිවිඩ යවන්න</span>
                                </a>
                        <?php
                            }
                        ?>
                        </li>
                        <li>
                            <a href="baby-select.php" class="text-uppercase">
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
               
                <div class="container-fluid">

                    <div class="container">

                   
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-timeline">

                                    <div class="timeline">
                
                                         <span class="icon fas fa-syringe"></span>
                                            <a href="" class="timeline-content">

                                            <!--at birth vaccination-->
                                                <h3 class="title"> At Birth &nbsp&nbsp&nbsp&nbsp&nbsp Due Date:2020.02.21</h3>

                                                    <?php
                                                         mysqli_select_db($conn, 'cs2019g6');
                                                         $sql1="SELECT * FROM vac_birth WHERE baby_id='".$_SESSION['baby_id']."'";
                                                         $value1=mysqli_query($conn,$sql1);
                                                         $result1=mysqli_fetch_assoc($value1);
                                                    ?>

                                                    <form class="description">

                                                        <!--bcg-1-->
                                                        <input type="checkbox" id="vaccine1" name="vaccine1" value="BCG-1" 
                                                            <?php
                                                               
                                                                if(!empty($result1['BCG_1']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                            ?>
                                                            disabled>
                                                            <label for="vaccine1">BCG-1</label>
                                                        <!--end bcg-1-->
                                                        
                                                        <!--bcg-2-->
                                                        <input type="checkbox" id="vaccine2" name="vaccine2" value="BCG-2"
                                                            <?php
                                                               
                                                                if(!empty($result1['BCG_2']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                            ?>
                                                            disabled>
                                                        <label for="vaccine2">BCG-2(if no scar)</label>
                                                        <!--end bcg-2-->

                                                        <!--bcg scar-->
                                                        <input type="checkbox" id="vaccine3" name="vaccine3" value="scar"
                                                        <?php
                                                                
                                                                if(!empty($result['scar']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                            ?>
                                                        disabled>
                                                        <label for="vaccine3">BCG Scar</label>
                                                        <!--end bcg scar-->

                                                        <!-- side effects-->
                                                        <input type="checkbox" id="vaccine4" name="vaccine4" value="side effects"
                                                        <?php
                                                                
                                                                if(!empty($result['side_effects']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                            ?>
                                                        disabled>
                                                        <label for="vaccine4">Side Effects</label>
                                                        <!--end side effects-->
                                                    </form>
                                             </a>
                                    </div>

                        

                                    <div class="timeline">
                                        <span class="icon fas fa-syringe"></span>
                                            <a href="" class="timeline-content">

                                            <!--2 months vaccination--->
                                                <h3 class="title">2 Months &nbsp&nbsp&nbsp&nbsp&nbsp Due Date:2020.04.21</h3>

                                                <?php
                                                         $sql2="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."'";
                                                         $value2=mysqli_query($conn,$sql2);
                                                         $result2=mysqli_fetch_assoc($value2);
                                                ?>


                                                    <form class="description">
                                                        <input type="checkbox" id="vaccine5" name="vaccine5" value="DPT_1"

                                                        <?php
                                                                
                                                                if(!empty($result['DPT_1']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for=vaccine5> DPT-1</label>

                                                        <input type="checkbox" id="vaccine6" name="vaccine6" value="OPV_1"
                                                        <?php
                                                                
                                                                if(!empty($result['OPV_1']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine6"> OPV-1</label>

                                                        <input type="checkbox" id="vaccine7" name="vaccine7" value="Hepatitis B-1"
                                                        <?php
                                                                
                                                                if(!empty($result['hepatitis_B1']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine7"> Hepatitis B-1</label>

                                                        <input type="checkbox" id="vaccine8" name="vaccine8" value="side effects"
                                                        <?php
                                                                
                                                                if(!empty($result['side_effects']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine8"> Side Effects</label>
                                                    </form>
                                            </a>
                                    </div>

                                    <div class="timeline">
                                        <span class="icon fas fa-syringe"></span>
                                            <a href="" class="timeline-content">
                                            <!--4 month vaccination-->
                                                <h3 class="title">4 Months &nbsp&nbsp&nbsp&nbsp&nbsp Due Date:2020.06.21</h3>

                                                <?php
                                                         $sql3="SELECT * FROM vac_4months WHERE baby_id='".$_SESSION['baby_id']."'";
                                                         $value3=mysqli_query($conn,$sql3);
                                                         $result3=mysqli_fetch_assoc($value3);
                                                ?>  

                                                    <form class="description">

                                                        <input type="checkbox" id="vaccine9" name="vaccine9" value="DPT_2"
                                                        <?php
                                                                
                                                                if(!empty($result['DPT_2']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine9">DPT-2</label>

                                                        <input type="checkbox" id="vaccine10" name="vaccine10" value="OPV_2"
                                                        <?php
                                                                
                                                                if(!empty($result['OPV_2']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine10"> OPV-2</label>

                                                        <input type="checkbox" id="vaccine11" name="vaccine11" value="HB_2"
                                                        <?php
                                                                
                                                                if(!empty($result['hepatitis_B2']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine11">Hepatitis-B2</label>

                                                        <input type="checkbox" id="vaccine12" name="vaccine12" value="side effects"
                                                        <?php
                                                                
                                                                if(!empty($result['side_effects']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine12"> Side Effects</label>
                                                    </form>
                                            </a>
                                    </div>

                                    <div class="timeline">
                                        <span class="icon fas fa-syringe"></span>
                                            <a href="" class="timeline-content">
                                            <!--6 month vaccination-->
                                                <h3 class="title">6 Months &nbsp&nbsp&nbsp&nbsp&nbsp Due Date:2020.08.21</h3>

                                                <?php
                                                         $sql4="SELECT * FROM vac_6months WHERE baby_id='".$_SESSION['baby_id']."'";
                                                         $value4=mysqli_query($conn,$sql4);
                                                         $result4=mysqli_fetch_assoc($value4);
                                                ?>  


                                                    <form class="description">

                                                        <input type="checkbox" id="vaccine13" name="vaccine13" value="DPT_3"
                                                        <?php
                                                                
                                                                if(!empty($result['DPT_3']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine13">DPT-3</label>
                                                        
                                                        <input type="checkbox" id="vaccine14" name="vaccine14" value="OPV_3"
                                                        <?php
                                                                
                                                                if(!empty($result['OPV_3']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine14">OPV-3</label>

                                                        <input type="checkbox" id="vaccine15" name="vaccine15" value="HB3"
                                                        <?php
                                                                
                                                                if(!empty($result['hepatitis_B3']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine15"> Hepatitis-B3</label>

                                                        <input type="checkbox" id="vaccine16" name="vaccine16" value="scar"<?php
                                                                
                                                                if(!empty($result['scar']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine16"> Scar</label>

                                                        <input type="checkbox" id="vaccine17" name="vaccine17" value="side effects"
                                                        <?php
                                                                
                                                                if(!empty($result['side_effects']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine17"> Side Effects</label>
                                                    </form>
                                            </a>
                                    </div>

                                    <div class="timeline">
                                        <span class="icon fas fa-syringe"></span>
                                            <a href="" class="timeline-content">
                                            <!--9 month vaccination-->
                                                <h3 class="title">9 Months &nbsp&nbsp&nbsp&nbsp&nbsp Due Date:2020.11.21</h3>

                                                <?php
                                                         $sql5="SELECT * FROM vac_9months WHERE baby_id='".$_SESSION['baby_id']."'";
                                                         $value5=mysqli_query($conn,$sql5);
                                                         $result5=mysqli_fetch_assoc($value5);
                                                ?>  

                                                    <form class="description">

                                                        <input type="checkbox" id="vaccine18" name="vaccine18" value="Measles"
                                                        <?php
                                                                
                                                                if(!empty($result['measles']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine18">Measles</label>

                                                        <input type="checkbox" id="vaccine19" name="vaccine19" value="Vitamin-A"
                                                        <?php
                                                                
                                                                if(!empty($result['vitamin_A']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine19"> Vitamin-A</label> 

                                                        <input type="checkbox" id="vaccine20" name="vaccine20" value="side effects"
                                                        <?php
                                                                
                                                                if(!empty($result['side_effects']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine20"> Side Effects</label>                  
                                                    </form>
                                            </a>
                                    </div>

                                    

                                    <div class="timeline">
                                        <span class="icon fas fa-syringe"></span>
                                            <a href="" class="timeline-content">
                                            <!--18 month vaccination-->
                                                <h3 class="title">18 Months &nbsp&nbsp&nbsp&nbsp&nbsp Due Date:2020.08.21</h3>

                                                <?php
                                                         $sql6="SELECT * FROM vac_18months WHERE baby_id='".$_SESSION['baby_id']."'";
                                                         $value6=mysqli_query($conn,$sql6);
                                                         $result6=mysqli_fetch_assoc($value6);
                                                ?> 

                                                    <form class="description">
                                                        <input type="checkbox" id="vaccine21" name="vaccine21" value="DPT-4"
                                                        <?php
                                                                
                                                                if(!empty($result['DPT_4']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine21"> DPT-4</label>

                                                        <input type="checkbox" id="vaccine22" name="vaccine22" value="OPV_4"
                                                        <?php
                                                                
                                                                if(!empty($result['OPV_4']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine22"> OPV-4</label>

                                                        <input type="checkbox" id="vaccine23" name="vaccine23" value="Vitamin-A"
                                                        <?php
                                                                
                                                                if(!empty($result['vitamin_A']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine23"> Vitamin-A</label>

                                                        <input type="checkbox" id="vaccine24" name="vaccine24" value="side effects"
                                                        <?php
                                                                
                                                                if(!empty($result['side_effects']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine24"> Side Effects</label>   
                                                    </form>
                                            </a>
                                    </div>


                                    <div class="timeline">
                                        <span class="icon fas fa-syringe"></span>
                                            <a href="" class="timeline-content">
                                            <!--3 year vaccination-->
                                                <h3 class="title">3 Year &nbsp&nbsp&nbsp&nbsp&nbsp Due Date:2022.02.21</h3>

                                                <?php
                                                         $sql7="SELECT * FROM vac_3years WHERE baby_id='".$_SESSION['baby_id']."'";
                                                         $value7=mysqli_query($conn,$sql7);
                                                         $result7=mysqli_fetch_assoc($value7);
                                                ?> 


                                                    <form class="description">
                                                        <input type="checkbox" id="vaccine25" name="vaccine25" value="Measles & Rubella"
                                                        <?php
                                                                
                                                                if(!empty($result['measles_and_rubella']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine25"> Measles & Rubella</label>

                                                        <input type="checkbox" id="vaccine26" name="vaccine26" value="Vitamin-A"
                                                        <?php
                                                                
                                                                if(!empty($result['vitamin_A']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine26">Vitamin-A</label>

                                                        <input type="checkbox" id="vaccine27" name="vaccine27" value="side effects"
                                                        <?php
                                                                
                                                                if(!empty($result['side_effects']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine27"> Side Effects</label>   
                                                    </form>
                                            </a>
                                    </div>

                                    <div class="timeline">
                                        <span class="icon fas fa-syringe"></span>
                                            <a href="" class="timeline-content">
                                            <!--5 year vaccination-->
                                                <h3 class="title">5 Year &nbsp&nbsp&nbsp&nbsp&nbsp Due Date:2024.02.21</h3>

                                                <?php
                                                         $sql8="SELECT * FROM vac_5years WHERE baby_id='".$_SESSION['baby_id']."'";
                                                         $value8=mysqli_query($conn,$sql8);
                                                         $result8=mysqli_fetch_assoc($value8);
                                                ?> 


                                                    <form class="description">
                                                        <input type="checkbox" id="vaccine28" name="vaccine28" value="D.T"
                                                        <?php
                                                                
                                                                if(!empty($result['DT']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine28"> D.T</label>

                                                        <input type="checkbox" id="vaccine29" name="vaccine29" value="OPV-5"
                                                        <?php
                                                                
                                                                if(!empty($result['OPV_5']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine29">OPV-5</label>

                                                        <input type="checkbox" id="vaccine30" name="vaccine30" value="side effects"
                                                        <?php
                                                                
                                                                if(!empty($result['side_effects']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine30"> Side Effects</label>   
                                                    </form>
                                            </a>
                                    </div>

                                    <div class="timeline">
                                        <span class="icon fas fa-syringe"></span>
                                            <a href="" class="timeline-content">
                                            <!--10-14 years vaccination-->
                                                <h3 class="title">10-14 Years &nbsp&nbsp&nbsp&nbsp&nbsp Due Date:2024.02.21</h3>

                                                <?php
                                                         $sql9="SELECT * FROM vac_10_14years WHERE baby_id='".$_SESSION['baby_id']."'";
                                                         $value9=mysqli_query($conn,$sql9);
                                                         $result9=mysqli_fetch_assoc($value9);
                                                ?> 


                                                    <form class="description">
                                                        <input type="checkbox" id="vaccine31" name="vaccine31" value="Rubella"
                                                        <?php
                                                                
                                                                if(!empty($result['rubella']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine31"> Rubella</label>

                                                        <input type="checkbox" id="vaccine32" name="vaccine32" value="td"
                                                        <?php
                                                                
                                                                if(!empty($result['atd']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine32">atd</label>

                                                        <input type="checkbox" id="vaccine33" name="vaccine33" value="side effects"
                                                        <?php
                                                                
                                                                if(!empty($result['side_effects']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine33"> Side Effects</label>   
                                                    </form>
                                            </a>
                                    </div>


                                    <div class="timeline">
                                        <span class="icon fas fa-syringe"></span>
                                            <a href="" class="timeline-content">
                                            <!--Japanese Encephalitis vaccination-->
                                                <h3 class="title">Japanese Encephalitis &nbsp&nbsp&nbsp&nbsp&nbsp Due Date:2020.02.21</h3>

                                                <?php
                                                         $sql10="SELECT * FROM vac_japanese_encephalities WHERE baby_id='".$_SESSION['baby_id']."'";
                                                         $value10=mysqli_query($conn,$sql10);
                                                         $result10=mysqli_fetch_assoc($value10);
                                                ?> 
                                                

                                                    <form class="description">
                                                        <input type="checkbox" id="vaccine34" name="vaccine34" value="J E 1"
                                                        <?php
                                                                
                                                                if(!empty($result['JE_1']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine34">J E 1</label>

                                                        <input type="checkbox" id="vaccine35" name="vaccine35" value="J E 2"
                                                        <?php
                                                                
                                                                if(!empty($result['JE_2']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine35">J E 2</label>

                                                        <input type="checkbox" id="vaccine36" name="vaccine36" value="J E 3"
                                                        <?php
                                                                
                                                                if(!empty($result['JE_3']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine36">J E 3</label>

                                                        <input type="checkbox" id="vaccine37" name="vaccine37" value="J E 4"
                                                        <?php
                                                                
                                                                if(!empty($result['JE_4']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine37">J E 4</label>

                                                        <input type="checkbox" id="vaccine38" name="vaccine38" value="side effects"
                                                        <?php
                                                                
                                                                if(!empty($result['side_effects']))
                                                                {
                                                                    echo "checked='checked'";
                                                                }

                                                        ?>
                                                        disabled>
                                                        <label for="vaccine38"> Side Effects</label>              
                                                    </form>
                                             </a>
                                    </div>
</div>

                                </div><!--end main-timeline-->
                            </div><!--end col-md-12-->
                        </div><!--end row-->
                    </div><!--end container-->
                </div><!--end container-fluid-->



            </div>
            <!-- end of content -->

        </div>
        <!-- end of main body (sidebar and content) -->

    </div>
        <!--end wrapper-->


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