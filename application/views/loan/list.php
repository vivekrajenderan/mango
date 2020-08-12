<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="active">Loan</li>
                </ol>
            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">

                            <h3>
                                <i class="fa fa-table"></i>
                                Current Loan List
                            </h3>
                            <a href="javascript:void(0);" class="btn btn-warning pull-right downloadexport" style="margin:0px 5px;"><i class="fa fa-cloud-download"></i></a>
                            <a href="<?php echo base_url('loan/add'); ?>" class="btn btn-secondary pull-right">Add Loan</a>

                        </div> <!-- /.portlet-header -->

                        <div class="portlet-content">
                            <div>
                                <span class="fa fa-circle" style="color: #FFFF00;"></span> Insurance Expired
                                <span class="fa fa-circle" style="color: #ff3131c7;"></span> Not yet Paid
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-highlight table-checkable" data-provide="datatable" data-display-rows="10" data-info="true" data-search="true" data-length-change="true" data-paginate="true">
                                    <thead>
                                        <tr>
                                            <th data-filterable="true" data-sortable="true" data-direction="desc">Document No.</th>
                                            <th data-direction="asc" data-filterable="true" data-sortable="true">Customer Name</th>
                                            <th data-filterable="true" data-sortable="true">Vehicle No</th>
                                            <th data-filterable="true" data-sortable="true">HP Date</th>
                                            <th data-filterable="true" data-sortable="true">HP Amount</th>
                                            <th data-filterable="true" data-sortable="true">EMI Amount</th>
                                            <th data-filterable="true" data-sortable="true">Total Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list as $key => $value) { ?>
                                            <tr>
                                                <td style="<?php echo ($value->extendduedate > 0) ? 'background-color: #ff3131c7' : ''; ?>">
                                                    <?php echo ($value->fk_vechicle_vechileinsurenseduedate < date('Y-m-d')) ? '<span style="background-color: #FFFF00;">' . $value->loanreferenceno . '</span>' : '' . $value->loanreferenceno . ''; ?></td>

                                                <td style="<?php echo ($value->extendduedate > 0) ? 'background-color: #ff3131c7' : '' ?>"><?php echo (isset($value->fk_customer_cusname)) ? $value->fk_customer_cusname : ""; ?></td>
                                                <td style="<?php echo ($value->extendduedate > 0) ? 'background-color: #ff3131c7' : '' ?>"><?php echo (isset($value->fk_vechicle_vechilenumber)) ? $value->fk_vechicle_vechilenumber : ""; ?></td>
                                                <td style="<?php echo ($value->extendduedate > 0) ? 'background-color: #ff3131c7' : '' ?>"><?php echo (isset($value->requestdate)) ? cdatedbton($value->requestdate) : ""; ?></td>
                                                <td style="<?php echo ($value->extendduedate > 0) ? 'background-color: #ff3131c7' : '' ?>"><?php echo (isset($value->originalloanamount) && !empty($value->originalloanamount)) ? $value->originalloanamount : 0; ?></td>
                                                <td style="<?php echo ($value->extendduedate > 0) ? 'background-color: #ff3131c7' : '' ?>"><?php echo (isset($value->emiamount) && !empty($value->emiamount)) ? $value->emiamount : 0; ?></td>
                                                <td style="<?php echo ($value->extendduedate > 0) ? 'background-color: #ff3131c7' : '' ?>"><?php echo (isset($value->totalemiamount) && !empty($value->totalemiamount)) ? $value->totalemiamount : 0; ?></td>
                                                <td>
                                                    <label class="label-switch switch-success">
                                                        <input type="checkbox" class="switch-square switch-bootstrap switchstatus" name="status" id="status_<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>" data-id="<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>" data-status="<?php echo (isset($value->status) && !empty($value->status)) ? $value->status : 0; ?>" <?php echo (isset($value->status) && !empty($value->status)) ? 'checked' : ''; ?>>
                                                        <span class="lable"></span></label>
                                                </td>
                                                <td>
                                                    <div class="btn-group">

                                                        <?php if (empty($value->approveddate)) { ?><a href="javascript:void(0);" class="btn btn-secondary btn-sm approveloan" data-id="<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>" title="Approve Loan"><i class="fa fa-check"></i></a><?php } else if ($value->loanstatus == 'approved') { ?>
                                                            <a href="<?php echo base_url('loan/payment/' . $value->ecodeid); ?>" class="btn btn-info btn-sm " title="Load Payment"><i class="fa fa-money"></i></a>
                                                        <?php } ?>
                                                        <?php if ($value->loanstatus == 'approved' || $value->loanstatus == 'cleared') { ?>
                                                        <a href="<?php echo base_url('loan/add/' . $value->ecodeid); ?>" class="btn btn-info btn-sm" title="View"><i class="fa fa-eye"></i></a>
                                                        <?php } ?>
                                                        <?php if (empty($value->approveddate)) { ?><a href="<?php echo base_url('loan/add/' . $value->ecodeid); ?>" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a><?php } ?>
                                                        <?php if ($value->loanstatus != 'pending') { ?>
                                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm makepayment" data-id="<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>" title="Make Payment"><i class="fa fa-list"></i></a>
                                                        <?php } else { ?>
                                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm loandelete" data-id="<?php echo (isset($value->ecodeid)) ? $value->ecodeid : 0; ?>" title="Delete"><i class="fa fa-times"></i></a>
                                                        <?php } ?>


                                                        <!--<a href="<?php echo base_url('loan/delete/' . $value->ecodeid); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Do u really want to delete Loan?');"><i class="fa fa-times"></i></a>-->
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