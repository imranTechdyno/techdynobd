

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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4> <a href="<?php echo e(route('admin.frontend.pages.create')); ?>"
                                        class="btn btn-icon icon-left btn-primary add-page"> <i class="fa fa-plus"></i>
                                        <?php echo e(__('Add Page')); ?></a></h4>
                                <div class="card-header-form">
                                    <form method="GET" action="<?php echo e(route('admin.frontend.search')); ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0 custom-height">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th><?php echo e(__('Sl')); ?></th>
                                            <th><?php echo e(__('Page Name')); ?></th>
                                            <th><?php echo e(__('Page Order')); ?></th>
                                            <th><?php echo e(__('Sections')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>

                                        <?php $__empty_1 = true; $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>

                                                <td>
                                                    <?php echo e($key + $pages->firstItem()); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($page->name); ?>

                                                </td>

                                                <td><?php echo e($page->page_order); ?></td>

                                                <td>


                                                    <?php $__currentLoopData = $page->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e(__($section)); ?> <?php if(!$loop->last): ?>
                                                            ,
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                </td>
                                                <td>

                                                    <a href="<?php echo e(route('admin.frontend.pages.edit', $page)); ?>"
                                                        class="btn btn-icon btn-primary edit"><i class="fa fa-pen"></i></a>
                                                    <?php if(!$loop->first): ?>
                                                        <a href="#" class="btn btn-icon btn-danger deleteBtn"
                                                            data-url="<?php echo e(route('admin.frontend.pages.delete', $page)); ?>"><i
                                                                class="fa fa-trash"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                            <tr>

                                                <td class="text-center text-danger" colspan="100%">
                                                    <?php echo e(__('No Data Found')); ?>

                                                </td>

                                            </tr>
                                        <?php endif; ?>

                                    </table>
                                </div>
                            </div>

                            <?php if($pages->hasPages()): ?>
                                <div class="card-footer">
                                    <?php echo e($pages->links('backend.partial.paginate')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModals">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Delete Page')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>

                        <p><?php echo e(__('Are You Sure To Delete Pages')); ?>?</p>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary mr-3"
                                data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button type="submit" class="btn btn-danger"><?php echo e(__('Delete Page')); ?></button>
                        </div>

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

            $('.deleteBtn').on('click', function() {
                const modal = $('#deleteModals');

                modal.find('form').attr('action', $(this).data('url'))
                modal.modal('show')
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/backend/frontend/pages.blade.php ENDPATH**/ ?>