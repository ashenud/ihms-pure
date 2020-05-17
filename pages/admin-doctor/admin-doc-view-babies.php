<?php session_start(); ?>
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
        <!-- for datatable -->
    <link rel="stylesheet" href="../../assets/css/material.min.css">
    <link rel="stylesheet" href="../../assets/css/custom-table-style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.material.min.css">

    <link rel="stylesheet" href="../../assets/css/dashboard-style.css">
    <link rel="stylesheet" href="./css/admin-doc-view-babies-style.css">
    
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
            <div class="sidebar-menu">
                <div class="inner-sidebar-menu">

                    <div class="user-area pb-2 mb-3">
                        <img src="./img/doctor.png" width="50" class="rounded-circle">
                        <a href="#" class="text-uppercase"> <?php echo($_SESSION['admin_id']); ?> </a>
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
                            <a class="text-uppercase" data-toggle="collapse" href="#manage" style="cursor:default">
                                <span class="icon">
                                    <i class="fas fa-users-cog" aria-hidden="true"></i>
                                </span>
                                <span class="list">කළමනාකරණය</span>
                            </a>
                        </li>
                        <div class="collapse collapse-manage" id="manage">
                            <li>
                                <a href="admin-doc-add-sisters.php" class="text-uppercase drop">
                                    <span class="icon">
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
                                <a href="#" class="text-uppercase drop-active">
                                    <span class="icon-active">
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
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">view babies</h5>
                                    
                                    <div class="table-for-data" style="margin-top: 30px">
                        
                                        <?php
                                        mysqli_select_db($conn, 'cs2019g6');

                                        $query1 = "SELECT mother_id, baby_id, address, YEAR(baby_dob) AS babyY, MONTH(baby_dob) AS babyM, DAY(baby_dob) AS babyD FROM baby_register";
                                        $result1= mysqli_query($conn,$query1);

                                        $systemY= date("Y");
                                        $systemM= date("m");
                                        $systemD= date("d");

                                        ?>

                                        <table class="mdl-data-table table-responsive-md bordered" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Mother ID</th>
                                                    <th>Baby ID</th>
                                                    <th>Age</th>
                                                    <th>Address</th>
                                                    <th>View</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                        <?php
                                        if ($result1) {
                                            while ($row = mysqli_fetch_assoc($result1)) {
                                        ?>        

                                                <tr>
                                                    <td><?php echo $row['mother_id']; ?></td>
                                                    <td><?php echo $row['baby_id']; ?></td>
                                                    <td><?php echo $systemY-$row['babyY']; ?>y_<?php echo $systemM-$row['babyM']; ?>m_<?php echo $systemD-$row['babyD']; ?>_d</td>
                                                    <td><?php echo $row['address']; ?></td>
                                                    <td>
                                                        <form action="../general/view-data.php" method="POST">
                                                            <input type="hidden" name="view-id" value="<?php echo $row['baby_id']; ?>">
                                                            <button type="submit" name="view-btn" class="btn view-btn"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="deleteh.php" method="POST">
                                                            <input type="hidden" name="remove-id" value="<?php echo $row['baby_id']; ?>">
                                                            <button type="submit" name="remove-btn" class="btn remove-btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                        </form>
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
    <script type="text/javascript" src="../../assets/js/core/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/popper.min.js"></script>
    <script type="text/javascript" src="../../assets/js/core/bootstrap.min.js"></script>
        <!-- for data table -->
    <script type="text/javascript" src="../../assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../assets/js/custom-table-script.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.material.min.js"></script>


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
    
    <!-- end of writed scripts -->



</body>

</html>


<?php mysqli_close($conn); ?>