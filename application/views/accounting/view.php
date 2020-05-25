<div id="accountingviewModal" class="modal modal-styled fade in" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">View - <?php echo (isset($list->acctype)) ? $list->acctype : ""; ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Transaction Amount</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->transamount)) ? $list->transamount : ""; ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Trans Date</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->transdate)) ? $list->transdate : ""; ?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Reference No</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->refno)) ? ucfirst($list->refno) : ""; ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Comment</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->transtext)) ? $list->transtext : ""; ?>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-tertiary closebtn">Close</button>                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>