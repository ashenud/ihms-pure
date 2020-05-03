<?php session_start(); ?>
<?php include('../../../php/basic/connection.php'); ?>


<?php

if(isset($_POST['date-set'])) {
    $vaccine=($_POST['vaccine']);
    $baby_id=($_POST['baby_id']);
    $giving_date=($_POST['giving_date']);
    $midwife_id=$_SESSION['midwife_id'];
    
    mysqli_select_db($conn, 'cs2019g6');
    
    if($vaccine==1) {
        
        $vac_name='BCG-1';
        $vac_id=1;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
    }
    elseif($vaccine==2) {
        
        $vac_name='BCG-2';
        $vac_id=2;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }  
    }
    elseif($vaccine==3) {
        
        $vac_name='DPT-1';
        $vac_id=3;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }   
    }
    elseif($vaccine==4) {
        
        $vac_name='OPV-1';
        $vac_id=4;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    elseif($vaccine==5) {
        
        $vac_name='Hepatitis B-1';
        $vac_id=5;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==6) {
        
        $vac_name='DPT-2';
        $vac_id=6;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==7) {
        
        $vac_name='OVP-2';
        $vac_id=7;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==8) {
        
        $vac_name='Hepatitis B-2';
        $vac_id=8;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==9) {
        
        $vac_name='DPT-3';
        $vac_id=9;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==10) {
        
        $vac_name='OVP-3';
        $vac_id=10;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==11) {
        
        $vac_name='Hepatitis B-3';
        $vac_id=11;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==12) {
        
        $vac_name='Measles';
        $vac_id=12;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==13) {
        
        $vac_name='Vitamin-A';
        $vac_id=13;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==14) {
        
        $vac_name='DPT-4';
        $vac_id=14;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==15) {
        
        $vac_name='OVP-4';
        $vac_id=15;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==16) {
        
        $vac_name='Vitamin-A';
        $vac_id=16;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==17) {
        
        $vac_name='Measles & Rubella';
        $vac_id=17;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==18) {
        
        $vac_name='Vitamin-A';
        $vac_id=18;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==19) {
        
        $vac_name='D.T';
        $vac_id=19;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==20) {
        
        $vac_name='OVP-5';
        $vac_id=20;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==21) {
        
        $vac_name='Rubella';
        $vac_id=21;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==22) {
        
        $vac_name='ATD';
        $vac_id=22;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==23) {
        
        $vac_name='JE-1';
        $vac_id=23;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==24) {
        
        $vac_name='JE-2';
        $vac_id=24;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
    }
    
    elseif($vaccine==25) {
        
        $vac_name='JE-3';
        $vac_id=25;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
    
    elseif($vaccine==26) {
        
        $vac_name='JE-4';
        $vac_id=26;
        
        $query1="INSERT INTO vaccine_date(midwife_id,baby_id,vac_name,vac_id,giving_date) VALUES('$midwife_id','$baby_id','$vac_name','$vac_id','$giving_date')";
        $result1=mysqli_query($conn,$query1);
        
        if($result1) {
            header("Location:../mid-vaccine-mark.php?vacSetDateSuccess=1");
        }
        
    }
}
?>