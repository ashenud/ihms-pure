<?php

include "selectdb.php";
extract($_POST);
session_start();


if (!isset($_SESSION['mNic'])) {
    
    $query1="SELECT * FROM mother WHERE mother_nic='$mNic'";
    $result1=mysqli_query($conn,$query1);
    $check1=mysqli_num_rows($result1);

    $query2="SELECT * FROM mother WHERE telephone='$tp'";
    $result2=mysqli_query($conn,$query2);
    $check2=mysqli_num_rows($result2);

    $query3="SELECT * FROM mother WHERE email='$email'";
    $result3=mysqli_query($conn,$query3);
    $check3=mysqli_num_rows($result3);
    
    $query4="SELECT * FROM baby_register WHERE baby_id='$bId'";
    $result4=mysqli_query($conn,$query4);
    $check4=mysqli_num_rows($result4);
    
    if($check1>0) {
        unset($_SESSION['mName']);
        unset($_SESSION['mNic']);
        unset($_SESSION['addr']);
        unset($_SESSION['tel']);
        unset($_SESSION['email']);
        unset($_SESSION['GnDivision']);
        unset($_SESSION['latInput']);
        unset($_SESSION['longInput']);
        header("Location:/midwife/add-babies?mNicError=1");
    } 
    else if($check2>0) {
        unset($_SESSION['mName']);
        unset($_SESSION['mNic']);
        unset($_SESSION['addr']);
        unset($_SESSION['tel']);
        unset($_SESSION['email']);
        unset($_SESSION['GnDivision']);
        unset($_SESSION['latInput']);
        unset($_SESSION['longInput']);
        header("Location:/midwife/add-babies?tpError=1");
    }
    else if($check3>0) {
        unset($_SESSION['mName']);
        unset($_SESSION['mNic']);
        unset($_SESSION['addr']);
        unset($_SESSION['tel']);
        unset($_SESSION['email']);
        unset($_SESSION['GnDivision']);
        unset($_SESSION['latInput']);
        unset($_SESSION['longInput']);
        header("Location:/midwife/add-babies?emailError=1");
    }
    else if($check4>0) {
        unset($_SESSION['mName']);
        unset($_SESSION['mNic']);
        unset($_SESSION['addr']);
        unset($_SESSION['tel']);
        unset($_SESSION['email']);
        unset($_SESSION['GnDivision']);
        unset($_SESSION['latInput']);
        unset($_SESSION['longInput']);
        header("Location:/midwife/add-babies?bIdError=1");
    }
    else {
        
        $role="mother";
        $roleId="4";
        $status="active";

        $sql1="INSERT INTO mother(mother_nic, mother_name, midwife_id, address, telephone, email, gn_division, status)
                           VALUES('$mNic','$mName','$midId','$address','$tp','$email','$gnDivision','$status')";

        $sql2="INSERT INTO user(user_id, role, role_id, password, email, status) 
                         VALUES('$mNic','$role','$roleId',md5('$pwd'),'$email','$status')";

        $sql3="INSERT INTO baby_register(baby_id, baby_first_name, baby_last_name, baby_dob, baby_gender, register_date, midwife_id, mother_nic, mother_age, status)
                                  VALUES('$bId','$bfName','$blName','$dob','$bGen','$rDate','$midId','$mNic','$mAge','$status')";


        $sql4="INSERT INTO birth_details(baby_id, midwife_id, birth_weight, birth_length, health_states, apgar1, apgar2, apgar3, circumference_of_head, vitamin_K_status, eye_contact, milk_position)
            VALUES('$bId','$midId','$bWeight','$bLength','$hStates','$apgar1','$apgar2','$apgar3','$circumHead','$vitaminK','$eyeContact','$mPosition')";

        $sql5="INSERT INTO growth(baby_id, midwife_id, weight, height, baby_age_in_months)
                           VALUES('$bId','$midId','$bWeight','$bLength',0)";

        $sql6="INSERT INTO locations(mother_nic, name, midwife_id, address, lat, lng, status)
                              VALUES('$mNic','$mName','$midId','$address','$latInput','$longInput','$status')";


        if(mysqli_query($conn,$sql1)) {

            if(mysqli_query($conn,$sql2)) {

                if(mysqli_query($conn,$sql3)) {

                    if(mysqli_query($conn,$sql4)) {

                        if(mysqli_query($conn,$sql5)) {

                            if(mysqli_query($conn,$sql6)) {

                                unset($_SESSION['mName']);
                                unset($_SESSION['mNic']);
                                unset($_SESSION['addr']);
                                unset($_SESSION['tel']);
                                unset($_SESSION['email']);
                                unset($_SESSION['GnDivision']);
                                unset($_SESSION['latInput']);
                                unset($_SESSION['longInput']);
                                header("Location:/midwife/add-babies?success=1");

                            }
                            else {
                                echo mysqli_error($conn);
                            }   
                        }
                        else {
                            echo mysqli_error($conn);
                        }           
                    }
                    else {
                        echo mysqli_error($conn);
                    }
                }
                else {
                    echo mysqli_error($conn);
                }
            }
            else {
                echo mysqli_error($conn);
            }
        }
        else {
            echo "data not insert.<br>";
            unset($_SESSION['mName']);
            unset($_SESSION['mNic']);
            unset($_SESSION['addr']);
            unset($_SESSION['tel']);
            unset($_SESSION['email']);
            unset($_SESSION['GnDivision']);
            unset($_SESSION['latInput']);
            unset($_SESSION['longInput']);
            header("Location:/midwife/add-babies?error=1");
        }    

    }
}

