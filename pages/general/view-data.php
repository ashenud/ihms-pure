<?php 

    session_start();
    include('../../php/basic/connection.php');
 
    $_SESSION['view_id']=$_POST['view-id'];
    $view_id=$_SESSION['view_id'];
    
    $query1="SELECT * FROM baby_register WHERE baby_id='$view_id'";
    $result1=mysqli_query($conn,$query1);    
    $data1=mysqli_fetch_assoc($result1);
    $mother_nic=$data1['mother_nic'];

    $query="SELECT * FROM mother WHERE mother_nic='$mother_nic'";
    $result=mysqli_query($conn,$query);    
    $data=mysqli_fetch_assoc($result);
        
    $mother_name=$data['mother_name'];
    $mother_age=$data1['mother_age'];
    $address=$data['address'];
        
    $baby_first_name=$data1['baby_first_name'];
    $baby_last_name=$data1['baby_last_name'];
    $baby_id=$data1['baby_id'];
    $baby_dob=$data1['baby_dob'];
        
    $query2="SELECT * FROM birth_details WHERE baby_id='$view_id'";
    $result2=mysqli_query($conn,$query2);
    
    $data2=mysqli_fetch_assoc($result2);

    if(isset($data2)) {
        $birth_weight=$data2['birth_weight'];
        $birth_length=$data2['birth_length'];
        $health_states=$data2['health_states'];
        $circumference_of_head=$data2['circumference_of_head'];
        $vitamin_K_status=$data2['vitamin_K_status'];
        $eye_contact=$data2['eye_contact'];
        $milk_position=$data2['milk_position'];   
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
    
    <link rel="stylesheet" href="./css/view-data-style.css">

    <title>Infant Health Management System</title>

</head>


<body>
  
  
<?php
$query3="SELECT baby_gender FROM baby_register WHERE baby_id='$view_id'";
$result3=mysqli_query($conn,$query3);
$data3=mysqli_fetch_assoc($result3);
$gender=$data3['baby_gender'];

if($gender=='M') {
?>

    <div class="background-area pt-1 pb-4" style="background-image:  url('./img/backgroud-boy.jpg');">
        <div class="container mt-3">

            <div class="card" style="background: rgba(227, 242, 253, 0.5);">
                <div class="card-body">
                    <h3 class="card-title text-uppercase">baby details</h3>

                    <div class="container">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Mother details</h5>
                                        <div class="mother-details">

                                            <table class="table" cellpadding="10">
                                                <tr>
                                                    <th>Mother Name</th>
                                                    <td><?php echo $mother_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Mother NIC</th>
                                                    <td><?php echo $mother_nic; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Mother Age</th>
                                                    <td><?php echo $mother_age; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td><?php echo $address; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Baby details</h5>
                                        <div class="baby-details">

                                            <table class="table">
                                                <tr>
                                                    <th>First Name</th>
                                                    <td><?php echo $baby_first_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Last Name</th>
                                                    <td><?php echo $baby_last_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Baby ID</th>
                                                    <td><?php echo $baby_id; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Date of Birth</th>
                                                    <td><?php echo $baby_dob; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Birth details</h5>
                                        <div class="birth-details">

                                            <table class="table">
                                                <tr>
                                                    <th>Birth Weigth</th>
                                                    <td><?php if(isset($birth_weight)) {echo $birth_weight;} ?>KG</td>
                                                </tr>
                                                <tr>
                                                    <th>Birth Lenght</th>
                                                    <td><?php if(isset($birth_length)) {echo $birth_length;} ?>CM</td>
                                                </tr>
                                                <tr>
                                                    <th>Helth States</th>
                                                    <td><?php if(isset($health_states)) {echo $health_states;} ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Circumference of Head</th>
                                                    <td><?php if(isset($circumference_of_head)) {echo $circumference_of_head;} ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Vitamin K States</th>
                                                    <td><?php if(isset($vitamin_K_status)) {echo $vitamin_K_status;} ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Eye Contact</th>
                                                    <td><?php if(isset($eye_contact)) {echo $eye_contact;} ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Milk Posisiton</th>
                                                    <td><?php if(isset($milk_position)) {echo $milk_position;} ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1"></div>
                            <div class="col-md-2 icon-btn d-flex justify-content-center">
                                <button type="submit" class="btn">
                                    <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                        <div class="card-body">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-2 icon-btn d-flex justify-content-center">
                                <button type="submit" class="btn">
                                    <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                        <div class="card-body">
                                            <i class="fas fa-syringe"></i>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-1 justify-content-end mt-auto">
                                <?php 
                                    if(isset($_SESSION['doctor_id'])) {
                                ?>
                                    <a href="../doctor/doc-view-babies.php">
                                        <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                            <div class="card-body">
                                                <i class="fas fa-list"></i>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                                    }
                                    else if(isset($_SESSION['sister_id'])) {
                                ?>
                                    <a href="../sister/sis-view-babies.php">
                                        <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                            <div class="card-body">
                                                <i class="fas fa-list"></i>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                                    }
                                    else if(isset($_SESSION['midwife_id'])) {
                                ?>
                                    <a href="../midwife/mid-view-babies.php">
                                        <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                            <div class="card-body">
                                                <i class="fas fa-list"></i>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                                    }
                                ?>                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

<?php
} 
else {
?>    
 
    <div class="background-area pt-1 pb-4" style="background-image: url('./img/backgroud-girl.jpg');">
        <div class="container mt-3">

            <div class="card" style="background: rgba(248,187,208, 0.5);">
                <div class="card-body">
                    <h3 class="card-title text-uppercase">baby details</h3>

                    <div class="container">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card" style="background: rgba(248,187,208, 0.1);">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Mother details</h5>
                                        <div class="mother-details">

                                            <table class="table" cellpadding="10">
                                                <tr>
                                                    <th>Mother Name</th>
                                                    <td><?php echo $mother_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Mother ID</th>
                                                    <td><?php echo $mother_nic; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Mother Age</th>
                                                    <td><?php echo $mother_age; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td><?php echo $address; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="card" style="background: rgba(248,187,208, 0.1);">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Baby details</h5>
                                        <div class="baby-details">

                                            <table class="table">
                                                <tr>
                                                    <th>First Name</th>
                                                    <td><?php echo $baby_first_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Last Name</th>
                                                    <td><?php echo $baby_last_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Baby ID</th>
                                                    <td><?php echo $baby_id; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Date of Birth</th>
                                                    <td><?php echo $baby_dob; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card" style="background: rgba(248,187,208, 0.1);">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Birth details</h5>
                                        <div class="birth-details">

                                            <table class="table">
                                                <tr>
                                                    <th>Birth Weigth</th>
                                                    <td><?php if(isset($birth_weight)) {echo $birth_weight;} ?>KG</td>
                                                </tr>
                                                <tr>
                                                    <th>Birth Lenght</th>
                                                    <td><?php if(isset($birth_length)) {echo $birth_length;} ?>CM</td>
                                                </tr>
                                                <tr>
                                                    <th>Helth States</th>
                                                    <td><?php if(isset($health_states)) {echo $health_states;} ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Circumference of Head</th>
                                                    <td><?php if(isset($circumference_of_head)) {echo $circumference_of_head;} ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Vitamin K States</th>
                                                    <td><?php if(isset($vitamin_K_status)) {echo $vitamin_K_status;} ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Eye Contact</th>
                                                    <td><?php if(isset($eye_contact)) {echo $eye_contact;} ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Milk Posisiton</th>
                                                    <td><?php if(isset($milk_position)) {echo $milk_position;} ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1"></div>
                            <div class="col-md-2 icon-btn d-flex justify-content-center">
                                <button type="submit" class="btn">
                                    <div class="card" style="background: rgba(248,187,208, 0.1);">
                                        <div class="card-body">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-2 icon-btn d-flex justify-content-center">
                                <button type="submit" class="btn">
                                    <div class="card" style="background: rgba(248,187,208, 0.1);">
                                        <div class="card-body">
                                            <i class="fas fa-syringe"></i>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-1 justify-content-end mt-auto">
                                <?php 
                                    if(isset($_SESSION['doctor_id'])) {
                                ?>
                                    <a href="../doctor/doc-view-babies.php">
                                        <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                            <div class="card-body">
                                                <i class="fas fa-list"></i>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                                    }
                                    else if(isset($_SESSION['sister_id'])) {
                                ?>
                                    <a href="../sister/sis-view-babies.php">
                                        <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                            <div class="card-body">
                                                <i class="fas fa-list"></i>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                                    }
                                    else if(isset($_SESSION['midwife_id'])) {
                                ?>
                                    <a href="../midwife/mid-view-babies.php">
                                        <div class="card" style="background: rgba(227, 242, 253, 0.1);">
                                            <div class="card-body">
                                                <i class="fas fa-list"></i>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                                    }
                                ?>                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    
<?php   
} 
?>
    
    <!-- optional JavaScript -->
    <?php
    //js
    include('../../inc/basic/include-dashboard-js.php');
    //table js
    include('../../inc/basic/include-dashboard-table-js.php');
    ?>
    
</body>

</html>