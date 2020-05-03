<?php

if(isset($_POST['searchBabyUsingMnic'])){

    include "conn.php";
    include "selectdb.php";
    session_start();
    extract($_POST);

    $_SESSION['mother_id']=$searchUser;
    $_SESSION['serch_baby_using_nic']="Somthing";
    header("Location:../../baby/baby-select.php");
}




?>