else {

    $query4="SELECT * FROM baby_register WHERE baby_id='$bId'";
    $result4=mysqli_query($conn,$query4);
    $check4=mysqli_num_rows($result4);

    if($check4>0) {
        unset($_SESSION['mName']);
        unset($_SESSION['mNic']);
        unset($_SESSION['addr']);
        unset($_SESSION['tel']);
        unset($_SESSION['email']);
        unset($_SESSION['GnDivision']);
        unset($_SESSION['latInput']);
        unset($_SESSION['longInput']);
        header("Location:/midwife/add-babies?bIdError=1");
    }
    else {

        $status="active";

        $sql1="INSERT INTO baby_register(baby_id, baby_first_name, baby_last_name, baby_dob, baby_gender, register_date, midwife_id, mother_nic,  mother_age, status)
                    VALUES('$bId','$bfName','$blName','$dob','$bGen','$rDate','$midId','$mNic','$mAge','$status')";

        $sql2="INSERT INTO birth_details(baby_id, midwife_id, birth_weight, birth_length, health_states, apgar1, apgar2, apgar3, circumference_of_head, vitamin_K_status, eye_contact, milk_position)
                                VALUES('$bId','$midId','$bWeight','$bLength','$hStates','$apgar1','$apgar2','$apgar3','$circumHead','$vitaminK','$eyeContact','$mPosition')";

        $sql3="INSERT INTO growth(baby_id, midwife_id, weight, height, baby_age_in_months)
                           VALUES('$bId','$midId','$bWeight','$bLength',0)";


        if(mysqli_query($conn,$sql1)) {

            if(mysqli_query($conn,$sql2)) {

                if(mysqli_query($conn,$sql3)) {

                    echo "data inserted.<br>";
                    unset($_SESSION['mName']);
                    unset($_SESSION['mNic']);
                    unset($_SESSION['addr']);
                    unset($_SESSION['tel']);
                    unset($_SESSION['email']);
                    unset($_SESSION['GnDivision']);
                    unset($_SESSION['latInput']);
                    unset($_SESSION['longInput']);

                    header("Location:/midwife/add-babies?success=1");

                }
                else {
                    echo mysqli_error($conn);
                }  
            }
            else {
                echo mysqli_error($conn);
            }
         }
        else {

            echo "data not insert.<br>";
            unset($_SESSION['mName']);
            unset($_SESSION['mNic']);
            unset($_SESSION['addr']);
            unset($_SESSION['tel']);
            unset($_SESSION['email']);
            unset($_SESSION['GnDivision']);
            unset($_SESSION['latInput']);
            unset($_SESSION['longInput']);

            header("Location:/midwife/add-babies?error=1");
        }

    }

}

mysqli_close($conn);
?>