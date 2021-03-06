<div class="container-fluid" id=selectContainer>
    <div class="row">
        <div class="col-xl-3 col-lg-2 col-md-1"></div>
        <div class="col-xl-6 col-lg-8 col-md-10">
            <div class="card select-reg">
                <div class="card-header text-center">
                    <h4 class="card-title text-uppercase">mother Already Registerd ?</h4>
                </div>
                <div class="card-footer">
                    <div class="row d-flex justify-content-around">
                        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#motherId">Yes</button>
                        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#GramaDivision">No</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-2 col-md-1"></div>
    </div>

    <!-- model for search mother -->
    <div id="motherId" class="modal fade">
        <div class="modal-dialog modal-mgsearch">
            <div class="modal-content card card-image">
                <form action="/pages/midwife/php/search-mother-and-gd-action.php" method="GET">
                    <div class="modal-header">
                        <h4 class="modal-title text-uppercase">Search Mother</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="far fa-window-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="text-uppercase">NIC number</label>
                            <input type="text" name="NICNo" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="submitNICNo" class="btn btn-primary pull-right" value="search">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of model for search mother -->

    <!-- model for search gndivision -->
    <div id="GramaDivision" class="modal fade">
        <div class="modal-dialog modal-mgsearch">
            <div class="modal-content card card-image">
                <form action="/pages/midwife/php/search-mother-and-gd-action.php" method="GET">
                    <div class="modal-header">
                        <h4 class="modal-title text-uppercase">Grama Niladari Division</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="far fa-window-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                            $query10="SELECT * FROM midwife WHERE midwife_id='".$_SESSION['midwife_id']."' LIMIT 1";
                            $result10=mysqli_query($conn,$query10);
                            $row10=mysqli_fetch_assoc($result10);
                        ?>
                        <div class="form-group">
                            <label class="text-uppercase">GD number</label>
                            <input type="text" name="GnDNo" value="<?php echo $row10['midwife_moh_division'];?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="submitGnD" class="btn btn-primary pull-right" value="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of model for search gndivision -->

</div>