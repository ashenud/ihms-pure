<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>

    <!--favicons-->
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">

    <!--fonts and icons-->    
    <link rel="stylesheet" href="/assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="/assets/css/unicode-fonts.css">

    <!--css files-->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    
    <link rel="stylesheet" href="/froget-password/css/froget-password-style.css">
    

    <title>Froget Password</title>

</head>

<body>
	<!-- Start coding here -->

	<div class="form-gap"></div>
	<div class="container">
	    <div class="row d-flex justify-content-center">
	        <div class="col-md-5">
	            <div class="panel panel-default">
	                <div class="panel-body">
	                    <div class="text-center">
	                        <h3><i class="fa fa-lock fa-4x"></i></h3>
	                        <h2 class="text-center">මුරපදය අමතක වුණා ද?</h2>
	                        <p>ඔබගේ මුරපදය මෙහිදී නැවත සැකසිය හැක.</p>
	                        <div class="panel-body">
                               
                                <div class="error-alert">
                                    <?php include('./inc/alert-froget-pass-error.php'); ?>
                                </div>                                
	                            <form action="/froget-password/php/send-code-to-mail.php" id="froget-password" role="form" autocomplete="off" class="form" method="POST">
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="user_id" placeholder="පරිශීලක නම ඇතුළත් කරන්න">
                                    </div>

	                                <div class="form-group">
	                                    <input id="email" name="email" placeholder="විද්‍යුත් තැපැල් ලිපිනය ඇතුළත් කරන්න" class="form-control" type="email">
	                                </div>
	                                <div class="form-group">
	                                    <input name="submit" class="btn btn-lg py-1" value="ඉදිරිපත් කරන්න" type="submit">
	                                </div>

	                                <input type="hidden" class="hide" name="token" id="token" value="">
	                            </form>

	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- Coding End -->
    
    
    
    

    <!--core js files-->
    <script type="text/javascript" src="/assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="/assets/js/core/bootstrap.min.js"></script>

    <!--end ofcore js files-->
    
</body>
</html>