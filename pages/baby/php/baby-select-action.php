<?php session_start(); ?>
<?php include('../../../php/basic/connection.php'); ?>
   

<?php
    if(isset($_SESSION['serch_baby_using_nic'])) { 
        $_SESSION['baby_id']=$_POST['baby_id'];
        header('location:/baby/editable-page');
    }
    
    elseif($_SESSION['doc_serch_baby_using_nic']) { 
        $_SESSION['baby_id']=$_POST['baby_id'];
        header('location:/doctor/vac-permission');
    }
    elseif(isset($_SESSION['mother_id'])) {
        $_SESSION['baby_id']=$_POST['baby_id'];
        header('location:/baby/dashboard');
    }
    else {
        
    }
?>