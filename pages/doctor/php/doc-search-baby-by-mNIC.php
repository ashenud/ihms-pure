<?php session_start(); ?>
<?php include('../../../php/basic/connection.php'); ?>

<?php

if(isset($_POST['searchBabyUsingMnic'])){

    mysqli_select_db($conn,'cs2019g6');
    extract($_POST);

    $query1="SELECT * FROM mother WHERE mother_nic='{$searchUser}' AND status='active' LIMIT 1";
    $result1=mysqli_query($conn, $query1);
    if(mysqli_num_rows($result1) == 1) {
        
        $_SESSION['mother_id']=$searchUser;
        $_SESSION['doc_serch_baby_using_nic']="Somthing";
        header("Location:../../baby/baby-select.php");
        
    }
    else {
        header("Location:../doc-dashboard.php?motherNotFound=1");
    }
}




?>