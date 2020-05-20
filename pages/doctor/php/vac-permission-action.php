<?php session_start(); ?>
<?php include('../../../php/basic/connection.php'); ?>


<?php

if(isset($_POST['submit_vac'])) {
    $vaccine=($_POST['vaccine']);
    $baby_id=($_POST['baby_id']);
    $doctor_id=$_SESSION['doctor_id'];

    $query1="SELECT * FROM baby_register WHERE baby_id='".$baby_id."'";
    $result1=mysqli_query($conn,$query1);
    $row1=mysqli_fetch_assoc($result1);
    
    $mother_nic=$row1['mother_nic'];
    $midwife_id=$row1['midwife_id'];
    
    if($vaccine==2) {
        
        $vac_name='BCG-2';
        $vac_id=2;
        $new_status=0;
        
        $query2="INSERT INTO vac_birth(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
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
        
        $vac_name='fIPV-1';
        $vac_id=5;
        $new_status=0;
        
        $query2="INSERT INTO vac_2months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
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
        
        $vac_name='fIPV-2';
        $vac_id=8;
        $new_status=0;
        
        $query2="INSERT INTO vac_4months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
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
    elseif($vaccine==14) {
        
        $vac_name='OPV-4';
        $vac_id=14;
        $new_status=0;
        
        $query2="INSERT INTO vac_18months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }  
    elseif($vaccine==17) {
        
        $vac_name='OPV-5';
        $vac_id=17;
        $new_status=0;
        
        $query2="INSERT INTO vac_5years(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }   
    elseif($vaccine==19) {
        
        $vac_name='HPV-2';
        $vac_id=19;
        $new_status=0;
        
        $query2="INSERT INTO vac_10years(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        if($result2) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
        
    }
}

else if(isset($_POST['submit-vac-with-data'])) {
    $vaccine=($_POST['vaccine']);
    $baby_id=($_POST['baby_id']);
    $doctor_id=$_SESSION['doctor_id'];
    
    $clinic_date=($_POST['date_came']);
    $eye1=($_POST['eye1']);
    $eye2=($_POST['eye2']);
    $eye3=($_POST['eye3']);
    $eye4=($_POST['eye4']);
    $eye5=($_POST['eye5']);
    $hearing=($_POST['hearing']);
    $weight=($_POST['weight']);
    $height=($_POST['height']);
    $development=($_POST['development']);
    $heart=($_POST['heart']);
    $hip=($_POST['hip']);
    $other=($_POST['other']);
    
    $query1="SELECT * FROM baby_register WHERE baby_id='".$baby_id."'";
    $result1=mysqli_query($conn,$query1);
    $row1=mysqli_fetch_assoc($result1);
    
    $midwife_id=$row1['midwife_id'];
    
    if($vaccine==1) {
        
        $age_group='1st Month';
        $age_group_id=1;
        
        $query3="INSERT INTO child_health_note(baby_id,midwife_id,baby_age_group,baby_age_group_id,eye_size,squint,retina,cornea,eye_movement,hearing,weight,height,development,heart,hip,other,doctor_id,clinic_date) VALUES('$baby_id','$midwife_id','$age_group','$age_group_id','$eye1','$eye2','$eye3','$eye4','$eye5','$hearing','$weight','$height','$development','$heart','$hip','$other','$doctor_id','$clinic_date')";
        $result3=mysqli_query($conn,$query3);
        
        if($result3) {
            header("Location:../doc-vac-permission.php?vacSuccess=1");
        }
    }
    elseif($vaccine==3) {
        
        $age_group='After 2nd Month';
        $age_group_id=2;
        
        $vac_name='Pentavalent-1';
        $vac_id=3;
        $new_status=0;
        
        $query2="INSERT INTO vac_2months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        $query3="INSERT INTO child_health_note(baby_id,midwife_id,baby_age_group,baby_age_group_id,eye_size,squint,retina,cornea,eye_movement,hearing,weight,height,development,heart,hip,other,doctor_id,clinic_date) VALUES('$baby_id','$midwife_id','$age_group','$age_group_id','$eye1','$eye2','$eye3','$eye4','$eye5','$hearing','$weight','$height','$development','$heart','$hip','$other','$doctor_id','$clinic_date')";
        $result3=mysqli_query($conn,$query3);
        
        if($result2) {
            if($result3) {
                header("Location:../doc-vac-permission.php?vacSuccess=1");
            }
        }
    }
    elseif($vaccine==6) {
        
        $age_group='After 4th Month';
        $age_group_id=3;
        
        $vac_name='Pentavalent-2';
        $vac_id=6;
        $new_status=0;
        
        $query2="INSERT INTO vac_4months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        $query3="INSERT INTO child_health_note(baby_id,midwife_id,baby_age_group,baby_age_group_id,eye_size,squint,retina,cornea,eye_movement,hearing,weight,height,development,heart,hip,other,doctor_id,clinic_date) VALUES('$baby_id','$midwife_id','$age_group','$age_group_id','$eye1','$eye2','$eye3','$eye4','$eye5','$hearing','$weight','$height','$development','$heart','$hip','$other','$doctor_id','$clinic_date')";
        $result3=mysqli_query($conn,$query3);
        
        if($result2) {
            if($result3) {
                header("Location:../doc-vac-permission.php?vacSuccess=1");
            }
        }
    }
    elseif($vaccine==9) {
        
        $age_group='After 6th Month';
        $age_group_id=4;
        
        $vac_name='Pentavalent-3';
        $vac_id=9;
        $new_status=0;
        
        $query2="INSERT INTO vac_6months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        $query3="INSERT INTO child_health_note(baby_id,midwife_id,baby_age_group,baby_age_group_id,eye_size,squint,retina,cornea,eye_movement,hearing,weight,height,development,heart,hip,other,doctor_id,clinic_date) VALUES('$baby_id','$midwife_id','$age_group','$age_group_id','$eye1','$eye2','$eye3','$eye4','$eye5','$hearing','$weight','$height','$development','$heart','$hip','$other','$doctor_id','$clinic_date')";
        $result3=mysqli_query($conn,$query3);
        
        if($result2) {
            if($result3) {
                header("Location:../doc-vac-permission.php?vacSuccess=1");
            }
        }
    }
    elseif($vaccine==11) {
        
        $age_group='After 9th Month';
        $age_group_id=5;
        
        $vac_name='MMR-1';
        $vac_id=11;
        $new_status=0;
        
        $query2="INSERT INTO vac_9months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        $query3="INSERT INTO child_health_note(baby_id,midwife_id,baby_age_group,baby_age_group_id,eye_size,squint,retina,cornea,eye_movement,hearing,weight,height,development,heart,hip,other,doctor_id,clinic_date) VALUES('$baby_id','$midwife_id','$age_group','$age_group_id','$eye1','$eye2','$eye3','$eye4','$eye5','$hearing','$weight','$height','$development','$heart','$hip','$other','$doctor_id','$clinic_date')";
        $result3=mysqli_query($conn,$query3);
        
        if($result2) {
            if($result3) {
                header("Location:../doc-vac-permission.php?vacSuccess=1");
            }
        }
    }
    elseif($vaccine==12) {
        
        $age_group='After 12th Month';
        $age_group_id=6;
        
        $vac_name='Live JE';
        $vac_id=12;
        $new_status=0;
        
        $query2="INSERT INTO vac_12months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        $query3="INSERT INTO child_health_note(baby_id,midwife_id,baby_age_group,baby_age_group_id,eye_size,squint,retina,cornea,eye_movement,hearing,weight,height,development,heart,hip,other,doctor_id,clinic_date) VALUES('$baby_id','$midwife_id','$age_group','$age_group_id','$eye1','$eye2','$eye3','$eye4','$eye5','$hearing','$weight','$height','$development','$heart','$hip','$other','$doctor_id','$clinic_date')";
        $result3=mysqli_query($conn,$query3);
        
        if($result2) {
            if($result3) {
                header("Location:../doc-vac-permission.php?vacSuccess=1");
            }
        }
    }
    elseif($vaccine==13) {
        
        $age_group='After 18th Month';
        $age_group_id=7;
        
        $vac_name='DPT';
        $vac_id=13;
        $new_status=0;
        
        $query2="INSERT INTO vac_18months(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        $query3="INSERT INTO child_health_note(baby_id,midwife_id,baby_age_group,baby_age_group_id,eye_size,squint,retina,cornea,eye_movement,hearing,weight,height,development,heart,hip,other,doctor_id,clinic_date) VALUES('$baby_id','$midwife_id','$age_group','$age_group_id','$eye1','$eye2','$eye3','$eye4','$eye5','$hearing','$weight','$height','$development','$heart','$hip','$other','$doctor_id','$clinic_date')";
        $result3=mysqli_query($conn,$query3);
        
        if($result2) {
            if($result3) {
                header("Location:../doc-vac-permission.php?vacSuccess=1");
            }
        }
    }
    elseif($vaccine==15) {
        
        $age_group='After 3rd Year';
        $age_group_id=8;
        
        $vac_name='MMR-2';
        $vac_id=15;
        $new_status=0;
        
        $query2="INSERT INTO vac_3years(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        $query3="INSERT INTO child_health_note(baby_id,midwife_id,baby_age_group,baby_age_group_id,eye_size,squint,retina,cornea,eye_movement,hearing,weight,height,development,heart,hip,other,doctor_id,clinic_date) VALUES('$baby_id','$midwife_id','$age_group','$age_group_id','$eye1','$eye2','$eye3','$eye4','$eye5','$hearing','$weight','$height','$development','$heart','$hip','$other','$doctor_id','$clinic_date')";
        $result3=mysqli_query($conn,$query3);
        
        if($result2) {
            if($result3) {
                header("Location:../doc-vac-permission.php?vacSuccess=1");
            }
        }
    }
    elseif($vaccine==16) {
        
        $age_group='After 5th Year';
        $age_group_id=9;
        
        $vac_name='D.T';
        $vac_id=16;
        $new_status=0;
        
        $query2="INSERT INTO vac_5years(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        $query3="INSERT INTO child_health_note(baby_id,midwife_id,baby_age_group,baby_age_group_id,eye_size,squint,retina,cornea,eye_movement,hearing,weight,height,development,heart,hip,other,doctor_id,clinic_date) VALUES('$baby_id','$midwife_id','$age_group','$age_group_id','$eye1','$eye2','$eye3','$eye4','$eye5','$hearing','$weight','$height','$development','$heart','$hip','$other','$doctor_id','$clinic_date')";
        $result3=mysqli_query($conn,$query3);
        
        if($result2) {
            if($result3) {
                header("Location:../doc-vac-permission.php?vacSuccess=1");
            }
        }
    }
    elseif($vaccine==18) {
        
        $age_group='After 10th Year';
        $age_group_id=10;
        
        $vac_name='HPV-1';
        $vac_id=18;
        $new_status=0;
        
        $query2="INSERT INTO vac_10years(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        $query3="INSERT INTO child_health_note(baby_id,midwife_id,baby_age_group,baby_age_group_id,eye_size,squint,retina,cornea,eye_movement,hearing,weight,height,development,heart,hip,other,doctor_id,clinic_date) VALUES('$baby_id','$midwife_id','$age_group','$age_group_id','$eye1','$eye2','$eye3','$eye4','$eye5','$hearing','$weight','$height','$development','$heart','$hip','$other','$doctor_id','$clinic_date')";
        $result3=mysqli_query($conn,$query3);
        
        if($result2) {
            if($result3) {
                header("Location:../doc-vac-permission.php?vacSuccess=1");
            }
        }
    }
    elseif($vaccine==20) {
        
        $age_group='After 11th Year';
        $age_group_id=11;
        
        $vac_name='aTd';
        $vac_id=20;
        $new_status=0;
        
        $query2="INSERT INTO vac_11years(baby_id,approved_doctor_id,midwife_id,vac_name,vac_id,status) VALUES('$baby_id','$doctor_id','$midwife_id','$vac_name','$vac_id','$new_status')";
        $result2=mysqli_query($conn,$query2);
        
        $query3="INSERT INTO child_health_note(baby_id,midwife_id,baby_age_group,baby_age_group_id,eye_size,squint,retina,cornea,eye_movement,hearing,weight,height,development,heart,hip,other,doctor_id,clinic_date) VALUES('$baby_id','$midwife_id','$age_group','$age_group_id','$eye1','$eye2','$eye3','$eye4','$eye5','$hearing','$weight','$height','$development','$heart','$hip','$other','$doctor_id','$clinic_date')";
        $result3=mysqli_query($conn,$query3);
        
        if($result2) {
            if($result3) {
                header("Location:../doc-vac-permission.php?vacSuccess=1");
            }
        }
    }
}
?>