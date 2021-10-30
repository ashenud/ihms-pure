<?php

include ('../../../php/basic/connection.php');

if(isset($_POST['readSubmit'])){
    extract($_POST);
    session_start();
    $sql001="UPDATE sister_message SET status='read' WHERE date='".$date."' AND time='".$time."' AND sister_id='".$_SESSION['sister_id']."'";
    mysqli_query($conn,$sql001);
    header("Location:/sister/inbox");
}

if(isset($_POST['deleteSubmit'])){
    extract($_POST);
    session_start();
    $sql002="DELETE FROM sister_message WHERE sister_message='".$messageArea."' AND date='".$date."' AND time='".$time."' AND sister_id='".$_SESSION['sister_id']."'";
    mysqli_query($conn,$sql002);
    header("Location:/sister/inbox");
}


?>