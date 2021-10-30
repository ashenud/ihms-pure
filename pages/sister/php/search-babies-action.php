<?php

include ( '../../../php/basic/connection.php' );

echo "<style>
body{
    background-color : pink;
    }

</style> ";

//baby info
if(isset($_POST['submit1']))
{
    $result1=mysqli_query($conn,"SELECT*FROM baby_register where baby_id='$_POST[t1]'");
    echo "<h2><u>BABY'S INFORMATION</u></h2>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "Name"; echo "</th>";
    echo "<th>"; echo "ID"; echo "</th>";
    echo "<th>"; echo "Date of Birth"; echo "</th>";
    echo "<th>"; echo "Address"; echo "</th>";

    echo "</tr>";

    while($row1=mysqli_fetch_array($result1))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row1["baby_name"]; echo "</td>";
        echo "<td>"; echo $row1["baby_id"]; echo "</td>";
        echo "<td>"; echo $row1["baby_dob"]; echo "</td>";
        echo "<td>"; echo $row1["address"]; echo "</td>";
        echo "</tr>";

    }

    echo "</table>";

}

//birth deatils

if(isset($_POST['submit1']))
{
    $result2=mysqli_query($conn,"SELECT*FROM birth_details where baby_id='$_POST[t1]'");
    echo "<h3><u>Birth Details</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "Birth Weight"; echo "</th>";
    echo "<th>"; echo "Birth Length"; echo "</th>";
    echo "<th>"; echo "Circumference of Head"; echo "</th>";
    echo "<th>"; echo "Eye Contact"; echo "</th>";
    echo "<th>"; echo "Vitamin K States"; echo "</th>";
    echo "<th>"; echo "Milk Position"; echo "</th>";
    echo "<th>"; echo "Apgar 1"; echo "</th>";
    echo "<th>"; echo "Apgar 2"; echo "</th>";
    echo "<th>"; echo "Apgar 3"; echo "</th>";
    echo "<th>"; echo "Health States"; echo "</th>";

    echo "</tr>";

    while($row2=mysqli_fetch_array($result2))
    {
       
        echo "<tr>";
        echo "<td>"; echo $row2["birth_weight"]; echo "</td>";
        echo "<td>"; echo $row2["birth_length"]; echo "</td>";
        echo "<td>"; echo $row2["circumference_of_head"]; echo "</td>";
        echo "<td>"; echo $row2["eye_contact"]; echo "</td>";
        echo "<td>"; echo $row2["vitamin_K_states"]; echo "</td>";
        echo "<td>"; echo $row2["milk_position"]; echo "</td>";
        echo "<td>"; echo $row2["apgar1"]; echo "</td>";
        echo "<td>"; echo $row2["apgar2"]; echo "</td>";
        echo "<td>"; echo $row2["apgar3"]; echo "</td>";
        echo "<td>"; echo $row2["health_states"]; echo "</td>";

        
        echo "</tr>";

    }

    echo "</table>";

}

//growth details
if(isset($_POST['submit1']))
{
    $result3=mysqli_query($conn,"SELECT*FROM growth where baby_id='$_POST[t1]'");
    echo "<h3><u>Growth Details</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "Age(in months)"; echo "</th>";
    echo "<th>"; echo "Weight"; echo "</th>";
    echo "<th>"; echo "Height"; echo "</th>";

    echo "</tr>";

    //echo "Age:<br>";
    //echo "Weight:<br>";
    //echo "Height:<br>";

    while($row3=mysqli_fetch_array($result3))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row3["baby_age_in_months"]; echo "</td>";
        echo "<td>"; echo $row3["weight"]; echo "</td>";
        echo "<td>"; echo $row3["height"]; echo "</td>";

        echo "</tr>";
        //echo $row3["baby_age"]."<br>";
        //echo $row3["weight"]."<br>";
        //echo $row3["height"]."<br>";
    }

    echo "</table>";

}


//VACCINATION DETAILS

