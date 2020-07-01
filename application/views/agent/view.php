<div id="agentviewModal" class="modal modal-styled fade in" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">View - <?php echo (isset($list->empno)) ? $list->empno : ""; ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Name</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->empname)) ? $list->empname : ""; ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">D.O.B</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->dob)) ? $list->dob : ""; ?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Gender</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->emplsex)) ? ucfirst($list->emplsex) : ""; ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Salary</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->salary) && !empty($list->salary)) ? number_format($list->salary, 2, '.', '') : ""; ?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Email</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->email)) ? $list->email : ""; ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Phone</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->phone)) ? $list->phone : ""; ?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Status</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->status) && !empty($list->status)) ? "Active" : "Inactive"; ?>
                            </div> 
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Profile Picture</label>
                            <div class="col-md-5">
                                <?php
                                if (isset($list->profileimage) && !empty($list->profileimage)) {
                                    if (file_exists(UPLOADPATH . "profile/" . $list->profileimage)) {
                                        $image_name = base_url() . UPLOADPATH . 'profile/' . $list->profileimage;
                                    } else {
                                        $image_name = base_url() . "assets/admin/img/no_image.png";
                                    }
                                    ?>
                                    <div class="control-group file-select-main" id='profile_image'> 
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
                                <?php echo (isset($list->address) && !empty($list->address)) ? $list->address : ""; ?>
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