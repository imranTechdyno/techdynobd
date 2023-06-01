

<?php $__env->startSection('content'); ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><?php echo e(__($pageTitle)); ?></div>
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('admin.create')); ?>"><?php echo e(__('Create Admin')); ?></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo e(route('admin.create')); ?>" class="btn btn-primary"><?php echo e(__('Create Admin')); ?></a>
                        </div>
                        <div class="card-body">

                            <button class="btn btn-danger my-3" data-href="<?php echo e(route('admin.multiple')); ?>"
                                data-toggle="tooltip" title="multiple delete" type="button" id="multiple_delete">
                                <i class="fas fa-trash"></i> Multiple delete
                            </button>



                            <div class="table-responsive">
                                <table class="table table-striped text-capitalize" id="table-1">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th><?php echo e(__('Sl')); ?></th>
                                            <th><?php echo e(__('Image')); ?></th>
                                            <th><?php echo e(__('Name')); ?></th>
                                            <th><?php echo e(__('Phone')); ?></th>
                                            <th><?php echo e(__('Email')); ?></th>
                                            <th><?php echo e(__('Role')); ?></th>
                                            <?php if(auth()->guard('admin')->user()->canany(['admin_user_edit', 'admin_user_delete'])): ?>
                                                <th><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = @$admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="checkbox" data-id="<?php echo e($admin->id); ?>" id="checkbox">
                                                        <label class="form-check-label" for="checkbox">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><?php echo e(@$loop->iteration); ?></td>
                                                <td>
                                                    <?php if($admin->image): ?>
                                                        <img src="<?php echo e(getFile('admin', @$admin->image)); ?>" alt="Image"
                                                            width="50px" class="rounded img-fluid">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(getFile('default', @$general->default_image)); ?>"
                                                            alt="Image" width="50px" class="rounded img-fluid">
                                                    <?php endif; ?>

                                                </td>
                                                <td><?php echo e($admin->name ?? $admin->username); ?></td>
                                                <td><?php echo e($admin->phone); ?></td>
                                                <td><?php echo e($admin->email); ?></td>
                                                <td><?php echo e(@$admin->getRoleNames()[0]); ?></td>
                                                <?php if(auth()->guard('admin')->user()->canany(['admin_user_edit', 'admin_user_delete'])): ?>
                                                    <td>
                                                        <div class="d-flex">
                                                            <?php if(auth()->guard('admin')->user()->can('admin_user_edit')): ?>
                                                                <a class="btn btn-primary btn-action mr-1"
                                                                    href="<?php echo e(route('admin.edit', @$admin->id)); ?>"
                                                                    data-toggle="tooltip" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                            <?php if(auth()->guard('admin')->user()->can('admin_user_delete')): ?>
                                                                <button class="btn btn-danger delete"
                                                                    data-href="<?php echo e(route('admin.destroy', $admin->id)); ?>"
                                                                    data-toggle="tooltip" title="Delete" type="button">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
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
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        'use strict'
        $(document).ready(function() {

            var data_arr = [];

            $(document).on('change', '#checkbox', function() {
                const id = $(this).attr('data-id');
                data_arr.push(id);
            });


            $(document).on('click', '#multiple_delete', function() {

                const url = $(this).attr('data-href');
                if (data_arr.length == 0) {
                    alert('please check the item');
                    return false;
                } else {
                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {
                            data: data_arr
                        },
                        success: (data) => {
                            iziToast.success({
                                message: data.message,
                                position: 'topRight',
                                theme: 'dark',
                                icon: 'fas fa-solid fa-check',
                                progressBarColor: 'rgb(0, 255, 184)',
                                color: '#17d990',
                                messageColor: '#ffffff',
                            });

                            location.reload();

                        },
                        error: (error) => {

                        }
                    })
                }

            });

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/backend/administration/admin_user/list.blade.php ENDPATH**/ ?>