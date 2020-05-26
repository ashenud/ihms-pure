<?php session_start();
?>
<?php include('../../php/basic/connection.php'); ?>

<?php if(!isset($_SESSION['admin_id'])) {	
	header('location:../../index.php?noPermission=1');
	}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>

    <!--favicons-->
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">

    <!--fonts and icons-->
    <link rel="stylesheet" href="../../assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../../assets/css/unicode-fonts.css">
    <link rel="stylesheet" href="../../assets/css/material-design-iconic-font.min.css">

    <!--css files-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/animate.css">

    <link rel="stylesheet" href="../../assets/css/dashboard-style.css">
    <link rel="stylesheet" type="text/css" href="./css/admin-doc-add-sisters-style.css">

    <style>
        .collapse-manage {
            display: block !important;
        }
    </style>

    <title>Sister Registration</title>


    
</head>

<body>

    <div class="wrapper">
       
        <!--top navbar-->
        <?php include('inc/top-navbar.php'); ?>
        <!--end of top navbar-->

        <!-- main body (sidebar and content) -->
        <div class="main-body">

            <!-- sidebar menu -->
            <div class="sidebar-menu">
                <div class="inner-sidebar-menu">

                    <div class="user-area pb-2 mb-3">
                        <img src="./img/doctor.png" width="50" class="rounded-circle">
                        <a href="#" class="text-uppercase"> <?php echo $_SESSION['admin_id']; ?> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <a href="admin-doc-dashboard.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                </span>
                                <span class="list">තොරතුරු පුවරුව</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-uppercase" data-toggle="collapse" href="#manage" id="manage-users">
                                <span class="icon">
                                    <i class="fas fa-users-cog" aria-hidden="true"></i>
                                </span>
                                <span class="list">කළමනාකරණය</span>
                            </a>
                        </li>
                        <div class="collapse collapse-manage" id="manage">
                            <li>
                                <a href="#" class="text-uppercase drop-active">
                                    <span class="icon-active">
                                        <i class="fas fa-user-plus" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">හෙදියන් ඇතුලත් කිරීම</span>
                                </a>
                            </li>
                            <li>
                                <a href="admin-doc-view-sisters.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">හෙදියන් බලන්න</span>
                                </a>
                            </li>
                            <li>
                                <a href="admin-doc-view-babies.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">ළමුන් බලන්න</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="admin-doc-table.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-table" aria-hidden="true"></i>
                                </span>
                                <span class="list">දත්ත වගු</span>
                            </a>
                        </li>
                        <li>
                            <a href="admin-doc-inbox.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-inbox" aria-hidden="true"></i>
                                </span>
                                <span class="list">එන පණිවිඩ</span>
                            </a>
                        </li>
                        <li>
                            <a href="admin-doc-send-messages.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                </span>
                                <span class="list">පණිවිඩ යවන්න</span>
                            </a>
                        </li>
                    </ul>
                    <!--end of sidebar items-->

                    <!--normal and mobile hamburgers-->
                    <div class="hamburger">
                        <div class="inner-hamburger">
                            <span class="arrow">
                                <i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i>
                                <i class="fas fa-long-arrow-alt-right" aria-hidden="true" style="display: none;"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mob-hamburger" style="display: none;">
                        <div class="mob-inner-hamburger">
                            <span class="mob-arrow">
                                <i class="fas fa-long-arrow-alt-left" aria-hidden="true" style="display: none;"></i>
                                <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <!--end ofnormal and mobile hamburgers-->

                </div>
            </div>
            <!-- end of sidebar menu -->
            
            <!-- content -->

            <div class="content">
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">Sister Registration</h5>
                                    <p>
                                        <?php
                                        if(isset($_GET['success'])){
                                            echo  " <i style='color :green;'>* User Added. </i>";
                                        }
                                        elseif (isset($_GET['error'])){
                                            echo " <i style='color :red;'>* Invalid Fields </i>";
                                        }
                                        ?>
                                    </p>
                                    <div class="registration">
                                        <form name="my-form" action="./php/add-sister-action.php" method="POST" onsubmit="return validation()">
                                        
                                            <div class="container mt-4">

                                                <div class="form-group row">
                                                    <label for="user_id" class="col-md-4 col-form-label text-md-right">User ID</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="user_id" class="form-control" name="user_id">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="sister_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="sister_name" class="form-control" name="sister_name">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                                    <div class="col-md-6">
                                                        <input type="email" id="email" class="form-control" name="email">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                                    <div class="col-md-6">
                                                        <input type="password" id="password" class="form-control" name="password">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="sister_division" class="col-md-4 col-form-label text-md-right">Sister Division</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="sister_division" class="form-control" name="sister_division">
                                                    </div>
                                                </div>
                                                                                       
                                                <div class="col-md-4 offset-md-8">
                                                    <button type="submit" class="btn btn-primary" name="submit">
                                                    Register
                                                    </button>
                                                </div>
                                            </div>    
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    
                </div> 

            </div>
            <!-- end of content -->

        </div>
        <!-- end of main body (sidebar and content) -->

    </div>


    <!-- optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/bootstrap.min.js"></script>

    <script type="text/javascript" src="../../assets/js/script.js"> </script>
    <!--end core js files-->

    <!-- writed scripts -->
    <script>
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(".wrapper").toggleClass("active");
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".mob-hamburger").click(function() {
                $(".wrapper").toggleClass("mob-active");
            });
        });
    </script>
    
    <script>
        $('#manage-users').on('click', function () {
            $('#manage').toggleClass('collapse-manage d-none');
        });
    </script>
    
    <!-- end of writed scripts -->



             <!---------------------------------------------validation--------------------------------------------------------------->

