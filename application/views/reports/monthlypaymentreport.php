<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="active">Monthly Payment Report</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-header">
                            <h3>
                                <i class="fa fa-table"></i>
                                Monthly Payment Report
                            </h3>
                            <a href="javascript:void(0);" class="btn btn-warning pull-right monthlypaymentreport" style="margin:0px 5px;">
                        <i class="fa fa-cloud-download"></i>
                    </a> 
                        </div> <!-- /.portlet-header -->
                        <div class="portlet-content">
                            <div class="panel">
                                <div class="panel-content">
                                    <form class="form parsley-form" method="get" autocomplete="off" id="agent-form" action="<?php echo base_url() . 'reports/monthlypaymentreport'; ?>" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="first-name">Customer</label>
                                                    <select id="fk_customer_id" name="fk_customer_id" class="form-control">
                                                        <option value="">Select Customer</option>
                                                        <?php
                                                        foreach ($customers as $key => $value) {
                                                            $selected = (isset($_GET['fk_customer_id']) && $key == $_GET['fk_customer_id']) ? 'selected' : '';
                                                            echo "<option value='$key' $selected>$value</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="Loan">Loan</label>
                                                    <select id="fk_loan_id" name="fk_loan_id" class="form-control">
                                                        <option value="">Select Loan</option>
                                                        <?php
                                                        foreach ($loan as $key => $value) {
                                                            $selected = (isset($_GET['fk_loan_id']) && $key == $_GET['fk_loan_id']) ? 'selected' : '';
                                                            echo "<option value='$key' $selected>$value</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="month">From Date</label>
                                                    <div class="input-group date month ui-datepicker"  data-date-format="yyyy-mm">
                                                        <input id="month" name="month" class="form-control" type="text" data-required="true" value="<?php echo (isset($month)) ? $month : ""; ?>">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <div class="form-group" style="margin-top: 40px;">
                                                    <a href="<?php echo base_url('reports/monthlypaymentreport'); ?>" class="btn btn-primary">Reset</a>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Customer No.</th>
                                            <th>Document No.</th>
                                            <th>Date Due Paid</th>
                                            <th>Date Of Paid</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($list)) {
                                            echo '<tr><td colspan="7"> No data Found </td></tr>';
                                        } else {
                                            foreach ($list as $key => $value) { ?>
                                                <tr style="background-color:<?php echo ($value->colorcode);?>">
                                                    <td><?php echo (isset($value->cusname)) ? $value->cusname : ""; ?></td>
                                                    <td><?php echo (isset($value->cusmobileno)) ? $value->cusmobileno : "-"; ?></td>
                                                    <td><?php echo (isset($value->loanreferenceno)) ? $value->loanreferenceno : ""; ?></td>
                                                    <td><?php echo (isset($value->dateduepaid)) ? $value->dateduepaid : "-"; ?></td>
                                                    <td><?php echo (isset($value->dateofpaid)) ? $value->dateofpaid : "-"; ?></td>
                                                </tr>
                                        <?php
                                            }
                                        } ?>
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