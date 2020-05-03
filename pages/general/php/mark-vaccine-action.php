<?php session_start(); ?>
<?php include('../../../php/basic/connection.php'); ?>
   

<?php

mysqli_select_db($conn, 'cs2019g6');

    if(isset($_POST['submitB'])) {
        $baby_id=$_POST['baby_id'];
        $midwife_id=$_SESSION['midwife_id'];
        
        $query1="SELECT * FROM vac_birth WHERE baby_id='".$baby_id."'";
        $result1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_assoc($result1);
        
        
        if($row1['vac_name']!='BCG-1') {
            if(isset($_POST['bcg1'])) {
                $bcg1=$_POST['bcg1'];
                
                $sql1="INSERT INTO vac_birth(midwife_id,baby_id,vac_name,date_given)
                                         VALUES('$midwife_id','$baby_id','BCG-1','NOW()')";
                $run1=mysqli_query($conn,$sql1);
            }
        }
        if($row1['vac_name']!='BCG-2') {
            if(isset($_POST['bcg2'])) {
                $bcg1=$_POST['bcg2'];
                
                $sql2="INSERT INTO vac_birth(midwife_id,baby_id,vac_name,date_given)
                                         VALUES('$midwife_id','$baby_id','BCG-2','NOW()')";
                $run2=mysqli_query($conn,$sql2);
            }
        }
        if($row1['vac_name']!='SCAR') {
            if(isset($_POST['scar'])) {
                $bcg1=$_POST['scar'];
                
                $sql3="INSERT INTO vac_birth(midwife_id,baby_id,vac_name,date_given)
                                         VALUES('$midwife_id','$baby_id','SCAR','NOW()')";
                $run3=mysqli_query($conn,$sql3);
            }
        }
        if($row1['vac_name']!='Side Eff') {
            if(isset($_POST['side_eff'])) {
                $side_eff=$_POST['side_eff'];
            }
        }    
        
        
        if(isset($_POST['bcg1_name'])) {
            $bcg1_name=$_POST['bcg1_name'];
            
            $query2="SELECT * FROM vaccine_date WHERE baby_id='".$baby_id."' AND vaccine_name='".$bcg1_name."'";
            $result2=mysqli_query($conn,$query2);
            $row2=mysqli_fetch_assoc($result2);
            
            if(!isset($row2['giving_date'])) {
                if(isset($_POST['giving_date_bcg1'])) {
                    $giving_date_bcg1=$_POST['giving_date_bcg1'];
                    
                    $sql4="INSERT INTO vaccine_date(midwife_id,baby_id,vaccine_name,giving_date,age_group,age_group_id)
                                             VALUES('$midwife_id','$baby_id','BCG-1','$giving_date_bcg1','at birth',1)";
                    $run4=mysqli_query($conn,$sql4);
                }
            }
        }
        
        if(isset($_POST['bcg2_name'])) {
            $bcg2_name=$_POST['bcg2_name'];
            
            $query3="SELECT * FROM vaccine_date WHERE baby_id='".$baby_id."' AND vaccine_name='".$bcg2_name."'";
            $result3=mysqli_query($conn,$query3);
            $row3=mysqli_fetch_assoc($result3);
            
            if(!isset($row3['giving_date'])) {
                if(isset($_POST['giving_date_bcg2'])) {
                    $giving_date_bcg2=$_POST['giving_date_bcg2'];
                    
                    $sql5="INSERT INTO vaccine_date(midwife_id,baby_id,vaccine_name,giving_date,age_group,age_group_id)
                                             VALUES('$midwife_id','$baby_id','BCG-2','$giving_date_bcg2','at birth',1)";
                    $run5=mysqli_query($conn,$sql5);                    
                }
            }
        }
        
        if(isset($_POST['scar_name'])) {
            $scar_name=$_POST['scar_name'];
            
            $query4="SELECT * FROM vaccine_date WHERE baby_id='".$baby_id."' AND vaccine_name='".$scar_name."'";
            $result4=mysqli_query($conn,$query4);
            $row4=mysqli_fetch_assoc($result4);
            
            if(!isset($row4['giving_date'])) {
                if(isset($_POST['giving_date_scar'])) {
                    $giving_date_scar=$_POST['giving_date_scar'];
                    
                    $sql6="INSERT INTO vaccine_date(midwife_id,baby_id,vaccine_name,giving_date,age_group,age_group_id)
                                             VALUES('$midwife_id','$baby_id','SCAR','$giving_date_scar','at birth',1)";
                    $run6=mysqli_query($conn,$sql6);
                    if($run6) {
                        echo("ela");
                    }
                }
            }
        }
        
        
        

        
        
        echo $baby_id;
        
        if(isset($bcg1)) {
            echo $bcg1."<br>";
        }
        if(isset($bcg2)) {
            echo $bcg2."<br>";
        }
        if(isset($scar)) {
            echo $scar."<br>";
        }
        if(isset($side_eff)) {
            echo $side_eff."<br>";
        }
        if(isset($giving_date_bcg1)) {
            echo $giving_date_bcg1."<br>";
        }
        if(isset($giving_date_bcg2)) {
            echo $giving_date_bcg2."<br>";
        }
        if(isset($giving_date_scar)) {
            echo $giving_date_scar."<br>";
        }
    }

    if(isset($_POST['submit2M'])){
        $baby_id=$_POST['baby_id'];
        $dpt1=$_POST['dpt1'];
        $opv1=$_POST['opv1'];
        $hepatitisB1=$_POST['hepatitisB1'];
        $side_eff=$_POST['side_eff'];
        mysqli_select_db($conn,'cs2019g6');

        echo $baby_id."<br>".$dpt1."<br>".$opv1."<br>".$hepatitisB1."<br>".$side_eff;
    }

?>