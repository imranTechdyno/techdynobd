<?php
    $bannerElement = element('banner.element');
?>

<!-- slider part starts here -->
<main class="main">

    <section class="home-slider">
        <div class="flexslider">
            <ul class="slides">
                <?php $__empty_1 = true; $__currentLoopData = $bannerElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="">
                        <img src="<?php echo e(@$item->data->image); ?>" alt="Slider 1" />
                        <div class="slider-content">
                            <div class="container">
                                <!-- if anything nessesary we will add here slider one -->
                            </div>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php echo $__env->make('frontend.partial.no_record_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

            </ul>
        </div>
    </section>

    <!-- slider end here -->
<?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/frontend/sections/banner.blade.php ENDPATH**/ ?>