<?php
session_start();
if(isset($_GET['sessionReset'])){
unset($_SESSION['mName']);
unset($_SESSION['mId']);
unset($_SESSION['addr']);
unset($_SESSION['tel']);
unset($_SESSION['email']);
unset($_SESSION['GnDivision']);
unset($_SESSION['mNic']);
header("Location:/midwife/add-babies");
}

?>