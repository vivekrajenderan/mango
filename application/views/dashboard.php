<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">                
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ol>
            </div>
            <div class="row">

                <div class="col-sm-6 col-md-4">
                    <div class="row-stat">
                        <p class="row-stat-label">Over All Customer</p>
                        <h3 class="row-stat-value"><?php echo $customercount;?></h3>                        
                    </div> <!-- /.row-stat -->
                </div> <!-- /.col -->

                <div class="col-sm-6 col-md-4">
                    <div class="row-stat">
                        <p class="row-stat-label">Approved Loan</p>
                        <h3 class="row-stat-value"><?php echo $approvecount;?></h3>                        
                    </div> <!-- /.row-stat -->
                </div> <!-- /.col -->

                <div class="col-sm-6 col-md-4">
                    <div class="row-stat">
                        <p class="row-stat-label">Cleared Loan</p>
                        <h3 class="row-stat-value"><?php echo $clearedcount;?></h3>                        
                    </div> <!-- /.row-stat -->
                </div> <!-- /.col -->


            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">

                            <h3>
                                <i class="fa fa-table"></i>
                                Overdue Subscription Fees
                            </h3>

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
                                            <th data-filterable="true" data-sortable="true" data-direction="desc">Cust. No.</th>
                                            <th data-direction="asc" data-filterable="true" data-sortable="true">Customer Name</th>
                                            <th data-filterable="true" data-sortable="true">Last Paid</th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($customeroverdue as $key => $value) { ?>
                                            <tr>                                           
                                                <td><?php echo (isset($value['cust_no'])) ? $value['cust_no'] : ""; ?></td>
                                                <td><?php echo (isset($value['cust_name'])) ? $value['cust_name'] : ""; ?></td>
                                                <td><?php echo (isset($value['cust_lastsub'])) ? date("d.m.Y", $value['cust_lastsub']) : ""; ?></td>                                                                                            
                                            </tr>                                             
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-responsive -->


                        </div> <!-- /.portlet-content -->

                    </div> <!-- /.portlet -->



                </div> <!-- /.col -->
                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">

                            <h3>
                                <i class="fa fa-table"></i>
                                Defaulted Loan Instalments
                            </h3>

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
                                            <th data-filterable="true" data-sortable="true" data-direction="desc">Loan No.</th>
                                            <th data-direction="asc" data-filterable="true" data-sortable="true">Customer Name</th>
                                            <th data-filterable="true" data-sortable="true">Due Date</th>
                                            <th data-filterable="true" data-sortable="true" class="hidden-xs hidden-sm">Amount Due</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($customertransoverdue as $key => $value) { ?>
                                            <tr>                                           
                                                <td><?php echo (isset($value['loan_no'])) ? $value['loan_no'] : ""; ?></td>
                                                <td><?php echo (isset($value['cust_name'])) ? $value['cust_name'] : ""; ?></td>
                                                <td><?php echo (isset($value['ltrans_due'])) ? date("d.m.Y", $value['ltrans_due']) : ""; ?></td>                                                                                            
                                                <td><?php echo (isset($value['ltrans_principaldue']) && isset($value['ltrans_interestdue'])) ? number_format($value['ltrans_principaldue'] + $value['ltrans_interestdue']) . ' ' . $set_cur : ""; ?></td>                                                                                            
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