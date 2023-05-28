


<?php $__env->startPush('style'); ?>
    <style>
        #oopss {
            background: linear-gradient(-45deg, #fff300, #efe400);
            position: absulute;
            left: 0px;
            top: 0;
            width: 100%;
            height: 100%;
            line-height: 1.5em;
        }

        #oopss #error-text {
            font-size: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #000;
        }

        #oopss #error-text img {
            margin: 85px auto 20px;
            height: 342px;
        }

        #oopss #error-text span {
            position: relative;
            font-size: 1em;
            font-weight: 900;
            margin-bottom: 50px;
        }

        #oopss #error-text p.p-a {
            font-size: 19px;
            margin: 30px 0 15px 0;
        }

        #oopss #error-text p.p-b {
            font-size: 15px;
        }

        #oopss #error-text .back {
            background: #fff;
            color: #000;
            font-size: 30px;
            text-decoration: none;
            margin: 1em auto 0;
            padding: .7em 2em;
            border-radius: 500px;
            box-shadow: 0 20px 70px 4px rgba(0, 0, 0, 0.1), inset 7px 33px 0 0px #fff300;
            font-weight: 900;
            transition: all 300ms ease;
        }

        #oopss #error-text .back:hover {
            -webkit-transform: translateY(-13px);
            transform: translateY(-13px);
            box-shadow: 0 35px 90px 4px rgba(0, 0, 0, 0.3), inset 0px 0 0 3px #000;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="p-0">
        <div class="container">
            <div id='oopss'>
                <div id='error-text'>
                    <img src="https://cdn.rawgit.com/ahmedhosna95/upload/1731955f/sad404.svg" alt="404">
                    <span>500 Internal Server Error </span>
                    <p class="p-a">
                        The website we were visiting fainted suddenly. Take some times for it's recovery.</p>
                    <a href='<?php echo e(route('home')); ?>' class="back m-5">... Back to home page</a>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/errors/500.blade.php ENDPATH**/ ?>