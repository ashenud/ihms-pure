<?php 

include('../../../../php/basic/connection.php');

if($_REQUEST['type'] == "add"){
    $query="SELECT * FROM mother WHERE telephone='".$_REQUEST['tp_no']."'";
    $result=mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        echo "Number you have entered is already existed";
    }
}

?>