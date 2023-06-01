

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <section class="section">
                <div class="section-header">
                    <h1><?php echo e(__($pageTitle)); ?></h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a
                                href="<?php echo e(route('admin.frontend.section.manage', request()->name)); ?>"><?php echo e(__('Manage ' . @$pageTitle . ' Section')); ?></a>
                        </div>
                        <div class="breadcrumb-item"><?php echo e(__($pageTitle)); ?></div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="card-body">

                                    <input type="hidden" name="section" value="<?php echo e(request()->name); ?>">

                                    <div class="row">

                                        <?php $__currentLoopData = $section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($sec == 'text'): ?>
                                                <div class="form-group col-md-6">

                                                    <label for=""><?php echo e(__(frontendFormatter($key))); ?></label>
                                                    <input type="<?php echo e($sec); ?>" name="<?php echo e($key); ?>"
                                                        class="form-control">

                                                </div>                                            
                                            <?php elseif($sec == 'file'): ?>
                                                <div class="col-md-12">
                                                    <div class="form-group w-25">
                                                        <label class="col-form-label"><?php echo e(__(frontendFormatter($key))); ?>

                                                            (<?php echo e(@$section['size']); ?>)</label>

                                                        <div id="image-preview" class="image-preview">
                                                            <label for="image-upload"
                                                                id="image-label"><?php echo e(__('Choose File')); ?></label>
                                                            <input type="<?php echo e($sec); ?>" name="<?php echo e($key); ?>"
                                                                id="image-upload" />
                                                        </div>

                                                    </div>
                                                </div>                                        
                                            <?php elseif($sec == 'textarea'): ?>
                                                <div class="form-group col-md-12">

                                                    <label for=""><?php echo e(__(frontendFormatter($key))); ?>

                                                        </label>
                                                    <textarea name="<?php echo e($key); ?>" class="form-control"><?php echo e(old($key)); ?></textarea>

                                                </div>
                                            <?php elseif($sec == 'textarea_nic'): ?>
                                                <div class="form-group col-md-12">

                                                    <label for=""><?php echo e(__(frontendFormatter($key))); ?></label>
                                                    <textarea name="<?php echo e($key); ?>" class="form-control summernote"><?php echo e(old($key)); ?></textarea>

                                                </div>
                                            <?php elseif($sec == 'icon'): ?>
                                                <div class="form-group col-md-6">
                                                    <div class="input-group">
                                                        <label for=""
                                                            class="w-100"><?php echo e(__(frontendFormatter($key))); ?></label>
                                                        <input type="text" class="form-control icon-value"
                                                            name="<?php echo e($key); ?>">
                                                        <span class="input-group-append">
                                                            <button class="btn btn-outline-secondary iconpicker"
                                                                data-icon="fas fa-home" role="iconpicker"></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <div class="form-group col-md-12">

                                            <button type="submit"
                                                class="btn btn-primary float-right"><?php echo e(__('Create')); ?></button>

                                        </div>
                                    </div>
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
        $(function() {
            'use strict'
            $('.summernote').summernote();

            $('.iconpicker').iconpicker({
                align: 'center', // Only in div tag
                arrowClass: 'btn-danger',
                arrowPrevIconClass: 'fas fa-angle-left',
                arrowNextIconClass: 'fas fa-angle-right',
                cols: 10,
                footer: true,
                header: true,
                icon: 'fas fa-bomb',
                iconset: 'fontawesome5',
                labelHeader: '{0} of {1} pages',
                labelFooter: '{0} - {1} of {2} icons',
                placement: 'bottom', // Only in button tag
                rows: 5,
                search: true,
                searchText: 'Search',
                selectedClass: 'btn-success',
                unselectedClass: ''
            });

            $('.iconpicker').on('change', function(e) {
                $('.icon-value').val(e.icon)
            });


            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "<?php echo e(__('Choose File')); ?>", // Default: Choose File
                label_selected: "<?php echo e(__('Upload File')); ?>", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });

            
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/backend/frontend/element.blade.php ENDPATH**/ ?>