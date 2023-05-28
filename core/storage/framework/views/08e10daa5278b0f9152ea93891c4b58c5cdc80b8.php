
<?php $__env->startPush('style'); ?>
<style>
    .card {
        box-shadow: rgba(0, 0, 0, 0.09) 0px 3px 12px;
    }

    .card-header h4 {
        text-transform: uppercase !important
    }
</style>
<?php $__env->stopPush(); ?>
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

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Client</h4>
                            </div>
                            <div class="card-body">
                                0
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
            
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('asset/admin/js/chart.min.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tdbdltd\core\resources\views/backend/dashboard.blade.php ENDPATH**/ ?>