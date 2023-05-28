


<?php $__env->startSection('content'); ?>


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__($pageTitle)); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><?php echo e(__($pageTitle)); ?></div>
                <div class="breadcrumb-item active"><a href="<?php echo e(route('admin.home')); ?>"><?php echo e(__('Dashboard')); ?></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card col-md-12">

                <div class="card-header">
                    <div class="w-100">
                        <div class="input-group mb-3">
                            <select class="custom-select export selectric" id="inputGroupSelect02">
                                <option selected> <?php echo e(__('Select Language')); ?> </option>
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $la): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($la->short_code); ?>"><?php echo e(__($la->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text bg-primary text-white custom-imp"
                                    for="inputGroupSelect02"><?php echo e(__('Import From')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="text-right mb-3">
                            <button type="button" class="btn btn-primary addmore"> <i class="fa fa-plus"></i>
                                <?php echo e(__('Add More')); ?></button>

                            <button type="submit" class="btn btn-primary"><?php echo e(__('Update Language')); ?></button>

                        </div>
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Key')); ?></th>
                                    <th><?php echo e(__('Value')); ?></th>
                                </tr>
                            </thead>

                            <tbody id="append">



                                <?php $__empty_1 = true; $__currentLoopData = $translators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $translate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                <tr>
                                    <td>
                                        <textarea type="text" name="key[]" class="form-control"><?php echo e(clean($key)); ?>

                                                            </textarea>
                                    </td>
                                    <td>
                                        <textarea type="text"  name="value[]" class="form-control"><?php echo e(clean($translate)); ?>

                                                            </textarea>
                                    </td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>



                                <?php endif; ?>




                            </tbody>
                        </table>




                    </form>
                </div>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<script>
    'use strict'
        $(function() {
            let i = <?php echo e($translators != null ? count($translators) : 0); ?>;
            $('.addmore').on('click', function() {
                let html = `
                        <tr>
                            <td>
                                <textarea type="text" name="key[]" class="form-control"></textarea>
                            </td>
                            <td>
                                <textarea type="text" name="value[]" class="form-control"></textarea>
                            </td>

                        </tr>
            `;
                i++;
                $('#append').prepend(html);
            })

            $('.export').on('change', function() {

                let lang = $(this).val();
                let current = "<?php echo e(request()->lang); ?>"
                let text = "Are You Sure to Import From " + lang + " . Your Current Data will be Removed";
                if (confirm(text) == true) {

                    $.ajax({
                        url: "<?php echo e(route('admin.language.import')); ?>",
                        method: "GET",
                        data: {
                            import: lang,
                            current: current
                        },
                        success: function(response) {
                            iziToast.success({
                                message: "<?php echo e(__('Language Updated Successfully')); ?>",
                                position: 'topRight'
                            });
                            window.location.reload(true)
                        }
                    })
                }

            })
        })
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tdbdltd\core\resources\views/backend/language/translate.blade.php ENDPATH**/ ?>