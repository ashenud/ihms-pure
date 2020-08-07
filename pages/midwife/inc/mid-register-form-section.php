<div class="container" id="formContainer">
    <form id="regForm" action="/pages/midwife/php/insert-registration-data-action.php" method="POST">

        <!-- One "tab" for each step in the form: -->
        <div class="card registration-form"> 

            <div class="card-header">
                <h2>Registration</h2>
            </div>

            <!-- 1st tab -->
            <div class="tab">

                <div class="container progress-area">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="progress">
                                <div class="one colored">
                                    <i class="fas fa-female"></i>
                                </div>
                                <div class="two no-color"></div>
                                <div class="three no-color"></div>
                                <div class="four no-color"></div>
                                <div class="five no-color"></div>
                                <div class="progress-bar" style="width: 34%;"></div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-row d-flex justify-content-start">
                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                            <h5 class="card-title">Mother Details:</h5>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group text-center col-lg-3">
                            <img src="/pages/midwife/img/wizard-img1.png" alt="">
                        </div>

                        <div class="form-group col-lg-9">
                            <div class="container-fluid">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label>Mother's Name:</label>
                                        <input type="text" name="mName" class="form-control mName" id="mName" placeholder="name here"
                                            value="<?php 
                                                if(isset($_SESSION['mName'])) {
                                                    echo $_SESSION['mName'];
                                                }
                                                ?>"
                                            style="<?php 
                                                if(isset($_SESSION['mName'])) {
                                                    echo "color:blue";
                                                }
                                                ?>"
                                            <?php
                                                if(isset($_SESSION['mName'])){
                                                    echo 'readonly';
                                                }
                                                ?>>
                                        <span id="input0" class="error-tooltip mName-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">use only letters range of 3-30</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label>Grama Niladari Division:</label>
                                        <input type="number" name="gnDivision" class="form-control" id="gnDivision"
                                        value="<?php 
                                            if(isset($_SESSION['GnDivision'])){
                                                echo $_SESSION['GnDivision'];
                                            }
                                        ?>"
                                        style="<?php 
                                            if(isset($_SESSION['GnDivision'])){
                                                echo "color:blue";
                                            }
                                        ?>"
                                        <?php 
                                            if(isset($_SESSION['GnDivision'])){
                                                echo 'readonly';
                                            }
                                        ?>>
                                        <span id="input1" style="color:red;"></span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label>Mother's Age:</label>
                                        <input type="number" name="mAge" class="form-control" id="mAge" min="0" placeholder="age">
                                        <span id="input2" class="error-tooltip mAge-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">age must be between 12-100</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label>Mother NIC:</label>
                                        <input type="text" name="mNic" class="form-control" id="mNic" placeholder="nic here" onkeyup="check_mNic();"
                                        style="<?php 
                                            if(isset($_SESSION['mNic'])){
                                                echo "color:blue";
                                        }
                                        ?>" 
                                        value="<?php
                                            if(isset($_SESSION['mNic'])){
                                                echo $_SESSION['mNic'];
                                        }
                                        ?>"
                                        <?php 
                                            if(isset($_SESSION['mNic'])){
                                                echo 'readonly';
                                        }
                                        ?>>
                                        <div id="m-nic-error" style="color: red; font-size: 9px; margin-top: -14px; z-index: 10; position: absolute;"></div>
                                        <span id="input3" class="error-tooltip mNic-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">use only numbers of nic without v or x</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                        <!-- for get tab view -->
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="001/01/0001/0001">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="01/01/0001">
                                        <input type="hidden" value="0711111111">
                                        <input type="hidden" value="11">
                                        <input type="hidden" value="11">
                                        <input type="hidden" value="11">
                                        <input type="hidden" value="abc@gmail.com">
                                        <input type="hidden" value="Password1">
                                        <input type="hidden" value="01/01/0001">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="123">
                                        <input type="hidden" value="123">
                                        <select class="d-none">
                                            <option value="0">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="1">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="2">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="3">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="4">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="5">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="6">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="7">------</option>
                                        </select>                                                           
                                        <!-- for get tab view -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- 2nd tab -->
            <div class="tab">

                <div class="container progress-area">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="progress">
                                <div class="one colored">
                                    <i class="fas fa-female"></i>
                                </div>
                                <div class="two colored">
                                    <i class="fas fa-baby"></i>
                                </div>
                                <div class="three no-color"></div>
                                <div class="four no-color"></div>
                                <div class="five no-color"></div>
                                <div class="progress-bar" style="width: 50%;"></div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-row d-flex justify-content-start">
                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                            <h5 class="card-title">Baby Details:</h5>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group text-center col-lg-3">
                            <img src="/pages/midwife/img/wizard-img2.png" alt="">
                        </div>

                        <div class="form-group col-lg-9">
                            <div class="container-fluid">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <!-- for get tab view -->
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="123">
                                        <input type="hidden" value="12">
                                        <input type="hidden" value="123456789">
                                        <!-- for get tab view -->
                                        <label>First Name:</label>
                                        <input type="text" name="bfName" class="form-control" id="bfName" placeholder="first Name">
                                        <span id="input4" class="error-tooltip bfName-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">use only letters range of 3-30</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label>Last Name:</label>
                                        <input type="text" name="blName" class="form-control" id="blName" placeholder="last Name">
                                        <span id="input5" class="error-tooltip blName-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">use only letters range of 3-30</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label>Baby ID:</label>
                                        <input type="text" name="bId" class="form-control" id="bId" onkeyup="check_babyId();"
                                        placeholder="<?php
                                            $query1="SELECT MAX(baby_id) FROM baby_register WHERE baby_id LIKE'%".$_SESSION['GnDivision']."'";
                                            $result1=mysqli_query($conn,$query1) ;
                                            $row1 = mysqli_fetch_assoc($result1) ;
                                            echo "last_id : ".$row1["MAX(baby_id)"];
                                        ?>">
                                        <div id="baby-id-error" style="color: red; font-size: 9px; margin-top: -14px; z-index: 10; position: absolute;"></div>
                                        <span id="input6" class="error-tooltip tp-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-title">use correct baby id format</p>
                                                        <p class="card-text">current baby number in month</p>
                                                        <p class="card-text">current month</p>
                                                        <p class="card-text">current year</p>
                                                        <p class="card-text">gd number</p>
                                                        <p class="card-text">eg : 001/01/0001/0001</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="address"
                                        value="<?php 
                                            if(isset($_SESSION['addr'])) {
                                            echo $_SESSION['addr'];
                                            }
                                        ?>"
                                        style="<?php 
                                            if(isset($_SESSION['addr'])) {
                                                echo "color:blue";
                                            }
                                        ?>"
                                        <?php 
                                            if(isset($_SESSION['addr'])) {
                                                echo 'readonly';
                                            }
                                        ?>>
                                        <span id="input7" style="color:red;"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label>Date of Birth:</label>
                                        <input type="date" name="dob" max="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="Date of Birth" id="dob">
                                        <span id="input8" style="color:red;"></span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label>Gender:</label>
                                        <select class="form-control form-control-md" name="bGen" id="bGen">
                                            <option value="">------</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                        <span id="select0" class="error-tooltip mGen-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">select a gender</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                        <label>Telephone:</label>
                                        <input type="number" name="tp" min="0" class="form-control" id="tp" placeholder="telephone number"  onkeyup="check_tpNbr();"
                                        value="<?php 
                                            if(isset($_SESSION['tel'])){
                                            echo $_SESSION['tel'];
                                            }
                                        ?>"
                                        style="<?php 
                                            if(isset($_SESSION['tel'])){
                                                echo "color:blue";
                                            }
                                        ?>"
                                        <?php 
                                            if(isset($_SESSION['tel'])){
                                                echo 'readonly';
                                            }
                                        ?>>
                                        <div id="tpnbr-error" style="color: red; font-size: 9px; margin-top: -14px; z-index: 10; position: absolute;"></div>
                                        <span id="input9" class="error-tooltip tp-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-title">use only 10 numbers</p>
                                                        <p class="card-text">eg : 0710000000</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                        <!-- for get tab view -->
                                        <input type="hidden" value="11">
                                        <input type="hidden" value="11">
                                        <input type="hidden" value="11">
                                        <input type="hidden" value="abc@gmail.com">
                                        <input type="hidden" value="Password1">
                                        <input type="hidden" value="01/01/0001">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="123">
                                        <input type="hidden" value="123">
                                        <select class="d-none">
                                            <option value="1">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="2">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="3">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="4">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="5">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="6">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="7">------</option>
                                        </select>
                                        <!-- for get tab view -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            <!-- 3rd tab -->
            <div class="tab">

                <div class="container progress-area">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="progress">
                                <div class="one colored">
                                    <i class="fas fa-female"></i>
                                </div>
                                <div class="two colored">
                                    <i class="fas fa-baby"></i>
                                </div>
                                <div class="three no-color"></div>
                                <div class="four no-color"></div>
                                <div class="five no-color"></div>
                                <div class="progress-bar" style="width: 50%;"></div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-row d-flex justify-content-start">
                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                            <h5 class="card-title">Birth Details:</h5>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group text-center col-lg-3">
                            <img src="/pages/midwife/img/wizard-img3.png" alt="">
                        </div>

                        <div class="form-group col-lg-9">
                            <div class="container-fluid">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <!-- for get tab view -->
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="123">
                                        <input type="hidden" value="12">
                                        <input type="hidden" value="123456789">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="001/01/0001/0001">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="01/01/0001">
                                        <input type="hidden" value="0711111111">
                                        <select class="d-none">
                                            <option value="1">------</option>
                                        </select>
                                        <!-- for get tab view -->
                                        <label>Birth Weight: (in KG)</label>
                                        <input type="number" step="0.01" min="0" name="bWeight" class="form-control" id="bWeight" placeholder="birth weight">
                                        <span id="input10" class="error-tooltip bWeight-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">use only numbers in 2,2</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label>Birth Length: (in CM)</label>
                                        <input type="number" step="0.01" min="0" name="bLength" class="form-control" id="bLength" placeholder="birth length">
                                        <span id="input11" class="error-tooltip bLength-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">use only numbers in 2,2</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label>Circumference of Head: (in CM)</label>
                                        <input type="number" step="0.01" min="0" name="circumHead" class="form-control" id="circumHead" 
                                        placeholder="circumference of head">
                                        <span id="input12" class="error-tooltip circumHead-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">use only numbers in 2,2</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label>Health States:</label>
                                        <select class="form-control form-control-md" name="hStates" id="hStates">
                                            <option value="">------</option>
                                            <option value="Good">Good</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Weak">Weak</option>
                                        </select>
                                        <span id="select1" class="error-tooltip hStates-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">select health states</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label>APGAR 1 Score:</label>
                                        <select class="form-control form-control-md" name="apgar1" id="apgar1">
                                            <option value="">------</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                        <span id="select2" class="error-tooltip apgar1-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">select apgar1 score</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label>APGAR 2 Score:</label>
                                        <select class="form-control form-control-md" name="apgar2" id="apgar2">
                                            <option value="">------</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                        <span id="select3" class="error-tooltip apgar2-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">select apgar2 score</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label>APGAR 3 Score:</label>
                                        <select class="form-control form-control-md" name="apgar3" id="apgar3">
                                            <option value="">------</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                        <span id="select4" class="error-tooltip apgar3-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">select apgar3 score</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label>Vitamin K States:</label>
                                        <select class="form-control form-control-md" name="vitaminK" id="vitaminK">
                                            <option value="">------</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span id="select5" class="error-tooltip vitaminK-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">select vitamin k states</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label>Eye Contact:</label>
                                        <select class="form-control form-control-md" name="eyeContact" id="eyeContact">
                                            <option value="">------</option>
                                            <option value="Good">Good</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Weak">Weak</option>
                                        </select>
                                        <span id="select6" class="error-tooltip eyeContact-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">select eye contact states</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label>Milk Position:</label>
                                        <select class="form-control form-control-md" name="mPosition" id="mPosition">
                                            <option value="">------</option>
                                            <option value="Cradle position">Cradle position</option>
                                            <option value="Cross-cradle position">Cross-cradle position</option>
                                            <option value="Clutch position">Clutch position</option>
                                            <option value="Side-lying position">Side-lying position</option>
                                        </select>
                                        <span id="select7" class="error-tooltip mPosition-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">select a milk position</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                        <!-- for get tab view -->
                                        <input type="hidden" value="abc@gmail.com">
                                        <input type="hidden" value="Password1">
                                        <input type="hidden" value="01/01/0001">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="123">
                                        <input type="hidden" value="123">
                                        <!-- for get tab view -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- 4th tab -->
            <div class="tab">

                <div class="container progress-area">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="progress">
                                <div class="one colored">
                                    <i class="fas fa-female"></i>
                                </div>
                                <div class="two colored">
                                    <i class="fas fa-baby"></i>
                                </div>
                                <div class="three colored">
                                    <i class="fas fa-key"></i>
                                </div>
                                <div class="four no-color"></div>
                                <div class="five no-color"></div>
                                <div class="progress-bar" style="width: 66%;"></div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-row d-flex justify-content-start">
                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                            <h5 class="card-title">Other Details:</h5>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group text-center col-lg-3">
                            <img src="/pages/midwife/img/wizard-img4.png" alt="">
                        </div>
                        <div class="form-group col-lg-9">
                            <div class="container-fluid">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <!-- for get tab view -->
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="123">
                                        <input type="hidden" value="12">
                                        <input type="hidden" value="123456789">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="001/01/0001/0001">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="01/01/0001">
                                        <input type="hidden" value="0711111111">
                                        <input type="hidden" value="11">
                                        <input type="hidden" value="11">
                                        <input type="hidden" value="11"> 
                                        <!-- end of for get tab view -->           
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="enter email"  onkeyup="check_email();"
                                        value="<?php 
                                            if(isset($_SESSION['email'])){
                                            echo $_SESSION['email'];
                                            }
                                        ?>"
                                        style="<?php 
                                            if(isset($_SESSION['email'])){
                                                echo "color:blue";
                                            }
                                        ?>" 
                                        <?php 
                                            if(isset($_SESSION['email'])){
                                                echo 'readonly';
                                            }
                                        ?>>
                                        
                                        <div id="email-error" style="color: red; font-size: 9px; margin-top: -14px; z-index: 10; position: absolute;"></div>
                                        <span id="input13" class="error-tooltip email-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">eg : example@example.com</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label>Password:</label>
                                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="password"
                                        value="<?php
                                            if(isset($_SESSION['mNic'])){
                                                echo 'notChanged1';
                                            }
                                        ?>"
                                        <?php
                                            if(isset($_SESSION['mNic'])){
                                                echo "readonly";
                                            }
                                        ?>>
                                        <span toggle="#pwd" class="far fa-fw fa-eye password-icon"></span>
                                        <span id="input14" class="error-tooltip pwd-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-title">password must contain the followings</p>
                                                        <p class="card-text">a lowercase letter</p>
                                                        <p class="card-text">A uppercase letter</p>
                                                        <p class="card-text">a number</p>
                                                        <p class="card-text">between 8-20 charactors</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label>Register Date:</label>
                                        <input type="date" name="rDate" class="form-control" style="color:blue" id="currentDate"
                                        value="<?php 
                                            echo date('Y-m-d');
                                        ?>">
                                        <span id="input15" style="color:red;"></span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label>Midwife ID:</label>
                                        <input type="text" name="midId" class="form-control" style="color:blue" readonly
                                        value="<?php 
                                               echo $_SESSION['midwife_id'];
                                        ?>">
                                        <span id="input16" style="color:red;"></span>
                                        <!-- for get tab view -->
                                        <input type="hidden" value="123">
                                        <input type="hidden" value="123">
                                        <select class="d-none">
                                            <option value="0">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="1">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="2">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="3">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="4">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="5">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="6">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="7">------</option>
                                        </select>
                                        <!-- end of for get tab view -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- 5th tab -->
            <div class="tab">

                <div class="container progress-area">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="progress">
                                <div class="one colored">
                                    <i class="fas fa-female"></i>
                                </div>
                                <div class="two colored">
                                    <i class="fas fa-baby"></i>
                                </div>
                                <div class="three colored">
                                    <i class="fas fa-key"></i>
                                </div>
                                <div class="four colored">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="five no-color"></div>
                                <div class="progress-bar" style="width: 82%;"></div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-row d-flex justify-content-start">
                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                            <h5 class="card-title">Location Details:</h5>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group text-center col-lg-3">
                            <img src="/pages/midwife/img/wizard-img5.png" alt="">
                        </div>
                        <div class="form-group col-lg-6 mb-2">
                            <div class="container map-area"
                            <?php
                            if(isset($_SESSION['mNic'])){
                                echo"style='pointer-events: none; cursor: no-drop;'";
                            }
                            ?>>
                                <div id="map"></div>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <div class="container-fluid">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <!-- for get tab view -->
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="123">
                                        <input type="hidden" value="12">
                                        <input type="hidden" value="123456789">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="001/01/0001/0001">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="01/01/0001">
                                        <input type="hidden" value="0711111111">
                                        <input type="hidden" value="11">
                                        <input type="hidden" value="11">
                                        <input type="hidden" value="11">
                                        <input type="hidden" value="abc@gmail.com">
                                        <input type="hidden" value="Password1">
                                        <input type="hidden" value="01/01/0001">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="abc">
                                        <input type="hidden" value="abc">
                                        <select class="d-none">
                                            <option value="0">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="1">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="2">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="3">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="4">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="5">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="6">------</option>
                                        </select>
                                        <select class="d-none">
                                            <option value="7">------</option>
                                        </select>
                                        <!-- for get tab view -->
                                        <label>Latitude of your location:</label>
                                        <input type="text" name="latInput" class="form-control" id="latInput" readonly
                                        value="<?php
                                            if(isset($_SESSION['mNic'])){
                                                echo '0.000000000000000';
                                            }
                                        ?>">
                                        <span id="input17" class="error-tooltip lat-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">click map to select latitude</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label>Longitude of your location:</label>
                                        <input type="text" name="longInput" class="form-control" id="longInput" readonly
                                        value="<?php
                                            if(isset($_SESSION['mNic'])){
                                                echo '0.000000000000000';
                                            }
                                        ?>">
                                        <span id="input18" class="error-tooltip long-error">
                                            <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top" data-html="true" 
                                               title='<div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">click map to select longitude</p>
                                                    </div>
                                                </div>'>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <?php
                                            if(isset($_SESSION['mNic'])){
                                                echo '<p class="complete">already completed this step! </br>please skip </p>';
                                            }
                                            else {
                                                echo '<p class="incomplete">click map to catch your location</p>';
                                            }
                                        ?>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>

            <!-- 6th tab -->
            <div class="tab">

                <div class="container progress-area">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="progress">
                                <div class="one colored">
                                    <i class="fas fa-female"></i>
                                </div>
                                <div class="two colored">
                                    <i class="fas fa-baby"></i>
                                </div>
                                <div class="three colored">
                                    <i class="fas fa-key"></i>
                                </div>
                                <div class="four colored">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="five colored">
                                    <i class="far fa-check-circle"></i>
                                </div>
                                <div class="progress-bar" style="width: 100%;"></div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-row d-flex justify-content-start">
                        <div class="form-group col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                            <h5 class="card-title">Click Submit to Register:</h5>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group text-center col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <img src="/pages/midwife/img/wizard-img6.png" alt="">
                        </div>
                        <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                            <!-- for get tab view -->
                            <input type="hidden" value="abc">
                            <input type="hidden" value="123">
                            <input type="hidden" value="12">
                            <input type="hidden" value="123456789">
                            <input type="hidden" value="abc">
                            <input type="hidden" value="abc">
                            <input type="hidden" value="001/01/0001/0001">
                            <input type="hidden" value="abc">
                            <input type="hidden" value="01/01/0001">
                            <input type="hidden" value="0711111111">
                            <input type="hidden" value="11">
                            <input type="hidden" value="11">
                            <input type="hidden" value="11">
                            <input type="hidden" value="abc@gmail.com">
                            <input type="hidden" value="Password1">
                            <input type="hidden" value="01/01/0001">
                            <input type="hidden" value="abc">
                            <input type="hidden" value="123">
                            <input type="hidden" value="123">
                            <select class="d-none">
                                <option value="0">------</option>
                            </select>
                            <select class="d-none">
                                <option value="1">------</option>
                            </select>
                            <select class="d-none">
                                <option value="2">------</option>
                            </select>
                            <select class="d-none">
                                <option value="3">------</option>
                            </select>
                            <select class="d-none">
                                <option value="4">------</option>
                            </select>
                            <select class="d-none">
                                <option value="5">------</option>
                            </select>
                            <select class="d-none">
                                <option value="6">------</option>
                            </select>
                            <select class="d-none">
                                <option value="7">------</option>
                            </select>                                                          
                            <!-- for get tab view -->
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-footer">

                <!-- Button which the steps of the form: -->
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <a href="/pages/midwife/php/session-reset.php?sessionReset=1" class="btn" type="button" id="clearBtn">Clear</a>
                        <button class="btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button class="btn" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center; margin-top:20px;" class="d-flex justify-content-center">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>

            </div>

        </div>

    </form>
</div>