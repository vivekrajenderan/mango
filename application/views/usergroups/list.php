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
                                User Group List
                            </h3>
                            <a href="<?php echo base_url('usergroups/add'); ?>" class="btn btn-secondary pull-right">Add User Group</a>

                        </div> <!-- /.portlet-header -->

                        <div class="portlet-content">           

                            <div class="table-responsive">                                
                                <table 
                                    class="table table-striped table-bordered table-hover table-highlight table-checkable" 
                                    data-provide="datatable" 
                                    data-display-rows="10"
                                    data-info="true"
                                    data-search="true"
                                    data-length-change="true"
                                    data-paginate="true"
                                    >
                                    <thead>
                                        <tr>                                            
                                            <th data-filterable="true" data-sortable="true" data-direction="asc">User Group Name</th>
                                            <th>Administrator</th>                                                                                     
                                            <th>Deleting</th> 
                                            <th>Reports</th>  
                                            <th>Status</th>                                           
                                            <th>Action</th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list as $key => $value) { ?>
                                            <tr>                                           
                                                <td class="text-center"><?php echo (isset($value->groupname)) ? $value->groupname : ""; ?></td>
                                                <td class="text-center"><?php echo (isset($value->permission_admin) && !empty($value->permission_admin)) ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>'; ?></td>    
                                                <td class="text-center"><?php echo (isset($value->permission_delete) && !empty($value->permission_delete)) ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>'; ?></td>    
                                                <td class="text-center"><?php echo (isset($value->permission_report) && !empty($value->permission_report)) ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>'; ?></td>    
                                                <td>
                                                    <label class="label-switch switch-success">
                                                        <input type="checkbox" class="switch-square switch-bootstrap switchstatus" name="status" id="status_<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>" data-id="<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>" data-status="<?php echo (isset($value->status) && !empty($value->status)) ? $value->status : 0; ?>" <?php echo (isset($value->status) && !empty($value->status)) ? 'checked' : ''; ?> >
                                                        <span class="lable"></span></label>
                                                </td> 
                                                <td>
                                                    <div class="btn-group">
                                                        
                                                        <a href="<?php echo base_url('usergroups/add/' . $value->ecodeid); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm usergroupsdelete" data-id="<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>"><i class="fa fa-times"></i></a>                                                           
                                                    </div>
                                            </tr>                                             
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-responsive -->


                        </div> <!-- /.portlet-content -->

                    </div> <!-- /.portlet -->



                </div> <!-- /.col -->

            </div> <!-- /.row -->


        </div> <!-- /.content-container -->

    </div> <!-- /.content -->

</div> <!-- /.container -->

<div id="popupshow"></div>