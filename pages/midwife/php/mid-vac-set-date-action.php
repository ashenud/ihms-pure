<?php session_start(); ?>
<?php include('../../../php/basic/connection.php'); ?>


<?php

if(isset($_POST['date-set'])) {
    $vaccine=($_POST['vaccine']);
    $baby_id=($_POST['baby_id']);
    $giving_date=($_POST['giving_date']);
    $midwife_id=$_SESSION['midwife_id'];
    
    if($vaccine==1) {
        
        $vac_name='BCG-1';
        $vac_id=1;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
    }
    elseif($vaccine==2) {
        
        $vac_name='BCG-2';
        $vac_id=2;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }  
    }
    elseif($vaccine==3) {
        
        $vac_name='Pentavalent-1';
        $vac_id=3;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }   
    }
    elseif($vaccine==4) {
        
        $vac_name='OPV-1';
        $vac_id=4;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    elseif($vaccine==5) {
        
        $vac_name='fIPV-1';
        $vac_id=5;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==6) {
        
        $vac_name='Pentavalent-2';
        $vac_id=6;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==7) {
        
        $vac_name='OVP-2';
        $vac_id=7;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==8) {
        
        $vac_name='fIPV-2';
        $vac_id=8;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==9) {
        
        $vac_name='Pentavalent-3';
        $vac_id=9;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==10) {
        
        $vac_name='OVP-3';
        $vac_id=10;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==11) {
        
        $vac_name='MMR-1';
        $vac_id=11;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==12) {
        
        $vac_name='Live JE';
        $vac_id=12;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==13) {
        
        $vac_name='DPT';
        $vac_id=13;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==14) {
        
        $vac_name='OVP-4';
        $vac_id=14;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==15) {
        
        $vac_name='MMR-2';
        $vac_id=15;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==16) {
        
        $vac_name='D.T';
        $vac_id=16;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==17) {
        
        $vac_name='OPV-5';
        $vac_id=17;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==18) {
        
        $vac_name='HPV-1';
        $vac_id=18;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==19) {
        
        $vac_name='HPV-2';
        $vac_id=19;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==20) {
        
        $vac_name='aTd';
        $vac_id=20;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:/midwife/vaccine-mark?vacSetDateSuccess=1");
        }
        
    }
}
?>