<script >
  function validation()
      {
          
          var bfName = document.getElementById('bfName').value;
          var blName = document.getElementById('blName').value;
          
          var tp = document.getElementById('tp').value;
          var mName = document.getElementById('mName').value;
          var mAge = document.getElementById('mAge').value;
          var email = document.getElementById('email').value;
          var pwd = document.getElementById('pwd').value;

          var letters = /^[A-Za-z]+$/;
         
          
          if(bfName==""){
              document.getElementById('1').innerHTML="*please fill the  First name ";
              return false;
              }
          else if(bfName.match(letters)){
              if((bfName.length<3)||(bfName.length>20)){
                  document.getElementById('1').innerHTML="*please fill the  First name between 3 and 20";
                  return false;
                  }
          }
              if(!isNaN(bfName)){
              document.getElementById('1').innerHTML="*please enter character";
                  return false;
              
              }   
 
              if(blName==""){
              document.getElementById('1').innerHTML="*please fill the  First name ";
              return false;
              }
          else if(blName.match(letters)){
              if((blName.length<3)||(blName.length>30)){
                  document.getElementById('1').innerHTML="*please fill the  Last name between 3 and 30";
                  return false;
                  }
          }
              if(!isNaN(blName)){
              document.getElementById('1').innerHTML="*please enter character";
                  return false;
              
              }   
         

          if(tp.length<10 || tp.length >10){

            document.getElementById('2').innerHTML="please enter valid phone number";
            return false;

          }    
              

          if(mName==""){
              document.getElementById('3').innerHTML="*please fill the  First name ";
              return false;
              }

          else if(mName.match(letters)){
              if((mName.length<3)||(mName.length>20)){
                  document.getElementById('3').innerHTML="*please fill the  First name between 3 and 20";
                  return false;
                  }
          }
              if(!isNaN(mName)){
              document.getElementById('3').innerHTML="*please enter character";
                  return false;
              
              }   


          if(mAge < 18){
            document.getElementById('4').innerHTML="*please enter valid Age";
            return false;
          }


          if(email==""){
              document.getElementById('5').innerHTML="*plesae fill the Email address";
              return false;
              }
              
              if(email.indexOf('@')<=0){
              document.getElementById('5').innerHTML="*plesae fill the Email address in proper format @";
              return false;
              }
              
              
              if((email.charAt(email.length-4)!='.')&&(email.charAt(email.length-3)!='.')){
              document.getElementById('5').innerHTML="*plesae fill the Email address in proper format .";
              return false;
              }
              

          if(pwd==""){
              document.getElementById('6').innerHTML="*please fill the Password";
              return false;
              }
          if((pwd.length<5)||(pwd.length>20)){
                  document.getElementById('6').innerHTML="*please fill the  password between 5 and 20";
                  return false;
                  }  
      
      }
          
</script>


</body>

</html>


<?php mysqli_close($conn); ?>