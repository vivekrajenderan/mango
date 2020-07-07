<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">                
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>                    
                    <li class="active">User Group</li>
                </ol>
            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">
                            <h3>
                                <i class="fa fa-table"></i>
                                Add User Group
                            </h3>
                            <a href="<?php echo base_url('tax'); ?>" class="btn btn-secondary pull-right">Tax List</a>

                        </div> <!-- /.portlet-header -->
                        <div class="portlet-content">
                            <form  class="form parsley-form" method="post" autocomplete="off" id="tax-form" action="<?php echo base_url() . 'usergroups/save'; ?>">
                                <input type="hidden" name="taxid" id="taxid" value="<?php echo (isset($list->id)) ? $list->id : ""; ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Tax Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="taxname" name="taxname" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->taxname)) ? $list->taxname : ""; ?>">
                                            </div>
                                        </div> 
                                    </div>                                      
                                </div>

                                <div class="panel panel-default" style="margin-top: 30px;">                                    
                                    <div class="panel-heading">Group Tax</div>
                                    <div class="panel-body">

                                        <div id="taxgroup_fields">

                                        </div>
                                        <?php
                                        if (isset($grouprsttax) && count($grouprsttax) > 0) {
                                            foreach ($grouprsttax as $key => $value) {
                                                ?>
                                                <div class="col-sm-3 nopadding">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="taxgroupname" name="taxgroupname[]" value="<?php echo (isset($value->taxgroupname)) ? $value->taxgroupname : ''; ?>" placeholder="Tax Group Name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 nopadding">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="taxgrouppercentage" name="taxgrouppercentage[]" value="<?php echo (isset($value->taxgrouppercentage)) ? $value->taxgrouppercentage : ''; ?>" placeholder="Percentage">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 nopadding">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="taxgroupcomments" name="taxgroupcomments[]" value="<?php echo (isset($value->taxgroupcomments) && !empty($value->taxgroupcomments)) ? $value->taxgroupcomments : ''; ?>" placeholder="taxgroupcomments">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3 nopadding">
                                                    <div class="form-group">
                                                        <div class="input-group">                          
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-success" type="button"  onclick="remove_taxgroup_fields();"> <span class="fa fa-minus" aria-hidden="true"></span> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="taxgroupname" name="taxgroupname[]" value="" placeholder="Tax Group Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="taxgrouppercentage" name="taxgrouppercentage[]" value="" placeholder="taxgrouppercentage">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="taxgroupcomments" name="taxgroupcomments[]" value="" placeholder="Comments">
                                            </div>
                                        </div>

                                        <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <div class="input-group">                          
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success" type="button"  onclick="taxgroup_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>                                    
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-12 text-center">
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="<?php echo base_url('usergroups'); ?>" class="btn btn-primary">Cancel</a>                                    
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
