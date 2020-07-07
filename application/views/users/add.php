<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">                
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>                    
                    <li class="active">Users</li>
                </ol>
            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">
                            <h3>
                                <i class="fa fa-table"></i>
                                Add User
                            </h3>
                            <a href="<?php echo base_url('users'); ?>" class="btn btn-secondary pull-right">User List</a>

                        </div> <!-- /.portlet-header -->
                        <div class="portlet-content">
                            <form  class="form parsley-form" method="post" autocomplete="off" id="users-form" action="<?php echo base_url() . 'users/save'; ?>" enctype="multipart/form-data">
                                <input type="hidden" name="userid" id="userid" value="<?php echo (isset($list->id)) ? $list->id : ""; ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="fullname" name="fullname" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->fullname)) ? $list->fullname : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">User Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="username" name="username" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->username)) ? $list->username : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Password <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->password)) ? $list->password : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Confirm Password <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="password" id="confirmpassword" name="confirmpassword" class="form-control col-md-7 col-xs-12" maxlength="50" minlength="3" value="<?php echo (isset($list->password)) ? $list->password : ""; ?>">
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">User Group <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <select id="fk_usergroups_id" name="fk_usergroups_id" class="form-control">
                                                    <option value="">Select User Group</option>
                                                    <?php
                                                    foreach ($usergroups as $key => $value) {
                                                        $selected = (isset($list->fk_usergroups_id) && $key == $list->fk_usergroups_id) ? 'selected' : '';
                                                        echo "<option value='$key' $selected>$value</option>";
                                                    }
                                                    ?>                                                      
                                                </select>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Employee
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select id="fk_employee_id" name="fk_employee_id" class="form-control">
                                                    <option value="">Select Employee</option>
                                                    <?php
                                                    foreach ($employeelist as $key => $value) {
                                                        $selected = (isset($list->fk_employee_id) && $key == $list->fk_employee_id) ? 'selected' : '';
                                                        echo "<option value='$key' $selected>$value</option>";
                                                    }
                                                    ?>                                                      
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-12 text-center">
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="<?php echo base_url('users'); ?>" class="btn btn-primary">Cancel</a>                                    
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
