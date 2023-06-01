<?php

$platformElement = element('platform.element');
?>

<!-- box slider our sister concern -->
<div class="sister">Our Sister Concern</div>
<section class="card_container">
    <div class="container">
        <div class="row">
            <div class="multiple-items">
                <?php $__empty_1 = true; $__currentLoopData = $platformElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-12">
                    <div class="card">
                        <h2><?php echo e(@$item->data->sub_title); ?></h2>

                        <p>
                            <?php echo e(@$item->data->short_description); ?>

                            <a href="">VIEW MORE..</a>
                        </p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
            </div>
        </div>
        <center>
            <button class="btn btn-primary sis">All Sister Concern</button>
        </center>
    </div>
</section>

<!-- box slider our sister concern end--><?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/frontend/sections/platform.blade.php ENDPATH**/ ?>