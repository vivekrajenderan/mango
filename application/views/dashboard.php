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
                        <h3 class="row-stat-value"><?php echo $customercount; ?></h3>
                    </div> <!-- /.row-stat -->
                </div> <!-- /.col -->

                <div class="col-sm-6 col-md-4">
                    <div class="row-stat">
                        <p class="row-stat-label">Approved Loan</p>
                        <h3 class="row-stat-value"><?php echo $approvecount; ?></h3>
                    </div> <!-- /.row-stat -->
                </div> <!-- /.col -->

                <div class="col-sm-6 col-md-4">
                    <div class="row-stat">
                        <p class="row-stat-label">Cleared Loan</p>
                        <h3 class="row-stat-value"><?php echo $clearedcount; ?></h3>
                    </div> <!-- /.row-stat -->
                </div> <!-- /.col -->


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-header">
                            <h3>
                                <i class="fa fa-table"></i>
                                Customer Repayment - <?php echo date('M-Y'); ?>
                            </h3>
                        </div> <!-- /.portlet-header -->
                        <div class="portlet-content">
                            <div class="text-center">
                                <span class="fa fa-circle" style="color: #FFFF00;"></span> Upcomming Payment
                                <span class="fa fa-circle" style="color: #ff3b6c;"></span> Late Paid
                                <span class="fa fa-circle" style="color: #ff0000;"></span> Not yet Paid
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-highlight table-checkable" data-provide="datatable" data-display-rows="10" data-info="true" data-search="true" data-length-change="true" data-paginate="true">
                                    <thead>
                                        <tr>
                                            <th data-direction="asc" data-filterable="true" data-sortable="true">Customer Name</th>
                                            <th data-filterable="true" data-sortable="true" data-direction="desc">Cust. No.</th>
                                            <th data-filterable="true" data-sortable="true">Document No.</th>
                                            <th data-filterable="true" data-sortable="true">Date Due Paid</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($customertransoverdue as $key => $value) { ?>
                                            <tr style="background-color:<?php echo ($value->colorcode); ?>">
                                                <td><?php echo (isset($value->cusname)) ? $value->cusname : ""; ?></td>
                                                <td><?php echo (isset($value->cusmobileno)) ? $value->cusmobileno : "-"; ?></td>
                                                <td><?php echo (isset($value->loanreferenceno)) ? $value->loanreferenceno : ""; ?></td>
                                                <td><?php echo (isset($value->dateduepaid)) ? $value->dateduepaid : "-"; ?></td>
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