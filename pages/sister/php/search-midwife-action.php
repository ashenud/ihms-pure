<?php

include ('../../../php/basic/connection.php');
mysqli_select_db($conn,"cs2019g6");

echo "<style>
body{
    background-color : lightgreen ;
    }

</style> ";



//midwife info
if(isset($_POST['submit3']))
{
        $result=mysqli_query($conn,"SELECT*FROM midwife where midwife_id='$_POST[t3]'");
        echo "<h2><u>MIDWIFE'S INFORMATION</u></h2>";
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>"; echo "ID"; echo "</th>";
        echo "<th>"; echo "Name"; echo "</th>";
        echo "<th>"; echo "Area"; echo "</th>";
        echo "<th>"; echo "password"; echo "</th>";
    
        echo "</tr>";
    
        while($row=mysqli_fetch_array($result))
        {
            
            echo "<tr>";
            echo "<td>"; echo $row1["midwife_id"]; echo "</td>";
            echo "<td>"; echo $row1["midwife_name"]; echo "</td>";
            echo "<td>"; echo $row1["midwife_area"]; echo "</td>";
            echo "<td>"; echo $row1["midwife_password"]; echo "</td>";
            echo "</tr>";
    
        }
    
        echo "</table>";
    
    }





?>