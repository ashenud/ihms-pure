<?php

	include('connection.php');



    //add data to baby
	$pwd="testbaby1pwd";
    //$hsd_pwd=md5($pwd);
	$query6="INSERT INTO baby(baby_id,baby_name,date_of_birth,baby_address,baby_messages,baby_password)
                    VALUES('testbaby1','Ajith','2019-03-15','25/B,Devinuwara,Matara','abcdefgh','{$pwd}')";

	$result6=mysqli_query($conn, $query6);

	if($result6) {
		echo("Added data sucsessfully <br> ");
	}
	else {
		echo("Query error".mysqli_error($conn). '<br>');
	}


    //add data to midwife
	$pwd="testmidwife1pwd";
	//$hsd_pwd=md5($pwd);
	$query7="INSERT INTO midwife(mid_id,mid_name,mid_area,mid_reminders,mid_messages,mid_password)
                        VALUES('testmidwife1','Kamani','Devinuwara','pqrstuv','abcdefg','{$pwd}')";
	$result7=mysqli_query($conn, $query7);

	if($result7) {
		echo("Added data sucsessfully <br> ");
	}
	else {
		echo("Query error : ".mysqli_error($conn). '<br>');
	}



    //add data to sister
	$pwd="testsister1pwd";
	//$hsd_pwd=md5($pwd);
	$query8="INSERT INTO sister(sis_id,sis_name ,sis_division,sis_messages,sis_password)
                        VALUES('testsister1','Nilani','Matara','abcdefg','{$pwd}')";
	$result8=mysqli_query($conn, $query8);

	if($result8) {
		echo("Added data sucsessfully <br> ");
	}
	else {
		echo("Query error : ".mysqli_error($conn). '<br>');
	}



    //add data to doctor
	$pwd="testdoctor1pwd";
	//$hsd_pwd=md5($pwd);
	$query9="INSERT INTO doctor(doc_id, doc_name ,doc_division,doc_messages,doc_password)
                        VALUES('testdoctor1','Asiri','Matara','abcdefg','{$pwd}')";
	$result9=mysqli_query($conn, $query9);

	if($result9) {
		echo("Added data sucsessfully <br> ");
	}
	else {
		echo("Query error : ".mysqli_error($conn). '<br>');
	}

?>
