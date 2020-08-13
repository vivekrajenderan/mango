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
                                </div>                                

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered table-hover ">
                                            <thead>
                                                <tr>                                                    
                                                    <th> Due date</th> 
                                                    <th> Date of paid</th> 
                                                    <th> EMI Amount</th>                                                    
                                                    <th> Fine Amount</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($history_list)) {
                                                    foreach ($history_list as $key => $value) {
                                                        ?>
                                                    <input type="hidden" name="paymentid[]" id="paymentid" value="<?php echo (isset($value->id)) ? $value->id : ""; ?>">    
                                                    <input type="hidden" name="paymentstatus[]" id="paymentstatus" value="<?php echo (isset($value->status) && !empty($value->status)) ? $value->status : 0; ?>">    
                                                    <tr>                                                           
                                                        <td><?php echo $value->dateduepaid; ?></td>
                                                        <td>
                                                            <div class="input-group date ui-datepicker" data-date-format="dd/mm/yyyy">
                                                                <input id="dateofpaid" name="dateofpaid[]" class="form-control" type="text" data-required="true" value="<?php echo (isset($value->dateofpaid)) ? $value->dateofpaid : ""; ?>" <?php echo (isset($value->status) && !empty($value->status)) ? 'readonly' : ''; ?>>
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            </div></td>
                                                        <td>
                                                            <div class="form-group">                                            
                                                                <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                                    <input type="text" id="subamount" name="subamount[]" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="50" minlength="2" value="<?php echo (isset($value->subamount)) ? number_format($value->subamount, 2, '.', '') : ""; ?>" <?php echo (isset($value->status) && !empty($value->status)) ? 'readonly' : ''; ?>>
                                                                </div>
                                                            </div>
                                                        </td>                                                            
                                                        <td>
                                                            <div class="form-group">                                                                   
                                                                <div class="col-md-6 col-sm-6 col-xs-12 elVal">
                                                                    <input type="text" id="fineamount" name="fineamount[]" class="form-control col-md-7 col-xs-12 allownumericwithdecimal" maxlength="50" minlength="1" value="<?php echo (isset($value->fineamount)) ? number_format($value->fineamount, 2, '.', '') : ""; ?>" <?php echo (isset($value->status) && !empty($value->status)) ? 'readonly' : ''; ?>>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <tr></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="<?php echo base_url('loan'); ?>" class="btn btn-primary">Cancel</a>
                                                <?php if(isset($list->loanstatus) && $list->loanstatus!='cleared'){?><button type="submit" class="btn btn-success">Submit</button><?php } ?>
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