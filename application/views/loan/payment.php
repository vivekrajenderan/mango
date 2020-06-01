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
                                Loan Payment
                            </h3>
                            <a href="<?php echo base_url('loan'); ?>" class="btn btn-secondary pull-right">Loan List</a>

                        </div> <!-- /.portlet-header -->
                        <div class="portlet-content">
                            <form class="form parsley-form" method="post" autocomplete="off" id="payment-form" action="<?php echo base_url() . 'loan/makepayment'; ?>" enctype="multipart/form-data">
                                <input type="hidden" name="fk_customer_id" id="fk_customer_id" value="<?php echo (isset($list->id)) ? $list->fk_customer_id : ""; ?>">
                                <input type="hidden" name="fk_vechicle_id" id="fk_vechicle_id" value="<?php echo (isset($list->id)) ? $list->fk_vechicle_id : ""; ?>">
                                <input type="hidden" name="loan_id" id="loan_id" value="<?php echo (isset($list->id)) ? $list->id : ""; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-4">Customer Name</label>
                                            <div class="col-md-5">
                                                <p class="breakword"><?php echo (isset($list->cusname)) ? $list->cusname : ""; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-4">Vehicle Number</label>
                                            <div class="col-md-5">
                                                <p class="breakword"><?php echo (isset($list->vechilenumber)) ? $list->vechilenumber : ""; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-4">Loan Amount</label>
                                            <div class="col-md-5">
                                                <p class="breakword"><?php echo (isset($list->originalloanamount) && !empty($list->originalloanamount)) ? number_format($list->originalloanamount, 2, '.', '') : ""; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="subamount">EMI Amount <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="subamount" name="subamount" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="50" minlength="2" value="<?php echo (isset($list->emiamount)) ? number_format($list->emiamount, 2, '.', '') : ""; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-4">EMI Date</label>
                                            <div class="col-md-5">
                                                <p class="breakword"><?php echo (isset($list->nextduedate) && !empty($list->nextduedate)) ? $list->nextduedate : ""; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Fine
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="checkbox checkbox-success checkbox-inline">
                                                    <input type="checkbox" id="fineintrestcheck" name="fineintrestcheck" class="form-control col-md-7 col-xs-12" value="1">
                                                    <label for="fineintrestcheck">&nbsp;</label>
                                                </div>                                                
                                            </div>
                                        </div> 

                                    </div>
                                </div>
                                <div class="row fineintrestchecked">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="fineintrest">Fine Interest Rate <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="fineintrest" name="fineintrest" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="50" minlength="1" value="<?php echo (isset($list->fineintrest)) ? number_format($list->fineintrest, 2, '.', '') : ""; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="fineamount">Fine Amount <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                <input type="text" id="fineamount" name="fineamount" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="50" minlength="1" value="<?php echo (isset($list->fineamount)) ? number_format($list->fineamount, 2, '.', '') : ""; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="<?php echo base_url('loan'); ?>" class="btn btn-primary">Cancel</a>
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