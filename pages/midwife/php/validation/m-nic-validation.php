<?php 

include('../../../../php/basic/connection.php');

if($_REQUEST['type'] == "add"){
    $query="SELECT * FROM mother WHERE mother_nic='".$_REQUEST['m_nic']."'";
    $result=mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        echo "NIC you have entered is already existed";
    }
}

?>