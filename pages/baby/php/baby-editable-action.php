<?php session_start(); ?>
<?php include('../../../php/basic/connection.php'); ?>
   

<?php

    if(isset($_POST['UpdateVacDate'])) {
        extract($_POST);        
        
        $query1="SELECT * FROM vaccine_date WHERE vac_id='$vacName' AND baby_id='$baby_id'";
        $result1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_assoc($result1);
        
        if(empty($row1)) {
            header("Location:../baby-editable-page.php?setDateFirst=1");
        }
        else {
            $query2="UPDATE vaccine_date SET giving_date='{$vacDate}' WHERE vac_id='$vacName' AND baby_id='$baby_id'";
            $result2=mysqli_query($conn,$query2);

            if($result2) {
                header("Location:../baby-editable-page.php?setDateSuccess=1");
            }
        }

    }

    if(isset($_POST['VacSideEff'])){
        extract($_POST);
        
        if($vaccine==1) {
            
            $query0="SELECT * FROM vac_birth WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_birth SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
        }
        elseif($vaccine==2) {

            $query0="SELECT * FROM vac_birth WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_birth SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }  
        }
        elseif($vaccine==3) {

            $query0="SELECT * FROM vac_2months WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_2months SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==4) {

            $query0="SELECT * FROM vac_2months WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_2months SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==5) {

            $query0="SELECT * FROM vac_2months WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_2months SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==6) {

            $query0="SELECT * FROM vac_4months WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_4months SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==7) {

            $query0="SELECT * FROM vac_4months WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_4months SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==8) {

            $query0="SELECT * FROM vac_4months WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_4months SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }  
        }
        elseif($vaccine==9) {

            $query0="SELECT * FROM vac_6months WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_6months SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==10) {

            $query0="SELECT * FROM vac_6months WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_6months SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==11) {

            $query0="SELECT * FROM vac_9months WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_9months SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==12) {

            $query0="SELECT * FROM vac_12months WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_12months SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==13) {

            $query0="SELECT * FROM vac_18months WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_18months SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==14) {

            $query0="SELECT * FROM vac_18months WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_18months SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==15) {

            $query0="SELECT * FROM vac_3years WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_3years SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==16) {

            $query0="SELECT * FROM vac_5years WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_5years SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==17) {

            $query0="SELECT * FROM vac_5years WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_5years SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==18) {

            $query0="SELECT * FROM vac_10years WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_10years SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==19) {

            $query0="SELECT * FROM vac_10years WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_10years SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        elseif($vaccine==20) {

            $query0="SELECT * FROM vac_11years WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
            $result0=mysqli_query($conn,$query0);
            $row0=mysqli_fetch_assoc($result0);
        
            if(empty($row0)) {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }
            else if($row0['status']==1)  {
                $query1="UPDATE vac_11years SET side_effects='{$vacSideEffNote}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
                $result1=mysqli_query($conn,$query1);

                if($result1) {
                    header("Location:../baby-editable-page.php?setSideEffSuccess=1");
                }
            }
            else {
                header("Location:../baby-editable-page.php?giveVaccineFirst=1");
            }   
        }
        
    }

    if(isset($_POST['bcgScar'])){
        extract($_POST);
        $vaccine=1;
        
        $query0="SELECT * FROM vac_birth WHERE vac_id='$vaccine' AND baby_id='$baby_id'";
        $result0=mysqli_query($conn,$query0);
        $row0=mysqli_fetch_assoc($result0);

        if(empty($row0)) {
            header("Location:../baby-editable-page.php?giveVaccineFirst=1");
        }
        else if($row0['status']==1)  {
            $query1="UPDATE vac_birth SET scar='{$scar}' WHERE baby_id='{$baby_id}' AND vac_id='{$vaccine}'";
            $result1=mysqli_query($conn,$query1);

            if($result1) {
                header("Location:../baby-editable-page.php?setScarSuccess=1");
            }
        }
        else {
            header("Location:../baby-editable-page.php?giveVaccineFirst=1");
        }
    }

    if(isset($_POST['otherVacc'])){
        extract($_POST);
        $midwife_id=$_SESSION['midwife_id'];
        $status=1;
        
        $query0="INSERT INTO vac_other(baby_id, midwife_id, vac_name, date_given, batch_no, status)
        VALUES('$baby_id','$midwife_id','$vac_name','$date_given','$batch_no','$status')";
        $result0=mysqli_query($conn,$query0);

        if($result0) {
            header("Location:../baby-editable-page.php?otherVaccSuccess=1");
        }
    }
?>