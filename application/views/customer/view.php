<div id="customerviewModal" class="modal modal-styled fade in" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">View - <?php echo (isset($list->cusreferenceno)) ? $list->cusreferenceno : ""; ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Name</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->cusname)) ? $list->cusname : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">D.O.B</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->cusdob)) ? $list->cusdob : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Gender</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->cussex)) ? ucfirst($list->cussex) : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Occupation</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->occup)) ? $list->occup : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Aadhar No</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->aadhar) && !empty($list->aadhar)) ? $list->aadhar : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Phone</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->cusmobileno)) ? $list->cusmobileno : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Email</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->cusemail)) ? $list->cusemail : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Account No</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->accountno) && !empty($list->accountno)) ? $list->accountno : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">PAN No</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->pan) && !empty($list->pan)) ? $list->pan : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Driving License</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->drivinglicence) && !empty($list->drivinglicence)) ? $list->drivinglicence : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Status</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->status) && !empty($list->status)) ? "Active" : "Inactive"; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Aadhar Document</label>
                            <div class="col-md-5">
                                <?php
                                if (isset($list->aadhardocument) && !empty($list->aadhardocument)) {
                                    if (file_exists(UPLOADPATH . "document/" . $list->aadhardocument)) {
                                        $image_name = base_url() . UPLOADPATH . 'document/' . $list->aadhardocument;
                                    } else {
                                        $image_name = base_url() . "assets/admin/img/no_image.png";
                                    }
                                    ?>
                                    <div class="control-group file-select-main" id='document_image'> 
                                        <img class="img-thumbnail" src="<?php echo $image_name; ?>" alt="" width="100" height="100"/>
                                    </div>   
                                <?php } ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Address</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->cusaddress) && !empty($list->cusaddress)) ? $list->cusaddress : ""; ?></p>
                            </div> 
                        </div>
                    </div>                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-tertiary closebtn">Close</button>                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>