<?php session_start(); ?>
<?php include('../../php/basic/connection.php'); ?>

<?php if(!isset($_SESSION['sister_id'])) {	
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
    <link rel="stylesheet" href="./css/sis-view-babies-style.css">
    
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
                        <img src="./img/sister.png" class="rounded-circle">
                        <?php
                            $query00 = "SELECT * FROM sister WHERE sister_id='".$_SESSION['sister_id']."'";
                            $result00= mysqli_query($conn,$query00);
                            $row00=mysqli_fetch_assoc($result00);
                        ?>
                        <a href="#"> <span><?php echo $row00['sister_name'];?></span> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <a href="sis-dashboard.php" class="text-uppercase">
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
                                <a href="sis-add-midwife.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-user-plus" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">වින්නඹුවන් එක් කරන්න</span>
                                </a>
                            </li>
                            <li>
                                <a href="sis-view-midwife.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">වින්නඹුවන් බලන්න</span>
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
                            <a href="sis-table.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-table" aria-hidden="true"></i>
                                </span>
                                <span class="list">දත්ත වගු</span>
                            </a>
                        </li>
                        <li>
                            <a href="sis-inbox.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-inbox" aria-hidden="true"></i>
                                </span>
                                <span class="list">එන පණිවිඩ</span>
                            </a>
                        </li>
                        <li>
                            <a href="sis-send-messages.php" class="text-uppercase">
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
                                        
                                        $query1 = "SELECT 
                                                       mother_nic, 
                                                       baby_id,
                                                       baby_first_name,
                                                       baby_last_name,
                                                       baby_dob,
                                                           CONCAT_WS ( ', ',
                                                           CASE WHEN years = 0 THEN NULL ELSE CONCAT(years,' years') END, 
                                                           CASE WHEN months = 0 THEN NULL ELSE CONCAT(months, ' months') END,
                                                           CASE WHEN days = 0 THEN NULL ELSE CONCAT(days, ' days') END)
                                                       age
                                                       
                                                    FROM (SELECT 
                                                            mother_nic,
                                                            baby_id,
                                                            baby_first_name,
                                                            baby_last_name,
                                                            baby_dob,
                                                            FLOOR(DATEDIFF(CURDATE(),baby_dob)/365) years,
                                                            
                                                            FLOOR((DATEDIFF(CURDATE(),baby_dob)/365 - FLOOR(DATEDIFF(CURDATE(),baby_dob)/365))* 12) months,
                                                            
                                                            CEILING((((DATEDIFF(CURDATE(),baby_dob)/365 - FLOOR(DATEDIFF(CURDATE(),baby_dob)/365))* 12) - FLOOR((DATEDIFF(CURDATE(),baby_dob)/365 - FLOOR(DATEDIFF(CURDATE(),baby_dob)/365))* 12))* 30) days
                                                          FROM baby_register) x";
                                        $result1= mysqli_query($conn,$query1);

                                        ?>

                                        <table class="mdl-data-table table-responsive-md bordered" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Mother NIC</th>
                                                    <th>Baby ID</th>
                                                    <th>Name</th>
                                                    <th>Age</th>
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
                                                    <td><?php echo $row['mother_nic']; ?></td>
                                                    <td><?php echo $row['baby_id']; ?></td>
                                                    <td><?php echo $row['baby_first_name']." ".$row['baby_last_name']; ?></td>
                                                    <td><?php echo $row['age']; ?></td>
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
    
    <script>
        $('#manage-users').on('click', function () {
            $('#manage').toggleClass('collapse-manage d-none');
        });
    </script>    
    <!-- end of writed scripts -->



</body>

</html>


<?php mysqli_close($conn); ?>