<div class="modal fade" id="<?php echo !empty($id)?$id:'modal-id' ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog <?php echo !empty($tipe)?$tipe:'modal-lg' ?>" role="document">
        <div class="modal-content">
            <div class="modal-header panel-heading panel-success">
                <h4 class="panel-title" id="exampleModalLabel"><?php echo !empty($paneltitle)?$paneltitle:'Detail' ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>