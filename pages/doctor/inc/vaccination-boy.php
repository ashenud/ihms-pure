<div class="main-timeline">

    <!--at birth timeline-->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content color-male">

            <!--at birth vaccination-->
            <div class="title">
                <h3>උපතේදී</h3>
            </div>

            <div class="description">

                <!--BCG-1-->
                <?php
                $sql1="SELECT * FROM child_health_note WHERE baby_id='".$_SESSION['baby_id']."' AND baby_age_group_id=1";
                $run1=mysqli_query($conn,$sql1);
                $data1=mysqli_fetch_assoc($run1);

                $query1="SELECT * FROM vac_birth WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=1";
                $result1=mysqli_query($conn,$query1);
                $row1=mysqli_fetch_assoc($result1);

                    if(empty($data1['baby_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine1" value="1" disabled>
                                <label for="vaccine1">බී.සී.ජී.<br>(B.C.G.)</label>
                            </span>
                            <button class="btn" id='vac-approvel-with-data' data-toggle='modal' href='#vac-confirm-with-data' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='1'>
                                <span class="badge badge-danger">පළමු මස සටහන තබන්න</span>
                            </button>
                        </div>
                <?php 
                    }
                    else if(!empty($row1['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine1" value="1" checked="checked" disabled>
                                <label for="vaccine1">බී.සී.ජී.<br>(B.C.G.)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine1" value="1" disabled>
                                <label for="vaccine1">බී.සී.ජී.<br>(B.C.G.)</label>
                            </span>
                        </div>
                <?php
                    }
                ?>
                <!--end BCG-1-->

                <!-- BCG-2(if no scar) -->
                <?php
                if(empty($row1['status']) || empty($data1['baby_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine2" value="2" disabled>
                            <label for="vaccine2">බී.සී.ජී. දෙවන මාත්‍රාව<br>(B.C.G. 2nd dose)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query2="SELECT * FROM vac_birth WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=2";
                    $result2=mysqli_query($conn,$query2);
                    $row2=mysqli_fetch_assoc($result2);
                    if(!empty($row2['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine2" value="2" checked="checked" disabled>
                                <label for="vaccine2">බී.සී.ජී. දෙවන මාත්‍රාව<br>(B.C.G. 2nd dose)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row2['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine2" value="2" disabled>
                                <label for="vaccine2">බී.සී.ජී. දෙවන මාත්‍රාව<br>(B.C.G. 2nd dose)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine2" value="2" disabled>
                                <label for="vaccine2">බී.සී.ජී. දෙවන මාත්‍රාව<br>(B.C.G. 2nd dose)</label>
                            </span>
                            <button class="btn" id='vac-approvel' data-toggle='modal' href='#vac-confirm' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='2'>
                                <span class="badge badge-off">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end BCG-2(if no scar)-->
            </div>
        </div>
    </div>

    <!-- 2 months timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content color-male">

            <!--2 months vaccination--->
            <div class="title">
                <h3>2 වන මාසය සම්පූර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- Pentavalent 1-->
                <?php
                if(empty($row1['status']) || empty($data1['baby_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine3" value="3" disabled>
                            <label for="vaccine3">පංච සං‍යුජ එන්නත 1<br>(Pentavalent 1)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query3="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=3";
                    $result3=mysqli_query($conn,$query3);
                    $row3=mysqli_fetch_assoc($result3);
                    if(!empty($row3['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine3" value="3" checked="checked" disabled>
                                <label for="vaccine3">පංච සං‍යුජ එන්නත 1<br>(Pentavalent 1)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row3['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine3" value="3" disabled>
                                <label for="vaccine3">පංච සං‍යුජ එන්නත 1<br>(Pentavalent 1)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine3" value="3" disabled>
                                <label for="vaccine3">පංච සං‍යුජ එන්නත 1<br>(Pentavalent 1)</label>
                            </span>
                            <button class="btn" id='vac-approvel-with-data' data-toggle='modal' href='#vac-confirm-with-data' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='3'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- Pentavalent 1 -->

                <!-- OPV-1 -->
                <?php
                if(empty($row3['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine4" value="4" disabled>
                            <label for="vaccine4">මුඛ පෝලියෝ 1<br>(OPV 1)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query4="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=4";
                    $result4=mysqli_query($conn,$query4);
                    $row4=mysqli_fetch_assoc($result4);
                    if(!empty($row4['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine4" value="4" checked="checked" disabled>
                                <label for="vaccine4">මුඛ පෝලියෝ 1<br>(OPV 1)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row4['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine4" value="4" disabled>
                                <label for="vaccine4">මුඛ පෝලියෝ 1<br>(OPV 1)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine4" value="4" disabled>
                                <label for="vaccine4">මුඛ පෝලියෝ 1<br>(OPV 1)</label>
                            </span>
                            <button class="btn" id='vac-approvel' data-toggle='modal' href='#vac-confirm' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='4'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- end OPV-1 -->

                <!-- fIPV-1 -->
                <?php
                if(empty($row4['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine5" value="5" disabled>
                            <label for="vaccine5">අජීවී පෝලියෝ 1<br>(fIPV 1)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query5="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=5";
                    $result5=mysqli_query($conn,$query5);
                    $row5=mysqli_fetch_assoc($result5);
                    if(!empty($row5['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine5" value="5" checked="checked" disabled>
                                <label for="vaccine5">අජීවී පෝලියෝ 1<br>(fIPV 1)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row5['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine5" value="5" disabled>
                                <label for="vaccine5">අජීවී පෝලියෝ 1<br>(fIPV 1)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine5" value="5" disabled>
                                <label for="vaccine5">අජීවී පෝලියෝ 1<br>(fIPV 1)</label>
                            </span>
                            <button class="btn" id='vac-approvel' data-toggle='modal' href='#vac-confirm' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='5'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end fIPV-1-->
            </div>
        </div>
    </div>

    <!-- 4 month timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content color-male">

            <!--4 month vaccination-->
            <div class="title">
                <h3>4 වන මාසය සම්පූර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- Pentavalent-2 -->
                <?php
                if(empty($row5['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine6" value="6" disabled>
                            <label for="vaccine6">පංච සං‍යුජ එන්නත 2<br>(Pentavalent 2)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query6="SELECT * FROM vac_4months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=6";
                    $result6=mysqli_query($conn,$query6);
                    $row6=mysqli_fetch_assoc($result6);
                    if(!empty($row6['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine6" value="6" checked="checked" disabled>
                                <label for="vaccine6">පංච සං‍යුජ එන්නත 2<br>(Pentavalent 2)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row6['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine6" value="6" disabled>
                                <label for="vaccine6">පංච සං‍යුජ එන්නත 2<br>(Pentavalent 2)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine6" value="6" disabled>
                                <label for="vaccine6">පංච සං‍යුජ එන්නත 2<br>(Pentavalent 2)</label>
                            </span>
                            <button class="btn" id='vac-approvel-with-data' data-toggle='modal' href='#vac-confirm-with-data' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='6'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end Pentavalent-2 -->

                <!-- OPV-2 -->
                <?php
                if(empty($row6['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine7" value="7" disabled>
                            <label for="vaccine7">මුඛ පෝලියෝ 2<br>(OPV 2)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query7="SELECT * FROM vac_4months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=7";
                    $result7=mysqli_query($conn,$query7);
                    $row7=mysqli_fetch_assoc($result7);
                    if(!empty($row7['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine7" value="7" checked="checked" disabled>
                                <label for="vaccine7">මුඛ පෝලියෝ 2<br>(OPV 2)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row7['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine7" value="7" disabled>
                                <label for="vaccine7">මුඛ පෝලියෝ 2<br>(OPV 2)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine7" value="7" disabled>
                                <label for="vaccine7">මුඛ පෝලියෝ 2<br>(OPV 2)</label>
                            </span>
                            <button class="btn" id='vac-approvel' data-toggle='modal' href='#vac-confirm' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='7'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- end OPV-2 -->

                <!-- fIPV-2 -->
                <?php
                if(empty($row7['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine8" value="8" disabled>
                            <label for="vaccine8">අජීවී පෝලියෝ 2<br>(fIPV 2)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query8="SELECT * FROM vac_4months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=8";
                    $result8=mysqli_query($conn,$query8);
                    $row8=mysqli_fetch_assoc($result8);
                    if(!empty($row8['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine8" value="8" checked="checked" disabled>
                                <label for="vaccine8">අජීවී පෝලියෝ 2<br>(fIPV 2)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row8['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine8" value="8" disabled>
                                <label for="vaccine8">අජීවී පෝලියෝ 2<br>(fIPV 2)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine8" value="8" disabled>
                                <label for="vaccine8">අජීවී පෝලියෝ 2<br>(fIPV 2)</label>
                            </span>
                            <button class="btn" id='vac-approvel' data-toggle='modal' href='#vac-confirm' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='8'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end fIPV-2 -->
            </div>
        </div>
    </div>

    <!-- 6 month timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content color-male">

            <!--6 month vaccination-->
            <div class="title">
                <h3>6 වන මාසය සම්පූර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!--Pentavalent-2-->
                <?php
                if(empty($row8['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine9" value="9" disabled>
                            <label for="vaccine9">පංච සං‍යුජ එන්නත 3<br>(Pentavalent 3)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query9="SELECT * FROM vac_6months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=9";
                    $result9=mysqli_query($conn,$query9);
                    $row9=mysqli_fetch_assoc($result9);
                    if(!empty($row9['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine9" value="9" checked="checked" disabled>
                                <label for="vaccine9">පංච සං‍යුජ එන්නත 3<br>(Pentavalent 3)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row9['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine9" value="9" disabled>
                                <label for="vaccine9">පංච සං‍යුජ එන්නත 3<br>(Pentavalent 3)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine9" value="9" disabled>
                                <label for="vaccine9">පංච සං‍යුජ එන්නත 3<br>(Pentavalent 3)</label>
                            </span>
                            <button class="btn" id='vac-approvel-with-data' data-toggle='modal' href='#vac-confirm-with-data' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='9'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end Pentavalent-3 -->

                <!-- OPV-3 -->
                <?php
                if(empty($row9['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine10" value="10" disabled>
                            <label for="vaccine10">මුඛ පෝලියෝ 3<br>(OPV 3)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query10="SELECT * FROM vac_6months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=10";
                    $result10=mysqli_query($conn,$query10);
                    $row10=mysqli_fetch_assoc($result10);
                    if(!empty($row10['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine10" value="10" checked="checked" disabled>
                                <label for="vaccine10">මුඛ පෝලියෝ 3<br>(OPV 3)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row10['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine10" value="10" disabled>
                                <label for="vaccine10">මුඛ පෝලියෝ 3<br>(OPV 3)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine10" value="10" disabled>
                                <label for="vaccine10">මුඛ පෝලියෝ 3<br>(OPV 3)</label>
                            </span>
                            <button class="btn" id='vac-approvel' data-toggle='modal' href='#vac-confirm' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='10'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- end OPV-3 -->
            </div>
        </div>
    </div>

    <!-- 9 month timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content color-male">

            <!--9 month vaccination-->
            <div class="title">
                <h3>9 වන මාසය සම්පූර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- MMR-1 -->
                <?php
                if(empty($row10['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine11" value="11" disabled>
                            <label for="vaccine11">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 1<br>(MMR 1)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query11="SELECT * FROM vac_9months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=11";
                    $result11=mysqli_query($conn,$query11);
                    $row11=mysqli_fetch_assoc($result11);
                    if(!empty($row11['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine11" value="11" checked="checked" disabled>
                                <label for="vaccine11">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 1<br>(MMR 1)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row11['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine11" value="11" disabled>
                                <label for="vaccine11">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 1<br>(MMR 1)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine11" value="11" disabled>
                                <label for="vaccine11">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 1<br>(MMR 1)</label>
                            </span>
                            <button class="btn" id='vac-approvel-with-data' data-toggle='modal' href='#vac-confirm-with-data' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='11'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end MMR-1-->    
            </div>
        </div>
    </div>

    <!-- 12 month timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content color-male">

            <!--12 month vaccination-->
            <div class="title">
                <h3>12 වන මාසය සම්පූර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- Live JE -->
                <?php
                if(empty($row11['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine12" value="12" disabled>
                            <label for="vaccine12">ජපන් නිදිකර්පථප්‍රදාහය<br>(Live JE)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query12="SELECT * FROM vac_12months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=12";
                    $result12=mysqli_query($conn,$query12);
                    $row12=mysqli_fetch_assoc($result12);
                    if(!empty($row12['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine12" value="12" checked="checked" disabled>
                                <label for="vaccine12">ජපන් නිදිකර්පථප්‍රදාහය<br>(Live JE)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row12['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine12" value="12" disabled>
                                <label for="vaccine12">ජපන් නිදිකර්පථප්‍රදාහය<br>(Live JE)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine12" value="12" disabled>
                                <label for="vaccine12">ජපන් නිදිකර්පථප්‍රදාහය<br>(Live JE)</label>
                            </span>
                            <button class="btn" id='vac-approvel-with-data' data-toggle='modal' href='#vac-confirm-with-data' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='12'>
                                <span class="badge badge-off">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end Live JE -->                                                
            </div>
        </div>
    </div>

    <!-- 18 months timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content color-male">

            <!-- 18 months vaccination-->
            <div class="title">
                <h3>18 වන මාසය සම්පූර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- DPT -->
                <?php
                if(empty($row11['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine13" value="13" disabled>
                            <label for="vaccine13">ත්‍රිත්ව<br>(DPT)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query13="SELECT * FROM vac_18months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=13";
                    $result13=mysqli_query($conn,$query13);
                    $row13=mysqli_fetch_assoc($result13);
                    if(!empty($row13['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine13" value="13" checked="checked" disabled>
                                <label for="vaccine13">ත්‍රිත්ව<br>(DPT)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row13['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine13" value="13" disabled>
                                <label for="vaccine13">ත්‍රිත්ව<br>(DPT)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine13" value="13" disabled>
                                <label for="vaccine13">ත්‍රිත්ව<br>(DPT)</label>
                            </span>
                            <button class="btn" id='vac-approvel-with-data' data-toggle='modal' href='#vac-confirm-with-data' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='13'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- DPT -->

                <!--OPV-4-->
                <?php
                if(empty($row13['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine14" value="14" disabled>
                            <label for="vaccine14">මුඛ පෝලියෝ 4<br>(OPV 4)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query14="SELECT * FROM vac_18months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=14";
                    $result14=mysqli_query($conn,$query14);
                    $row14=mysqli_fetch_assoc($result14);
                    if(!empty($row14['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine14" value="14" checked="checked" disabled>
                                <label for="vaccine14">මුඛ පෝලියෝ 4<br>(OPV 4)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row14['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine14" value="14" disabled>
                                <label for="vaccine14">මුඛ පෝලියෝ 4<br>(OPV 4)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine14" value="14" disabled>
                                <label for="vaccine14">මුඛ පෝලියෝ 4<br>(OPV 4)</label>
                            </span>
                            <button class="btn" id='vac-approvel' data-toggle='modal' href='#vac-confirm' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='14'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end OPV-4 -->
            </div>
        </div>
    </div>

    <!-- 3 year timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content color-male">

            <!-- 3 year vaccination-->
            <div class="title">
                <h3>3 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- MMR-2 -->
                <?php
                if(empty($row14['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine15" value="15" disabled>
                            <label for="vaccine15">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 2<br>(MMR 2)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query15="SELECT * FROM vac_3years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=15";
                    $result15=mysqli_query($conn,$query15);
                    $row15=mysqli_fetch_assoc($result15);
                    if(!empty($row15['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine15" value="15" checked="checked" disabled>
                                <label for="vaccine15">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 2<br>(MMR 2)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row15['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine15" value="15" disabled>
                                <label for="vaccine15">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 2<br>(MMR 2)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine15" value="15" disabled>
                                <label for="vaccine15">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 2<br>(MMR 2)</label>
                            </span>
                            <button class="btn" id='vac-approvel-with-data' data-toggle='modal' href='#vac-confirm-with-data' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='15'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- end MMR-2 -->
            </div>
        </div>
    </div>

    <!-- 5 years timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content color-male">

            <!-- 5 years vaccination-->
            <div class="title">
                <h3>5 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- D.T -->
                <?php
                if(empty($row15['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine16" value="16" disabled>
                            <label for="vaccine16">ද්විත්ව<br>(D.T)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query16="SELECT * FROM vac_5years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=16";
                    $result16=mysqli_query($conn,$query16);
                    $row16=mysqli_fetch_assoc($result16);
                    if(!empty($row16['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine16" value="16" checked="checked" disabled>
                                <label for="vaccine16">ද්විත්ව<br>(D.T)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row16['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine16" value="16" disabled>
                                <label for="vaccine16">ද්විත්ව<br>(D.T)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine16" value="16" disabled>
                                <label for="vaccine16">ද්විත්ව<br>(D.T)</label>
                            </span>
                            <button class="btn" id='vac-approvel-with-data' data-toggle='modal' href='#vac-confirm-with-data' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='16'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- D.T -->

                <!-- OPV-5 -->
                <?php
                if(empty($row16['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine17" value="17" disabled>
                            <label for="vaccine17">මුඛ පෝලියෝ 5<br>(OPV 5)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query17="SELECT * FROM vac_5years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=17";
                    $result17=mysqli_query($conn,$query17);
                    $row17=mysqli_fetch_assoc($result17);
                    if(!empty($row17['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine17" value="17" checked="checked" disabled>
                                <label for="vaccine17">මුඛ පෝලියෝ 5<br>(OPV 5)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row17['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine17" value="17" disabled>
                                <label for="vaccine17">මුඛ පෝලියෝ 5<br>(OPV 5)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine17" value="17" disabled>
                                <label for="vaccine17">මුඛ පෝලියෝ 5<br>(OPV 5)</label>
                            </span>
                            <button class="btn" id='vac-approvel' data-toggle='modal' href='#vac-confirm' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='17'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end OPV-5 -->                                                
            </div>
        </div>
    </div>

    <!-- 11 years timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content color-male">

            <!-- 11 years vaccination-->
            <div class="title">
                <h3>11 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- aTd -->
                <?php
                if(empty($row17['approved_doctor_id'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine20" value="20" disabled>
                            <label for="vaccine20">වැඩිහිටි පිටගැස්ම හා<br>ඩිප්තීරියා (aTd)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query20="SELECT * FROM vac_11years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=20";
                    $result20=mysqli_query($conn,$query20);
                    $row20=mysqli_fetch_assoc($result20);
                    if(!empty($row20['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine20" value="20" checked="checked" disabled>
                                <label for="vaccine20">වැඩිහිටි පිටගැස්ම හා<br>ඩිප්තීරියා (aTd)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if(!empty($row20['approved_doctor_id'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine20" value="20" disabled>
                                <label for="vaccine20">වැඩිහිටි පිටගැස්ම හා<br>ඩිප්තීරියා (aTd)</label>
                            </span>
                            <span class="badge badge-secondary">එන්නත් කිරීම අනුමත කර ඇත</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine20" value="20" disabled>
                                <label for="vaccine20">වැඩිහිටි පිටගැස්ම හා<br>ඩිප්තීරියා (aTd)</label>
                            </span>
                            <button class="btn" id='vac-approvel-with-data' data-toggle='modal' href='#vac-confirm-with-data' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='20'>
                                <span class="badge badge-danger">එන්නත් කිරීමට අනුමැතිය දෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- end aTd -->
            </div>
        </div>
    </div>

    <!-- give approval model -->
    <div id="vac-confirm" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>එන්නත අනුමත කිරීමට 'අනුමත කරන්න' හෝ අවලංගු කිරීමට 'ඉවත් වන්න' ක්ලික් කරන්න</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">ඉවත් වන්න</button>
                    <form action="./php/vac-permission-action.php" method="POST" onsubmit="return validation()">
                        <input type="hidden" id="baby_id" name="baby_id">
                        <input type="hidden" id="vaccine" name="vaccine">
                        <button name="submit_vac" type="submit" class="btn btn-danger">අනුමත කරන්න</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- give approval model-with-data -->
    <div id="vac-confirm-with-data" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <form action="./php/vac-permission-action.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="batch">
                            <table>
                                <tr>
                                    <td><label>සායනයට පැමිණි දිනය:</label></td>
                                    <td><input class="form-control" type="date" id="date_came" name="date_came" required></td>
                                </tr>
                                <tr>
                                    <td><label>ඇසේ ප්‍රමාණය:</label></td>
                                    <td>
                                        <select class="form-control form-control-md" name="eye1" id="eye1">
                                            <option value="O">අබාධ නොමැත(O)</option>
                                            <option value="X">අබාධ ඇත(X)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>ඇසේ වපරය:</label></td>
                                    <td>
                                        <select class="form-control form-control-md" name="eye2" id="eye2">
                                            <option value="O">අබාධ නොමැත(O)</option>
                                            <option value="X">අබාධ ඇත(X)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>කණිනිකාව සුදු වීම:</label></td>
                                    <td>
                                        <select class="form-control form-control-md" name="eye3" id="eye3">
                                            <option value="O">අබාධ නොමැත(O)</option>
                                            <option value="X">අබාධ ඇත(X)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>කුණිතය සුදු වීම:</label></td>
                                    <td>
                                        <select class="form-control form-control-md" name="eye4" id="eye4">
                                            <option value="O">අබාධ නොමැත(O)</option>
                                            <option value="X">අබාධ ඇත(X)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>ඇසේ චලනය:</label></td>
                                    <td>
                                        <select class="form-control form-control-md" name="eye5" id="eye5">
                                            <option value="O">අබාධ නොමැත(O)</option>
                                            <option value="X">අබාධ ඇත(X)</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label>ඇසීම:</label></td>
                                    <td>
                                        <select class="form-control form-control-md" name="hearing" id="hearing">
                                            <option value="O">අබාධ නොමැත(O)</option>
                                            <option value="X">අබාධ ඇත(X)</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label>බර තත්වය:</label></td>
                                    <td>
                                        <select class="form-control form-control-md" name="weight" id="weight">
                                            <option value="N">නියමිත බර(N)</option>
                                            <option value="OW">අධි බර(OW)</option>
                                            <option value="O">වර්ධනය අඩාල(O)</option>
                                            <option value="X">අඩු බර(X)</option>
                                            <option value="XX">උග්‍ර අඩු බර(XX)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>උස තත්වය:</label></td>
                                    <td>
                                        <select class="form-control form-control-md" name="height" id="height">
                                            <option value="NH">නියමිත උස(NH)</option>
                                            <option value="S">මධ්‍යස්ථ මිටි බව(S)</option>
                                            <option value="SS">උග්‍ර මිටි බව(SS)</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label>සංවර්ධනය:</label></td>
                                    <td>
                                        <select class="form-control form-control-md" name="development" id="development">
                                            <option value="O">අබාධ නොමැත(O)</option>
                                            <option value="X">අබාධ ඇත(X)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>හෘදය රෝග:</label></td>
                                    <td>
                                        <select class="form-control form-control-md" name="heart" id="heart">
                                            <option value="O">අබාධ නොමැත(O)</option>
                                            <option value="X">අබාධ ඇත(X)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>උකුල් සන්ධිය:</label></td>
                                    <td>
                                        <select class="form-control form-control-md" name="hip" id="hip">
                                            <option value="O">අබාධ නොමැත(O)</option>
                                            <option value="X">අබාධ ඇත(X)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>වෙනත්:</label></td>
                                    <td>
                                        <textarea class="form-control form-control-md" name="other" id="other"> </textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">ඉවත් වන්න</button>
                        <input type="hidden" id="baby_id-with-data" name="baby_id">
                        <input type="hidden" id="vaccine-with-data" name="vaccine">
                        <button name="submit-vac-with-data" type="submit" class="btn btn-danger">අනුමත කරන්න</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>