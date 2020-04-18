<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">                
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>                    
                    <li class="active">Employee</li>
                </ol>
            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">
                            <h3>
                                <i class="fa fa-table"></i>
                                Add Employee
                            </h3>
                            <a href="<?php echo base_url('employees'); ?>" class="btn btn-secondary pull-right">Employee List</a>

                        </div> <!-- /.portlet-header -->
                        <div class="portlet-content">
                            <form  class="form parsley-form" method="post" autocomplete="off" id="employee-form" action="<?php echo base_url() . 'employees/save'; ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="empl_name" name="empl_name" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->empl_name)) ? $list->empl_name : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Gender <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <select id="emplsex" name="emplsex" class="form-control">
                                                    <option value="">Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>                                                    
                                                    <option value="others">Others</option>                                                    
                                                </select>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">D.O.B <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="input-group date ui-datepicker elVal">
                                                    <input id="empl_dob" name="empl_dob" class="form-control" type="text" data-required="true" readonly value="<?php echo (isset($list->empl_dob)) ? $list->empl_dob : ""; ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Marital Status <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <select id="fk_employeestatus_id" name="fk_employeestatus_id" class="form-control">
                                                    <option value="">Select Marital</option>       
                                                    <?php
                                                    foreach ($maritalstatus as $key => $value) {
                                                        $selected = (isset($list->fk_employeestatus_id) && $key == $list->fk_employeestatus_id) ? 'selected' : '';
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
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Position <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="empl_position" name="empl_position" class="form-control col-md-7 col-xs-12" maxlength="100" minlength="3" value="<?php echo (isset($list->empl_position)) ? $list->empl_position : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group elVal">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Monthly Salary<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="empl_salary" name="empl_salary" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="3" value="<?php echo (isset($list->empl_salary)) ? $list->empl_salary : ""; ?>">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Phone No <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="empl_phone" name="empl_phone" class="form-control col-md-7 col-xs-12" maxlength="10" minlength="10" value="<?php echo (isset($list->empl_phone)) ? $list->empl_phone : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">E-Mail<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="empl_email" name="empl_email" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="3" value="<?php echo (isset($list->empl_email)) ? $list->empl_email : ""; ?>">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Employm. Start<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="input-group date ui-datepicker">
                                                    <input id="empl_in" name="empl_in" class="form-control" type="text" data-required="true" readonly value="<?php echo (isset($list->empl_in)) ? $list->empl_in : ""; ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Address<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <textarea data-required="true" data-minlength="10" name="empl_address" id="empl_address" cols="10" rows="2" class="form-control"><?php echo (isset($list->empl_address)) ? $list->empl_address : ""; ?></textarea>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Profile Picture<span class="required">*</span>
                                            </label>

                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal"> 
                                                <?php
                                                $display = "";
                                                if (isset($list->empl_pic) && !empty($list->empl_pic)) {
                                                    $display = "none";
                                                    if (file_exists("./upload/channel/" . $list->empl_pic)) {
                                                        $image_name = $list->empl_pic;
                                                    } else {
                                                        $image_name = "no_image.png";
                                                    }
                                                    ?>
                                                    <div class="control-group file-select-main" id='channel_image'> 
                                                        <img class="img-thumbnail" src="<?php echo base_url() . 'upload/channel/' . $image_name; ?>" alt="" width="100" height="100"/></a>
                                                        &nbsp;&nbsp;<a href="javascript:void(0);" onclick="RemoveImage();" class="btn btn-dark" title="Delete Logo">Remove</a>

                                                    </div>   
                                                <?php } ?>


                                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                                <div class="input-group image-preview" id="channel_image_content" style="padding-left: 5px;display:<?php echo $display; ?>;">
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
                                                            <input type="file" name="empl_pic" id="empl_pic" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                                                        </div>
                                                    </span>
                                                </div>                                       
                                                <!-- /input-group image-preview [TO HERE]--> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-12 text-center">
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="<?php echo base_url('employees'); ?>" class="btn btn-primary">Cancel</a>                                    
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
