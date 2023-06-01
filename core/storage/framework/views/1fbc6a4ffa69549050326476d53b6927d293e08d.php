

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

            <div class="row">

                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form method="post" action="<?php echo e(route('admin.change.password')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="card-header">

                                <h6><?php echo e(__('Change Password')); ?></h6>

                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label><?php echo e(__('Old Password')); ?></label>
                                        <input type="password" class="form-control" placeholder="Old Password" name="old_password"
                                            required>
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label><?php echo e(__('New Password')); ?></label>
                                        <input type="password" class="form-control" name="password"  placeholder="New Password" required>
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label><?php echo e(__('Confirm Password')); ?></label>
                                        <input type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary"><?php echo e(__('Change Password')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form method="post" action="<?php echo e(route('admin.profile.update')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                               

                                <div class="row">
                                    <div class="form-group col-md-8 mb-3">
                                        <label class="col-form-label"><?php echo e(__('Profile Image')); ?></label>

                                        <div id="image-preview" class="image-preview"
                                            style="background-image:url(<?php echo e(getFile('admin',auth()->guard('admin')->user()->image,
                                            )); ?>);">
                                            <label for="image-upload"
                                                id="image-label"><?php echo e(__('Choose File')); ?></label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>

                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label><?php echo e(__('Name')); ?></label>
                                        <input type="text" class="form-control" name="name"
                                            value="<?php echo e(auth()->guard('admin')->user()->name); ?>" required>
                                    </div>                        

                                    <div class="form-group col-md-12 col-12">
                                        <label><?php echo e(__('Email')); ?></label>
                                        <input type="email" class="form-control" name="email"
                                            value="<?php echo e(auth()->guard('admin')->user()->email); ?>" required>

                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label><?php echo e(__('Username')); ?></label>
                                        <input type="text" class="form-control" name="username"
                                            value="<?php echo e(auth()->guard('admin')->user()->username); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary"><?php echo e(__('Update Profile')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>

    <script>
        'use strict'

        $(function() {
            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "<?php echo e(__('Choose File')); ?>", // Default: Choose File
                label_selected: "<?php echo e(__('Update Image')); ?>", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
        })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/backend/profile.blade.php ENDPATH**/ ?>