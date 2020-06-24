<?php
include "selectdb.php";
extract($_GET);
session_start();


if(isset($_GET['submitNICNo'])){
    
    unset($_SESSION['mName']);
    unset($_SESSION['addr']);
    unset($_SESSION['tel']);
    unset($_SESSION['email']);
    unset($_SESSION['GnDivision']);
    unset($_SESSION['mNic']);
    unset($_SESSION['latInput']);
    unset($_SESSION['longInput']);

    $mId=$_SESSION['midwife_id'];

    $sql1="SELECT * FROM mother WHERE mother_nic='".$NICNo."'";
    $take1=mysqli_query($conn,$sql1);
    $result1=mysqli_fetch_assoc($take1);

    $id=$result1['mother_nic'];        //mother Id
    
    if($id==""){
        header("Location:/midwife/add-babies?idError=1");
    }
    else{

        $_SESSION['mName']=$result1['mother_name'];
        $_SESSION['mNic']=$result1['mother_nic'];
        $_SESSION['addr']=$result1['address'];
        $_SESSION['tel']=$result1['telephone'];
        $_SESSION['email']=$result1['email'];
        $_SESSION['GnDivision']=$result1['gn_division'];
        
    
        header("Location:/midwife/add-babies?idSuccess=1");

    }
}

if(isset($_GET['submitGnD'])){
    
    unset($_SESSION['mName']);
    unset($_SESSION['addr']);
    unset($_SESSION['tel']);
    unset($_SESSION['email']);
    unset($_SESSION['GnDivision']);
    unset($_SESSION['mNic']);
    unset($_SESSION['latInput']);
    unset($_SESSION['longInput']);
    
    $_SESSION['GnDivision']= $GnDNo;
    header("Location:/midwife/add-babies?idSuccess=1");


}

?>