<?php 

include '../../../php/basic/connection.php';



if (isset($_POST['submit-baby'])) {
// get value of id that sent from address bar
$inactive_baby_id = $_POST['remove-baby'];

// Delete data in mysql from row that has this id
mysqli_select_db($conn, 'cs2019g6');

$query2="UPDATE baby_register SET status='inactive' WHERE baby_id='$inactive_baby_id'";
$result2=mysqli_query($conn,$query2);

// if successfully deleted
    
        if($result2) {
            echo "Deleted Successfully";
        } 
        else {
            echo "Delete ERROR baby_re" .mysqli_error($conn);
        }
   
      header("Location:../mid-view-babies.php");
}
?>