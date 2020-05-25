<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">                
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>                    
                    <li class="active">Customer</li>
                </ol>
            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">
                            <h3>
                                <i class="fa fa-table"></i>
                                Add Customer
                            </h3>
                            <a href="<?php echo base_url('customers'); ?>" class="btn btn-secondary pull-right">Customer List</a>

                        </div> <!-- /.portlet-header -->
                        <div class="portlet-content">
                            <form  class="form parsley-form" method="post" autocomplete="off" id="customer-form" action="<?php echo base_url() . 'customers/save'; ?>" enctype="multipart/form-data">
                                <input type="hidden" name="cust_id" id="cust_id" value="<?php echo (isset($list->id)) ? $list->id : ""; ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="cusname" name="cusname" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->cusname)) ? $list->cusname : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Gender <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <select id="cussex" name="cussex" class="form-control">
                                                    <option value="">Select Gender</option>
                                                    <?php
                                                    foreach ($genderlist as $key => $value) {
                                                        $selected = (isset($list->cussex) && $key == $list->cussex) ? 'selected' : '';
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
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">D.O.B <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <div class="input-group date ui-datepicker">
                                                    <input id="cusdob" name="cusdob" class="form-control" type="text" data-required="true" value="<?php echo (isset($list->cusdob)) ? $list->cusdob : ""; ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">PAN <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">

                                                <input type="text" id="pan" name="pan" class="form-control col-md-7 col-xs-12" maxlength="100" minlength="3" value="<?php echo (isset($list->pan)) ? $list->pan : ""; ?>">

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
                                                <input type="text" id="occup" name="occup" class="form-control col-md-7 col-xs-12" maxlength="100" minlength="3" value="<?php echo (isset($list->occup)) ? $list->occup : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Aadhar<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="aadhar" name="aadhar" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="30" minlength="3" value="<?php echo (isset($list->aadhar) && !empty($list->aadhar)) ? number_format($list->aadhar, 2, '.', '') : ""; ?>">
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
                                                <input type="text" id="cusmobileno" name="cusmobileno" class="form-control col-md-7 col-xs-12" maxlength="10" minlength="10" value="<?php echo (isset($list->cusmobileno)) ? $list->cusmobileno : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">E-Mail
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="cusemail" name="cusemail" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="3" value="<?php echo (isset($list->cusemail)) ? $list->cusemail : ""; ?>">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Account No <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="accountno" name="accountno" class="form-control col-md-7 col-xs-12" maxlength="30" minlength="5" value="<?php echo (isset($list->accountno)) ? $list->accountno : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Driving License
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="drivinglicence" name="drivinglicence" class="form-control col-md-7 col-xs-12" maxlength="100" minlength="3" value="<?php echo (isset($list->drivinglicence)) ? $list->drivinglicence : ""; ?>">
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
                                                <textarea data-required="true" data-minlength="10" name="cusaddress" id="cusaddress" cols="10" rows="2" class="form-control"><?php echo (isset($list->cusaddress)) ? $list->cusaddress : ""; ?></textarea>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Aadhar Document<span class="required">*</span>
                                            </label>

                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal"> 
                                                <?php
                                                $display = "";
                                                if (isset($list->aadhardocument) && !empty($list->aadhardocument)) {
                                                    $display = "none";
                                                    if (file_exists(UPLOADPATH . "document/" . $list->aadhardocument)) {
                                                        $image_name = base_url() . UPLOADPATH . 'document/' . $list->aadhardocument;
                                                    } else {
                                                        $image_name = base_url() . "assets/admin/img/no_image.png";
                                                    }
                                                    ?>
                                                    <div class="control-group file-select-main" id='document_image'> 
                                                        <img class="img-thumbnail" src="<?php echo $image_name; ?>" alt="" width="100" height="100"/>
                                                        &nbsp;&nbsp;<a href="javascript:void(0);" onclick="RemoveImage();" class="btn btn-dark" title="Delete Logo">Remove</a>

                                                    </div>   
                                                <?php } ?>


                                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                                <div class="input-group image-preview" id="document_image_content" style="padding-left: 5px;display:<?php echo $display; ?>;">
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
                                                            <input type="file" name="aadhardocument" id="aadhardocument" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
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
                                                <a href="<?php echo base_url('customers'); ?>" class="btn btn-primary">Cancel</a>                                    
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
