<div id="employeeviewModal" class="modal modal-styled fade in" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">View - <?php echo (isset($list->empl_no)) ? $list->empl_no : ""; ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Name</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->empl_name)) ? $list->empl_name : ""; ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">D.O.B</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->empl_dob)) ? $list->empl_dob : ""; ?>
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
                            <label class="col-md-7">Postion</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->empl_position)) ? $list->empl_position : ""; ?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Salary</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->empl_salary) && !empty($list->empl_salary)) ? number_format($list->empl_salary, 2, '.', '') : ""; ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Phone</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->empl_phone)) ? $list->empl_phone : ""; ?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Email</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->empl_email)) ? $list->empl_email : ""; ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">In</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->empl_in) && !empty($list->empl_in)) ? date('Y-m-d', strtotime($list->empl_in)) : ""; ?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Out</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->empl_out) && !empty($list->empl_out)) ? date('Y-m-d', strtotime($list->empl_out)) : ""; ?>
                            </div> 
                        </div>
                    </div>
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
                            <label class="col-md-7">Marital Status</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->employeestatus) && !empty($list->employeestatus)) ? $list->employeestatus : ""; ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Emp No</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->empl_no) && !empty($list->empl_no)) ? $list->empl_no : ""; ?>
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
                                if (isset($list->empl_pic) && !empty($list->empl_pic)) {
                                    if (file_exists(UPLOADPATH . "profile/" . $list->empl_pic)) {
                                        $image_name = base_url() . UPLOADPATH . 'profile/' . $list->empl_pic;
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
                                <?php echo (isset($list->empl_address) && !empty($list->empl_address)) ? $list->empl_address : ""; ?>
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