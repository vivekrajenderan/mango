<div id="loanviewModal" class="modal modal-styled fade in" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">View - <?php echo (isset($list->loanreferenceno)) ? $list->loanreferenceno : ""; ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Customer Name</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->cusname)) ? $list->cusname : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Vehicle Number</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->vechilenumber)) ? $list->vechilenumber : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Vehicle Name</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->vechilename)) ? $list->vechilename : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Vehicle Model Year</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->vechilemodelyear)) ? $list->vechilemodelyear : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Vehicle Model</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->vechilemodel) && !empty($list->vechilemodel)) ? $list->vechilemodel : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Vehicle RC No</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->vechilercno)) ? $list->vechilercno : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Vehicle Insurance No</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->vechileinsurenceno)) ? $list->vechileinsurenceno : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Insurance Due Date</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->vechileinsurenseduedate) && !empty($list->vechileinsurenseduedate)) ? $list->vechileinsurenseduedate : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Engine Type</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->vechileenginetype) && !empty($list->vechileenginetype)) ? $list->vechileenginetype : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Request Status</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->requestdate) && !empty($list->requestdate)) ? $list->requestdate : ""; ?></p>
                            </div> 
                        </div>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Approved Date</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->approveddate) && !empty($list->approveddate)) ? $list->approveddate : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Loan Amount</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->originalloanamount) && !empty($list->originalloanamount)) ? number_format($list->originalloanamount, 2, '.', '') : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Approved Amount</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->approvedamount) && !empty($list->approvedamount)) ? number_format($list->approvedamount, 2, '.', '') : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Loan Period</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->loanperiod) && !empty($list->loanperiod)) ? $list->loanperiod : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Loan Period Frequency</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->loanperiodfrequency) && !empty($list->loanperiodfrequency)) ? ucfirst($list->loanperiodfrequency) : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Loan Interest Rate</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->loanintrestrate) && !empty($list->loanintrestrate)) ? $list->loanintrestrate : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Security1 Name</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->security1name) && !empty($list->security1name)) ? $list->security1name : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Security1 Aadhar</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->security1aadhar) && !empty($list->security1aadhar)) ? $list->security1aadhar : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Security1 Mobile No</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->security1mobileno) && !empty($list->security1mobileno)) ? $list->security1mobileno : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Security2 Name</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->security2name) && !empty($list->security2name)) ? $list->security2name : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Security2  Aadhar</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->security2aadhar) && !empty($list->security2aadhar)) ? $list->security2aadhar : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Security2 Mobile No</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->security2mobileno) && !empty($list->security2mobileno)) ? $list->security2mobileno : ""; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">RC Document</label>
                            <div class="col-md-5">
                                <?php
                                if (isset($list->rcdocument) && !empty($list->rcdocument)) {
                                    if (file_exists(UPLOADPATH . "rcdocument/" . $list->rcdocument)) {
                                        $image_name = base_url() . UPLOADPATH . 'rcdocument/' . $list->rcdocument;
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-tertiary closebtn">Close</button>                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>