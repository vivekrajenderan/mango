<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">                
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>                    
                    <li class="active">Accounting</li>
                </ol>
            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">
                            <h3>
                                <i class="fa fa-table"></i>
                                Add Accounting
                            </h3>
                            <a href="<?php echo base_url('accounting'); ?>" class="btn btn-secondary pull-right">Accounting List</a>

                        </div> <!-- /.portlet-header -->
                        <div class="portlet-content">
                            <form  class="form parsley-form" method="post" autocomplete="off" id="accounting-form" action="<?php echo base_url() . 'accounting/save'; ?>" enctype="multipart/form-data">
                                <input type="hidden" name="account_id" id="account_id" value="<?php echo (isset($list->id)) ? $list->id : ""; ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Account Type <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <select id="acctype" name="acctype" class="form-control">
                                                    <option value="">Select Type</option>                                                    
                                                    <?php
                                                    foreach ($acctypelist as $key => $value) {
                                                        $selected = (isset($list->acctype) && $key == $list->acctype) ? 'selected' : '';
                                                        echo "<option value='$key' $selected>$value</option>";
                                                    }
                                                    ?>                                                      
                                                </select>
                                            </div>
                                        </div> 
                                    </div> 

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Transaction Amount<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="transamount" name="transamount" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="30" minlength="3" value="<?php echo (isset($list->transamount) && !empty($list->transamount)) ? number_format($list->transamount, 2, '.', '') : ""; ?>">
                                            </div>
                                        </div>
                                    </div> 

                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Reference No
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="refno" name="refno" class="form-control col-md-7 col-xs-12" maxlength="100" minlength="3" value="<?php echo (isset($list->refno)) ? $list->refno : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Comments<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <textarea data-required="true" data-minlength="10" name="transtext" id="transtext" cols="10" rows="2" class="form-control"><?php echo (isset($list->transtext)) ? $list->transtext : ""; ?></textarea>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-12 text-center">
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="<?php echo base_url('accounting'); ?>" class="btn btn-primary">Cancel</a>                                    
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
