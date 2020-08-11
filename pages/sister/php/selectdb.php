<?php
include "conn.php";


if(mysqli_select_db($conn,"cs2019g6")){

   //echo "database selected.<br>";


}

else{


    echo "database not selected.<br>";

}




?>