<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['midwife_id'])) {	
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

    <!--chart-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="stylesheet" href="/pages/midwife/css/mid-reports-style.css">

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
               
                <!-- data-container -->
                <div class="container">
				
                    <!-- baby data card -->
					<div class="card card-baby-data" id="pdf-area1">
					
					<?php

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
                        
                    echo "<div class='card-header'>"; // card-header
                    echo    "<h2>" .$year." ".$month_si. " මාසයට අදාළ දරුවන්ගේ උස හා බර වාර්තාව</h2>" ;
                    echo  "</div>"; // end of card-header
                        
                        
                    echo "<div class='card-body'>";	// card-body				

                    $query1 = "SELECT * FROM growth WHERE MONTH(date)=$month AND YEAR(date)=$year";
                    $result1= mysqli_query($conn,$query1);
                    $row=mysqli_fetch_assoc($result1); 

                    //male weight category
                    $a=0;
                    $b=0;
                    $c=0;
                    $d=0;
                    $e=0;
                    //female weight category
                    $aa=0;
                    $bb=0;
                    $cc=0;
                    $dd=0;
                    $ee=0;
                    //male height categpry
                    $ha=0;
                    $hb=0;
                    $hc=0;
                    //female weight category
                    $haa=0;
                    $hbb=0;
                    $hcc=0;
                    
                    
                    echo "<table class='table table-responsive-sm'>"; // start of table-0
                    echo    "<thead>"; // start of table heddigs
                    echo        "<tr>";
                    echo            "<th scope='col'>දරුවාගේ නම</th>";
                    echo            "<th scope='col'>ස්ත්‍රී පුරුෂභාවය</th>";
                    echo            "<th scope='col'>වයස(මාස)</th>";
                    echo            "<th scope='col'>බර(KG) හා අදියර</th>";
                    echo            "<th scope='col'>උස(CM) හා අදියර</th>";
                    echo        "</tr>";
                    echo    "</thead>"; // end of table heddigs
                    echo    "<tbody>"; // start of table body
                    


                    while ($row = mysqli_fetch_assoc($result1)) {
                        
                        $baby_id = $row["baby_id"];

                        $query2 = "SELECT * FROM baby_register WHERE baby_id='{$baby_id}'";
                        $result2= mysqli_query($conn,$query2);
                        $row2=mysqli_fetch_assoc($result2); 
                        $gender = $row2["baby_gender"];
                        
                        if($gender=='M') {
                            $gender_si="පුරුෂ";
                        }
                        else {
                            $gender_si="ස්ත්‍රී";
                        }
                        
                        $firstname= $row2["baby_first_name"];
                        $lastname=$row2["baby_last_name"];
                        $age = $row["baby_age_in_months"];
                        
                        if($age==0) {
                            $baby_age='උපන් මස';
                        }
                        else {
                            $baby_age=$age.' යී';
                        }
                        
                        $weight = $row["weight"];
                        $height = $row["height"];
                        
                        echo    "<tr>"; //start of table data row
                        echo        "<td scope='row'>".$firstname." ".$lastname."</td>";
                        echo        "<td>".$gender_si."</td>";
                        echo        "<td>".$baby_age."</td>";
                        echo        "<td>".$row['weight']." | "; // weight category will print in below if-else statements

                        //Weight

                        //0-month
                        if($row["baby_age_in_months"]==0) 
                        {

                            //male category
                            if($gender=='M') {

                                if($weight<=2.1)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=2.5)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=2.9) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=4.4) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }  
                            }

                            //female category
                            else {
                                if($weight<=2.1)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=2.5)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=2.9) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=4.4) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }

                            }
                        }
                            //1-month
                        else if($row["baby_age_in_months"]==1)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=2.9)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=3.4)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=3.9) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=5.6) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }

                            }
                            //female
                            else
                            {
                                if($weight<=2.9)
                                {
                                        echo 'උග්‍ර අඩු බර';
                                        $aa++;

                                }
                                else if($weight<=3.4)
                                {
                                        echo 'අඩු බර';
                                        $bb++;
                                }
                                else if($weight<=3.9) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=5.6) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }


                            }
                        }

                        //2-month
                        else if($row["baby_age_in_months"]==2)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=3.7)
                            {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                            }
                            else if($weight<=4.2)
                            {
                                    echo 'අඩු බර';
                                    $b++;
                            }
                            else if($weight<=4.9) 
                            {
                                echo 'මද බර අඩු';
                                $c++;
                            }
                            else if($weight<=7.0) 
                            {
                                echo 'නියමිත බර';
                                $d++;
                            }
                            else
                            {
                                echo 'අධිබර';
                                $e++;
                            }

                            }
                            //female
                            else
                            {
                                if($weight<=3.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=4.2)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=4.9) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=7.0) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }


                            }
                        }

                        //3-month
                        else if($row["baby_age_in_months"]==3)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=3.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=4.2)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=4.9) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=7.9) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }

                            }
                            //female
                            else
                            {
                                if($weight<=3.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=4.2)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=4.9) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=7.9) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //4-month
                        else if($row["baby_age_in_months"]==4)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=4.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=5.0)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=5.6) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=9.0) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=4.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=5.0)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=5.6) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=9.0) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //5-month
                        else if($row["baby_age_in_months"]==5)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=5.3)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=6.0)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=6.7) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=9.3) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=5.3)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=6.0)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=6.7) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=9.3) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //6-month######
                        else if($row["baby_age_in_months"]==6)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=5.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=6.7)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=7.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=9.8) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=5.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=6.7)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=7.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=9.8) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //7-month######
                        else if($row["baby_age_in_months"]==7)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=6.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=6.9)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=7.4) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=10.3) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=6.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=6.9)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=7.4) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=10.3) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //8-month######
                        else if($row["baby_age_in_months"]==8)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=6.2)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=7.1)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=7.7) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=10.7) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=6.2)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=7.1)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=7.7) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=10.7) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //9-month######
                        else if($row["baby_age_in_months"]==9)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=6.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=7.4)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=8.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=11.0) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=6.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=7.4)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=8.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=11.0) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //10-month######
                        else if($row["baby_age_in_months"]==10)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=6.6)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=7.6)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=8.2) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=11.3) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=6.6)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=7.6)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=8.2) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=11.3) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //11-month######
                        else if($row["baby_age_in_months"]==11)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=6.8)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=7.8)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=8.4) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=11.7) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=6.8)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=7.8)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=8.4) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=11.7) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //12-month######
                        else if($row["baby_age_in_months"]==12)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=7.9)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=8.6) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=12.0) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=7.9)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=8.6) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=12.0) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //13-month######
                        else if($row["baby_age_in_months"]==13)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.15)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=8.1)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=8.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=12.3) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.15)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=8.1)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=8.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=12.3) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //14-month######
                        else if($row["baby_age_in_months"]==14)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.3)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=8.3)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=9.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=12.6) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.3)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=8.3)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=9.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=12.6) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //15-month######
                        else if($row["baby_age_in_months"]==15)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.45)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=8.4)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=9.2) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=12.9) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.45)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=8.4)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=9.2) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=12.9) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //16-month######
                        else if($row["baby_age_in_months"]==16)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.6)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=8.6)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=9.4) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=13.1) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.6)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=8.6)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=9.4) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=13.1) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //17-month######
                        else if($row["baby_age_in_months"]==17)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=8.8)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=9.6) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=13.4) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=8.8)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=9.6) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=13.4) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //18-month######
                        else if($row["baby_age_in_months"]==18)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.85)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=8.9)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=9.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=13.7) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.85)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=8.9)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=9.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=13.7) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //19-month######
                        else if($row["baby_age_in_months"]==19)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=9.1)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=10.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=13.9) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=9.1)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=10.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=13.9) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //20-month######
                        else if($row["baby_age_in_months"]==20)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.1)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=9.2)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=10.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=14.2) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.1)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=9.2)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=10.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=14.2) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //21-month######
                        else if($row["baby_age_in_months"]==21)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.25)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=9.4)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=10.3) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=14.5) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.25)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=9.4)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=10.3) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=14.5) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //22-month######
                        else if($row["baby_age_in_months"]==22)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=9.5)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=10.5) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=14.7) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=9.5)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=10.5) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=14.7) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //23-month######
                        else if($row["baby_age_in_months"]==23)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.5)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=9.6)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=10.6) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=15.0) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.5)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=9.6)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=10.6) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=15.0) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //24-month######
                        else if($row["baby_age_in_months"]==24)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.6)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=9.8)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=10.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=15.2) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.6)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=9.8)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=10.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=15.2) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //25-month######
                        else if($row["baby_age_in_months"]==25)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.8)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=10.0)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=11.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=15.5) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.8)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=10.0)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=11.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=15.5) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //26-month######
                        else if($row["baby_age_in_months"]==26)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.9)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=10.1)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=11.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=15.8) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.9)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=10.1)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=11.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=15.8) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //27-month######
                        else if($row["baby_age_in_months"]==27)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=10.2)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=11.3) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=16.1) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=10.2)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=11.3) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=16.1) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //28-month######
                        else if($row["baby_age_in_months"]==28)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.1)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=10.4)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=11.5) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=16.3) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.1)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=10.4)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=11.5) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=16.3) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //29-month######
                        else if($row["baby_age_in_months"]==29)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.3)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=10.5)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=11.6) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=16.6) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.3)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=10.5)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=11.6) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=16.6) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //30-month######
                        else if($row["baby_age_in_months"]==30)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=10.6)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=11.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=16.8) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=10.6)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=11.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=16.8) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //31-month######
                        else if($row["baby_age_in_months"]==31)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.5)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=10.8)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=12.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=17.1) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.5)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=10.8)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=12.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=17.1) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //32-month######
                        else if($row["baby_age_in_months"]==32)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.6)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=10.9)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=12.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=17.3) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.6)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=10.9)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=12.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=17.3) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //33-month######
                        else if($row["baby_age_in_months"]==33)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=11.0)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=12.2) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=17.6) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=11.0)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=12.2) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=17.6) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //34-month######
                        else if($row["baby_age_in_months"]==34)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.8)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=11.1)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=12.4) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=17.8) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.8)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=11.1)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=12.4) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=17.8) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //35-month######
                        else if($row["baby_age_in_months"]==35)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.9)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=11.2)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=12.5) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=18.1) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.9)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=11.2)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=12.5) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=18.1) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //36-month######
                        else if($row["baby_age_in_months"]==36)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=11.3)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=12.7) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=18.3) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=11.3)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=12.7) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=18.3) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //37-month######
                        else if($row["baby_age_in_months"]==37)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.1)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=11.4)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=12.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=18.6) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.1)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=11.4)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=12.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=18.6) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //38-month######
                        else if($row["baby_age_in_months"]==38)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.2)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=11.5)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=13.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=18.8) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.2)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=11.5)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=13.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=18.8) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //39-month######
                        else if($row["baby_age_in_months"]==39)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.3)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=11.6)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=13.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=19.0) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.3)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=11.6)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=13.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=19.0) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //40-month######
                        else if($row["baby_age_in_months"]==40)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=11.7)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=13.3) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=19.3) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=11.7)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=13.3) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=19.3) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //41-month######
                        else if($row["baby_age_in_months"]==41)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.5)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=11.8)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=13.4) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=19.5) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.5)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=11.8)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=13.4) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=19.5) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //42-month######
                        else if($row["baby_age_in_months"]==42)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.6)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=12.0)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=13.5) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=19.7) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.6)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=12.0)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=13.5) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=19.7) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //43-month######
                        else if($row["baby_age_in_months"]==43)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=12.1)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=13.7) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=20.0) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=12.1)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=13.7) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=20.0) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //44-month######
                        else if($row["baby_age_in_months"]==44)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.8)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=12.2)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=13.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=20.2) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.8)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=12.2)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=13.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=20.2) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //45-month######
                        else if($row["baby_age_in_months"]==45)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.9)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=12.3)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=14.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=20.4) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.9)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=12.3)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=14.0) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=20.4) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //46-month######
                        else if($row["baby_age_in_months"]==46)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=12.4)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=14.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=20.7) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=12.4)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=14.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=20.7) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //47-month######
                        else if($row["baby_age_in_months"]==47)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.1)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=12.6)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=14.3) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=20.9) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.1)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=12.6)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=14.3) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=20.9) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //48-month######
                        else if($row["baby_age_in_months"]==48)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.2)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=12.7)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=14.4) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=21.2) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.2)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=12.7)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=14.4) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=21.2) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //49-month######
                        else if($row["baby_age_in_months"]==49)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.3)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=12.8)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=14.5) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=21.4) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.3)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=12.8)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=14.5) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=21.4) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //50-month######
                        else if($row["baby_age_in_months"]==50)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=12.9)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=14.7) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=21.7) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=12.9)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=14.7) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=21.7) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //51-month######
                        else if($row["baby_age_in_months"]==51)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.5)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=13.0)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=14.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=21.9) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.5)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=13.0)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=14.8) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=21.9) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //52-month######
                        else if($row["baby_age_in_months"]==52)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.6)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=13.1)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=14.9) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=22.2) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.6)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=13.1)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=14.9) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=22.2) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //53-month######
                        else if($row["baby_age_in_months"]==53)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=13.2)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=15.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=22.4) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.7)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=13.2)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=15.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=22.4) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //54-month######
                        else if($row["baby_age_in_months"]==54)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.8)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=13.3)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=15.2) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=22.6) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.8)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=13.3)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=15.2) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=22.6) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //55-month######
                        else if($row["baby_age_in_months"]==55)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.9)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=13.4)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=15.3) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=22.9) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.9)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=13.4)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=15.3) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=22.9) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //56-month######
                        else if($row["baby_age_in_months"]==56)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=12.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=13.6)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=15.5) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=23.1) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=12.0)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=13.6)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=15.5) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=23.1) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //57-month######
                        else if($row["baby_age_in_months"]==57)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=12.1)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=13.7)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=15.6) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=23.4) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=12.1)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=13.7)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=15.6) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=23.4) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //58-month######
                        else if($row["baby_age_in_months"]==58)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=12.2)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=13.8)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=15.7) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=23.6) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=12.2)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=13.8)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=15.7) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=23.6) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //59-month######
                        else if($row["baby_age_in_months"]==59)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=12.3)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=13.9)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=15.9) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=23.9) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=12.3)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=13.9)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=15.9) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=23.9) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }
                        //60-month######
                        else if($row["baby_age_in_months"]==60)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=12.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $a++;

                                }
                                else if($weight<=14.0)
                                {
                                    echo 'අඩු බර';
                                    $b++;
                                }
                                else if($weight<=16.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $c++;
                                }
                                else if($weight<=24.1) 
                                {
                                    echo 'නියමිත බර';
                                    $d++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=12.4)
                                {
                                    echo 'උග්‍ර අඩු බර';
                                    $aa++;

                                }
                                else if($weight<=14.0)
                                {
                                    echo 'අඩු බර';
                                    $bb++;
                                }
                                else if($weight<=16.1) 
                                {
                                    echo 'මද බර අඩු';
                                    $cc++;
                                }
                                else if($weight<=24.1) 
                                {
                                    echo 'නියමිත බර';
                                    $dd++;
                                }
                                else
                                {
                                    echo 'අධිබර';
                                    $ee++;
                                }
                            }
                        }

                        else
                        {
                            echo 'error';

                        }
                        
                        echo        '</td>'; // end of weight catogory
                        echo        "<td>".$row['weight']." | "; // height category will print in below if-else statements
                            

                        //height

                        //0-month
                        if($row["baby_age_in_months"]==0) 
                        {
                            //male category
                            if($gender=='M')
                            {

                                if($height<=46)
                                {
                                    echo 'මිටි බව';
                                    $ha++;										
                                }
                                else if($height<=48.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }  
                            }

                            //female category
                            else
                                {
                                if($height<=46)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=48.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }

                            }
                        }

                        //1 month
                        else if($row["baby_age_in_months"]==1)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=50.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=53.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=50.5)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=53.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }

                        //2 month############
                        else if($row["baby_age_in_months"]==2)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=54.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=56.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=54.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=56.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //3 month############
                        else if($row["baby_age_in_months"]==3)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=57.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=59.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=57.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=59.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //4 month############
                        else if($row["baby_age_in_months"]==4)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=59.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=61.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=59.)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=61.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //5 month############
                        else if($row["baby_age_in_months"]==5)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=61.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=63.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=61.5)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=63.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //6 month############
                        else if($row["baby_age_in_months"]==6)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=63.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=65.3)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=63.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=65.3)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //7 month############
                        else if($row["baby_age_in_months"]==7)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=64.7)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=66.8)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=64.7)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=66.8)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //8 month############
                        else if($row["baby_age_in_months"]==8)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=66.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=68.2)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=66.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=68.2)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //9 month############
                        else if($row["baby_age_in_months"]==9)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=67.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=69.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=67.5)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=69.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //10 month############
                        else if($row["baby_age_in_months"]==10)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=68.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=71.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=68.5)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=71.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //11 month############
                        else if($row["baby_age_in_months"]==11)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=70.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=72.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=70.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=72.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //12 month############
                        else if($row["baby_age_in_months"]==12)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=71.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=73.4)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=71.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=73.4)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //13 month############
                        else if($row["baby_age_in_months"]==13)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=72.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=74.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=72.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=74.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //14 month############
                        else if($row["baby_age_in_months"]==14)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=73.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=75.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=73.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=75.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //15 month############
                        else if($row["baby_age_in_months"]==15)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=74.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=76.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=74.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=76.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //16 month############
                        else if($row["baby_age_in_months"]==16)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=75)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=77.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=75.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=77.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //17 month############
                        else if($row["baby_age_in_months"]==17)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=76.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=78.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=76.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=78.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //18 month############
                        else if($row["baby_age_in_months"]==18)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=77.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=79.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=77.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=79.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //19 month############
                        else if($row["baby_age_in_months"]==19)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=77.9)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=80.3)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=77.9)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=80.3)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //20 month############
                        else if($row["baby_age_in_months"]==20)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=78.6)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=81.2)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=78.6)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=81.2)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //21 month############
                        else if($row["baby_age_in_months"]==21)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=79.4)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=82.2)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=79.4)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=82.2)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //22 month############
                        else if($row["baby_age_in_months"]==22)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=80.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=83.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=80.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=83.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //23 month############
                        else if($row["baby_age_in_months"]==23)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=80.8)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=83.9)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=80.8)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=83.9)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //24 month############
                        else if($row["baby_age_in_months"]==24)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=81.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=84.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=81.5)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=84.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //25 month############
                        else if($row["baby_age_in_months"]==25)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=82.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=85.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=82.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=85.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //26 month############
                        else if($row["baby_age_in_months"]==26)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=82.3)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=85.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=82.3)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=85.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //27 month############
                        else if($row["baby_age_in_months"]==27)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=82.9)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=86.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=82.9)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=86.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //28 month############
                        else if($row["baby_age_in_months"]==28)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=83.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=86.7)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=83.5)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=86.7)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //29 month############
                        else if($row["baby_age_in_months"]==29)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=84.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=87.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=84.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=87.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //30 month############
                        else if($row["baby_age_in_months"]==30)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=84.8)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=87.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=84.8)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=88.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //31 month############
                        else if($row["baby_age_in_months"]==31)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=85.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=89.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=85.5)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=89.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //32 month############
                        else if($row["baby_age_in_months"]==32)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=86.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=89.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=86.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=89.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //33 month############
                        else if($row["baby_age_in_months"]==33)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=86.7)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=90.3)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=86.7)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=90.3)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //34 month############
                        else if($row["baby_age_in_months"]==34)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=87.4)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=91.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=87.4)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=91.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //35 month############
                        else if($row["baby_age_in_months"]==35)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=88.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=91.6)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=88.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=91.6)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //36 month############
                        else if($row["baby_age_in_months"]==36)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=88.6)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=92.4)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=88.6)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=92.4)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //37 month############
                        else if($row["baby_age_in_months"]==37)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=89.2)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=93.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=89.2)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=93.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //38 month############
                        else if($row["baby_age_in_months"]==38)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=89.7)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=93.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=89.7)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=93.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //39 month############
                        else if($row["baby_age_in_months"]==39)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=90.2)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=94.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=90.2)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=94.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //40 month############
                        else if($row["baby_age_in_months"]==40)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=90.8)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=94.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=90.2)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=94.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //41 month############
                        else if($row["baby_age_in_months"]==41)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=91.3)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=95.2)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=91.3)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=95.2)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //42 month############
                        else if($row["baby_age_in_months"]==42)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=91.9)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=95.8)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=91.9)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=95.8)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //43 month############
                        else if($row["baby_age_in_months"]==43)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=92.3)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=96.3)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=92.3)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=96.3)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //44 month############
                        else if($row["baby_age_in_months"]==44)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=92.8)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=97.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=92.8)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=97.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //45 month############
                        else if($row["baby_age_in_months"]==45)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=93.4)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=97.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=93.4)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=97.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //46 month############
                        else if($row["baby_age_in_months"]==46)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=94.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=98.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=94.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=98.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //47 month############
                        else if($row["baby_age_in_months"]==47)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=94.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=98.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=94.5)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=98.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //48 month############
                        else if($row["baby_age_in_months"]==48)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=95.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=99.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=95.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=99.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //49 month############
                        else if($row["baby_age_in_months"]==49)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=95.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=99.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=95.5)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=99.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //50 month############
                        else if($row["baby_age_in_months"]==50)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=96.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=100.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=96.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=100.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //51 month############
                        else if($row["baby_age_in_months"]==51)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=96.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=100.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=96.5)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=100.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //52 month############
                        else if($row["baby_age_in_months"]==52)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=97.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=101.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=97.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=101.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //53 month############
                        else if($row["baby_age_in_months"]==53)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=97.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=101.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=97.5)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=101.5)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //54 month############
                        else if($row["baby_age_in_months"]==54)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=98.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=102.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=98.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=102.0)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //55 month############
                        else if($row["baby_age_in_months"]==55)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=98.5)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=102.6)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=98.5)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=102.6)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //56 month############
                        else if($row["baby_age_in_months"]==56)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=99.0)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=103.2)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=99.0)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=103.2)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //57 month############
                        else if($row["baby_age_in_months"]==57)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=99.4)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=103.8)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=99.4)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=103.8)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //58 month############
                        else if($row["baby_age_in_months"]==58)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=99.9)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=104.4)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=99.9)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=104.4)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //59 month############
                        else if($row["baby_age_in_months"]==59)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=100.2)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=104.8)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=100.2)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=104.8)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        //60 month############
                        else if($row["baby_age_in_months"]==60)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=100.6)
                                {
                                    echo 'මිටි බව';
                                    $ha++;

                                }
                                else if($height<=105.3)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hb++;
                                }
                                else 
                                {
                                    echo 'නියමිත උස';
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=100.6)
                                {
                                    echo 'මිටි බව';
                                    $haa++;

                                }
                                else if($height<=105.3)
                                {
                                    echo 'මිටි බවට අවදානම';
                                    $hbb++;
                                }
                                else
                                {
                                    echo 'නියමිත උස';
                                    $hcc++;
                                }
                            }
                        }
                        else
                        {
                            echo "error";
                        }
                        
                        echo        "</td>";// end of weight catogory
                        echo    "</tr>"; // end of table data row
                    }
                    
                    
                    echo    "</tbody>"; //end of table body
                    echo "</table>"; //end of table-0
                        
                    echo "</div>"; // end of card-body
                    
                    ?>
                    
                    </div> 
					<!-- end of baby data card -->
					
				    <div class="row">
				        <div class="col">
				            <button type="button" class="btn change-btn btn-sm download float-md-right" id="download1"><b>බාගත කරන්න</b></button>
                        </div>
					</div>
					
					<div class="row" id="pdf-area2">
                        
                            <!-- 1st card column-->
							<div class="col-md-6 col-lg-3">
                                <div class="card card-baby-data2">
                                    <div class="card-header"> <h5>බර | පුරුෂ</h5></div>
                                    <div class="card-body">
                                        <table class="table"> <!-- start of 1st table-->
                                            <tbody>
                                               
                                    <?php
                                    if ($a>0) { // check is there is any value for උග්‍ර අඩු බර range 
                                        echo    "<tr class='danger-value'>"; // if exist add danger-value class
                                        echo        "<td scope='row'>උග්‍ර අඩු බර</td>";
                                        echo        "<td>".$a."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>"; // else not add a class
                                        echo        "<td scope='row'>උග්‍ර අඩු බර</td>";
                                        echo        "<td>".$a."</td>";
                                        echo    "</tr>";
                                    }
                                    ?>   
                                    
                                    <?php
                                    if ($b>0) { // check is there is any value for අඩු බර range
                                        echo    "<tr class='danger-value'>"; // if exist add danger-value or any other color class
                                        echo        "<td scope='row'>අඩු බර</td>";
                                        echo        "<td>".$b."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>"; // else not add a class
                                        echo        "<td scope='row'>අඩු බර</td>";
                                        echo        "<td>".$b."</td>";
                                        echo    "</tr>";
                                    }
                                    ?> 
                                                 
                                                <tr> <!-- not add a color to මද බර අඩු range -->
                                                    <td scope="row">මද බර අඩු</td>
                                                    <td><?php echo $c; ?></td>
                                                </tr>   
                                    
                                    <?php
                                    if ($d>0) { // check is there is any value for නියමිත බර range
                                        echo    "<tr class='normal-value'>"; // if exist add normal-value class
                                        echo        "<td scope='row'>නියමිත බර</td>";
                                        echo        "<td>".$d."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>"; // else not add a class
                                        echo        "<td scope='row'>නියමිත බර</td>";
                                        echo        "<td>".$d."</td>";
                                        echo    "</tr>";
                                    }
                                    ?>
                                    
                                    <?php
                                    if ($e>0) { // check is there is any value for අධිබර range
                                        echo    "<tr class='danger-value'>"; // if exist add danger-value or any other color class
                                        echo        "<td scope='row'>අධිබර</td>";
                                        echo        "<td>".$e."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>"; // else not add a class
                                        echo        "<td scope='row'>අධිබර</td>";
                                        echo        "<td>".$e."</td>";
                                        echo    "</tr>";
                                    }
                                    ?>
                                    
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
							</div>
					
					        <!-- 2nd card column-->
							<div class="col-md-6 col-lg-3">
                                <div class="card card-baby-data2">
                                    <div class="card-header"> <h5>බර | ගැහැණු</h5></div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                               
                                    <?php
                                    if ($aa>0) {
                                        echo    "<tr class='danger-value'>";
                                        echo        "<td scope='row'>උග්‍ර අඩු බර</td>";
                                        echo        "<td>".$aa."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>";
                                        echo        "<td scope='row'>උග්‍ර අඩු බර</td>";
                                        echo        "<td>".$aa."</td>";
                                        echo    "</tr>";
                                    }
                                    ?>   
                                    
                                    <?php
                                    if ($bb>0) {
                                        echo    "<tr class='danger-value'>";
                                        echo        "<td scope='row'>අඩු බර</td>";
                                        echo        "<td>".$bb."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>";
                                        echo        "<td scope='row'>අඩු බර</td>";
                                        echo        "<td>".$bb."</td>";
                                        echo    "</tr>";
                                    }
                                    ?> 
                                                 
                                                <tr>
                                                    <td scope="row">මද බර අඩු</td>
                                                    <td><?php echo $cc; ?></td>
                                                </tr>   
                                    
                                    <?php
                                    if ($dd>0) {
                                        echo    "<tr class='normal-value'>";
                                        echo        "<td scope='row'>නියමිත බර</td>";
                                        echo        "<td>".$dd."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>";
                                        echo        "<td scope='row'>නියමිත බර</td>";
                                        echo        "<td>".$dd."</td>";
                                        echo    "</tr>";
                                    }
                                    ?>
                                    
                                    <?php
                                    if ($ee>0) {
                                        echo    "<tr class='danger-value'>";
                                        echo        "<td scope='row'>අධිබර</td>";
                                        echo        "<td>".$ee."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>";
                                        echo        "<td scope='row'>අධිබර</td>";
                                        echo        "<td>".$ee."</td>";
                                        echo    "</tr>";
                                    }
                                    ?>
                                    
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
							</div>
	                        
	                        <!-- 3rd card column-->
							<div class="col-md-6 col-lg-3">
                                <div class="card card-baby-data2">
                                    <div class="card-header"> <h5>උස | පිරිමි</h5></div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                    
                                    <?php
                                    if ($ha>0) {
                                        echo    "<tr class='danger-value'>";
                                        echo        "<td scope='row'>මිටි බව</td>";
                                        echo        "<td>".$ha."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>";
                                        echo        "<td scope='row'>මිටි බව</td>";
                                        echo        "<td>".$ha."</td>";
                                        echo    "</tr>";
                                    }
                                    ?>
                                    
                                    <?php
                                    if ($hb>0) {
                                        echo    "<tr class='danger-value'>";
                                        echo        "<td scope='row'>මිටි බවට අවදානම</td>";
                                        echo        "<td>".$hb."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>";
                                        echo        "<td scope='row'>මිටි බවට අවදානම</td>";
                                        echo        "<td>".$hb."</td>";
                                        echo    "</tr>";
                                    }
                                    ?>
                                    
                                    <?php
                                    if ($hc>0) {
                                        echo    "<tr class='normal-value'>";
                                        echo        "<td scope='row'>නියමිත උස</td>";
                                        echo        "<td>".$hc."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>";
                                        echo        "<td scope='row'>නියමිත උස</td>";
                                        echo        "<td>".$hc."</td>";
                                        echo    "</tr>";
                                    }
                                    ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                            </div>
                            
                            <!-- 4th card column-->
                            <div class="col-md-6 col-lg-3">
                                <div class="card card-baby-data2">
                                    <div class="card-header"> <h5>උස | ගැහැණු</h5></div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                    
                                    <?php
                                    if ($haa>0) {
                                        echo    "<tr class='danger-value'>";
                                        echo        "<td scope='row'>මිටි බව</td>";
                                        echo        "<td>".$haa."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>";
                                        echo        "<td scope='row'>මිටි බව</td>";
                                        echo        "<td>".$haa."</td>";
                                        echo    "</tr>";
                                    }
                                    ?>
                                    
                                    <?php
                                    if ($hbb>0) {
                                        echo    "<tr class='danger-value'>";
                                        echo        "<td scope='row'>මිටි බවට අවදානම</td>";
                                        echo        "<td>".$hbb."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>";
                                        echo        "<td scope='row'>මිටි බවට අවදානම</td>";
                                        echo        "<td>".$hbb."</td>";
                                        echo    "</tr>";
                                    }
                                    ?>
                                    
                                    <?php
                                    if ($hcc>0) {
                                        echo    "<tr class='normal-value'>";
                                        echo        "<td scope='row'>නියමිත උස</td>";
                                        echo        "<td>".$hcc."</td>";
                                        echo    "</tr>";
                                    }
                                    else {
                                        echo    "<tr>";
                                        echo        "<td scope='row'>නියමිත උස</td>";
                                        echo        "<td>".$hcc."</td>";
                                        echo    "</tr>";
                                    }
                                    ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                            </div>
				
					</div>
				    <!--end row-->
                    
                    <button type="button" class="btn change-btn btn-sm download float-md-right mb-5" id="download2"><b>බාගත කරන්න</b></button>

                    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

        
                    <div class="mb-5" id="chart_div"></div>

                </div>
				<!-- end of data-container -->

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

    <script type="text/javascript" src="/assets/js/html2canvas.min.js"></script>
    <script type="text/javascript" src="/assets/js/jspdf.min.js"></script>
    
    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.mm-chart').addClass('active');
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

        $.ajax({
            url: '/data/mid-chart-data.php',
            method: "GET",
        }).done(function (data) {

            chartData=JSON.parse(data);
            //console.log(chartData);
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawVisualization);

            function drawVisualization() {
                // Some raw data (not necessarily accurate)
                var data = google.visualization.arrayToDataTable([
                ['Month', 'උග්‍ර අඩු බර', 'අඩු බර','මද බර අඩු','නියමිත බර','අධිබර'],
                chartData.data.one,
                chartData.data.two,
                chartData.data.three,
                chartData.data.four,
                chartData.data.five,
                chartData.data.six,
                ]);

                var options = {
                title : 'මාස 6කට අදාලව දරුවන්ග‌ේ බර ප්‍රස්ථාරය',
                vAxis: {title: 'දරුවන් ගණන'},
                hAxis: {title: 'මාසය'},
                seriesType: 'bars',
                series: {5: {type: 'line'}}        };

                var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                chart.draw(data, options);
                }

        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("data Failed");
        });


    </script>
    
    <!-- canvas to pdf -->
    <script>
        
        $("#download1").click(function() {
            
            html2canvas(document.getElementById('pdf-area1')).then(function (canvas) {
                var img = canvas.toDataURL("image/png");
                var doc = new jsPDF({
                    orientation: 'landscape'
                });
                
                var width = (canvas.width * 30) / 240;
                var height = (canvas.height * 30) / 240;
                
                doc.addImage(img, 'JPEG', 5, 5, width, height);
                //doc.output('dataurlnewwindow');     //opens the data uri in new window
                doc.save('test.pdf');        
            });
  
        });
        
        $("#download2").click(function() {
            
            html2canvas(document.getElementById('pdf-area2')).then(function (canvas) {
                var img = canvas.toDataURL("image/png");
                var doc = new jsPDF({
                    orientation: 'landscape'
                });
                
                var width = (canvas.width * 30) / 240;
                var height = (canvas.height * 30) / 240;
                
                doc.addImage(img, 'JPEG', 5, 5, width, height);
                //doc.output('dataurlnewwindow');     //opens the data uri in new window
                doc.save('test2.pdf');        
            });
  
        });
    
    </script>

</body>

</html>


<?php mysqli_close($conn); ?>