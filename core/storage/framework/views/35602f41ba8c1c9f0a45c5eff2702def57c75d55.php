

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

                <?php if(isset($section['content'])): ?>
                    <div class="row">

                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="card-body custom-height">
                                        <div class="row">

                                            <?php $__currentLoopData = $section['content']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($sec == 'text'): ?>
                                                    <div class="form-group col-md-6">

                                                        <label for=""><?php echo e(__(frontendFormatter($key))); ?></label>
                                                        <input type="<?php echo e($sec); ?>" name="<?php echo e($key); ?>"
                                                            value="<?php echo e($content !== null ? $content->data->$key : ''); ?>"
                                                            class="form-control" required>
                                                    </div>

                                                    
                                                
                                                <?php elseif($sec == 'file'): ?>
                                                    <div class="form-group col-md-4 mb-3">
                                                        <label class="col-form-label"><?php echo e(__(frontendFormatter($key))); ?>

                                                            (<?php echo e(@$section['content']['size']); ?>)
                                                        </label>

                                                        <div id="image-preview" class="image-preview"
                                                            style="background-image:url(<?php echo e(@$content->data->$key); ?>);">
                                                            <label for="image-upload"
                                                                id="image-label"><?php echo e(__('Choose File')); ?></label>
                                                            <input type="<?php echo e($sec); ?>" name="<?php echo e($key); ?>"
                                                                id="image-upload" />
                                                        </div>

                                                    </div>
                                                
                                                <?php elseif($sec == 'textarea'): ?>
                                                    <div class="form-group col-md-12">

                                                        <label for=""><?php echo e(__(frontendFormatter($key))); ?> (<?php echo e(@$section['content']['max']); ?>)</label>
                                                        <textarea name="<?php echo e($key); ?>" class="form-control"><?php echo e($content !== null ? $content->data->$key : ''); ?></textarea>

                                                    </div>
                                                <?php elseif($sec == 'textarea_nic'): ?>
                                                    <div class="form-group col-md-12">

                                                        <label for=""><?php echo e(__(frontendFormatter($key))); ?></label>
                                                        <textarea name="<?php echo e($key); ?>" class="form-control summernote"><?php echo e($content !== null ? $content->data->$key : ''); ?></textarea>

                                                    </div>
                                                <?php elseif($sec == 'icon'): ?>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="My house">
                                                        <span class="input-group-append">
                                                            <button class="btn btn-outline-secondary"
                                                                data-icon="fas fa-home" role="iconpicker"></button>
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <div class="form-group col-md-12">

                                                <button type="submit"
                                                    class="btn btn-primary float-right"><?php echo e(__('Update')); ?></button>

                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>


                    </div>
                <?php endif; ?>

                <?php if(isset($section['element'])): ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4> <a href="<?php echo e(route('admin.frontend.element', request()->name)); ?>"
                                            class="btn btn-icon icon-left btn-primary add-page"> <i class="fa fa-plus"></i>
                                            <?php echo e(__('Add Elements')); ?></a></h4>
                                    <div class="card-header-form">
                                        <form method="GET"
                                            action="<?php echo e(route('admin.frontend.element.search', request()->name)); ?>">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search"
                                                    name="search">
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
                                            <tr class="text-center">
                                                <th><?php echo e(__('Sl')); ?>.</th>
                                                <?php
                                                    $keys = [];
                                                ?>

                                                <?php $__currentLoopData = $section['element']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($sec == 'file' || $sec == 'text' || $sec == 'icon'): ?>
                                                        <th><?php echo e(__(frontendFormatter($key))); ?></th>
                                                    <?php endif; ?>
                                                    <?php
                                                        array_push($keys, $key);
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <th><?php echo e(__('Action')); ?></th>
                                            </tr>

                                            <?php $__empty_1 = true; $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr class="text-center">
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <?php $__currentLoopData = $keys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($key == 'size' ||$key == 'unique' ): ?>
                                                            <?php continue; ?>
                                                        <?php endif; ?>
                                                        <?php if($key=='heading_icon'||$key=='percentage'||$key == 'video_cloud_link'|| $key=='social_icon'|| $key=='question' ||$key=='social_link' || $key == 'title' || $key=='name' || $key=='designation' || $key=='header' ||$key == 'button_link'): ?>
                                                            <td><?php echo e(@$element->data->$key); ?></td>
                                                        <?php endif; ?>

                                                        <?php if($key == 'image'): ?>
                                                            <td><img src="<?php echo e($element->data->$key); ?>" alt=""
                                                                    class="rounded p-2 image-fluid" width="100px">
                                                            </td>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                    <td>
                                                        <a href="<?php echo e(route('admin.frontend.element.edit', ['name' => request()->name, 'element' => $element])); ?>"
                                                            class="btn btn-primary"><i class="fa fa-pen"></i></a>

                                                        <button class="btn btn-danger delete-btn-e"
                                                            data-url="<?php echo e(route('admin.frontend.element.delete', [request()->name, $element])); ?>"><i
                                                                class="fa fa-trash"></i></button>

                                                    </td>

                                                </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                                <tr>

                                                    <td class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>

                                                </tr>
                                            <?php endif; ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal-e">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Delete Element')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>

                        <p><?php echo e(__('Are You Sure To Delete Element')); ?>?</p>

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
        $(function() {
            'use strict'
            $('.summernote').summernote();

            $('.delete-btn-e').on('click', function() {
                const modal = $('#deleteModal-e');

                modal.find('form').attr('action', $(this).data('url'))
                modal.modal('show')
            })

            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: "<?php echo e(__('Choose File')); ?>",
                label_selected: "<?php echo e(__('Upload File')); ?>",
                no_label: false,
                success_callback: null
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tdbdltd\core\resources\views/backend/frontend/index.blade.php ENDPATH**/ ?>