// vaccination birth
if(isset($_POST['submit1']))
{
    $result4=mysqli_query($conn,"SELECT*FROM vac_birth where baby_id='$_POST[t1]'");

    echo "<h3><u>Vaccination(birth)</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "BCG_1"; echo "</th>";
    echo "<th>"; echo "BCG_2"; echo "</th>";
    echo "<th>"; echo "Date Given"; echo "</th>";
    echo "<th>"; echo "Batch No"; echo "</th>";
    echo "<th>"; echo "Scar"; echo "</th>";
    echo "<th>"; echo "Side Effects"; echo "</th>";

    echo "</tr>";

    while($row4=mysqli_fetch_array($result4))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row4["BCG_1"]; echo "</td>";
        echo "<td>"; echo $row4["BCG_2"]; echo "</td>";
        echo "<td>"; echo $row4["date_given"]; echo "</td>";
        echo "<td>"; echo $row4["batch_no"]; echo "</td>";
        echo "<td>"; echo $row4["scar"]; echo "</td>";
        echo "<td>"; echo $row4["side_effects"]; echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

}


//vac 2 months
if(isset($_POST['submit1']))

{
    $result5=mysqli_query($conn,"SELECT*FROM vac_2months where baby_id='$_POST[t1]'");

    echo "<h3><u>Vaccination(2 months)</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "DPT_1"; echo "</th>";
    echo "<th>"; echo "OPV_1"; echo "</th>";
    echo "<th>"; echo "HEPATITIS_B1"; echo "</th>";
    echo "<th>"; echo "Date Given"; echo "</th>";
    echo "<th>"; echo "Batch No"; echo "</th>";
    echo "<th>"; echo "Side Effects"; echo "</th>";

    echo "</tr>";

    while($row5=mysqli_fetch_array($result5))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row5["DPT_1"]; echo "</td>";
        echo "<td>"; echo $row5["OPV_1"]; echo "</td>";
        echo "<td>"; echo $row5["hepatitis_B1"]; echo "</td>";
        echo "<td>"; echo $row5["date_given"]; echo "</td>";
        echo "<td>"; echo $row5["batch_no"]; echo "</td>";
        echo "<td>"; echo $row5["side_effects"]; echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

}

//vac 4 months

if(isset($_POST['submit1']))

{
    $result6=mysqli_query($conn,"SELECT*FROM vac_4months where baby_id='$_POST[t1]'");

    echo "<h3><u>Vaccination(4 months)</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "DPT_2"; echo "</th>";
    echo "<th>"; echo "OPV_2"; echo "</th>";
    echo "<th>"; echo "HEPATITIS_B2"; echo "</th>";
    echo "<th>"; echo "Date Given"; echo "</th>";
    echo "<th>"; echo "Batch No"; echo "</th>";
    echo "<th>"; echo "Side Effects"; echo "</th>";

    echo "</tr>";

    while($row6=mysqli_fetch_array($result6))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row6["DPT_2"]; echo "</td>";
        echo "<td>"; echo $row6["OPV_2"]; echo "</td>";
        echo "<td>"; echo $row6["hepatitis_B2"]; echo "</td>";
        echo "<td>"; echo $row6["date_given"]; echo "</td>";
        echo "<td>"; echo $row6["batch_no"]; echo "</td>";
        echo "<td>"; echo $row6["side_effects"]; echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

}

//vac 6 month

if(isset($_POST['submit1']))

{
    $result7=mysqli_query($conn,"SELECT*FROM vac_6months where baby_id='$_POST[t1]'");

    echo "<h3><u>Vaccination(6 months)</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "DPT_3"; echo "</th>";
    echo "<th>"; echo "OPV_3"; echo "</th>";
    echo "<th>"; echo "HEPATITIS_B3"; echo "</th>";
    echo "<th>"; echo "Date Given"; echo "</th>";
    echo "<th>"; echo "Batch No"; echo "</th>";
    echo "<th>"; echo "Scar"; echo "</th>";
    echo "<th>"; echo "Side Effects"; echo "</th>";

    echo "</tr>";

    while($row7=mysqli_fetch_array($result7))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row7["DPT_3"]; echo "</td>";
        echo "<td>"; echo $row7["OPV_3"]; echo "</td>";
        echo "<td>"; echo $row7["hepatitis_B3"]; echo "</td>";
        echo "<td>"; echo $row7["date_given"]; echo "</td>";
        echo "<td>"; echo $row7["batch_no"]; echo "</td>";
        echo "<td>"; echo $row7["scar"]; echo "</td>";
        echo "<td>"; echo $row7["side_effects"]; echo "</td>";  
        
        echo "</tr>";
    }

    echo "</table>";

}

