<?php 
session_start();
include('../../php/basic/connection.php');
if(!isset($_SESSION['admin_id'])) {	
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
    ?>

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
                    <form id="" name="" method="post" action="/pages/admin-doctor/php/add-doc-thriposa.php" class="bg-white p-4">
                        <div class="form-group">
                            <label for="inputAddress">Remaining Amount (until last month)</label>
                            <input type="text" class="form-control" id="remain-amount" name="remain-amount"
                                placeholder="Remaining Amount (until last month)">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Required Amount for this month</label>
                            <input type="text" class="form-control" id="required-amount" name="required-amount"
                                placeholder="Required Amount for this month">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Expired Amount</label>
                            <input type="text" class="form-control" id="expired-amount" name="expired-amount"
                                placeholder="Expired Amount">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Nested Amount (Amount can be distribute )</label>
                            <input type="text" class="form-control" id="nested-amount" name="nested-amount"
                                placeholder="Nested Amount (Amount can be distribute )">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Month</label>
                            <input type="date" class="form-control" id="month" name="month"
                                placeholder="Nested Amount (Amount can be distribute )">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-primary" value="save" name="save" ">
                        </div>
                        
                    </form>
                    <div class="row mt-5">
                            <div class="col-md-8">
                                <canvas id="myChart" width="100" height="100"></canvas>
                            </div>

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
    ?>
    <script type="text/javascript" src="/assets/js/charts/Chart.js"></script>

    <!-- writed scripts -->
    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.a-table').addClass('active');
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
        });
    </script>
    <!-- end of writed scripts -->

    <?php
    
        $querychart = " SELECT * FROM (
                SELECT YEAR(`updated_date`) AS y, MONTH(`updated_date`) AS m, SUM(`distributed_qty`) AS total, SUM(`available_qty`) AS save, SUM(`distributed_qty`) - SUM(`available_qty`) AS cost,MONTHNAME(`updated_date`) month,`updated_date`
                FROM thriposha_storage GROUP BY YEAR(`updated_date`), MONTH(`updated_date`) ORDER BY `updated_date` DESC LIMIT 12
            ) usages ORDER BY `updated_date` ASC";

        $result1= mysqli_query($conn,$querychart);
        $monthly_chart = array();
        if ($result1) {
            while ($row = mysqli_fetch_assoc($result1)) {
                $monthly_chart[] = $row;
            }
        }
                                  
    ?>

    <script>
        var data = <?php echo json_encode($monthly_chart)  ?>;
        console.log(data);
        var label = [
                data[0].month+ "-" +data[0].y, data[1].month+ "-" +data[1].y, data[2].month+ "-" +data[2].y, data[3].month+ "-" +data[3].y, data[4].month+ "-" +data[4].y, data[5].month+ "-" +data[5].y, data[6].month+ "-" +data[6].y, data[7].month+ "-" +data[7].y, data[8].month+ "-" +data[8].y, data[9].month+ "-" +data[9].y, data[10].month+ "-" +data[10].y, data[11].month+ "-" +data[11].y
            ];
        var datasets = [
            data[0].cost, data[1].cost, data[2].cost, data[3].cost, data[4].cost, data[5].cost, data[6].cost, data[7].cost, data[8].cost, data[9].cost, data[10].cost, data[11].cost
            ];
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: label,
                datasets: [{
                    label: 'Usage of thriposa',
                    data: datasets,
                    backgroundColor: [ 
                        'rgba(54, 162, 235, 0.2)', 
                        'rgba(54, 162, 235, 0.2)', 
                        'rgba(54, 162, 235, 0.2)', 
                        'rgba(54, 162, 235, 0.2)', 
                        'rgba(54, 162, 235, 0.2)', 
                        'rgba(54, 162, 235, 0.2)', 
                        'rgba(54, 162, 235, 0.2)', 
                        'rgba(54, 162, 235, 0.2)', 
                        'rgba(54, 162, 235, 0.2)', 
                        'rgba(54, 162, 235, 0.2)', 
                        'rgba(54, 162, 235, 0.2)', 
                        'rgba(54, 162, 235, 0.2)', 
                         
                    ],
                    borderColor: [ 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(54, 162, 235, 1)', 
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        } 
                    }]
                } 
            }
        });
    </script>



</body>

</html>


<?php mysqli_close($conn); ?>