

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

                                        <div class="form-group col-md-6 mb-3">
                                            <label class="col-form-label"><?php echo e(__('Analytics Id')); ?></label>
                                            <input type="text" name="analytics_key" class="form-control form_control"
                                                value="<?php echo e(@$general->analytics_key); ?>">


                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for=""><?php echo e(__('Allow Analytics')); ?></label>

                                            <select name="analytics_status" id="" class="form-control selectric">

                                                <option value="1"
                                                    <?php echo e(@$general->analytics_status == 1 ? 'selected' : ''); ?>>
                                                    <?php echo e(__('Yes')); ?></option>
                                                <option value="0"
                                                    <?php echo e(@$general->analytics_status == 0 ? 'selected' : ''); ?>>
                                                    <?php echo e(__('No')); ?></option>

                                            </select>

                                        </div>

                                        <div class="form-group col-md-8">

                                            <button type="submit"
                                                class="btn btn-primary"><?php echo e(__('Analytics Update')); ?></button>

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

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tdbdltd\core\resources\views/backend/setting/analytics.blade.php ENDPATH**/ ?>