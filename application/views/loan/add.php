<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">                
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>                    
                    <li class="active">Loan</li>
                </ol>
            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">
                            <h3>
                                <i class="fa fa-table"></i>
                                Add Loan
                            </h3>
                            <a href="<?php echo base_url('loan'); ?>" class="btn btn-secondary pull-right">Loan List</a>

                        </div> <!-- /.portlet-header -->
                        <div class="portlet-content">
                            <form  class="form parsley-form" method="post" autocomplete="off" id="loan-form" action="<?php echo base_url() . 'loan/save'; ?>" enctype="multipart/form-data">
                                <input type="hidden" name="loan_id" id="loan_id" value="<?php echo (isset($list->id)) ? $list->id : ""; ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Customer <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <select id="fk_customer_id" name="fk_customer_id" class="form-control">
                                                    <option value="">Select Customer</option>
                                                    <?php
                                                    foreach ($customers as $key => $value) {
                                                        $selected = (isset($list->fk_customer_id) && $key == $list->fk_customer_id) ? 'selected' : '';
                                                        echo "<option value='$key' $selected>$value</option>";
                                                    }
                                                    ?>                                                      
                                                </select>
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Number <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="vechilenumber" name="vechilenumber" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->vechilenumber)) ? $list->vechilenumber : ""; ?>">
                                            </div>
                                        </div> 
                                    </div>                                     
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="vechilename" name="vechilename" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->vechilename)) ? $list->vechilename : ""; ?>">
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Registered Year <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="vechilemodelyear" name="vechilemodelyear" class="form-control col-md-7 col-xs-12" maxlength="4" minlength="4" value="<?php echo (isset($list->vechilemodelyear)) ? $list->vechilemodelyear : ""; ?>">
                                            </div>
                                        </div> 
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Model
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="vechilemodel" name="vechilemodel" class="form-control col-md-7 col-xs-12" maxlength="100" minlength="3" value="<?php echo (isset($list->vechilemodel)) ? $list->vechilemodel : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle RC No<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="vechilercno" name="vechilercno" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="3" value="<?php echo (isset($list->vechilercno) && !empty($list->vechilercno)) ? $list->vechilercno : ""; ?>">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Insurance No
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="vechileinsurenceno" name="vechileinsurenceno" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->vechileinsurenceno)) ? $list->vechileinsurenceno : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Insurance From Date
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <div class="input-group date ui-datepicker">
                                                    <input id="vechileinsurensestartdate" name="vechileinsurensestartdate" class="form-control" type="text" data-required="true" value="<?php echo (isset($list->vechileinsurensestartdate)) ? $list->vechileinsurensestartdate : ""; ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>                                            
                                            </div>                                            
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Insurance End Date
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <div class="input-group date ui-datepicker">
                                                    <input id="vechileinsurenseduedate" name="vechileinsurenseduedate" class="form-control" type="text" data-required="true" value="<?php echo (isset($list->vechileinsurenseduedate)) ? $list->vechileinsurenseduedate : ""; ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>                                            
                                            </div>                                            
                                        </div>
                                    </div>                                     
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Engine Type
                                            </label>                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="vechileenginetype" name="vechileenginetype" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->vechileenginetype)) ? $list->vechileenginetype : ""; ?>">
                                            </div>
                                        </div>
                                    </div> 

                                    
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">RC Document<span class="required">*</span>
                                            </label>

                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal"> 
                                                <?php
                                                $display = "";
                                                if (isset($list->rcdocument) && !empty($list->rcdocument)) {
                                                    $display = "none";
                                                    if (file_exists(UPLOADPATH . "rcdocument/" . $list->rcdocument)) {
                                                        $image_name = base_url() . UPLOADPATH . 'rcdocument/' . $list->rcdocument;
                                                    } else {
                                                        $image_name = base_url() . "assets/admin/img/no_image.png";
                                                    }
                                                    ?>
                                                    <div class="control-group file-select-main" id='rc_image'> 
                                                        <img class="img-thumbnail" src="<?php echo $image_name; ?>" alt="" width="100" height="100"/></a>
                                                        &nbsp;&nbsp;<a href="javascript:void(0);" onclick="RemoveImage();" class="btn btn-dark" title="Delete RC Document">Remove</a>

                                                    </div>   
                                                <?php } ?>


                                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                                <div class="input-group image-preview" id="rc_image_content" style="padding-left: 5px;display:<?php echo $display; ?>;">
                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                                    <span class="input-group-btn">
                                                        <!-- image-preview-clear button -->
                                                        <div class="btn btn-default image-preview-clear" style="display:none;position: relative;bottom: 2px;">
                                                            <span class="fa fa-times"></span> Clear
                                                        </div>
                                                        <!-- image-preview-input -->
                                                        <div class="btn btn-default image-preview-input">
                                                            <span class="fa fa-folder-open"></span>
                                                            <span class="image-preview-input-title">Browse</span>
                                                            <input type="file" name="rcdocument" id="rcdocument" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                                                        </div>
                                                    </span>
                                                </div>                                       
                                                <!-- /input-group image-preview [TO HERE]--> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Loan Amount <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="originalloanamount" name="originalloanamount" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="50" minlength="2" value="<?php echo (isset($list->originalloanamount)) ? number_format($list->originalloanamount, 2, '.', '') : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                </div>
                                
                                 <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Loan Period <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="loanperiod" name="loanperiod" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="50" minlength="1" value="<?php echo (isset($list->loanperiod)) ? $list->loanperiod : ""; ?>">
                                            </div>
                                        </div>  
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Loan Period Frequency <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <select id="loanperiodfrequency" name="loanperiodfrequency" class="form-control">
                                                    <option value="">Select Loan Period Frequency</option>       
                                                    <?php
                                                    foreach ($loanperiodfrequency as $key => $value) {
                                                        $selected = (isset($list->loanperiodfrequency) && $key == $list->loanperiodfrequency) ? 'selected' : '';
                                                        echo "<option value='$key' $selected>$value</option>";
                                                    }
                                                    ?>                                                       
                                                </select>
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Loan Interest Rate <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="loanintrestrate" name="loanintrestrate" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="50" minlength="1" value="<?php echo (isset($list->loanintrestrate)) ? number_format($list->loanintrestrate, 2, '.', '') : ""; ?>">
                                            </div>
                                        </div>  
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Security1 Name<span class="required">*</span> 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="security1name" name="security1name" class="form-control col-md-7 col-xs-12" maxlength="100" minlength="3" value="<?php echo (isset($list->security1name)) ? $list->security1name : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Security1 Aadhar<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="security1aadhar" name="security1aadhar" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="3" value="<?php echo (isset($list->security1aadhar) && !empty($list->security1aadhar)) ? $list->security1aadhar : ""; ?>">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Security1 Mobile No<span class="required">*</span> 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="security1mobileno" name="security1mobileno" class="form-control col-md-7 col-xs-12" maxlength="10" minlength="10" value="<?php echo (isset($list->security1mobileno)) ? $list->security1mobileno : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                </div>
                                <div class="row">   
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Security1 Image<span class="required">*</span>
                                            </label>

                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal"> 
                                                <?php
                                                $display = "";
                                                if (isset($list->security1profile) && !empty($list->security1profile)) {
                                                    $display = "none";
                                                    $profile_image_name = base_url() . "assets/admin/img/no_image.png";
                                                    if (file_exists(UPLOADPATH . "profile/" . $list->security1profile)) {
                                                        $profile_image_name = base_url() . UPLOADPATH . 'profile/' . $list->security1profile;
                                                    }
                                                    ?>
                                                    <div class="control-group file-select-main" id='profile_image'> 
                                                        <img class="img-thumbnail" src="<?php echo $profile_image_name; ?>" alt="" width="100" height="100"/></a>
                                                        &nbsp;&nbsp;<a href="javascript:void(0);" onclick="ProfileRemoveImage();" class="btn btn-dark" title="Delete RC Document">Remove</a>

                                                    </div>   
                                                <?php } ?>


                                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                                <div class="input-group image-preview" id="profile_image_content" style="padding-left: 5px;display:<?php echo $display; ?>;">
                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                                    <span class="input-group-btn">
                                                        <!-- image-preview-clear button -->
                                                        <div class="btn btn-default image-preview-clear" style="display:none;position: relative;bottom: 2px;">
                                                            <span class="fa fa-times"></span> Clear
                                                        </div>
                                                        <!-- image-preview-input -->
                                                        <div class="btn btn-default image-preview-input">
                                                            <span class="fa fa-folder-open"></span>
                                                            <span class="image-preview-input-title">Browse</span>
                                                            <input type="file" name="security1profile" id="security1profile" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                                                        </div>
                                                    </span>
                                                </div>                                       
                                                <!-- /input-group image-preview [TO HERE]--> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Security2 Name
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="security2name" name="security2name" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="3" value="<?php echo (isset($list->security2name) && !empty($list->security2name)) ? $list->security2name : ""; ?>">
                                            </div>
                                        </div>
                                    </div>                                  
                                      
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Security2 Aadhar
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="security2aadhar" name="security2aadhar" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="3" value="<?php echo (isset($list->security2aadhar) && !empty($list->security2aadhar)) ? $list->security2aadhar : ""; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Security2 Mobile No
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="security2mobileno" name="security2mobileno" class="form-control col-md-7 col-xs-12" maxlength="10" minlength="10" value="<?php echo (isset($list->security2mobileno)) ? $list->security2mobileno : ""; ?>">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-12 text-center">
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="<?php echo base_url('loan'); ?>" class="btn btn-primary">Cancel</a>                                    
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.row -->
                            </form>

                        </div>

                    </div>

                </div> <!-- /.portlet -->



            </div> <!-- /.col -->

        </div> <!-- /.row -->


    </div> <!-- /.content-container -->

</div> <!-- /.content -->
