<?php 

include('../../../../php/basic/connection.php');

if($_REQUEST['type'] == "add"){
    $query="SELECT * FROM baby_register WHERE baby_id='".$_REQUEST['baby_id']."'";
    $result=mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        echo "Baby ID you have entered is already existed";
    }
}

?>