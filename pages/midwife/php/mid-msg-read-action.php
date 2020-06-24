<?php

if(isset($_POST['readSubmit'])){
    include "selectdb.php";
    extract($_POST);
    session_start();
    $sql001="UPDATE midwife_message SET status='read' WHERE date='".$date."' AND time='".$time."' AND midwife_id='".$_SESSION['midwife_id']."'";
    mysqli_query($conn,$sql001);
    header("Location:/midwife/inbox");
}

if(isset($_POST['deleteSubmit'])){
    include "selectdb.php";
    extract($_POST);
    session_start();
    $sql002="DELETE FROM midwife_message WHERE midwife_message='".$messageArea."' AND date='".$date."' AND time='".$time."' AND midwife_id='".$_SESSION['midwife_id']."'";
    mysqli_query($conn,$sql002);
    header("Location:/midwife/inbox");
}


?>