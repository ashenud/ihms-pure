<div class="sidebar-menu">
    <div class="inner-sidebar-menu">

        <div class="user-area pb-2 mb-3">
            <img src="./img/doctor.png" width="50" class="rounded-circle">
            <a href="#" class="text-uppercase"> <?php echo($_SESSION['admin_id']); ?> </a>
        </div>

        <!--sidebar items-->
        <ul>
            <li>
                <a href="./admin-doc-dashboard.php" class="text-uppercase a-dash">
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
                    <a href="./admin-doc-add-sisters.php" class="text-uppercase drop a-add">
                        <span class="icon">
                            <i class="fas fa-user-plus" aria-hidden="true"></i>
                        </span>
                        <span class="list">හෙදියන් ඇතුලත් කිරීම</span>
                    </a>
                </li>
                <li>
                    <a href="./admin-doc-view-sisters.php" class="text-uppercase drop a-views">
                        <span class="icon">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list">හෙදියන් බලන්න</span>
                    </a>
                </li>
                <li>
                    <a href="./admin-doc-view-babies.php" class="text-uppercase drop a-viewb">
                        <span class="icon">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list">ළමුන් බලන්න</span>
                    </a>
                </li>
            </div>
            <li>
                <a href="./admin-doc-table.php" class="text-uppercase a-table">
                    <span class="icon">
                        <i class="fas fa-table" aria-hidden="true"></i>
                    </span>
                    <span class="list">දත්ත වගු</span>
                </a>
            </li>
            <li>
                <a href="./admin-doc-inbox.php" class="text-uppercase a-inbox">
                    <span class="icon">
                        <i class="fas fa-inbox" aria-hidden="true"></i>
                    </span>
                    <span class="list">එන පණිවිඩ</span>
                </a>
            </li>
            <li>
                <a href="./admin-doc-send-messages.php" class="text-uppercase a-send">
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