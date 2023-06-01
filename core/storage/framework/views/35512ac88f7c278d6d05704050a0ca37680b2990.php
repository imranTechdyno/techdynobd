<script src="<?php echo e(asset('asset/frontend/js/jquery.min.js')); ?>"></script>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

<script src="<?php echo e(asset('asset/frontend/js/bootstrap.min.js')); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $(".multiple-items").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev1"><img src="asset/images/arrow-left.png" alt=""></button>', // Custom previous arrow
        nextArrow: '<button type="button" class="slick-next1"><img src="asset/images/arrow-right.png" alt=""></button>', // Custom next arrow
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });
    $(".blue").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev1"><img src="asset/images/arrow-left.png" alt=""></button>', // Custom previous arrow
        nextArrow: '<button type="button" class="slick-next1"><img src="asset/images/arrow-right.png" alt=""></button>', // Custom next arrow
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    $(".news").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev1"><img src="asset/images/arrow-left.png" alt=""></button>', // Custom previous arrow
        nextArrow: '<button type="button" class="slick-next1"><img src="asset/images/arrow-right.png" alt=""></button>', // Custom next arrow
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    $(".one").slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><img src="asset/images/glance_arrow1.png" alt=""></button>', // Custom previous arrow
        nextArrow: '<button type="button" class="slick-next"><img src="asset/images/glance_arrow2.png" alt=""></button>', // Custom next arrow
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });
</script>

<script src="<?php echo e(asset('asset/frontend/js/jquery.flexslider-min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/js/waypoints.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/js/jquery.counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/js/back-to-top.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/js/validate.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/js/subscribe.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/js/sticky.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/js/script.js')); ?>"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
    integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
    data-cf-beacon='{"rayId":"7cc4ee692aef1918","version":"2023.4.0","r":1,"b":1,"token":"1a2187940c214caa9d3fed19b4904902","si":100}'
    crossorigin="anonymous"></script>
<script>
    let btn = document.querySelector(".btn");
    let clip = document.querySelector(".clip");
    let close = document.querySelector(".close");
    let video = document.querySelector("video");
    btn.onclick = function() {
        btn.classList.add("active");
        clip.classList.add("active");
        video.play();
        video.currentTime = 0;
    };
    close.onclick = function() {
        btn.classList.remove("active");
        clip.classList.remove("active");
        video.pause();
    };
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $(".multiple-items").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev1"><img src="asset/images/arrow-left.png" alt=""></button>', // Custom previous arrow
        nextArrow: '<button type="button" class="slick-next1"><img src="asset/images/arrow-right.png" alt=""></button>', // Custom next arrow
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });
    $(".blue").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev1"><img src="images/arrow-left.png" alt=""></button>', // Custom previous arrow
        nextArrow: '<button type="button" class="slick-next1"><img src="images/arrow-right.png" alt=""></button>', // Custom next arrow
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    $(".news").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev1"><img src="images/arrow-left.png" alt=""></button>', // Custom previous arrow
        nextArrow: '<button type="button" class="slick-next1"><img src="images/arrow-right.png" alt=""></button>', // Custom next arrow
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    $(".one").slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><img src="images/glance_arrow1.png" alt=""></button>', // Custom previous arrow
        nextArrow: '<button type="button" class="slick-next"><img src="images/glance_arrow2.png" alt=""></button>', // Custom next arrow
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });
</script>
<?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/frontend/layout/js.blade.php ENDPATH**/ ?>