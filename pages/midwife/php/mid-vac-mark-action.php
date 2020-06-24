<?php session_start(); ?>
<?php include('../../../php/basic/connection.php'); ?>


<?php

if(isset($_POST['mark_vac'])) {
    $vaccine=($_POST['vaccine']);
    $baby_id=($_POST['baby_id']);
    $batch_no=($_POST['batch_no']);
    $date_given=($_POST['date_given']);
    $midwife_id=$_SESSION['midwife_id'];
    
    if($vaccine==1) {
        
        $vac_name='BCG-1';
        $vac_id=1;
        $new_status=1;
        
        $query1="INSERT INTO vac_birth(baby_id,vac_name,vac_id,date_given,batch_no,midwife_id,status) VALUES('$baby_id','$vac_name','$vac_id','$date_given','$batch_no','$midwife_id','$new_status')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }
    }
    elseif($vaccine==2) {
        
        $vac_id=2;
        $new_status=1;
        
        $query1="UPDATE vac_birth SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }  
    }
    elseif($vaccine==3) {
        
        $vac_id=3;
        $new_status=1;
        
        $query1="UPDATE vac_2months SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==4) {
        
        $vac_id=4;
        $new_status=1;
        
        $query1="UPDATE vac_2months SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==5) {
        
        $vac_id=5;
        $new_status=1;
        
        $query1="UPDATE vac_2months SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==6) {
        
        $vac_id=6;
        $new_status=1;
        
        $query1="UPDATE vac_4months SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==7) {
        
        $vac_id=7;
        $new_status=1;
        
        $query1="UPDATE vac_4months SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==8) {
        
        $vac_id=8;
        $new_status=1;
        
        $query1="UPDATE vac_4months SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==9) {
        
        $vac_id=9;
        $new_status=1;
        
        $query1="UPDATE vac_6months SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==10) {
        
        $vac_id=10;
        $new_status=1;
        
        $query1="UPDATE vac_6months SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==11) {
        
        $vac_id=11;
        $new_status=1;
        
        $query1="UPDATE vac_9months SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==12) {
        
        $vac_id=12;
        $new_status=1;
        
        $query1="UPDATE vac_12months SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==13) {
        
        $vac_id=13;
        $new_status=1;
        
        $query1="UPDATE vac_18months SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==14) {
        
        $vac_id=14;
        $new_status=1;
        
        $query1="UPDATE vac_18months SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==15) {
        
        $vac_id=15;
        $new_status=1;
        
        $query1="UPDATE vac_3years SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==16) {
        
        $vac_id=16;
        $new_status=1;
        
        $query1="UPDATE vac_5years SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==17) {
        
        $vac_id=17;
        $new_status=1;
        
        $query1="UPDATE vac_5years SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==18) {
        
        $vac_id=18;
        $new_status=1;
        
        $query1="UPDATE vac_10years SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==19) {
        
        $vac_id=19;
        $new_status=1;
        
        $query1="UPDATE vac_10years SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
    elseif($vaccine==20) {
        
        $vac_id=20;
        $new_status=1;
        
        $query1="UPDATE vac_11years SET date_given='{$date_given}', batch_no='{$batch_no}', status='{$new_status}' WHERE baby_id='{$baby_id}' AND vac_id='{$vac_id}'";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacMarkSuccess=1");
        }   
    }
}
?>