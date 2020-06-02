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
                <a href="./sis-dashboard.php" class="text-uppercase ss-dash">
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
                    <a href="./sis-add-midwife.php" class="text-uppercase drop ss-add">
                        <span class="icon-active">
                            <i class="fas fa-user-plus" aria-hidden="true"></i>
                        </span>
                        <span class="list">වින්නඹුවන් එක් කරන්න</span>
                    </a>
                </li>
                <li>
                    <a href="./sis-view-midwife.php" class="text-uppercase drop ss-viewm">
                        <span class="icon">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list">වින්නඹුවන් බලන්න</span>
                    </a>
                </li>
                <li>
                    <a href="./sis-view-babies.php" class="text-uppercase drop ss-viewb">
                        <span class="icon">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list">ළමුන් බලන්න</span>
                    </a>
                </li>
            </div>
            <li>
                <a href="./sis-table.php" class="text-uppercase ss-table">
                    <span class="icon">
                        <i class="fas fa-table" aria-hidden="true"></i>
                    </span>
                    <span class="list">දත්ත වගු</span>
                </a>
            </li>
            <li>
                <a href="./sis-inbox.php" class="text-uppercase ss-inbox">
                    <span class="icon">
                        <i class="fas fa-inbox" aria-hidden="true"></i>
                    </span>
                    <span class="list">එන පණිවිඩ</span>
                </a>
            </li>
            <li>
                <a href="./sis-send-messages.php" class="text-uppercase ss-send">
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