<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.home') }}">
                @if (@$general->logo)
                    <img class="img-fluid mr-2" src="{{ getFile('logo', @$general->logo) }}" alt="img" width="70%">
                @else
                    <img class="img-fluid" src="{{ getFile('default', @$general->default_image) }}" alt="img"
                        width="15%">
                @endif
            </a>
            <br>
            <a class="text-white" href="{{ route('admin.home') }}">{{ @$general->sitename }}
            </a>
        </div>

        <ul class="sidebar-menu">

            <li class="nav-item dropdown {{ menuActive('admin.home') }}">
                <a href="{{ route('admin.home') }}" class="nav-link "><i
                        class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span></a>
            </li>

            @if (auth()->guard('admin')->user()->canany(['admin_user_list', 'admin_user_add', 'role_list', 'role_add']))
                @if (auth()->guard('admin')->user()->canany(['admin_user_list', 'admin_user_add']))
                    <li class="nav-item dropdown {{ @$navAdminActive }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                            <i class="fas fa-users"></i>
                            <span>{{ __('Admin User') }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            @if (auth()->guard('admin')->user()->can('admin_user_list'))
                                <li class="{{ @$adminListActive }}">
                                    <a class="nav-link" href="{{ route('admin.index') }}">{{ __('Admin List') }}</a>
                                </li>
                            @endif
                            @if (auth()->guard('admin')->user()->can('admin_user_add'))
                                <li class="{{ @$adminAddActive }}">
                                    <a class="nav-link"
                                        href="{{ route('admin.create') }}">{{ __('Create Admin') }}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (auth()->guard('admin')->user()->canany(['role_list', 'role_add']))
                    <li class="nav-item dropdown {{ @$administration_active }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                            <i class="fas fa-user-tag"></i>
                            <span>{{ __('Role') }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            @if (auth()->guard('admin')->user()->can('role_list'))
                                <li class="{{ @$role_list_active }}">
                                    <a class="nav-link"
                                        href="{{ route('admin.roles.index') }}">{{ __('Role List') }}</a>
                                </li>
                            @endif
                            @if (auth()->guard('admin')->user()->can('role_add'))
                                <li class="{{ @$role_add_active }}">
                                    <a class="nav-link"
                                        href="{{ route('admin.roles.create') }}">{{ __('Role Create') }}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            @endif

            <li class="menu-header">{{ __('Email Settings') }}</li>

            <li class="nav-item dropdown {{ @$navEmailManagerActiveClass }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i>
                    <span>{{ __('Email Manager') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ @$subNavEmailConfigActiveClass }}">
                        <a class="nav-link" href="{{ route('admin.email.config') }}">{{ __('Email Configure') }}</a>
                    </li>
                    <li class="{{ @$subNavEmailTemplatesActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.email.templates') }}">{{ __('Email Templates') }}</a>
                    </li>
                </ul>
            </li>


            <li class="menu-header">{{ __('System Settings') }}</li>

            <li class="nav-item dropdown {{ @$navGeneralSettingsActiveClass }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i>
                    <span>{{ __('General Settings') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ @$subNavGeneralSettingsActiveClass }}">
                        <a class="nav-link"
                            href="{{ route('admin.general.setting') }}">{{ __('General Settings') }}</a>
                    </li>

                    {{-- <li><a class="nav-link "
                            href="{{ route('admin.general.analytics') }}">{{ __('Google Analytics') }}</a>
                    </li>

                    <li>
                        <a class="nav-link"
                            href="{{ route('admin.general.database') }}">{{ __('Database Backup') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.general.cacheclear') }}">{{ __('Cache Clear') }}</a>
                    </li> --}}


                </ul>
            </li>

            <li class="nav-item dropdown {{ @$navManagePagesActiveClass }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>{{ __('Frontend') }}</span>
                </a>

                <ul class="dropdown-menu">
                    <li class="{{ @$subNavPagesActiveClass }}">
                        <a class="nav-link" href="{{ route('admin.frontend.pages') }}">{{ __('Pages') }}</a>
                    </li>

                    @forelse($urlSections as $key => $section)

                        <li class="@if (frontendFormatter($key) == frontendFormatter(@$activeClass)) active @else ' ' @endif">
                            <a class="nav-link"
                                href="{{ route('admin.frontend.section.manage', ['name' => $key]) }}">{{ frontendFormatter($key) . ' Section' }}</a>
                        </li>
                    @empty

                    @endif
                </ul>

            </li>

            <li class="nav-item dropdown {{ @$navManageLanguageActiveClass }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-globe-africa"></i>
                    <span>{{ __('Manage Language') }}</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ @$subNavManageLanguageActiveClass }}"><a class="nav-link"
                            href="{{ route('admin.language') }}">{{ __('Manage Language') }}</a>
                    </li>
                </ul>
            </li>

        </ul>

    </aside>
</div>
