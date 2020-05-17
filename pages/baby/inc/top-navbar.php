<div class="top-navbar">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-uppercase font-weight-bold" href="/pages/baby/baby-select.php">සුරකිමු දරුවන්</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">
                            <i class="fas fa-home"></i>
                            <span class="text-uppercase">මුල් පිටුවට</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown 
                    <?php if(!isset($_SESSION['mother_id'])) {	
                        echo "d-none";
                        }
                        if(isset($_SESSION['doctor_id'])){
                            echo "d-none";
                        }
                        elseif(isset($_SESSION['sister_id'])){
                            echo "d-none";
                        }
                        elseif(isset($_SESSION['midwife_id'])){
                            echo "d-none";
                        }
                        elseif(isset($_SESSION['admin_id'])){
                            echo "d-none";
                        }
                        else {}
                    ?>">
                        <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ඔබේ ගිණුම
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-uppercase" href="./baby-password-change.php">
                                <i class="fas fa-key"></i>
                                මුරපදය වෙනස් කරන්න
                            </a>
                            <a class="dropdown-item text-uppercase" href="../../php/logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                නික්මෙන්න
                            </a>
                        </div>
                    </li>
                    
                    <!--to fit drop down menu-->                   
                    <li class="to-fit">
                        <i class="fas fa-baby"></i>
                    </li>
                    <li class="to-fit">
                        <i class="fas fa-baby"></i>
                    </li>
                    <li class="to-fit">
                        <i class="fas fa-baby"></i>
                    </li>
                    <!--to fit drop down menu-->
                    
                </ul>
            </div>
        </div>
    </nav>
</div>