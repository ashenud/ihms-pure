<?php 
session_start();
$_SESSION['code']=$_GET["code"];
if(!isset($_SESSION['code'])) {	
	header('location:/?noPermission=1');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>

    <!--favicons-->
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <!--fonts and icons-->    
    <link rel="stylesheet" href="../assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../assets/css/unicode-fonts.css">

    <!--css files-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
    
    <link rel="stylesheet" href="./css/froget-password-style.css">
    <link rel="stylesheet" href="./css/new-password-style.css">
    
    <title>Froget Password</title>

</head>

<body>
	<!-- Start coding here -->

	<div class="form-gap"></div>
	<div class="container">
	    <div class="row d-flex justify-content-center">
            <div class="col-md-3"></div>
	        <div class="col-md-5 mb-3">
	            <div class="panel panel-default">
	                <div class="panel-body">
	                    <div class="text-center">
	                        <h3><i class="fa fa-lock fa-4x"></i></h3>
	                        <h2 class="text-center">මුරපදය වෙනස් කරන්න</h2>
	                        <p>නැවත සැකසීමට මෙහි නව මුරපදය ඇතුළත් කරන්න.</p>
	                        <div class="panel-body">
                               
                                <div class="error-alert">
                                    <?php include('./inc/alert-new-pass-error.php'); ?>
                                </div>                                
	                            <form action="./php/change-password.php" id="change-password" role="form" autocomplete="off" class="form" method="POST">
                                    
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="new_password" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="නව මුරපදය ඇතුළත් කරන්න" required>
                                        <span toggle="#new_password" class="far fa-fw fa-eye password-icon"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="නව මුරපදය නැවත ඇතුළත් කරන්න" required>
                                    </div>	                                
	                                <div class="form-group">
	                                    <input name="submit" id="submit" class="btn btn-lg py-1" value="මුරපදය නැවත සකසන්න" type="submit">
	                                </div>

	                                <input type="hidden" class="hide" name="token" id="token" value="">
	                            </form>

	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-4 pwd-validate">
	            <?php include('inc/pwd-validation-msg.php'); ?>
	        </div>
	    </div>
	</div>

	<!-- Coding End -->
    
    
    <!--core js files-->
    <script type="text/javascript" src="../assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="../assets/js/core/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="./js/pwd-validation-script.js"> </script>
    <!--end ofcore js files-->
    
    <script type="text/javascript">
        $(function () {
            $("#submit").click(function () {
                var password = $("#new_password").val();
                var confirmPassword = $("#confirm_password").val();
                if (password != confirmPassword) {
                    $('.alert').show()
                    return false;
                }
                return true;
            });
        });
    </script>
    
    <!--- password show hide ------>
    <script>
        $(".password-icon").click(function () {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
    
    
</body>

</html>