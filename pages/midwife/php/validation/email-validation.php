<?php 

include('../../../../php/basic/connection.php');

if($_REQUEST['type'] == "add"){
    $query="SELECT * FROM mother WHERE email='".$_REQUEST['email']."'";
    $result=mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        echo "email you have entered is already existed";
    }
}

?>