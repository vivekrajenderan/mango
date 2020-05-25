<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">                
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>                    
                    <li class="active">Tax</li>
                </ol>
            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">

                            <h3>
                                <i class="fa fa-table"></i>
                                Tax List
                            </h3>
                            <a href="<?php echo base_url('tax/add'); ?>" class="btn btn-secondary pull-right">Add Tax</a>

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
                                            <th data-filterable="true" data-sortable="true" data-direction="asc">Tax Name</th>
                                            <th>Percentage</th> 
                                            <th>Status</th>                                           
                                            <th>Action</th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list as $key => $value) { ?>
                                            <tr>                                           
                                                <td class="text-center"><?php echo (isset($value->taxname)) ? $value->taxname : ""; ?></td>
                                                <td class="text-center"><?php echo (isset($value->percentage) && !empty($value->percentage)) ? $value->percentage : 0; ?></td>    
                                                <td>                                                   
                                                    <label class="label-switch switch-success">
                                                        <input type="checkbox" class="switch-square switch-bootstrap switchstatus" name="status" id="status_<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>" data-id="<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>" data-status="<?php echo (isset($value->status) && !empty($value->status)) ? $value->status : 0; ?>" <?php echo (isset($value->status) && !empty($value->status)) ? 'checked' : ''; ?> >
                                                        <span class="lable"></span></label>
                                                </td> 
                                                <td>
                                                    <div class="btn-group">

                                                        <a href="<?php echo base_url('tax/add/' . $value->ecodeid); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
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