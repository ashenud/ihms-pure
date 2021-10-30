<?php
	include('connection.php');
	
    //table baby
    $query2="CREATE TABLE baby(baby_id VARCHAR(100) PRIMARY KEY,baby_name VARCHAR(200),date_of_birth DATE,baby_address VARCHAR(200),baby_messages VARCHAR(200),baby_password VARCHAR(30))";
	$result2=mysqli_query($conn, $query2);

	if($result2) {
		echo("Create table sucsessfully <br> ");
	}
	else {
		echo("Query error : ".mysqli_error($conn). '<br>');
	}

    

    //table midwife    
    $query3="CREATE TABLE midwife(mid_id VARCHAR(100) PRIMARY KEY,mid_name VARCHAR(50),mid_area VARCHAR(30),mid_reminders VARCHAR(100),mid_messages VARCHAR(200), mid_password VARCHAR(30))";

    $result3=mysqli_query($conn,$query3);
    
    if($result3) {
		echo("Create table sucsessfully <br> ");
	}
	else {
		echo("Query error : ".mysqli_error($conn). '<br>');
	}



    //table sister
    $query4="CREATE TABLE sister(sis_id VARCHAR(100) PRIMARY KEY,sis_name VARCHAR(50),sis_division VARCHAR(30),sis_messages VARCHAR(200),sis_password VARCHAR(30))";

    $result4=mysqli_query($conn,$query4);

    if($result4) {
		echo("Create table sucsessfully <br> ");
	}
	else {
		echo("Query error : ".mysqli_error($conn). '<br>');
	}
	


    //table doctor
    $query5="CREATE TABLE doctor(doc_id VARCHAR(100) PRIMARY KEY,doc_name VARCHAR(50),doc_division VARCHAR(30),doc_messages VARCHAR(200),doc_password VARCHAR(30))";

    $result5=mysqli_query($conn,$query5);

    if($result5) {
		echo("Create table sucsessfully <br> ");
	}
	else {
		echo("Query error : ".mysqli_error($conn). '<br>');
	}

?>

