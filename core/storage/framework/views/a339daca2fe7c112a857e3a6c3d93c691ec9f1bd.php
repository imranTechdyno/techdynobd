

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Color</th>
                        <th>Short</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $content_test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key->data->title); ?></td>
                            <td><?php echo e($key->data->color_text); ?></td>
                            <td><?php echo e($key->data->short_description); ?></td>
                            <td><img src="<?php echo e($key->data->image); ?>"></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/backend/frontend/index_text.blade.php ENDPATH**/ ?>