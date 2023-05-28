<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        <?php if(@$general->sitename): ?>
            <?php echo e(__(@$general->sitename) . '-'); ?>

        <?php endif; ?>
        <?php echo e(__(@$pageTitle)); ?>

    </title>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(getFile('icon', @$general->favicon)); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/izitoast.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/login.css')); ?>">

</head>

<body>

    <div id="app">
        <?php echo $__env->yieldContent('content'); ?>
        <div class="text-light fixed-bottom text-center px-3 p-2">
            <p class="ml-4"><?php echo e(@$general->copyright); ?></p>
        </div>
    </div>


    <script src="<?php echo e(asset('asset/admin/js/izitoast.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script'); ?>

    <?php if(Session::has('success')): ?>
        <script>
            "use strict";
            iziToast.show({
                message: "<?php echo e(session('success')); ?>",
                position: 'topCenter',
                theme: 'dark',
                icon: 'fas fa-solid fa-check',
                progressBarColor: 'rgb(0, 255, 184)',
                color: '#17d990',
                messageColor: '#ffffff',
            });
        </script>
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            "use strict";
            iziToast.show({
                message: "<?php echo e(session('error')); ?>",
                position: "topCenter",
                theme: 'dark',
                icon: 'fa fa-exclamation-circle',
                progressBarColor: '#f78686',
                color: '#fb405d',
                messageColor: '#ffffff',
            });
        </script>
    <?php endif; ?>

    <?php if(@$errors->any()): ?>
        <script>
            "use strict";
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                iziToast.show({
                    message: "<?php echo e(__($error)); ?>",
                    position: "topCenter",
                    theme: 'dark',
                    icon: 'fa fa-exclamation-circle',
                    progressBarColor: '#f78686',
                    color: '#fb405d',
                    messageColor: '#ffffff',
                });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </script>
    <?php endif; ?>

</body>

</html>
<?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/backend/auth/master.blade.php ENDPATH**/ ?>