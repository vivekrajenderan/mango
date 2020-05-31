<div id="paymentviewModal" class="modal modal-styled fade in" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">View - <?php echo (isset($list->loanreferenceno)) ? $list->loanreferenceno : ""; ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Customer Name</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->cusname)) ? $list->cusname : ""; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Vehicle Number</label>
                            <div class="col-md-5">
                                <p class="breakword"><?php echo (isset($list->vechilenumber)) ? $list->vechilenumber : ""; ?></p>
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
                                    <th> Fine Intrest</th> 
                                    <th> Fine Amount</th> 
                                    <th> Total Amount</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(!empty($history_list)){
                                        foreach ($history_list as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $value->dateduepaid;?></td>
                                            <td><?php echo $value->dateofpaid;?></td>
                                            <td><?php echo $value->subamount;?></td>
                                            <td><?php echo $value->fineintrest;?></td>
                                            <td><?php echo $value->fineamount;?></td>
                                            <td><?php echo $value->amount;?></td>
                                        </tr>
                                        <?php
                                        }
                                    }else{
                                        ?>
                                        <tr><td colspan="7">No Data Found</td></tr>
                                        <?php
                                    }
                                ?>
                            <tr></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-tertiary closebtn">Close</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>