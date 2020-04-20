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
                            <a href="<?php echo base_url('usergroups'); ?>" class="btn btn-secondary pull-right">User Group List</a>

                        </div> <!-- /.portlet-header -->
                        <div class="portlet-content">
                            <form  class="form parsley-form" method="post" autocomplete="off" id="usergroup-form" action="<?php echo base_url() . 'usergroups/save'; ?>">
                                <input type="hidden" name="usergroupid" id="usergroupid" value="<?php echo (isset($list->id)) ? $list->id : ""; ?>">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Group Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="groupname" name="groupname" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->groupname)) ? $list->groupname : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Permission
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="checkbox checkbox-success checkbox-inline">
                                                    <input type="checkbox" id="padmin" name="padmin" value="1" <?php echo (isset($list->padmin) && !empty($list->padmin)) ? 'checked' : ''; ?>>
                                                    <label for="padmin"> Administrator </label>
                                                </div>
                                                <div class="checkbox checkbox-success checkbox-inline">
                                                    <input type="checkbox" id="pdelete" name="pdelete" value="1" <?php echo (isset($list->pdelete) && !empty($list->pdelete)) ? 'checked' : ''; ?>>
                                                    <label for="pdelete"> Deleting </label>
                                                </div>
                                                <div class="checkbox checkbox-success checkbox-inline">
                                                    <input type="checkbox" id="preport" name="preport" value="1" <?php echo (isset($list->preport) && !empty($list->preport)) ? 'checked' : ''; ?>>
                                                    <label for="preport"> Reports </label>
                                                </div>
                                            </div>
                                        </div> 
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
