<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title>
        <?php if(@$general->sitename): ?>
        <?php echo e(__(@$general->sitename) . '-'); ?>

        <?php endif; ?>
        <?php echo e(__(@$pageTitle)); ?>

    </title>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(getFile('icon', @$general->favicon)); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/datatables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/modules/jquery-selectric/selectric.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/izitoast.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/style.css')); ?>">
    <link rel="stylesheet"
        href="https://res.cloudinary.com/dlnpdqb4w/raw/upload/v1670134577/CA/components_xbwcc1_t1f6nd.css">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/summernote-bs4.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600;700;800&display=swap"
        rel="stylesheet">

    <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <?php echo $__env->make('backend.layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('backend.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('backend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <?php echo $__env->make('backend.layout.deleteModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backend.layout.deleteForeverModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script src="<?php echo e(asset('asset/admin/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/proper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/nicescroll.min.js')); ?>"></script>
    <script src="https://res.cloudinary.com/dlnpdqb4w/raw/upload/v1670134537/CA/datatables.min_vcx46d_tjmms0.js">
    </script>
    <script src="<?php echo e(asset('asset/admin/js/modules-datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/modules/jquery-selectric/jquery.selectric.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/modules/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/select2.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('asset/admin/js/izitoast.min.js')); ?>"></script>
    <script src="https://res.cloudinary.com/dlnpdqb4w/raw/upload/v1670134536/CA/iconpicker_barbam_tdhtpa.js"></script>
    <script src="<?php echo e(asset('asset/admin/js/sortable.min.js')); ?>"></script>
    <script src="https://res.cloudinary.com/dlnpdqb4w/raw/upload/v1670134536/CA/summernote-bs4.min_tqi3vf_fqi8th.js">
    </script>
    <script src="<?php echo e(asset('asset/admin/js/scripts.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script'); ?>

    <script>
        'use strict'
        $(document).ready(function() {
            $(document).on('click', '.delete', function(e) {
            const modal = $('#delete');

            modal.find('form').attr('action', $(this).data('href'));

            modal.modal('show');
        })
        $(document).on('click', '.deleteforever', function(e) {
            const modal = $('#deleteforever');

            modal.find('form').attr('action', $(this).data('href'));

            modal.modal('show');
        })

        var url = "<?php echo e(route('admin.changeLang')); ?>";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
    });
    </script>

    <?php if(Session::has('success')): ?>
    <script>
        "use strict";
            iziToast.show({
                message: "<?php echo e(session('success')); ?>",
                position: 'topRight',
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
                position: "topRight",
                theme: 'dark',
                icon: 'fa fa-exclamation-circle',
                progressBarColor: '#f78686',
                color: '#fb405d',
                messageColor: '#ffffff',
            });
    </script>
    <?php endif; ?>
    <?php if(session()->has('notify')): ?>
    <?php $__currentLoopData = session('notify'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
        "use strict";
                iziToast.<?php echo e($msg[0]); ?>({
                    message: "<?php echo e(__($msg[1])); ?>",
                    position: 'topRight',
                    theme: 'dark',
                    icon: 'fas fa-solid fa-check',
                    progressBarColor: 'rgb(0, 255, 184)',
                    color: '#17d990',
                    messageColor: '#ffffff',
                });
    </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(@$errors->any()): ?>
    <script>
        "use strict";
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                iziToast.show({
                    message: "<?php echo e(__($error)); ?>",
                    position: "topRight",
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

</html><?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/backend/layout/master.blade.php ENDPATH**/ ?>