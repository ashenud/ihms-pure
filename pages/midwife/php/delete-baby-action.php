<?php
include "selectdb.php";
extract($_POST);

$sqlNew="SELECT mother_nic  FROM baby_register WHERE baby_id='".$delete_baby."'";
$runNew=mysqli_query($conn,$sqlNew);
$rowArr=mysqli_fetch_assoc($runNew);

$sqlNew2="SELECT COUNT(mother_nic) AS numBabies FROM baby_register WHERE mother_nic='".$rowArr['mother_nic']."'";
$runNew2=mysqli_query($conn,$sqlNew2);
$rowArr2=mysqli_fetch_assoc($runNew2);
 
            if($rowArr2['numBabies'] > 1){

                $sql00="DELETE FROM child_health_note WHERE baby_id='".$delete_baby."'";
                $sql0="DELETE FROM vac_12months WHERE baby_id='".$delete_baby."'";
                $sql1="DELETE FROM vac_other WHERE baby_id='".$delete_baby."'";
                $sql2="DELETE FROM vac_11years WHERE baby_id='".$delete_baby."'";
                $sql3="DELETE FROM vac_birth WHERE baby_id='".$delete_baby."'";
                $sql4="DELETE FROM vac_18months WHERE baby_id='".$delete_baby."'";
                $sql5="DELETE FROM vac_10years WHERE baby_id='".$delete_baby."'";
                $sql6="DELETE FROM vac_9months WHERE baby_id='".$delete_baby."'";
                $sql7="DELETE FROM vac_6months WHERE baby_id='".$delete_baby."'";
                $sql8="DELETE FROM vac_5years WHERE baby_id='".$delete_baby."'";
                $sql9="DELETE FROM vac_4months WHERE baby_id='".$delete_baby."'";
                $sql10="DELETE FROM vac_3years WHERE baby_id='".$delete_baby."'";
                $sql11="DELETE FROM vac_2months WHERE baby_id='".$delete_baby."'";
                $sql12="DELETE FROM vaccine_date WHERE baby_id='".$delete_baby."'";
                $sql13="DELETE FROM thriposha_distribution WHERE baby_id='".$delete_baby."'";
                $sql14="DELETE FROM growth WHERE baby_id='".$delete_baby."'";
                $sql15="DELETE FROM birth_details WHERE baby_id='".$delete_baby."'";
                $sql16="DELETE FROM baby_register WHERE baby_id='".$delete_baby."'";

                mysqli_query($conn,$sql00);
                mysqli_query($conn,$sql0);
                mysqli_query($conn,$sql1);
                mysqli_query($conn,$sql2);
                mysqli_query($conn,$sql3);
                mysqli_query($conn,$sql4);
                mysqli_query($conn,$sql5);
                mysqli_query($conn,$sql6);
                mysqli_query($conn,$sql7);
                mysqli_query($conn,$sql8);
                mysqli_query($conn,$sql9);
                mysqli_query($conn,$sql10);
                mysqli_query($conn,$sql11);
                mysqli_query($conn,$sql12);
                mysqli_query($conn,$sql13);
                mysqli_query($conn,$sql14);
                mysqli_query($conn,$sql15);
                mysqli_query($conn,$sql16);
            }
            else{

                $sql00="DELETE FROM child_health_note WHERE baby_id='".$delete_baby."'";
                $sql0="DELETE FROM vac_12months WHERE baby_id='".$delete_baby."'";
                $sql1="DELETE FROM vac_other WHERE baby_id='".$delete_baby."'";
                $sql2="DELETE FROM vac_11years WHERE baby_id='".$delete_baby."'";
                $sql3="DELETE FROM vac_birth WHERE baby_id='".$delete_baby."'";
                $sql4="DELETE FROM vac_18months WHERE baby_id='".$delete_baby."'";
                $sql5="DELETE FROM vac_10years WHERE baby_id='".$delete_baby."'";
                $sql6="DELETE FROM vac_9months WHERE baby_id='".$delete_baby."'";
                $sql7="DELETE FROM vac_6months WHERE baby_id='".$delete_baby."'";
                $sql8="DELETE FROM vac_5years WHERE baby_id='".$delete_baby."'";
                $sql9="DELETE FROM vac_4months WHERE baby_id='".$delete_baby."'";
                $sql10="DELETE FROM vac_3years WHERE baby_id='".$delete_baby."'";
                $sql11="DELETE FROM vac_2months WHERE baby_id='".$delete_baby."'";
                $sql12="DELETE FROM vaccine_date WHERE baby_id='".$delete_baby."'";
                $sql13="DELETE FROM thriposha_distribution WHERE baby_id='".$delete_baby."'";
                $sql14="DELETE FROM growth WHERE baby_id='".$delete_baby."'";
                $sql15="DELETE FROM birth_details WHERE baby_id='".$delete_baby."'";
                
                $sql17="SELECT mother_nic FROM baby_register WHERE baby_id='".$delete_baby."'";
                $runNew=mysqli_query($conn,$sql17);
                $rowArr=mysqli_fetch_assoc($runNew);
                
                $sql16="DELETE FROM baby_register WHERE baby_id='".$delete_baby."'";
                $sql20="DELETE FROM locations WHERE mother_nic='".$rowArr['mother_nic']."'";
                $sql18="DELETE FROM mother WHERE mother_nic='".$rowArr['mother_nic']."'";
                $sql19="DELETE FROM user WHERE user_id='".$rowArr['mother_nic']."'";

                mysqli_query($conn,$sql00);
                mysqli_query($conn,$sql0);
                mysqli_query($conn,$sql1);
                mysqli_query($conn,$sql2);
                mysqli_query($conn,$sql3);
                mysqli_query($conn,$sql4);
                mysqli_query($conn,$sql5);
                mysqli_query($conn,$sql6);
                mysqli_query($conn,$sql7);
                mysqli_query($conn,$sql8);
                mysqli_query($conn,$sql9);
                mysqli_query($conn,$sql10);
                mysqli_query($conn,$sql11);
                mysqli_query($conn,$sql12);
                mysqli_query($conn,$sql13);
                mysqli_query($conn,$sql14);
                mysqli_query($conn,$sql15);
                mysqli_query($conn,$sql16);
                mysqli_query($conn,$sql20);
                mysqli_query($conn,$sql18);
                mysqli_query($conn,$sql19);

                

            }

mysqli_close($conn);
header("Location:../mid-view-babies.php");
?>