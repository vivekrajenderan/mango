

<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="active">Daily</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-header">
                            <h3>
                                <i class="fa fa-table"></i>
                                Daily Report - <?php echo date('d/m/Y'); ?>
                            </h3>
                            <a href="javascript:void(0);" class="btn btn-warning pull-right dailydownloadexport" style="margin:0px 5px;"><i class="fa fa-cloud-download"></i></a> 
                        </div> <!-- /.portlet-header -->
                        <div class="portlet-content">
                            <div class="panel">
                                <div class="panel-content">
                                    <form class="form parsley-form" method="get" autocomplete="off" id="agent-form" action="<?php echo base_url() . 'reports/daily'; ?>" enctype="multipart/form-data">
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
                                                <div class="form-group" style="margin-top: 40px;">
                                                    <a href="<?php echo base_url('reports/daily'); ?>" class="btn btn-primary">Reset</a>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div>
                                <span class="fa fa-circle" style="color: orange;"></span> Late Payment
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Document No.</th>
                                            <th>Bill No.</th>
                                            <th>Paid Amount</th>
                                            <th>Fine Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($list)) {
                                            echo '<tr><td colspan="4"> No data Found </td></tr>';
                                        } else {
                                            foreach ($list as $key => $value) { ?>
                                                <tr <?php echo ($value->diffdays > 0) ? 'style="background-color:orange;"' : ''; ?>>
                                                    <td><?php echo (isset($value->fk_loan_loanreferenceno)) ? $value->fk_loan_loanreferenceno : ""; ?></td>
                                                    <td><?php echo (isset($value->billreferenceno)) ? $value->billreferenceno : ""; ?></td>
                                                    <td><?php echo (isset($value->amount)) ? $value->amount : ""; ?></td>
                                                    <td><?php echo (isset($value->fineamount)) ? $value->fineamount : ""; ?></td>
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