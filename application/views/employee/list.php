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
                                Current Employee List
                            </h3>
                            <a href="<?php echo base_url('employees/add'); ?>" class="btn btn-secondary pull-right">Add Employee</a>

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
                                            <th data-filterable="true" data-sortable="true" data-direction="desc">Empl. No.</th>
                                            <th data-direction="asc" data-filterable="true" data-sortable="true">Name</th>                                                                                     
                                            <th data-filterable="true" data-sortable="true">Phone No</th> 
                                            <th data-filterable="true" data-sortable="true">In</th>                                           
                                            <th data-filterable="true" data-sortable="true">Out</th>                                           
                                            <th data-filterable="true" data-sortable="true">Status</th>                                           
                                            <th data-filterable="true" data-sortable="true">Action</th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list as $key => $value) { ?>
                                            <tr>                                           
                                                <td><?php echo (isset($value->empl_no)) ? $value->empl_no : ""; ?></td>
                                                <td><?php echo (isset($value->empl_name)) ? $value->empl_name : ""; ?></td>    
                                                <td><?php echo (isset($value->empl_phone)) ? $value->empl_phone : ""; ?></td>
                                                <td><?php echo (isset($value->empl_in)) ? cdatedbton($value->empl_in) : ""; ?></td>                                                                                            
                                                <td><?php echo (isset($value->empl_out) && !empty($value->empl_out)) ? date("d.m.Y", $value->empl_out) : ""; ?></td>                                                                                            
                                                <td>
                                                    <label class="label-switch switch-success">
                                                        <input type="checkbox" class="switch-square switch-bootstrap switchstatus" name="status" id="status_<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>" data-id="<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>" data-status="<?php echo (isset($value->status) && !empty($value->status)) ? $value->status : 0; ?>" <?php echo (isset($value->status) && !empty($value->status)) ? 'checked' : ''; ?> >
                                                        <span class="lable"></span></label>
                                                </td> 
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="javascript:void(0);" class="btn btn-default btn-sm employeeview" data-id="<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>"><i class="fa fa-eye"></i></a>
                                                        <a href="<?php echo base_url('employees/add/' . $value->ecodeid); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm employeedelete" data-id="<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>"><i class="fa fa-times"></i></a>
                                                            <!--<a href="<?php echo base_url('employees/delete/' . $value->ecodeid); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Do u really want to delete Employee?');"><i class="fa fa-times"></i></a>-->                                                        
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