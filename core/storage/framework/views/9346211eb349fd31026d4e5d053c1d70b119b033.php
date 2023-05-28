
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
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="sitename"><?php echo e(__('Site Name')); ?></label>
                                        <input type="text" name="sitename" placeholder="<?php echo app('translator')->get('site name'); ?>"
                                            class="form-control form_control" value="<?php echo e(@$general->sitename); ?>">
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label class="col-form-label"><?php echo e(__('Site logo')); ?> (165 x 68)</label>

                                        <div id="image-preview" class="image-preview"
                                            style="background-image:url(<?php echo e(getFile('logo', @$general->logo)); ?>);">
                                            <label for="image-upload" id="image-label"><?php echo e(__('Choose File')); ?></label>
                                            <input type="file" name="logo" id="image-upload" />
                                        </div>

                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label class="col-form-label"><?php echo e(__('Favicon Icon')); ?> (80 x 80)</label>
                                        <div id="image-preview-icon" class="image-preview"
                                            style="background-image:url(<?php echo e(getFile('icon', @$general->favicon)); ?>);">
                                            <label for="image-upload-icon" id="image-label-icon"><?php echo e(__('Choose File')); ?></label>
                                            <input type="file" name="icon" id="image-upload-icon" />
                                        </div>
                                    </div>                                   

                                    <div class="form-group col-md-4 mb-3">
                                        <label class="col-form-label"><?php echo e(__('Default Image')); ?> (461 x 419 png)</label>
                                        <div id="image-preview-default" class="image-preview"
                                            style="background-image:url(<?php echo e(getFile('default', @$general->default_image)); ?>);">
                                            <label for="image-upload-default" id="image-label-default"><?php echo e(__('Choose
                                                File')); ?></label>
                                            <input type="file" name="default" id="image-upload-default" />
                                        </div>
                                    </div>



                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary float-right"><?php echo e(__('Update General
                                            Setting')); ?></button>
                                    </div>
                                </div>

                            </form>
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
    $(function() {

            'use strict'
  
            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-icon",
                preview_box: "#image-preview-icon",
                label_field: "#image-label-icon",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });


            $.uploadPreview({
                input_field: "#image-upload-default",
                preview_box: "#image-preview-default",
                label_field: "#image-label-default",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

        })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tdbdltd\core\resources\views/backend/setting/general_setting.blade.php ENDPATH**/ ?>