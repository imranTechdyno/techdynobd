
<div class="container-fluid contact_section">
    <div class="row">
        <div class="col-lg-12">
            <div class="contact_tag_align">
                <p class="contact_tag text-center">Contact Us</p>
                <p class="get_in_touch text-center">Let’s Get in touch.</p>
            </div>
            <div class="row">
                    <div class="col-lg-6">
                        <img src="<?php echo e(getFile('contact', 'contact.png')); ?>" class="contact_img" alt="contact">
                    </div>

                    <div class="col-lg-6 ">
                        <div class="contact_form">
                            <form action="" method="post">
                                <div class="form-group mt-4">
                                    <input class="form-control pb" type="text" name="name" placeholder="Name*"
                                        required>
                                </div>
                                <div class="form-group mt-4">
                                    <input class="form-control pb" type="email" name="email"
                                        placeholder="Email Address*" required>
                                </div>
                                <div class="form-group mt-4">
                                    <input class="form-control pb" type="number" name="contac_no"
                                        placeholder="Contact No*">
                                </div>
                                <div class="form-group mt-4">
                                    <select name="" id="" class="form-control form-select pb">
                                        <option selected disabled class="text-bold">Your Budget</option>
    
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <input class="form-control pb" type="text" name="requirements"
                                        placeholder="Requirments(project related)">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="mt-5 contact_form_submit text-white">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\laragon\www\tdbdltd\core\resources\views/frontend/sections/contact.blade.php ENDPATH**/ ?>