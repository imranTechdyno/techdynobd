<div class="modal fade" tabindex="-1" id="delete" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="" method="post">
            <?php echo csrf_field(); ?>
            <?php echo e(method_field('DELETE')); ?>

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger"><?php echo e(__('Delete')); ?>?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php echo e(__('Are You Sure to Delete This Item')); ?>?
                        <?php echo e(__('Once Delete Data Store In Trash For 30days.')); ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal"><?php echo e(__('Safe Data')); ?></button>

                    <button type="submit" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\tdbdltd\core\resources\views/backend/layout/deleteModal.blade.php ENDPATH**/ ?>