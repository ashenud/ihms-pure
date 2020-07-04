<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['doctor_id'])) {	
	header('location:/?noPermission=1');
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>
    
    <?php 
    //favicons
    include('../../inc/basic/include-dashboard-fav.php');
    //css
    include('../../inc/basic/include-dashboard-css.php');
    //table css
    include('../../inc/basic/include-dashboard-table-css.php');
    ?>
    
    <link rel="stylesheet" href="/pages/doctor/css/doc-view-sisters-style.css">
    
    <style>
        .collapse-manage {
            display: block !important;
        }
    </style>
    
    <title>Infant Health Management System</title>
    
</head>

<body>

    <div class="wrapper">
       
        <!--top navbar-->
        <?php include('inc/top-navbar.php'); ?>
        <!--end of top navbar-->

        <!-- main body (sidebar and content) -->
        <div class="main-body">

            <!-- sidebar menu -->
            <?php include('inc/sidebar.php'); ?>
            <!-- end of sidebar menu -->
            
            <!-- content -->
            <div class="content">
                
                <div class="container">
                   <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">සියලුම හෙදියන්</h5>
                                    
                                    <div class="table-for-data" style="margin-top: 30px">
                        
                                        <?php
                                        
                                        $query01="SELECT doctor_moh_division FROM doctor WHERE doctor_id='".$_SESSION['doctor_id']."'";
                                        $result01=mysqli_query($conn,$query01);
                                        $row01=mysqli_fetch_assoc($result01);
                                        
                                        $query1 = "SELECT sister_id, sister_name, sister_moh_division FROM sister WHERE sister_moh_division='".$row01['doctor_moh_division']."'";
                                        $result1= mysqli_query($conn,$query1);

                                        ?>

                                        <table class="mdl-data-table table-responsive-lg bordered" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Sister ID</th>
                                                    <th>Sister name</th>
                                                    <th>division</th>
                                                    <th>Send messages</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                        <?php
                                        if ($result1) {
                                            while ($row = mysqli_fetch_assoc($result1)) {
                                        ?>        

                                                <tr>
                                                    <td><?php echo $row['sister_id']; ?></td>
                                                    <td><?php echo $row['sister_name']; ?></td>
                                                    <td><?php echo $row['sister_moh_division']; ?></td>
                                                    <td>
                                                        <a href="/doctor/send-messages" type="button" name="send-btn" class="btn send-btn"><i class="fa fa-comment-dots" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>

            </div>
            <!-- end of content -->

        </div>
        <!-- end of main body (sidebar and content) -->

    </div>


    <!-- optional JavaScript -->
    <?php
    //js
    include('../../inc/basic/include-dashboard-js.php');
    //table js
    include('../../inc/basic/include-dashboard-table-js.php');
    ?>

    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.d-sis').addClass('drop-active');
        });
    </script> 
    
    <script>
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(".wrapper").toggleClass("active");
            });
            
            $(".mob-hamburger").click(function() {
                $(".wrapper").toggleClass("mob-active");
            });
            
            $('#manage-users').on('click', function () {
                $('#manage-users').toggleClass('active');
                $('#manage').toggleClass('collapse-manage d-none');
            });          
        });
    </script>
    <!-- end of writed scripts -->



</body>

</html>


<?php mysqli_close($conn); ?>