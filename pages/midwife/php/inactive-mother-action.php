<?php 

include '../../../php/basic/connection.php';


if(isset($_POST['submit-mother'])) {
// get value of id that sent from address bar
$inactive_mother_id = $_POST['remove-mother'];

$query1="UPDATE user SET status='inactive' WHERE user_id='$inactive_mother_id'";
$query2="UPDATE mother SET status='inactive' WHERE mother_nic='$inactive_mother_id'";
$query3="UPDATE baby_register SET status='inactive' WHERE mother_nic='$inactive_mother_id'";
$query4="UPDATE locations SET status='inactive' WHERE mother_nic='$inactive_mother_id'";
$result1=mysqli_query($conn,$query1);
$result2=mysqli_query($conn,$query2);
$result3=mysqli_query($conn,$query3);
$result4=mysqli_query($conn,$query4);

// if successfully deleted
    
            if($result1 && $result2 && $result3 && $result4){
                echo "inactive success";
            }
            else {
                echo "inactive error baby".mysqli_error($conn);
            }
            header("Location:../mid-view-babies.php");    
}

?>