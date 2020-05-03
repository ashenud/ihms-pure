<?php session_start(); ?>
<?php include('../../../php/basic/connection.php'); ?>


<?php

if(isset($_POST['submit_vac'])) {
    $vaccine=($_POST['vaccine']);
    $baby_id=($_POST['baby_id']);
    $doctor_id=$_SESSION['doctor_id'];

    mysqli_select_db($conn, 'cs2019g6');
    $query1="SELECT * FROM baby_register WHERE baby_id='".$baby_id."'";
    $result1=mysqli_query($conn,$query1);
    $row1=mysqli_fetch_assoc($result1);
    
    $mother_nic=$row1['mother_nic'];
    $midwife_id=$row1['midwife_id'];
    
    if($vaccine==1) {
        
        $vac_name='BCG-1';
        $vac_id=1;
        $new_status=0;
        
        $query2="INSERT INTO vac_birth(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
    }
    elseif($vaccine==2) {
        
        $vac_name='BCG-2';
        $vac_id=2;
        $new_status=0;
        
        $query2="INSERT INTO vac_birth(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }   
    }
    elseif($vaccine==3) {
        
        $vac_name='DPT-1';
        $vac_id=3;
        $new_status=0;
        
        $query2="INSERT INTO vac_2months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }   
    }
    elseif($vaccine==4) {
        
        $vac_name='OPV-1';
        $vac_id=4;
        $new_status=0;
        
        $query2="INSERT INTO vac_2months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    elseif($vaccine==5) {
        
        $vac_name='Hepatitis B-1';
        $vac_id=5;
        $new_status=0;
        
        $query2="INSERT INTO vac_2months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==6) {
        
        $vac_name='DPT-2';
        $vac_id=6;
        $new_status=0;
        
        $query2="INSERT INTO vac_4months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==7) {
        
        $vac_name='OVP-2';
        $vac_id=7;
        $new_status=0;
        
        $query2="INSERT INTO vac_4months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==8) {
        
        $vac_name='Hepatitis B-2';
        $vac_id=8;
        $new_status=0;
        
        $query2="INSERT INTO vac_4months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==9) {
        
        $vac_name='DPT-3';
        $vac_id=9;
        $new_status=0;
        
        $query2="INSERT INTO vac_6months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==10) {
        
        $vac_name='OVP-3';
        $vac_id=10;
        $new_status=0;
        
        $query2="INSERT INTO vac_6months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==11) {
        
        $vac_name='Hepatitis B-3';
        $vac_id=11;
        $new_status=0;
        
        $query2="INSERT INTO vac_6months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==12) {
        
        $vac_name='Measles';
        $vac_id=12;
        $new_status=0;
        
        $query2="INSERT INTO vac_9months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==13) {
        
        $vac_name='Vitamin-A';
        $vac_id=13;
        $new_status=0;
        
        $query2="INSERT INTO vac_9months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==14) {
        
        $vac_name='DPT-4';
        $vac_id=14;
        $new_status=0;
        
        $query2="INSERT INTO vac_18months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==15) {
        
        $vac_name='OVP-4';
        $vac_id=15;
        $new_status=0;
        
        $query2="INSERT INTO vac_18months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==16) {
        
        $vac_name='Vitamin-A';
        $vac_id=16;
        $new_status=0;
        
        $query2="INSERT INTO vac_18months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==17) {
        
        $vac_name='Measles & Rubella';
        $vac_id=17;
        $new_status=0;
        
        $query2="INSERT INTO vac_3years(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==18) {
        
        $vac_name='Vitamin-A';
        $vac_id=18;
        $new_status=0;
        
        $query2="INSERT INTO vac_3years(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==19) {
        
        $vac_name='D.T';
        $vac_id=19;
        $new_status=0;
        
        $query2="INSERT INTO vac_5years(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==20) {
        
        $vac_name='OVP-5';
        $vac_id=20;
        $new_status=0;
        
        $query2="INSERT INTO vac_5years(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==21) {
        
        $vac_name='Rubella';
        $vac_id=21;
        $new_status=0;
        
        $query2="INSERT INTO vac_10_14years(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==22) {
        
        $vac_name='ATD';
        $vac_id=22;
        $new_status=0;
        
        $query2="INSERT INTO vac_10_14years(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==23) {
        
        $vac_name='JE-1';
        $vac_id=23;
        $new_status=0;
        
        $query2="INSERT INTO vac_japanese_encephalities(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==24) {
        
        $vac_name='JE-2';
        $vac_id=24;
        $new_status=0;
        
        $query2="INSERT INTO vac_japanese_encephalities(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==25) {
        
        $vac_name='JE-3';
        $vac_id=25;
        $new_status=0;
        
        $query2="INSERT INTO vac_japanese_encephalities(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
    
    elseif($vaccine==26) {
        
        $vac_name='JE-4';
        $vac_id=26;
        $new_status=0;
        
        $query2="INSERT INTO vac_japanese_encephalities(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
}
?>