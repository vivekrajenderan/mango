<div id="deleteUsergroupModal" class="modal modal-styled fade in" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">Are you sure?</h3>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info closebtn">Cancel</button>
                <a href="<?php echo base_url('usergroups/delete/' . md5($list->id)); ?>" class="btn btn-danger">Delete</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>