<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo e(route('admin.home')); ?>">
                <?php if(@$general->logo): ?>
                <img class="img-fluid mr-2" src="<?php echo e(getFile('logo',@$general->logo)); ?>" alt="img" width="70%">
                <?php else: ?>
                <img class="img-fluid" src="<?php echo e(getFile('default', @$general->default_image)); ?>" alt="img" width="15%">
                <?php endif; ?>
            </a>
            <br>
            <a class="text-white" href="<?php echo e(route('admin.home')); ?>"><?php echo e(@$general->sitename); ?>

            </a>
        </div>

        <ul class="sidebar-menu">

            <li class="nav-item dropdown <?php echo e(menuActive('admin.home')); ?>">
                <a href="<?php echo e(route('admin.home')); ?>" class="nav-link "><i class="fas fa-fire"></i><span><?php echo e(__('Dashboard')); ?></span></a>
            </li>

            <?php if(auth()->guard('admin')->user()->canany(['admin_user_list', 'admin_user_add', 'role_list', 'role_add'])): ?>
            <?php if(auth()->guard('admin')->user()->canany(['admin_user_list', 'admin_user_add'])): ?>
            <li class="nav-item dropdown <?php echo e(@$navAdminActive); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-users"></i>
                    <span><?php echo e(__('Admin User')); ?></span>
                </a>
                <ul class="dropdown-menu">
                    <?php if(auth()->guard('admin')->user()->can('admin_user_list')): ?>
                    <li class="<?php echo e(@$adminListActive); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.index')); ?>"><?php echo e(__('Admin List')); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(auth()->guard('admin')->user()->can('admin_user_add')): ?>
                    <li class="<?php echo e(@$adminAddActive); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.create')); ?>"><?php echo e(__('Create Admin')); ?></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->canany(['role_list', 'role_add'])): ?>
            <li class="nav-item dropdown <?php echo e(@$administration_active); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-tag"></i>
                    <span><?php echo e(__('Role')); ?></span>
                </a>
                <ul class="dropdown-menu">
                    <?php if(auth()->guard('admin')->user()->can('role_list')): ?>
                    <li class="<?php echo e(@$role_list_active); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.roles.index')); ?>"><?php echo e(__('Role List')); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(auth()->guard('admin')->user()->can('role_add')): ?>
                    <li class="<?php echo e(@$role_add_active); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.roles.create')); ?>"><?php echo e(__('Role Create')); ?></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php endif; ?>

            <li class="menu-header"><?php echo e(__('Email Settings')); ?></li>

            <li class="nav-item dropdown <?php echo e(@$navEmailManagerActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i>
                    <span><?php echo e(__('Email Manager')); ?></span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavEmailConfigActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.email.config')); ?>"><?php echo e(__('Email Configure')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavEmailTemplatesActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.email.templates')); ?>"><?php echo e(__('Email Templates')); ?></a>
                    </li>
                </ul>
            </li>


            <li class="menu-header"><?php echo e(__('System Settings')); ?></li>

            <li class="nav-item dropdown <?php echo e(@$navGeneralSettingsActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i>
                    <span><?php echo e(__('General Settings')); ?></span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavGeneralSettingsActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.general.setting')); ?>"><?php echo e(__('General Settings')); ?></a>
                    </li>

                    <li class="<?php echo e($ana); ?>"><a class="nav-link " href="<?php echo e(route('admin.general.analytics')); ?>"><?php echo e(__('Google Analytics')); ?></a>
                    </li>

                    <li>
                        <a class="nav-link" href="<?php echo e(route('admin.general.database')); ?>"><?php echo e(__('Database Backup')); ?></a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo e(route('admin.general.cacheclear')); ?>"><?php echo e(__('Cache Clear')); ?></a>
                    </li>


                </ul>
            </li>

            <li class="nav-item dropdown <?php echo e(@$navManagePagesActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span><?php echo e(__('Frontend')); ?></span>
                </a>

                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavPagesActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.frontend.pages')); ?>"><?php echo e(__('Pages')); ?></a>
                    </li>

                    <?php $__empty_1 = true; $__currentLoopData = $urlSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <li
                        class="<?php if(frontendFormatter($key) == frontendFormatter(@$activeClass)): ?> active <?php else: ?> ' ' <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.frontend.section.manage', ['name' => $key])); ?>"><?php echo e(frontendFormatter($key) . ' Section'); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <?php endif; ?>
                </ul>

            </li>

            <li class="nav-item dropdown <?php echo e(@$navManageLanguageActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-globe-africa"></i>
                    <span><?php echo e(__('Manage Language')); ?></span></a>
                <ul class="dropdown-menu">

                    <li class="<?php echo e(@$subNavManageLanguageActiveClass); ?>"><a class="nav-link"
                            href="<?php echo e(route('admin.language')); ?>"><?php echo e(__('Manage Language')); ?></a>
                    </li>
                </ul>
            </li>

        </ul>

    </aside>
</div><?php /**PATH C:\xampp\htdocs\tdbdltd\core\resources\views/backend/layout/sidebar.blade.php ENDPATH**/ ?>