<div class="main-timeline">

    <!--at birth timeline-->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content">

            <!--at birth vaccination-->
            <div class="title">
                <h3>උපතේදී</h3>
            </div>

            <div class="description">

                <!--BCG-1-->
                <?php
                mysqli_select_db($conn, 'cs2019g6');
                $query1="SELECT * FROM vac_birth WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=1";
                $result1=mysqli_query($conn,$query1);
                $row1=mysqli_fetch_assoc($result1);

                    if(!empty($row1['status'])) {
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
                                <input type="checkbox" id="vaccine1" value="1">
                                <label for="vaccine1">බී.සී.ජී.<br>(B.C.G.)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='1'>
                                <span class="badge badge-danger">තොරතුරු ඇතුල් කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                ?>
                <!--end BCG-1-->

                <!-- BCG-2(if no scar) -->
                <?php
                if(empty($row1['status'])) {    
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

                    $sql2="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=2";
                    $run2=mysqli_query($conn,$sql2);
                    $data2=mysqli_fetch_assoc($run2);

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
                    else if((!empty($row1['status'])) && (!empty($row1['scar']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine2" value="2" disabled>
                                <label for="vaccine2">බී.සී.ජී. දෙවන මාත්‍රාව<br>(B.C.G. 2nd dose)</label>
                            </span>
                            <span class="badge badge-secondary">බී.සී.ජී. කැළැල ඇත.</span>
                        </div>
                <?php
                    }
                    else if((!empty($data2['giving_date'])) && (!empty($row2['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine2" value="2" disabled>
                                <label for="vaccine2">බී.සී.ජී. දෙවන මාත්‍රාව<br>(B.C.G. 2nd dose)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='2'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data2['giving_date'])) && (empty($row2['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine2" value="2" disabled>
                                <label for="vaccine2">බී.සී.ජී. දෙවන මාත්‍රාව<br>(B.C.G. 2nd dose)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='2'>
                                <span class="badge badge-off">මාස 6 වන විටත් කැලලක් නැත්නම්</span>
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
         <div class="timeline-content">

            <!--2 months vaccination--->
            <div class="title">
                <h3>2 වන මාසය සම්පූර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- Pentavalent 1 -->
                <?php
                if(empty($row1['status'])) {    
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

                    $sql3="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=3";
                    $run3=mysqli_query($conn,$sql3);
                    $data3=mysqli_fetch_assoc($run3);

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
                    else if((!empty($data3['giving_date'])) && (!empty($row3['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine3" value="3" disabled>
                                <label for="vaccine3">පංච සං‍යුජ එන්නත 1<br>(Pentavalent 1)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='3'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data3['giving_date'])) && (empty($row3['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine3" value="3" disabled>
                                <label for="vaccine3">පංච සං‍යුජ එන්නත 1<br>(Pentavalent 1)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='3'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>                                                            
                        </div>
                <?php
                    }
                }
                ?>
                <!--end Pentavalent 1-->

                <!-- OPV-1 -->
                <?php
                if(empty($data3['giving_date'])) {    
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

                    $sql4="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=4";
                    $run4=mysqli_query($conn,$sql4);
                    $data4=mysqli_fetch_assoc($run4);

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
                    else if((!empty($data4['giving_date'])) && (!empty($row4['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine4" value="4" disabled>
                                <label for="vaccine4">මුඛ පෝලියෝ 1<br>(OPV 1)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='4'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data4['giving_date'])) && (empty($row4['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine4" value="4" disabled>
                                <label for="vaccine4">මුඛ පෝලියෝ 1<br>(OPV 1)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='4'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- end OPV-1 -->

                <!-- fIPV 1 -->
                <?php
                if(empty($data4['giving_date'])) {    
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

                    $sql5="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=5";
                    $run5=mysqli_query($conn,$sql5);
                    $data5=mysqli_fetch_assoc($run5);

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
                    else if((!empty($data5['giving_date'])) && (!empty($row5['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine5" value="5" disabled>
                                <label for="vaccine5">අජීවී පෝලියෝ 1<br>(fIPV 1)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='5'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data5['giving_date'])) && (empty($row5['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine5" value="5" disabled>
                                <label for="vaccine5">අජීවී පෝලියෝ 1<br>(fIPV 1)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='5'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end fIPV 1-->
            </div>
        </div>
    </div>

    <!-- 4 month timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content">

            <!--4 month vaccination-->
            <div class="title">
                <h3>4 වන මාසය සම්පූර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- Pentavalent 2 -->
                <?php
                if(empty($data5['giving_date'])) {    
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

                    $sql6="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=6";
                    $run6=mysqli_query($conn,$sql6);
                    $data6=mysqli_fetch_assoc($run6);

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
                    else if((!empty($data6['giving_date'])) && (!empty($row6['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine6" value="6" disabled>
                                <label for="vaccine6">පංච සං‍යුජ එන්නත 2<br>(Pentavalent 2)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='6'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data6['giving_date'])) && (empty($row6['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine6" value="6" disabled>
                                <label for="vaccine6">පංච සං‍යුජ එන්නත 2<br>(Pentavalent 2)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='6'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--Pentavalent 2 -->

                <!-- OPV-2 -->
                <?php
                if(empty($data6['giving_date'])) {    
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

                    $sql7="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=7";
                    $run7=mysqli_query($conn,$sql7);
                    $data7=mysqli_fetch_assoc($run7);

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
                    else if((!empty($data7['giving_date'])) && (!empty($row7['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine7" value="7" disabled>
                                <label for="vaccine7">මුඛ පෝලියෝ 2<br>(OPV 2)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='7'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data7['giving_date'])) && (empty($row7['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine7" value="7" disabled>
                                <label for="vaccine7">මුඛ පෝලියෝ 2<br>(OPV 2)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='7'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- end OPV-2 -->

                <!-- fIPV 2 -->
                <?php
                if(empty($data7['giving_date'])) {    
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

                    $sql8="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=8";
                    $run8=mysqli_query($conn,$sql8);
                    $data8=mysqli_fetch_assoc($run8);

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
                    else if((!empty($data8['giving_date'])) && (!empty($row8['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine8" value="8" disabled>
                                <label for="vaccine8">අජීවී පෝලියෝ 2<br>(fIPV 2)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='8'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data8['giving_date'])) && (empty($row8['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine8" value="8" disabled>
                                <label for="vaccine8">අජීවී පෝලියෝ 2<br>(fIPV 2)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='8'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end fIPV 2-->
            </div>
        </div>
    </div>

    <!-- 6 month timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content">

            <!--6 month vaccination-->
            <div class="title">
                <h3>6 වන මාසය සම්පූර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!--Pentavalent 3-->
                <?php
                if(empty($data8['giving_date'])) {    
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

                    $sql9="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=9";
                    $run9=mysqli_query($conn,$sql9);
                    $data9=mysqli_fetch_assoc($run9);

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
                    else if((!empty($data9['giving_date'])) && (!empty($row9['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine9" value="9" disabled>
                                <label for="vaccine9">පංච සං‍යුජ එන්නත 3<br>(Pentavalent 3)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='9'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data9['giving_date'])) && (empty($row9['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine9" value="9" disabled>
                                <label for="vaccine9">පංච සං‍යුජ එන්නත 3<br>(Pentavalent 3)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='9'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end Pentavalent 3 -->

                <!-- OPV-3 -->
                <?php
                if(empty($data9['giving_date'])) {    
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

                    $sql10="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=10";
                    $run10=mysqli_query($conn,$sql10);
                    $data10=mysqli_fetch_assoc($run10);

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
                    else if((!empty($data10['giving_date'])) && (!empty($row10['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine10" value="10" disabled>
                                <label for="vaccine10">මුඛ පෝලියෝ 3<br>(OPV 3)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='10'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data10['giving_date'])) && (empty($row10['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine10" value="10" disabled>
                                <label for="vaccine10">මුඛ පෝලියෝ 3<br>(OPV 3)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='10'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
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
         <div class="timeline-content">

            <!--9 month vaccination-->
            <div class="title">
                <h3>9 වන මාසය සම්පූර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- MMR 1 -->
                <?php
                if(empty($data10['giving_date'])) {    
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

                    $sql11="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=11";
                    $run11=mysqli_query($conn,$sql11);
                    $data11=mysqli_fetch_assoc($run11);

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
                    else if((!empty($data11['giving_date'])) && (!empty($row11['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine11" value="11" disabled>
                                <label for="vaccine11">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 1<br>(MMR 1)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='11'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data11['giving_date'])) && (empty($row11['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine11" value="11" disabled>
                                <label for="vaccine11">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 1<br>(MMR 1)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='11'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end MMR 1-->
            </div>
        </div>
    </div>

    <!-- 12 month timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content">

            <!--12 month vaccination-->
            <div class="title">
                <h3>12 වන මාසය සම්පූර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!--Live JE-->
                <?php
                if(empty($data11['giving_date'])) {    
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

                    $sql12="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=12";
                    $run12=mysqli_query($conn,$sql12);
                    $data12=mysqli_fetch_assoc($run12);

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
                    else if((!empty($data12['giving_date'])) && (!empty($row12['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine12" value="12" disabled>
                                <label for="vaccine12">ජපන් නිදිකර්පථප්‍රදාහය<br>(Live JE)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='12'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data12['giving_date'])) && (empty($row12['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine12" value="12" disabled>
                                <label for="vaccine12">ජපන් නිදිකර්පථප්‍රදාහය<br>(Live JE)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='12'>
                                <span class="badge badge-off">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
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
         <div class="timeline-content">

            <!-- 18 months vaccination-->
            <div class="title">
                <h3>18 වන මාසය සම්පූර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- DPT -->
                <?php
                if(empty($data11['giving_date'])) {    
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

                    $sql13="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=13";
                    $run13=mysqli_query($conn,$sql13);
                    $data13=mysqli_fetch_assoc($run13);

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
                    else if((!empty($data13['giving_date'])) && (!empty($row13['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine13" value="13" disabled>
                                <label for="vaccine13">ත්‍රිත්ව<br>(DPT)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='13'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data13['giving_date'])) && (empty($row13['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine13" value="13" disabled>
                                <label for="vaccine13">ත්‍රිත්ව<br>(DPT)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='13'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- DPT -->


                <!--OPV 4-->
                <?php
                if(empty($data13['giving_date'])) {    
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

                    $sql14="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=14";
                    $run14=mysqli_query($conn,$sql14);
                    $data14=mysqli_fetch_assoc($run14);

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
                    else if((!empty($data14['giving_date'])) && (!empty($row14['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine14" value="14" disabled>
                                <label for="vaccine14">මුඛ පෝලියෝ 4<br>(OPV 4)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='14'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data14['giving_date'])) && (empty($row14['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine14" value="14" disabled>
                                <label for="vaccine14">මුඛ පෝලියෝ 4<br>(OPV 4)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='14'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end OPV 4 -->
            </div>
        </div>
    </div>

    <!-- 3 year timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content">

            <!-- 3 year vaccination-->
            <div class="title">
                <h3>3 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- MMR 2 -->
                <?php
                if(empty($data14['giving_date'])) {    
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

                    $sql15="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=15";
                    $run15=mysqli_query($conn,$sql15);
                    $data15=mysqli_fetch_assoc($run15);

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
                    else if((!empty($data15['giving_date'])) && (!empty($row15['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine15" value="15" disabled>
                                <label for="vaccine15">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 2<br>(MMR 2)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='15'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data15['giving_date'])) && (empty($row15['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine15" value="15" disabled>
                                <label for="vaccine15">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 2<br>(MMR 2)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='15'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- end MMR 2 -->
            </div>
        </div>
    </div>

    <!-- 5 years timeline--->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content">

            <!-- 5 years vaccination-->
            <div class="title">
                <h3>5 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
            </div>

            <div class="description">


                <!-- D.T -->
                <?php
                if(empty($data15['giving_date'])) {    
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

                    $sql16="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=16";
                    $run16=mysqli_query($conn,$sql16);
                    $data16=mysqli_fetch_assoc($run16);

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
                    else if((!empty($data16['giving_date'])) && (!empty($row16['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine16" value="16" disabled>
                                <label for="vaccine16">ද්විත්ව<br>(D.T)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='16'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data16['giving_date'])) && (empty($row16['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine16" value="16" disabled>
                                <label for="vaccine16">ද්විත්ව<br>(D.T)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='16'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- end D.T -->


                <!--OPV 5-->
                <?php
                if(empty($data16['giving_date'])) {    
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

                    $sql17="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=17";
                    $run17=mysqli_query($conn,$sql17);
                    $data17=mysqli_fetch_assoc($run17);

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
                    else if((!empty($data17['giving_date'])) && (!empty($row17['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine17" value="17" disabled>
                                <label for="vaccine17">මුඛ පෝලියෝ 5<br>(OPV 5)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='17'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data17['giving_date'])) && (empty($row17['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine17" value="17" disabled>
                                <label for="vaccine17">මුඛ පෝලියෝ 5<br>(OPV 5)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='17'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end OPV 5 -->
            </div>
        </div>
    </div>

    <!-- 10 years timeline --->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content">

            <!-- 10 years vaccination -->
            <div class="title">
                <h3>10 වන අවුරුද්ද සම්පුර්ණ වූ විට(ගැහැණු)</h3>
            </div>

            <div class="description">

                <!-- HPV-1 -->
                <?php
                if(empty($data17['giving_date'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine18" value="18" disabled>
                            <label for="vaccine18">එච්. පී. වී. එන්නත 1<br>(HPV Vaccine 1)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query18="SELECT * FROM vac_10years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=18";
                    $result18=mysqli_query($conn,$query18);
                    $row18=mysqli_fetch_assoc($result18);

                    $sql18="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=18";
                    $run18=mysqli_query($conn,$sql18);
                    $data18=mysqli_fetch_assoc($run18);

                    if(!empty($row18['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine18" value="18" checked="checked" disabled>
                                <label for="vaccine18">එච්. පී. වී. එන්නත 1<br>(HPV Vaccine 1)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if((!empty($data18['giving_date'])) && (!empty($row18['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine18" value="18" disabled>
                                <label for="vaccine18">එච්. පී. වී. එන්නත 1<br>(HPV Vaccine 1)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='18'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data18['giving_date'])) && (empty($row18['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine18" value="18" disabled>
                                <label for="vaccine18">එච්. පී. වී. එන්නත 1<br>(HPV Vaccine 1)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine18" value="18" disabled>
                                <label for="vaccine18">එච්. පී. වී. එන්නත 1<br>(HPV Vaccine 1)</label>
                            </span>
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='18'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- end HPV-1 -->


                <!-- HPV-2 -->
                <?php
                if(empty($data18['giving_date'])) {    
                ?>
                    <div class="vaccine">
                        <span>
                            <input type="checkbox" id="vaccine19" value="19" disabled>
                            <label for="vaccine19">එච්. පී. වී. එන්නත 2<br>(HPV Vaccine 2)</label>
                        </span>
                    </div> 
                <?php
                }
                else {
                    $query19="SELECT * FROM vac_10years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=19";
                    $result19=mysqli_query($conn,$query19);
                    $row19=mysqli_fetch_assoc($result19);

                    $sql19="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=19";
                    $run19=mysqli_query($conn,$sql19);
                    $data19=mysqli_fetch_assoc($run19);

                    if(!empty($row19['status'])) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine19" value="19" checked="checked" disabled>
                                <label for="vaccine19">එච්. පී. වී. එන්නත 2<br>(HPV Vaccine 2)</label>
                            </span>
                            <span class="badge color-given">එන්නත් කර ඇත</span>
                        </div>
                <?php 
                    }
                    else if((!empty($data19['giving_date'])) && (!empty($row19['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine19" value="19" disabled>
                                <label for="vaccine19">එච්. පී. වී. එන්නත 2<br>(HPV Vaccine 2)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='19'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data19['giving_date'])) && (empty($row19['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine19" value="19" disabled>
                                <label for="vaccine19">එච්. පී. වී. එන්නත 2<br>(HPV Vaccine 2)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine19" value="19" disabled>
                                <label for="vaccine19">එච්. පී. වී. එන්නත 2<br>(HPV Vaccine 2)</label>
                            </span>
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='19'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <!--end HPV-2 -->                                                
            </div>
        </div>
    </div>

    <!-- 11 years timeline --->
    <div class="timeline">

         <span class="icon fas fa-syringe"></span>
         <div class="timeline-content">

            <!-- 11 years vaccination -->
            <div class="title">
                <h3>11 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
            </div>

            <div class="description">

                <!-- aTd -->
                <?php
                if(empty($data19['giving_date'])) {    
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

                    $sql20="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=20";
                    $run20=mysqli_query($conn,$sql20);
                    $data20=mysqli_fetch_assoc($run20);

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
                    else if((!empty($data20['giving_date'])) && (!empty($row20['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine20" value="20" disabled>
                                <label for="vaccine20">වැඩිහිටි පිටගැස්ම හා<br>ඩිප්තීරියා (aTd)</label>
                            </span>
                            <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='20'>
                                <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                            </button>
                        </div>
                <?php
                    }
                    else if((!empty($data20['giving_date'])) && (empty($row20['approved_doctor_id']))) {
                ?>
                        <div class="vaccine">
                            <span>
                                <input type="checkbox" id="vaccine20" value="20" disabled>
                                <label for="vaccine20">වැඩිහිටි පිටගැස්ම හා<br>ඩිප්තීරියා (aTd)</label>
                            </span>
                            <span class="badge badge-secondary">අනුමැතිය ලැබෙනතුරු සිටින්න</span>
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
                            <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='<?php echo $_SESSION['baby_id'];?>' data-vac='20'>
                                <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
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

    <!-- Modal vac-mark -->
    <div id="vac-mark" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <form action="./php/mid-vac-mark-action.php" method="POST" onsubmit="return validation()">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="batch">
                            <table>
                                <tr>
                                    <td><label>ලබා දුන් දිනය:</label></td>
                                    <td><input class="form-control" type="date" id="date_given" name="date_given" required></td>
                                </tr>
                                <tr>
                                    <td><label>කාණ්ඩ අංකය:</label></td>
                                    <td><input class="form-control" type="text" id="batch_no" name="batch_no" required></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">ඉවත් වන්න</button>
                        <input type="hidden" id="baby_id" name="baby_id">
                        <input type="hidden" id="vaccine" name="vaccine">
                        <button name="mark_vac" type="submit" class="btn btn-danger">සලකුණු කරන්න</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal set-date -->
    <div id="set-date" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <form action="./php/mid-vac-set-date-action.php" method="POST" onsubmit="return validation()">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="batch">
                            <table>
                                <tr>
                                    <td><label>දිනයක් තෝරන්න:</label></td>
                                    <td><input class="form-control" type="date" id="giving_date" name="giving_date" required> <br></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">ඉවත් වන්න</button>
                        <input type="hidden" id="baby_id1" name="baby_id">
                        <input type="hidden" id="vaccin" name="vaccine">
                        <button name="date-set" type="submit" class="btn btn-danger">දිනය ලබාදෙන්න</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>