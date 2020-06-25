<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['sister_id'])) {	
	header('location:/?noPermission=1');
}
?>


<?php
        
    $month_lable = '';
    $vac_value = '';

    //for ($i = $length; $i >= 0; $i--) {
    //    $timeline_date = $timeline_date.'"'.substr($json_array2['data']['timeline'][$i]['date'],-5).'",' ;
       // $new_confirmed = $new_confirmed.$json_array2['data']['timeline'][$i]['new_confirmed'].',' ;
    //} 

    //$new_confirmed = trim($new_confirmed,",");
    //$timeline_date = trim($timeline_date,",");

    $month=date('m');
    $year=date('Y');

    //to change month to sinhala
    if($month==1) {
        $month_si="ජනවාරි";
    }
    else if($month==2) {
        $month_si="පෙබරවාරි";
    }
    else if($month==3) {
        $month_si="මාර්තු";
    }
    else if($month==4) {
        $month_si="අප්‍රේල්";
    }
    else if($month==5) {
        $month_si="මැයි";
    }
    else if($month==6) {
        $month_si="ජූනි";
    }
    else if($month==7) {
        $month_si="ජූලි";
    }
    else if($month==8) {
        $month_si="අගෝස්තු";
    }
    else if($month==9) {
        $month_si="සැප්තැම්බර්";
    }
    else if($month==10) {
        $month_si="ඔක්තෝබර්";
    }
    else if($month==11) {
        $month_si="නොවැම්බර්";
    }
    else {
        $month_si="දෙසැම්බර්";
    }


    if (isset($_POST['vac-select'])) {
    
        $vac_id=$_POST['vac-select'];
        
        if($vac_id==1) {
            $vac_group='vac_birth';
            $vac_name='B.C.G.';
        }
        
        if($vac_id==2) {
            $vac_group='vac_birth';
            $vac_name='B.C.G. 2nd dose';
        }
        
        if($vac_id==3) {
            $vac_group='vac_2months';
            $vac_name='Pentavalent 1';
        }
        
        if($vac_id==4) {
            $vac_group='vac_2months';
            $vac_name='OPV 1';
        }
        
        if($vac_id==5) {
            $vac_group='vac_2months';
            $vac_name='fIPV 1';
        }
        
        if($vac_id==6) {
            $vac_group='vac_4months';
            $vac_name='Pentavalent 2';
        }
        
        if($vac_id==7) {
            $vac_group='vac_4months';
            $vac_name='OPV 2';
        }
        
        if($vac_id==8) {
            $vac_group='vac_4months';
            $vac_name='fIPV 2';
        }
        
        if($vac_id==9) {
            $vac_group='vac_6months';
            $vac_name='Pentavalent 3';
        }
        
        if($vac_id==10) {
            $vac_group='vac_6months';
            $vac_name='OPV 3';
        }
        
        if($vac_id==11) {
            $vac_group='vac_9months';
            $vac_name='MMR 1';
        }
        
        if($vac_id==12) {
            $vac_group='vac_12months';
            $vac_name='Live JE';
        }
        
        if($vac_id==13) {
            $vac_group='vac_18months';
            $vac_name='DPT';
        }
        
        if($vac_id==14) {
            $vac_group='vac_18months';
            $vac_name='OPV 4';
        }
        
        if($vac_id==15) {
            $vac_group='vac_3years';
            $vac_name='MMR 2';
        }
        
        if($vac_id==16) {
            $vac_group='vac_5years';
            $vac_name='D.T';
        }
        
        if($vac_id==17) {
            $vac_group='vac_5years';
            $vac_name='OPV 5';
        }
        
        if($vac_id==18) {
            $vac_group='vac_10years';
            $vac_name='HPV Vaccine 1';
        }
        
        if($vac_id==19) {
            $vac_group='vac_10years';
            $vac_name='HPV Vaccine 2';
        }
        
        if($vac_id==20) {
            $vac_group='vac_11years';
            $vac_name='aTd';
        }
        
        $query01="SELECT vac_name,MONTH(date_given),COUNT(*)
                  FROM $vac_group
                  WHERE vac_id=$vac_id AND YEAR(date_given)=$year     
                  GROUP BY MONTH(date_given)";
        $result01=mysqli_query($conn,$query01);
        
        while ($row01 = mysqli_fetch_array($result01)) {

            if($row01['MONTH(date_given)']==1) {
                $month_si="ජනවාරි";
            }            
            else if($row01['MONTH(date_given)']==2) {
                $month_si="පෙබරවාරි";
            }
            else if($row01['MONTH(date_given)']==3) {
                $month_si="මාර්තු";
            }
            else if($row01['MONTH(date_given)']==4) {
                $month_si="අප්‍රේල්";
            }
            else if($row01['MONTH(date_given)']==5) {
                $month_si="මැයි";
            }
            else if($row01['MONTH(date_given)']==6) {
                $month_si="ජූනි";
            }
            else if($row01['MONTH(date_given)']==7) {
                $month_si="ජූලි";
            }
            else if($row01['MONTH(date_given)']==8) {
                $month_si="අගෝස්තු";
            }
            else if($row01['MONTH(date_given)']==9) {
                $month_si="සැප්තැම්බර්";
            }
            else if($row01['MONTH(date_given)']==10) {
                $month_si="ඔක්තෝබර්";
            }
            else if($row01['MONTH(date_given)']==11) {
                $month_si="නොවැම්බර්";
            }
            else if($row01['MONTH(date_given)']==12) {
                $month_si="දෙසැම්බර්";
            }
            
            $month_lable = $month_lable . '"'.$month_si.'",';
            $vac_value = $vac_value . '"'. $row01['COUNT(*)'] .'",';
        }
        
        $month_lable = trim($month_lable,",");
        $vac_value = trim($vac_value,",");
        
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
    
    <link rel="stylesheet" href="/pages/sister/css/sis-reports-style.css">

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
               
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-vac-data" id="pdf-area1">

                            <?php

                            echo "<div class='card-header'>"; // card-header
                            echo    "<h2>" .$year." ".$month_si. " මාසයේ දී ලබා දුන් එන්නත් පිළිබද වාර්තාව</h2>" ;
                            echo  "</div>"; // end of card-header


                            echo "<div class='card-body'>";	// card-body				

                            //$query1 = "SELECT * FROM growth WHERE MONTH(date)=05 AND YEAR(date)=2020";
                            //$result1= mysqli_query($conn,$query1);
                            //$row=mysqli_fetch_assoc($result1); 

                            echo    "<table class='table table-responsive-sm'>"; // start of table-0
                            echo        "<thead>"; // start of table heddigs
                            echo            "<tr>";
                            echo                "<th scope='col'>එන්නතේ නම</th>";
                            echo                "<th scope='col'>ලබා දුන් ප්‍රමාණය</th>";
                            echo            "</tr>";
                            echo        "</thead>"; // end of table heddigs
                            echo        "<tbody>"; // start of table body

                            $query2 = "SELECT * FROM vac_birth WHERE vac_id=1 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result2 = mysqli_query($conn,$query2);
                            $row2 = mysqli_fetch_assoc($result2);

                            $query3 = "SELECT * FROM vac_birth WHERE vac_id=2 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result3 = mysqli_query($conn,$query3);
                            $row3 = mysqli_fetch_assoc($result3);

                            $query4 = "SELECT * FROM vac_2months WHERE vac_id=3 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result4 = mysqli_query($conn,$query4);
                            $row4 = mysqli_fetch_assoc($result4);

                            $query5 = "SELECT * FROM vac_2months WHERE vac_id=4 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result5 = mysqli_query($conn,$query5);
                            $row5 = mysqli_fetch_assoc($result5);

                            $query6 = "SELECT * FROM vac_2months WHERE vac_id=5 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result6 = mysqli_query($conn,$query6);
                            $row6 = mysqli_fetch_assoc($result6);

                            $query7 = "SELECT * FROM vac_4months WHERE vac_id=6 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result7 = mysqli_query($conn,$query7);
                            $row7 = mysqli_fetch_assoc($result7);

                            $query8 = "SELECT * FROM vac_4months WHERE vac_id=7 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result8 = mysqli_query($conn,$query8);
                            $row8 = mysqli_fetch_assoc($result8);

                            $query9 = "SELECT * FROM vac_4months WHERE vac_id=8 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result9 = mysqli_query($conn,$query9);
                            $row9 = mysqli_fetch_assoc($result9);

                            $query10 = "SELECT * FROM vac_6months WHERE vac_id=9 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result10 = mysqli_query($conn,$query10);
                            $row10 = mysqli_fetch_assoc($result10);

                            $query11 = "SELECT * FROM vac_6months WHERE vac_id=10 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result11 = mysqli_query($conn,$query11);
                            $row11 = mysqli_fetch_assoc($result11);

                            $query12 = "SELECT * FROM vac_9months WHERE vac_id=11 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result12 = mysqli_query($conn,$query12);
                            $row12 = mysqli_fetch_assoc($result12);

                            $query13 = "SELECT * FROM vac_12months WHERE vac_id=12 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result13 = mysqli_query($conn,$query13);
                            $row13 = mysqli_fetch_assoc($result13);

                            $query14 = "SELECT * FROM vac_18months WHERE vac_id=13 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result14 = mysqli_query($conn,$query14);
                            $row14 = mysqli_fetch_assoc($result14);

                            $query15 = "SELECT * FROM vac_18months WHERE vac_id=14 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result15 = mysqli_query($conn,$query15);
                            $row15 = mysqli_fetch_assoc($result15);

                            $query16 = "SELECT * FROM vac_3years WHERE vac_id=15 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result16 = mysqli_query($conn,$query16);
                            $row16 = mysqli_fetch_assoc($result16);

                            $query17 = "SELECT * FROM vac_5years WHERE vac_id=16 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result17 = mysqli_query($conn,$query17);
                            $row17 = mysqli_fetch_assoc($result17);

                            $query18 = "SELECT * FROM vac_5years WHERE vac_id=17 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result18 = mysqli_query($conn,$query18);
                            $row18 = mysqli_fetch_assoc($result18);

                            $query19 = "SELECT * FROM vac_10years WHERE vac_id=18 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result19 = mysqli_query($conn,$query19);
                            $row19 = mysqli_fetch_assoc($result19);

                            $query20 = "SELECT * FROM vac_10years WHERE vac_id=19 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result20 = mysqli_query($conn,$query20);
                            $row20 = mysqli_fetch_assoc($result20);

                            $query21 = "SELECT * FROM vac_11years WHERE vac_id=20 AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
                            $result21 = mysqli_query($conn,$query21);
                            $row21 = mysqli_fetch_assoc($result21);

                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>බී.සී.ජී. (B.C.G.)</td>";

                        if((mysqli_num_rows($result2))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result2)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>බී.සී.ජී. දෙවන මාත්‍රාව (B.C.G. 2nd dose)</td>";

                        if((mysqli_num_rows($result3))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result3)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>පංච සං‍යුජ එන්නත 1 (Pentavalent 1)</td>";

                        if((mysqli_num_rows($result4))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result4)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>මුඛ පෝලියෝ 1 (OPV 1)</td>";

                        if((mysqli_num_rows($result5))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result5)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>අජීවී පෝලියෝ 1 (fIPV 1)</td>";

                        if((mysqli_num_rows($result6))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result6)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>පංච සං‍යුජ එන්නත 2 (Pentavalent 2)</td>";

                        if((mysqli_num_rows($result7))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result7)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>මුඛ පෝලියෝ 2 (OPV 2)</td>";

                        if((mysqli_num_rows($result8))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result8)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>අජීවී පෝලියෝ 2 (fIPV 2)</td>";

                        if((mysqli_num_rows($result9))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result9)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>පංච සං‍යුජ එන්නත 3 (Pentavalent 3)</td>";

                        if((mysqli_num_rows($result10))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result10)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>මුඛ පෝලියෝ 3 (OPV 3)</td>";

                        if((mysqli_num_rows($result11))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result11)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>සරම්ප, කම්මුල්ගාය, රුබෙල්ලා 1 (MMR 1)</td>";

                        if((mysqli_num_rows($result12))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result12)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>ජපන් නිදිකර්පථප්‍රදාහය (Live JE)</td>";

                        if((mysqli_num_rows($result13))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result13)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>ත්‍රිත්ව (DPT)</td>";

                        if((mysqli_num_rows($result14))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result14)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>මුඛ පෝලියෝ 4 (OPV 4)</td>";

                        if((mysqli_num_rows($result15))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result15)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>සරම්ප, කම්මුල්ගාය, රුබෙල්ලා 2 (MMR 2)</td>";

                        if((mysqli_num_rows($result16))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result16)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>ද්විත්ව (D.T)</td>";

                        if((mysqli_num_rows($result17))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result17)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>මුඛ පෝලියෝ 5 (OPV 5)</td>";

                        if((mysqli_num_rows($result18))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result18)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>එච්. පී. වී. එන්නත 1 (HPV Vaccine 1)</td>";

                        if((mysqli_num_rows($result19))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result19)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>එච්. පී. වී. එන්නත 2 (HPV Vaccine 2)</td>";

                        if((mysqli_num_rows($result20))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result20)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo            "<tr>"; //start of table data row
                            echo                "<td scope='row'>වැඩිහිටි පිටගැස්ම හා ඩිප්තීරියා (aTd)</td>";

                        if((mysqli_num_rows($result21))==0) {
                            echo                "<td> 0 </td>";    
                        }
                        else {    
                            echo                "<td>".mysqli_num_rows($result21)."</td>";
                        }
                            echo            "</tr>"; // end of table data row
                        //-------------------------------------------------------------------


                            echo        "</tbody>"; //end of table body
                            echo    "</table>"; //end of table-0

                            echo"</div>"; // end of card-body
                            ?>

                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-vac-data2">
                                <div class="card-header">
                                    <h2><?php echo $year; ?> වර්ෂයට අදාළ එන්නත් භාවිතය</h2>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="select-area">
                                                <div class="select-vac">
                                                    <form action="" method="POST">
                                                        <select class="form-control" id="vac-select" name="vac-select" onchange="this.form.submit()">
                                                            <option value="" disabled selected>එන්නත් වර්ගය තෝරන්න</option>
                                                            <option value="1">B.C.G.</option>
                                                            <option value="2">B.C.G. 2nd dose</option>
                                                            <option value="3">Pentavalent 1</option>
                                                            <option value="4">OPV 1</option>
                                                            <option value="5">fIPV 1</option>
                                                            <option value="6">Pentavalent 2</option>
                                                            <option value="7">OPV 2</option>
                                                            <option value="8">fIPV 2</option>
                                                            <option value="9">Pentavalent 3</option>
                                                            <option value="10">OPV 3</option>
                                                            <option value="11">MMR 1</option>
                                                            <option value="12">Live JE</option>
                                                            <option value="13">DPT</option>
                                                            <option value="14">OPV 4</option>
                                                            <option value="15">MMR 2</option>
                                                            <option value="16">D.T</option>
                                                            <option value="17">OPV 5</option>
                                                            <option value="18">HPV Vaccine 1</option>
                                                            <option value="19">HPV Vaccine 2</option>
                                                            <option value="20">aTd</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="chart-area">
                                                <div class="card card-chart">
                                                    <canvas id="chart-vaccine" class="line-chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="button" class="btn change-btn btn-sm download float-md-right" id="download2"><b>බාගත කරන්න</b></button>

                                </div>
                            </div>
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
    
    <script type="text/javascript" src="/assets/js/charts/Chart.min.js"></script>
    <script type="text/javascript" src="/assets/js/jspdf.min.js"></script>

    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.ss-table').addClass('active');
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
    
    <!-- chart --> 
    <script>        
            
        Chart.defaults.global.defaultFontFamily = 'abhaya';
        var ChartTimeline = {
                type: 'bar',
                data: {
                    labels: [<?php echo $month_lable; ?>],
                    datasets: [{
                        label: '<?php echo $vac_name; ?> එන්නත් ප්‍රමාණය',
                        data: [<?php echo $vac_value; ?>],
                        backgroundColor: '#ffa7ba',
                        borderColor: '#ffa7ba',
                        borderWidth: 1,
                        barPercentage: 0.4,
                    }]
                },
                options: {
                    legend: {
                        display: true,labels: {
                            fontColor: '#000',
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1,
                                fontColor: '#000',
                                fontSize: 9,
                                padding: 10,
                            },
                            gridLines: {
                                color: 'rgba(255, 167, 186, 1)',
                                borderDash: [3, 2],
                                zeroLineColor: '#ffa7ba'
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: '#000',
                                fontSize: 10,
                            },
                            gridLines: {
                                color: 'rgba(255, 167, 186, 0.5)',
                                borderDash: [3, 2],
                                zeroLineColor: '#ffa7ba'
                            }
                        }]
                    }
                }
            }
        
        var ctxTimeline = document.getElementById('chart-vaccine').getContext('2d');
        new Chart(ctxTimeline, ChartTimeline);        
        
    </script>

    <!-- canvas to pdf -->
    <script>
        
        $("#download2").click(function() {
            
            var canvas = document.getElementById('chart-vaccine');
            
            var imgData = canvas.toDataURL();
            var doc = new jsPDF({
                orientation: 'landscape'
            });
            
            var width = (canvas.width * 50) / 240;
            var height = (canvas.height * 50) / 240;

            doc.addImage(imgData, 'JPEG', 10, 25, width, height);
            doc.output('dataurlnewwindow');     //opens the data uri in new window
            //doc.save('baby-bmi-chart.pdf'); //Download the rendered PDF.
  
        });
    
    </script>


</body>

</html>


<?php mysqli_close($conn); ?>