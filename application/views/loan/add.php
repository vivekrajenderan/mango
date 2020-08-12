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
                                <input type="hidden" name="loanperiodfrequency" id="loanperiodfrequency" value="month">
                                <h4 class="heading">
                                    Customer Details
                                </h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Document No <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="loanreferenceno" name="loanreferenceno" class="form-control col-md-7 col-xs-12" maxlength="30" <?php echo (isset($list->loanreferenceno)) ? "readonly" : ""; ?> value="<?php echo (isset($list->loanreferenceno)) ? $list->loanreferenceno : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="cusname" name="cusname" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" <?php echo (isset($customerlist->cusname)) ? "readonly" : ""; ?> value="<?php echo (isset($customerlist->cusname)) ? $customerlist->cusname : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Gender <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <select id="cussex" name="cussex" class="form-control">
                                                    <option value="">Select Gender</option>
                                                    <?php
                                                    foreach ($genderlist as $key => $value) {
                                                        $selected = (isset($customerlist->cussex) && $key == $customerlist->cussex) ? 'selected' : '';
                                                        echo "<option value='$key' $selected>$value</option>";
                                                    }
                                                    ?>                                                      
                                                </select>
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">D.O.B 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <div class="input-group date ui-datepicker" data-date-format="dd/mm/yyyy">
                                                    <input id="cusdob" name="cusdob" class="form-control" type="text" data-required="true" value="<?php echo (isset($customerlist->cusdob)) ? $customerlist->cusdob : ""; ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Occupation
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="occup" name="occup" class="form-control col-md-7 col-xs-12" maxlength="100" minlength="3" value="<?php echo (isset($customerlist->occup)) ? $customerlist->occup : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Aadhar<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="aadhar" name="aadhar" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="30" minlength="3" value="<?php echo (isset($customerlist->aadhar) && !empty($customerlist->aadhar)) ? $customerlist->aadhar : ""; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Mobile No <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="cusmobileno" name="cusmobileno" class="form-control col-md-7 col-xs-12" maxlength="10" minlength="10" value="<?php echo (isset($customerlist->cusmobileno)) ? $customerlist->cusmobileno : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">E-Mail
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="cusemail" name="cusemail" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="3" value="<?php echo (isset($customerlist->cusemail)) ? $customerlist->cusemail : ""; ?>">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">PAN
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="pan" name="pan" class="form-control col-md-7 col-xs-12" maxlength="100" minlength="3" value="<?php echo (isset($customerlist->pan)) ? $customerlist->pan : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Driving License
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="drivinglicence" name="drivinglicence" class="form-control col-md-7 col-xs-12" maxlength="100" minlength="3" value="<?php echo (isset($customerlist->drivinglicence)) ? $customerlist->drivinglicence : ""; ?>">
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <div class="row">                                     
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Address<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <textarea data-required="true" data-minlength="10" name="cusaddress" id="cusaddress" cols="10" rows="2" class="form-control"><?php echo (isset($customerlist->cusaddress)) ? $customerlist->cusaddress : ""; ?></textarea>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Profile <span class="required">*</span>
                                            </label>

                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal"> 
                                                <?php
                                                $profiledisplay = "";
                                                if (isset($customerlist->profile) && !empty($customerlist->profile)) {
                                                    $profiledisplay = "none";
                                                    $customer_profile_image_name = base_url() . "assets/admin/img/no_image.png";
                                                    if (file_exists(UPLOADPATH . "profile/" . $customerlist->profile)) {
                                                        $customer_profile_image_name = base_url() . UPLOADPATH . 'profile/' . $customerlist->profile;
                                                    }
                                                    ?>
                                                    <div class="control-group file-select-main" id='customer_profile_image'> 
                                                        <img class="img-thumbnail" src="<?php echo $customer_profile_image_name; ?>" alt="" width="100" height="100"/>
                                                        &nbsp;&nbsp;<a href="javascript:void(0);" onclick="RemoveProfileImage();" class="btn btn-dark" title="Delete Profile">Remove</a>

                                                    </div>   
                                                <?php } ?>


                                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                                <div class="input-group image-preview" id="customer_profile_image_content" style="padding-left: 5px;display:<?php echo $profiledisplay; ?>;">
                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                                    <span class="input-group-btn">
                                                        <!-- image-preview-clear button -->
                                                        <div class="btn btn-default image-preview-clear" style="display:none;position:relative;bottom: 2px;">
                                                            <span class="fa fa-times"></span> Clear
                                                        </div>
                                                        <!-- image-preview-input -->
                                                        <div class="btn btn-default image-preview-input">
                                                            <span class="fa fa-folder-open"></span>
                                                            <span class="image-preview-input-title">Browse</span>
                                                            <input type="file" name="profile" id="profile" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                                                        </div>
                                                    </span>
                                                </div>                                       
                                                <!-- /input-group image-preview [TO HERE]--> 
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Proff Document<span class="required">*</span>
                                            </label>

                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal"> 
                                                <?php
                                                $customerdisplay = "";
                                                if (isset($customerlist->aadhardocument) && !empty($customerlist->aadhardocument)) {
                                                    $customerdisplay = "none";
                                                    $aadhar_image_name = base_url() . "assets/admin/img/no_image.png";
                                                    if (file_exists(UPLOADPATH . "document/" . $customerlist->aadhardocument)) {
                                                        $aadhar_image_name = base_url() . UPLOADPATH . 'document/' . $customerlist->aadhardocument;
                                                    }
                                                    ?>
                                                    <div class="control-group file-select-main" id='document_image'> 
                                                        <img class="img-thumbnail" src="<?php echo $aadhar_image_name; ?>" alt="" width="100" height="100"/>
                                                        &nbsp;&nbsp;<a href="javascript:void(0);" onclick="RemoveAadharImage();" class="btn btn-dark" title="Delete Logo">Remove</a>

                                                    </div>   
                                                <?php } ?>


                                                <div class="input-group image-preview" id="document_image_content" style="padding-left: 5px;display:<?php echo $customerdisplay; ?>;">
                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                                    <span class="input-group-btn">
                                                        <div class="btn btn-default image-preview-clear" style="display:none;position:relative;bottom: 2px;">
                                                            <span class="fa fa-times"></span> Clear
                                                        </div>
                                                        <div class="btn btn-default image-preview-input">
                                                            <span class="fa fa-folder-open"></span>
                                                            <span class="image-preview-input-title">Browse</span>
                                                            <input type="file" name="aadhardocument" id="aadhardocument" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> 
                                                        </div>
                                                    </span>
                                                </div>                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="regioncolor">Region Colour <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <select id="regioncolor" name="regioncolor" class="form-control">
                                                    <option value="">Select Colour</option>
                                                    <?php
                                                    foreach ($regioncolor as $key => $value) {
                                                        $selected = (isset($customerlist->regioncolor) && $key == $customerlist->regioncolor) ? 'selected' : '';
                                                        echo "<option value='$key' style='background-color:".$value['bgcolor'].";color:".$value['color'].";' $selected>".$value['name']."</option>";
                                                    }
                                                    ?>                                             -->
                                                </select>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                <br>
                                <h4 class="heading">
                                    Vehicle Details
                                </h4>
                                <div class="row">                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Number <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="vechilenumber" name="vechilenumber" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->vechilenumber)) ? $list->vechilenumber : ""; ?>">
                                            </div>
                                        </div> 
                                    </div>                                   
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="vechilename" name="vechilename" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->vechilename)) ? $list->vechilename : ""; ?>">
                                            </div>
                                        </div> 
                                    </div>                
                                     
                                </div> 
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Manufecturer year
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="vechilemanufectureyear" name="vechilemanufectureyear" class="form-control col-md-7 col-xs-12" maxlength="4" minlength="4" value="<?php echo (isset($list->vechilemanufectureyear)) ? $list->vechilemanufectureyear : ""; ?>">
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
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Chassis No<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="vechilechessisno" name="vechilechessisno" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="3" value="<?php echo (isset($list->vechilechessisno) && !empty($list->vechilechessisno)) ? $list->vechilechessisno : ""; ?>">
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Insurance No
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="vechileinsurenceno" name="vechileinsurenceno" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->vechileinsurenceno)) ? $list->vechileinsurenceno : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Insurance From Date
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <div class="input-group date ui-datepicker" data-date-format="dd/mm/yyyy">
                                                    <input id="vechileinsurensestartdate" name="vechileinsurensestartdate" class="form-control" type="text" data-required="true" value="<?php echo (isset($list->vechileinsurensestartdate)) ? $list->vechileinsurensestartdate : ""; ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>                                            
                                            </div>                                            
                                        </div>
                                    </div> 

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Insurance End Date
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <div class="input-group date ui-datepicker" data-date-format="dd/mm/yyyy">
                                                    <input id="vechileinsurenseduedate" name="vechileinsurenseduedate" class="form-control" type="text" data-required="true" value="<?php echo (isset($list->vechileinsurenseduedate)) ? $list->vechileinsurenseduedate : ""; ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>                                            
                                            </div>                                            
                                        </div>
                                    </div>   
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Engine Type
                                            </label>                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="vechileenginetype" name="vechileenginetype" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->vechileenginetype)) ? $list->vechileenginetype : ""; ?>">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">RC Document
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
                                </div>
                                <br>
                                <h4 class="heading">
                                    Loan Details
                                </h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">HP Amount <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="number" id="originalloanamount" name="originalloanamount" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" value="<?php echo (isset($list->originalloanamount)) ? number_format($list->originalloanamount, 2, '.', '') : ""; ?>">
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Loan Period (In Months) <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="loanperiod" name="loanperiod" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="50" minlength="1" value="<?php echo (isset($list->loanperiod)) ? $list->loanperiod : ""; ?>">
                                            </div>
                                        </div>  
                                    </div> 
                                    
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">EMI Amount <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="number" id="emiamount" name="emiamount" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="50" minlength="1" value="<?php echo (isset($list->emiamount)) ? number_format($list->emiamount, 2, '.', '') : ""; ?>">
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Total Amount <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="number" id="totalemiamount" readonly name="totalemiamount" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" value="<?php echo (isset($list->totalemiamount)) ? number_format($list->totalemiamount, 2, '.', '') : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="fk_employee_id">Agent  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <select id="fk_employee_id" name="fk_employee_id" class="form-control">
                                                    <option value="">Select Agent</option>
                                                    <?php
                                                    foreach ($employee as $key => $value) {
                                                        $selected = (isset($list->fk_employee_id) && $value->id == $list->fk_employee_id) ? 'selected' : '';
                                                        echo "<option value='" . $value->id . "' $selected data-default='" . $value->salary . "'>" . $value->empname . "</option>";
                                                    }
                                                    ?>                                                      
                                                </select>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="commission">Commission %  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="commission" name="commission" class="form-control col-md-7 col-xs-12" value="<?php echo (isset($list->commission)) ? $list->commission : "0"; ?>">
                                            </div>
                                        </div> 
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Document Charge <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="number" id="document_charge" name="document_charge" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="50" minlength="1" value="<?php echo (isset($list->document_charge)) ? number_format($list->document_charge, 2, '.', '') : number_format($document_charge, 2, '.', ''); ?>">
                                            </div>
                                        </div>  
                                    </div>  
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="requestdate">HP Date <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <div class="input-group date ui-datepicker" data-date-format="dd/mm/yyyy">
                                                    <input id="requestdate" name="requestdate" class="form-control" type="text" data-required="true" value="<?php echo (isset($list->requestdate)) ? $list->requestdate : ""; ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>                  
                                </div>
                                <br>
                                <h4 class="heading">
                                    Guarantor Details
                                </h4>                    
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Guarantor Name<span class="required">*</span> 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="security1name" name="security1name" class="form-control col-md-7 col-xs-12" maxlength="100" minlength="3" value="<?php echo (isset($list->security1name)) ? $list->security1name : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 


                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Guarantor Aadhar
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="security1aadhar" name="security1aadhar" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="3" value="<?php echo (isset($list->security1aadhar) && !empty($list->security1aadhar)) ? $list->security1aadhar : ""; ?>">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Guarantor Mobile No<span class="required">*</span> 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="security1mobileno" name="security1mobileno" class="form-control col-md-7 col-xs-12" maxlength="10" minlength="10" value="<?php echo (isset($list->security1mobileno)) ? $list->security1mobileno : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 


                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Guarantor Image
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
                                </div>
                                <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Security2 Name
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="security2name" name="security2name" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="3" value="<?php echo (isset($list->security2name) && !empty($list->security2name)) ? $list->security2name : ""; ?>">
                                            </div>
                                        </div>
                                    </div>                                  


                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Security2 Aadhar
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="security2aadhar" name="security2aadhar" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="3" value="<?php echo (isset($list->security2aadhar) && !empty($list->security2aadhar)) ? $list->security2aadhar : ""; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row"> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Security2 Mobile No
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="security2mobileno" name="security2mobileno" class="form-control col-md-7 col-xs-12" maxlength="10" minlength="10" value="<?php echo (isset($list->security2mobileno)) ? $list->security2mobileno : ""; ?>">
                                            </div>
                                        </div> 
                                    </div>
                                </div> -->


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
