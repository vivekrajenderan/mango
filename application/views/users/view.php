<div id="usersviewModal" class="modal modal-styled fade in" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">View - <?php echo (isset($list->fullname)) ? $list->fullname : ""; ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Name</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->fullname)) ? $list->fullname : ""; ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">User Name</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->username)) ? $list->username : ""; ?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">User Group</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->groupname)) ? ucfirst($list->groupname) : ""; ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-7">Employee Name</label>
                            <div class="col-md-5">
                                <?php echo (isset($list->empname)) ? $list->empname : ""; ?>
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