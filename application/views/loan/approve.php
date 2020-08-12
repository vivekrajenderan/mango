<div id="approveLoanmodal" class="modal modal-styled fade in" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form parsley-form" method="post" autocomplete="off" id="approve-form" action="<?php echo base_url() . 'loan/approve'; ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title">Document No.: <?php echo (isset($list->loanreferenceno)) ? $list->loanreferenceno : ""; ?></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" name="loanid" id="loanid" value="<?php echo (isset($list->id)) ? $list->id : ""; ?>">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">HP Date
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12 elVal">
                                        <div class="input-group date ui-datepicker" data-date-format="dd/mm/yyyy">
                                            <input id="duedate" name="duedate" class="form-control" type="text" data-required="true"  value="<?php echo (isset($list->requestdate)) ? $list->requestdate : ""; ?>">
                                            <span class="input-group-addon" onclick=""><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <a href="javascript:void(0);" class="btn btn-primary closebtn">Cancel</a>
                        <button type="submit" class="btn btn-success loansubmit">Submit</button>
                    </div>
                </div>
                </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>