//vac 9 months
if(isset($_POST['submit1']))

{
    $result8=mysqli_query($conn,"SELECT*FROM vac_9months where baby_id='$_POST[t1]'");

    echo "<h3><u>Vaccination(9 months)</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "Measles"; echo "</th>";
    echo "<th>"; echo "Vitamin A"; echo "</th>";
    echo "<th>"; echo "Date Given"; echo "</th>";
    echo "<th>"; echo "Batch No"; echo "</th>";
    echo "<th>"; echo "Side Effects"; echo "</th>";

    echo "</tr>";

    while($row8=mysqli_fetch_array($result8))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row7["measles"]; echo "</td>";
        echo "<td>"; echo $row7["vitamin_A"]; echo "</td>";
        echo "<td>"; echo $row7["date_given"]; echo "</td>";
        echo "<td>"; echo $row7["batch_no"]; echo "</td>";
        echo "<td>"; echo $row7["side_effects"]; echo "</td>";  
        
        echo "</tr>";
    }

    echo "</table>";

}



//vac 18 months
if(isset($_POST['submit1']))

{
    $result10=mysqli_query($conn,"SELECT*FROM vac_18months where baby_id='$_POST[t1]'");

    echo "<h3><u>Vaccination(18 months)</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "DPT_4"; echo "</th>";
    echo "<th>"; echo "OPV_4"; echo "</th>";
    echo "<th>"; echo "Vitamin_A"; echo "</th>";
    echo "<th>"; echo "Date Given"; echo "</th>";
    echo "<th>"; echo "Batch No"; echo "</th>";
    echo "<th>"; echo "Side Effects"; echo "</th>";
    
     echo "</tr>";

    while($row10=mysqli_fetch_array($result10))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row10["DPT_4"]; echo "</td>";
        echo "<td>"; echo $row10["OPV_4"]; echo "</td>";
        echo "<td>"; echo $row10["Vitamin_A"]; echo "</td>";
        echo "<td>"; echo $row10["date_given"]; echo "</td>";  
        echo "<td>"; echo $row10["batch_no"]; echo "</td>";
        echo "<td>"; echo $row10["side_effects"]; echo "</td>";
        
        echo "</tr>";
    }

    echo "</table>";

}

//vac 3 years
if(isset($_POST['submit1']))

{
    $result11=mysqli_query($conn,"SELECT*FROM vac_3years where baby_id='$_POST[t1]'");

    echo "<h3><u>Vaccination(3 years)</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "Measles & Rubella"; echo "</th>";
    echo "<th>"; echo "Vitamin A"; echo "</th>";
    echo "<th>"; echo "Date Given"; echo "</th>";
    echo "<th>"; echo "Batch No"; echo "</th>";
    echo "<th>"; echo "Side Effects"; echo "</th>";
    
     echo "</tr>";

    while($row11=mysqli_fetch_array($result11))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row11["measles_and_rubella"]; echo "</td>";
        echo "<td>"; echo $row11["vitamin_A"]; echo "</td>";
        echo "<td>"; echo $row11["date_given"]; echo "</td>";  
        echo "<td>"; echo $row11["batch_no"]; echo "</td>";
        echo "<td>"; echo $row11["side_effects"]; echo "</td>";
        
        echo "</tr>";
    }

    echo "</table>";

}

//vac 5 years
if(isset($_POST['submit1']))

