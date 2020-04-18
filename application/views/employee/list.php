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
                                            <!--<th data-filterable="true" data-sortable="true">Position</th>-->                                           
                                            <!--<th data-filterable="true" data-sortable="true">Gender</th>-->                                           
                                            <!--<th data-filterable="true" data-sortable="true">DoB</th>-->                                           
                                            <!--<th data-filterable="true" data-sortable="true">Address</th>-->                                           
                                            <th data-filterable="true" data-sortable="true">Phone No</th>                                           
<!--                                            <th data-filterable="true" data-sortable="true">Email</th>                                           -->
                                            <th data-filterable="true" data-sortable="true">In</th>                                           
                                            <th data-filterable="true" data-sortable="true">Out</th>                                           
                                            <th data-filterable="true" data-sortable="true">Status</th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list as $key => $value) { ?>
                                            <tr>                                           
                                                <td><?php echo (isset($value['empl_no'])) ? $value['empl_no'] : ""; ?></td>
                                                <td><?php echo (isset($value['empl_name'])) ? $value['empl_name'] : ""; ?></td>
    <!--                                                <td><?php echo (isset($value['empl_position'])) ? $value['empl_position'] : ""; ?></td>
                                                <td><?php echo (isset($value['empl_dob'])) ? date("d.m.Y", $value['empl_dob']) : ""; ?></td>                                                                                            
                                                <td><?php echo (isset($value['empl_address'])) ? $value['empl_address'] : ""; ?></td>-->
                                                <td><?php echo (isset($value['empl_phone'])) ? $value['empl_phone'] : ""; ?></td>
    <!--                                                <td><?php echo (isset($value['empl_email'])) ? $value['empl_email'] : ""; ?></td>-->
                                                <td><?php echo (isset($value['empl_in'])) ? date("d.m.Y", $value['empl_in']) : ""; ?></td>                                                                                            
                                                <td><?php echo (isset($value['empl_out']) && !empty($value['empl_out'])) ? date("d.m.Y", $value['empl_out']) : ""; ?></td>                                                                                            
                                                <td><?php
                                                    if (isset($value['empl_out']) && !empty($value['empl_out'])) {
                                                        if ($value['empl_out'] > time()) {
                                                            echo 'Current';
                                                        } else if ($value['empl_out'] < time()) {
                                                            echo 'Former';
                                                        }
                                                    }
                                                    ?></td>                                                                                            
                                                }
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