

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('admin.home')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </div>
                    <div class="breadcrumb-item"><?php echo e(__($pageTitle)); ?></div>
                </div>
            </div>

            <div class="section-body ">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th><?php echo e(__('Sl')); ?></th>
                                            <th><?php echo e(__('Name')); ?></th>
                                            <th><?php echo e(__('Subject')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>

                                        <?php $__empty_1 = true; $__currentLoopData = $emailTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>

                                                <td><?php echo e($key + $emailTemplates->firstItem()); ?></td>
                                                <td><?php echo e(str_replace('_', ' ', $email->name)); ?></td>
                                                <td><?php echo e($email->subject); ?></td>
                                                <td>

                                                    <a href="<?php echo e(route('admin.email.templates.edit', $email)); ?>"
                                                        class="btn btn-primary"><i class="fa fa-pen"></i></a>


                                                </td>



                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                            <tr>
                                                <td class="text-center" colspan="100%">
                                                    <?php echo e(__('No Email Template Found')); ?>

                                                </td>

                                            </tr>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                            <?php if($emailTemplates->hasPages()): ?>
                                <div class="card-footer">
                                    <?php echo e($emailTemplates->links('backend.partial.paginate')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tdbdltd\core\resources\views/backend/email/templates.blade.php ENDPATH**/ ?>