{
    $result12=mysqli_query($conn,"SELECT*FROM vac_5years where baby_id='$_POST[t1]'");

    echo "<h3><u>Vaccination(5 years)</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "DT"; echo "</th>";
    echo "<th>"; echo "OPV_5"; echo "</th>";
    echo "<th>"; echo "Date Given"; echo "</th>";
    echo "<th>"; echo "Batch No"; echo "</th>";
    echo "<th>"; echo "Side Effects"; echo "</th>";
    
     echo "</tr>";

    while($row12=mysqli_fetch_array($result12))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row12["DT"]; echo "</td>";
        echo "<td>"; echo $row12["OPV_5"]; echo "</td>";
        echo "<td>"; echo $row12["date_given"]; echo "</td>";  
        echo "<td>"; echo $row12["batch_no"]; echo "</td>";
        echo "<td>"; echo $row12["side_effects"]; echo "</td>";
        
        echo "</tr>";
    }

    echo "</table>";

}

//vac 10-14 years
if(isset($_POST['submit1']))

{
    $result13=mysqli_query($conn,"SELECT*FROM vac_10_14years where baby_id='$_POST[t1]'");

    echo "<h3><u>Vaccination(10-14 years)</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "Rubella"; echo "</th>";
    echo "<th>"; echo "aTD"; echo "</th>";
    echo "<th>"; echo "Date Given"; echo "</th>";
    echo "<th>"; echo "Batch No"; echo "</th>";
    echo "<th>"; echo "Side Effects"; echo "</th>";
    
     echo "</tr>";

    while($row13=mysqli_fetch_array($result13))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row13["rubella"]; echo "</td>";
        echo "<td>"; echo $row13["atd"]; echo "</td>";
        echo "<td>"; echo $row13["date_given"]; echo "</td>";  
        echo "<td>"; echo $row13["batch_no"]; echo "</td>";
        echo "<td>"; echo $row13["side_effects"]; echo "</td>";
        
        echo "</tr>";
    }

    echo "</table>";

}

//vac other
if(isset($_POST['submit1']))

{
    $result14=mysqli_query($conn,"SELECT*FROM vac_other where baby_id='$_POST[t1]'");

    echo "<h3><u>Vaccination(10-14 years)</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "Vaccination-1"; echo "</th>";
    echo "<th>"; echo "Vaccination-2"; echo "</th>";
    echo "<th>"; echo "Vaccination-3"; echo "</th>";
    echo "<th>"; echo "Date Given"; echo "</th>";
    echo "<th>"; echo "Batch No"; echo "</th>";
    echo "<th>"; echo "Side Effects"; echo "</th>";
    
     echo "</tr>";

    while($row14=mysqli_fetch_array($result14))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row14["vac_1"]; echo "</td>";
        echo "<td>"; echo $row14["vac_2"]; echo "</td>";
        echo "<td>"; echo $row14["vac_3"]; echo "</td>";  
        echo "<td>"; echo $row14["date_given"]; echo "</td>";
        echo "<td>"; echo $row14["batch_no"]; echo "</td>";
        echo "<td>"; echo $row14["side_effects"]; echo "</td>";
        
        echo "</tr>";
    }

    echo "</table>";

}

//vac Japanese Eencephalities
if(isset($_POST['submit1']))

{
    $result9=mysqli_query($conn,"SELECT*FROM vac_japanese_encephalities where baby_id='$_POST[t1]'");

    echo "<h3><u>Vaccination(Japanese Eencephalities)</u></h3>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo "JE_1"; echo "</th>";
    echo "<th>"; echo "JE_2"; echo "</th>";
    echo "<th>"; echo "JE_3"; echo "</th>";
    echo "<th>"; echo "JE_4"; echo "</th>";
    echo "<th>"; echo "Date Given"; echo "</th>";
    echo "<th>"; echo "Batch No"; echo "</th>";
    echo "<th>"; echo "Side Effects"; echo "</th>";
    
     echo "</tr>";

    while($row9=mysqli_fetch_array($result9))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row9["JE_1"]; echo "</td>";
        echo "<td>"; echo $row9["JE_2"]; echo "</td>";
        echo "<td>"; echo $row9["JE_3"]; echo "</td>";
        echo "<td>"; echo $row9["JE_4"]; echo "</td>";
        echo "<td>"; echo $row9["date_given"]; echo "</td>";  
        echo "<td>"; echo $row9["batch_no"]; echo "</td>";
        echo "<td>"; echo $row9["side_effects"]; echo "</td>";
        
        echo "</tr>";
    }

    echo "</table>";

}


?>