

<?php $__env->startSection('content'); ?>
    <section>
        <div class="container">

            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>
            </div>

            <form action="<?php echo e(route('admin.login')); ?>" method="POST" class="login">
                <?php echo csrf_field(); ?>
                <h3><?php echo e(__('Login To Continue')); ?></h3>
                <div class="form-group">
                    <label for="username"><?php echo e(__('Email')); ?></label>
                    <input type="text" placeholder="Enter email" name="email" value="<?php echo e(old('email')); ?>">
                </div>
                <div class="form-group">
                    <label for="password"><?php echo e(__('Password')); ?></label>
                    <input type="password" name="password" placeholder="Password">
                    <div class="forget"><a href="<?php echo e(route('admin.password.reset')); ?>">
                            <i class="fa fa-key mr-1"></i><?php echo e(__('Forgot Password')); ?>?
                        </a></div>
                </div>


                <button class="btn-login" type="submit"><?php echo e(__('Log In')); ?></button>
            </form>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.auth.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tdbdltd\core\resources\views/backend/auth/login.blade.php ENDPATH**/ ?>