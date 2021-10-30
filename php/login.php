<?php session_start(); ?>
<?php include('basic/connection.php'); ?>

<?php

	if(isset($_POST['submit'])) {
		$user_id=mysqli_real_escape_string($conn, $_POST['user_id']);
		$pwd=mysqli_real_escape_string($conn, $_POST['password']);
		$hsd_pwd=md5($pwd);

		$query1="SELECT * FROM user WHERE user_id='{$user_id}' AND password='{$hsd_pwd}' AND status='active' LIMIT 1";
		$result1=mysqli_query($conn, $query1);

		if(mysqli_num_rows($result1) == 1) {
            
			$user=mysqli_fetch_assoc($result1);
            
            if($user['role_id']==1) {
                $_SESSION['doctor_id']=$user['user_id'];
            
                header('location:/doctor/dashboard');
            }
            
            else if($user['role_id']==2) {
                $_SESSION['sister_id']=$user['user_id'];
            
                header('location:/sister/dashboard');
            }
            
            else if($user['role_id']==3) {
                $_SESSION['midwife_id']=$user['user_id'];
            
                header('location:/midwife/dashboard');
            }
            
            else if($user['role_id']==4) {
                $_SESSION['mother_id']=$_POST['user_id'];
            
                header('location:/baby/select');
            }
            
            else if($user['role_id']==5) {
                $_SESSION['admin_id']=$_POST['user_id'];
            
                header('location:/admin/dashboard');
            }
            
            else {
                header('location:/?error=1');
            } 
            
		}
        else {
                header('location:/?error=1');
            }
		
    }

?>

<?php mysqli_close($conn); ?>