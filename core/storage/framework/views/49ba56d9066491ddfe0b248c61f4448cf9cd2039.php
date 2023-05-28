

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__(@$pageTitle)); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('admin.home')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </div>
                    <div class="breadcrumb-item"><?php echo e(__(@$pageTitle)); ?></div>
                </div>
            </div>

            <div class="section-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('SL')); ?></th>
                                                <th><?php echo e(__('name')); ?></th>
                                                <th><?php echo e(__('Phone')); ?></th>
                                                <th><?php echo e(__('email')); ?></th>
                                                <th><?php echo e(__('address')); ?></th>
                                                <th><?php echo e(__('image')); ?></th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e(@$user->fullname); ?></td>
                                                    <td><?php echo e($user->phone); ?></td>
                                                    <td><?php echo e($user->email); ?></td>
                                                    <td><?php echo e($user->address); ?></td>
                                                    <td>
                                                        <?php if($user->image): ?>
                                                        <img src="<?php echo e(getFile('user',@$user->image)); ?>" alt="img" class="img-fluid" width="80px" height="80px">
                                                        <?php else: ?> 
                                                        <img src="<?php echo e(getFile('default',@$general->default_image)); ?>" alt="img" class="img-fluid" width="80px" height="80px">
                                                        <?php endif; ?>
                                                    </td>     
                                                    <td>
                                                        <a href="<?php echo e(route('admin.user.details', $user)); ?>"
                                                        class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                                    </td>                                               
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tdbdltd\core\resources\views/backend/user.blade.php ENDPATH**/ ?>