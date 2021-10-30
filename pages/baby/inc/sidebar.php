<div class="sidebar-menu">
    <div class="inner-sidebar-menu">

        <div class="user-area pb-2 mb-3">
            <img src="/pages/baby/img/baby.png" class="rounded-circle">
            <?php
                $query1 = "SELECT * FROM baby_register WHERE baby_id='".$_SESSION['baby_id']."'";
                $result1= mysqli_query($conn,$query1);
                $row=mysqli_fetch_assoc($result1);
            ?>
            <a href="#"> <span><?php echo $row['baby_first_name']." ".$row['baby_last_name'];?></span> </a>
        </div>

        <!--sidebar items-->
        <ul>
            <li>
                <?php
                    if(isset($_SESSION['doctor_id'])) {
                ?>
                        <a href="/doctor/dashboard" class="text-uppercase">
                        <span class="icon">
                        <i class="fas fa-chart-pie" aria-hidden="true"></i>
                        </span>
                        <span class="list">තොරතුරු පුවරුව</span>
                        </a>
                <?php
                    }
                    else if(isset($_SESSION['sister_id'])) {
                ?>
                        <a href="/sister/dashboard" class="text-uppercase">
                        <span class="icon">
                        <i class="fas fa-chart-pie" aria-hidden="true"></i>
                        </span>
                        <span class="list">තොරතුරු පුවරුව</span>
                        </a>
                <?php
                    }
                    else if(isset($_SESSION['midwife_id'])) {
                ?>
                        <a href="/midwife/dashboard" class="text-uppercase">
                        <span class="icon">
                        <i class="fas fa-chart-pie" aria-hidden="true"></i>
                        </span>
                        <span class="list">තොරතුරු පුවරුව</span>
                        </a>
                <?php
                    }
                    else if(isset($_SESSION['admin_id'])) {
                ?>
                        <a href="/admin/dashboard" class="text-uppercase">
                        <span class="icon">
                        <i class="fas fa-chart-pie" aria-hidden="true"></i>
                        </span>
                        <span class="list">තොරතුරු පුවරුව</span>
                        </a>
                <?php
                    }
                    else {
                ?>
                        <a href="/baby/dashboard" class="text-uppercase b-dash">
                        <span class="icon">
                        <i class="fas fa-chart-pie" aria-hidden="true"></i>
                        </span>
                        <span class="list">තොරතුරු පුවරුව</span>
                        </a>
                <?php
                    }
                ?>
            </li>                     
            <li>
            <?php
                if(isset($_SESSION['doctor_id'])) {
            ?>
                <a href="/doctor/vac-permission" class="text-uppercase">
                    <span class="icon">
                        <i class="fas fa-syringe" aria-hidden="true"></i>
                    </span>
                    <span class="list">එන්නත් කිරීම</span>
                </a>
            <?php
            }
            else if(isset($_SESSION['midwife_id'])) {
            ?>
                <a href="/midwife/vaccine-mark" class="text-uppercase">
                    <span class="icon">
                        <i class="fas fa-syringe" aria-hidden="true"></i>
                    </span>
                    <span class="list">එන්නත් කිරීම</span>
                </a>
            <?php
            }
            else {
            ?>
                <a href="/baby/vaccinations" class="text-uppercase b-vacc">
                    <span class="icon">
                        <i class="fas fa-syringe" aria-hidden="true"></i>
                    </span>
                    <span class="list">එන්නත් කිරීම</span>
                </a>
            <?php
            }
            ?>

            </li>
            
            
            <li>
                <a class="text-uppercase" data-toggle="collapse" href="#charts" id="baby-charts">
                    <span class="icon">
                        <i class="fas fa-chart-bar" aria-hidden="true"></i>
                    </span>
                    <span class="list">වර්ධන සටහන්</span>
                </a>
            </li>
            <div class="collapse collapse-charts" id="charts">
                <li>
                    <a href="/baby/charts-weight" class="text-uppercase drop b-weight">
                        <span class="icon">
                            <i class="fas fa-chart-line" aria-hidden="true"></i>
                        </span>
                        <span class="list">බර ප්‍රස්ථාරය</span>
                    </a>
                </li>
                <li>
                    <a href="/baby/charts-height" class="text-uppercase drop b-height">
                        <span class="icon">
                            <i class="fas fa-chart-line" aria-hidden="true"></i>
                        </span>
                        <span class="list">උස ප්‍රස්ථාරය</span>
                    </a>
                </li>
                <li>
                    <a href="/baby/charts-bmi" class="text-uppercase drop b-hw">
                        <span class="icon">
                            <i class="fas fa-chart-line" aria-hidden="true"></i>
                        </span>
                        <span class="list">උසට සරිලන බර ප්‍රස්ථාරය</span>
                    </a>
                </li>
            </div>
            
            <li>
                <?php
                    if(isset($_SESSION['sister_id'])) {
                ?>
                        <a href="/baby/editable-page" class="text-uppercase b-edit">
                        <span class="icon">
                        <i class="fas fa-table" aria-hidden="true"></i>
                        </span>
                        <span class="list">දත්ත සංස්කරණය</span>
                        </a>
                <?php
                    }
                    elseif(isset($_SESSION['midwife_id'])) {
                ?>
                        <a href="/baby/editable-page" class="text-uppercase b-edit">
                        <span class="icon">
                        <i class="fas fa-table" aria-hidden="true"></i>
                        </span>
                        <span class="list">දත්ත සංස්කරණය</span>
                        </a>
                <?php
                    }
                    elseif(isset($_SESSION['doctor_id'])) {
                ?>
                        <a href="/doctor/baby-data-page" class="text-uppercase">
                        <span class="icon">
                        <i class="fas fa-file-medical-alt" aria-hidden="true"></i>
                        </span>
                        <span class="list">ළමා සෞඛ්‍ය සටහන</span>
                        </a>
                <?php
                    }
                    elseif(isset($_SESSION['admin_id'])) {
                ?>
                        <a href="/baby/editable-page" class="text-uppercase b-edit">
                        <span class="icon">
                        <i class="fas fa-table" aria-hidden="true"></i>
                        </span>
                        <span class="list">දත්ත සංස්කරණය</span>
                        </a>
                <?php
                    }
                ?>
            </li>
            <li>
            <?php
                if(isset($_SESSION['doctor_id'])){
                }
                elseif(isset($_SESSION['sister_id'])){
                }
                elseif(isset($_SESSION['midwife_id'])){
                }
                elseif(isset($_SESSION['admin_id'])){
                }
                else{
            ?>
                    <a href="/baby/inbox" class="text-uppercase b-inbox">
                    <span class="icon">
                    <i class="fas fa-inbox" aria-hidden="true"></i>
                    </span>
                    <span class="list">එන පණිවිඩ</span>
                    </a>
            <?php
                }
            ?>
            </li>
            <li>
            <?php
                if(isset($_SESSION['doctor_id'])){
                }
                elseif(isset($_SESSION['sister_id'])){
                }
                elseif(isset($_SESSION['midwife_id'])){
                }
                elseif(isset($_SESSION['admin_id'])){
                }
                else{
            ?>
                    <a href="/baby/send-messages" class="text-uppercase b-send">
                    <span class="icon">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                    </span>
                    <span class="list">පණිවිඩ යවන්න</span>
                    </a>
            <?php
                }
            ?>
            </li>
            <li>
                <a href="/baby/select" class="text-uppercase">
                    <span class="icon">
                        <i class="fas fa-baby" aria-hidden="true"></i>
                    </span>
                    <span class="list">දරුවා තෝරන්න</span>
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