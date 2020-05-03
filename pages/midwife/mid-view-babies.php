<?php session_start(); ?>
<?php include('../../php/basic/connection.php'); ?>

<?php if(!isset($_SESSION['midwife_id'])) {	
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
    <link rel="stylesheet" href="./css/mid-view-babies-style.css">
     
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
                        <img src="./img/midwife.png" width="50" class="rounded-circle">
                        <a href="#" class="text-uppercase"> <?php echo($_SESSION['midwife_id']); ?> </a>
                    </div>

                    <!--sidebar items-->
                    <ul>
                        <li>
                            <a href="mid-dashboard.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-pie" aria-hidden="true"></i>
                                </span>
                                <span class="list">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-uppercase" data-toggle="collapse" href="#manage" style="cursor:default">
                                <span class="icon">
                                    <i class="fas fa-users-cog" aria-hidden="true"></i>
                                </span>
                                <span class="list">Manage</span>
                            </a>
                        </li>
                        <div class="collapse collapse-manage" id="manage">
                            <li>
                                <a href="mid-add-babies.php" class="text-uppercase drop">
                                    <span class="icon">
                                        <i class="fas fa-user-plus" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">add babies</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-uppercase drop-active">
                                    <span class="icon-active">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <span class="list">view babies</span>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="mid-charts.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-chart-bar" aria-hidden="true"></i>
                                </span>
                                <span class="list">charts</span>
                            </a>
                        </li>
                        <li>
                            <a href="mid-inbox.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-inbox" aria-hidden="true"></i>
                                    
                                    <?php 
                                        include "php/selectdb.php";
                                        $sql001="SELECT COUNT(status) AS unreadSMS FROM midwife_message WHERE status='unread' AND midwife_id='".$_SESSION['midwife_id']."'";
                                        $run001=mysqli_query($conn,$sql001);
                                        $row001=mysqli_fetch_assoc($run001);
                                        $count=$row001['unreadSMS'];

                                        if(0<$count && $count<=9) {
                                            echo "<span class='badge badge-danger'>";
                                            echo $count;
                                            echo "</span>";
                                        }
                                        else if($count>9) {
                                            echo "<span class='badge badge-danger'>";
                                            echo "9+";
                                            echo "</span>";
                                        }
                                    ?>
                                    
                                </span>
                                <span class="list">Inbox</span>
                            </a>
                        </li>
                        <li>
                            <a href="mid-location.php" class="text-uppercase">
                                <span class="icon">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                </span>
                                <span class="list">Locations</span>
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
                                    <h5 class="card-title text-uppercase">active babies</h5>
                                    
                                    <div class="table-for-data" style="margin-top: 30px">
                        
                                        <?php
                                        mysqli_select_db($conn, 'cs2019g6');

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
                                                          FROM baby_register WHERE midwife_id='".$_SESSION['midwife_id']."' AND status='active') x";
                                        $result1= mysqli_query($conn,$query1);

                                        ?>

                                        <table class="mdl-data-table table-responsive bordered" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Mother NIC</th>
                                                    <th>Baby ID</th>
                                                    <th>Baby Name</th>
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
                                                        <form action="../general/view-data.php" method="POST" onsubmit="return confirmBox()">
                                                            <input type="hidden" name="view-id" value="<?php echo $row['baby_id']; ?>">
                                                            <button type="submit" name="view-btn" class="btn view-btn"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                        </form>
                                                    </td>
                                                    <td class="d-flex justify-content-end remove-btns">
                                                        <form action="./php/inactive-baby-action.php" method="POST" onsubmit="return confirmBox()">
                                                            <input type="hidden" name="remove-baby" value="<?php echo $row['baby_id']; ?>">
                                                            <button type="submit" name="submit-baby" class="btn remove-btn"><i class="fa fa-trash" aria-hidden="true"></i><span>Inactive BABY</span></button>
                                                        </form>
                                                        <form action="./php/inactive-mother-action.php" method="POST" onsubmit="return confirmBox()">
                                                            <input type="hidden" name="remove-mother" value="<?php echo $row['mother_nic']; ?>">
                                                            <button type="submit" name="submit-mother" class="btn remove-btn ml-2"><i class="fa fa-trash" aria-hidden="true"></i><span>Inactive MOTHER</span></button>
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
                    <br><br>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">inactive babies</h5>
                                    
                                    <div class="table-for-data" style="margin-top: 30px">
                        
                                        <?php
                                        mysqli_select_db($conn, 'cs2019g6');

                                        $query2 = "SELECT 
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
                                                          FROM baby_register WHERE midwife_id='".$_SESSION['midwife_id']."' AND status='inactive') x";
                                        $result2= mysqli_query($conn,$query2);

                                        ?>

                                        <table class="mdl-data-table table-responsive bordered" id="datatable2">
                                            <thead>
                                                <tr>
                                                    <th>Mother NIC</th>
                                                    <th>Baby ID</th>
                                                    <th>Baby Name</th>
                                                    <th>Age</th>
                                                    <th>View</th>
                                                    <th>Active</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                        <?php
                                        if ($result2) {
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                        ?>        

                                                <tr>
                                                    <td><?php echo $row2['mother_nic']; ?></td>
                                                    <td><?php echo $row2['baby_id']; ?></td>
                                                    <td><?php echo $row2['baby_first_name']." ".$row2['baby_last_name']; ?></td>
                                                    <td><?php echo $row2['age']; ?></td>
                                                    <td>
                                                        <form action="php/active-baby-action.php" method="POST" onsubmit="return confirmBox()">
                                                            <input type="hidden" name="active_baby_id" value="<?php echo $row2['baby_id']; ?>">
                                                            <button type="submit" name="view-btn" class="btn view-btn"><i class="fa fa-eye" aria-hidden="true"></i><span>active Baby</span></button>
                                                        </form>
                                                    </td>
                                                    <td class="d-flex justify-content-end remove-btns">
                                                        <form action="./php/delete-baby-action.php" method="POST" onsubmit="return confirmBox()">
                                                            <input type="hidden" name="delete_baby" value="<?php echo $row2['baby_id']; ?>">
                                                            <button type="submit" name="submit-baby" class="btn remove-btn"><i class="fa fa-trash" aria-hidden="true"></i><span>BABY</span></button>
                                                        </form>
                                                        <form action="./php/delete-mother-action.php" method="POST" onsubmit="return confirmBox()">
                                                            <input type="hidden" name="delete_mother" value="<?php echo $row2['mother_nic']; ?>">
                                                            <button type="submit" name="submit-mother" class="btn remove-btn ml-2"><i class="fa fa-trash" aria-hidden="true"></i><span>MOTHER</span></button>
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
    <!-----------confirmation script------------------------------->
    <script>
        function confirmBox() {

            if(confirm("Are you sure?")== true){
                return true;
            }
            else{
                return false;
            }
            
        }
    </script>

</body>

</html>


<?php mysqli_close($conn); ?>