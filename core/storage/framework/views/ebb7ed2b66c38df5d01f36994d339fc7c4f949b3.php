

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><?php echo e(__($pageTitle)); ?></div>
                    <div class="breadcrumb-item active"><a
                            href="<?php echo e(route('admin.roles.create')); ?>"><?php echo e(__('Role Create')); ?></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo e(route('admin.roles.create')); ?>"
                                class="btn btn-primary"><?php echo e(__('Role Create')); ?></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped text-capitalize" id="table-1">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Sl')); ?></th>
                                            <th><?php echo e(__('Name')); ?></th>
                                            <th><?php echo e(__('created_at')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = @$roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e(@$loop->iteration); ?></td>
                                                <td><?php echo e($role->name); ?></td>
                                                <td><?php echo e($role->created_at->format('d/m/y')); ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                       <?php if(auth()->guard('admin')->user()->can('role_view')): ?>
                                                        <a class="btn btn-primary btn-action mr-1"
                                                            href="<?php echo e(route('admin.roles.show', @$role->id)); ?>"
                                                            data-toggle="tooltip" title="View">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <?php endif; ?>
                                                        <?php if(auth()->guard('admin')->user()->can('role_edit')): ?>

                                                        <a class="btn btn-primary btn-action mr-1"
                                                            href="<?php echo e(route('admin.roles.edit', @$role->id)); ?>"
                                                            data-toggle="tooltip" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <?php endif; ?>
                                                        <?php if(auth()->guard('admin')->user()->can('role_delete')): ?>

                                                        <button
                                                            data-href="<?php echo e(route('admin.roles.destroy', @$role->id)); ?>"
                                                            class="btn btn-danger delete" data-toggle="tooltip"
                                                            title="Delete" type="button">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <?php endif; ?>
                                                    </div>
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
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/backend/administration/role/list.blade.php ENDPATH**/ ?>