<nav class="navbar navbar-expand-lg main-navbar">

    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li class="bars-icon-navbar"><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg "><i
                        class="fas fa-bars"></i></a></li>
            </li>
        </ul>
    </form>


    <ul class="navbar-nav navbar-right">
        <li class="my-auto mx-2">
            <a href="{{ route('home') }}" target="_blank" class="visit-site-btn"><i
                    class="fas fa-globe-africa "></i><span class="visit_site">{{ __('Visit Site') }}</span></a>
        </li>

        <li class="mx-1 my-auto nav-item dropdown no-arrow">
            <select name="" id="" class="form-control selectric changeLang">
                @foreach ($language_top as $top)
                <option value="{{ $top->short_code }}" {{ session('locale')==$top->short_code ? 'selected' : '' }}>
                    {{ __(strtoupper($top->name)) }}
                </option>
                @endforeach
            </select>
        </li>

        {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i><span
                    class="badge badge-light text-primary notification-badge">{{ $notifications->count() }}</span></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="{{ route('admin.markNotification') }}">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons" id="notificationList">
                    @forelse($notifications as $notification)
                    @if($notification->type=='App\Notifications\proposalNotification')
                    <a href="{{ route('admin.proposal.details', $notification->data['id']) }}"
                        class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-success text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            {{ $notification->data['message'] }}
                            <div class="time text-primary">{{ $notification->created_at->diffforhumans() }}</div>
                        </div>
                    </a>
                    @endif

                    @if($notification->type=='App\Notifications\BidNotification')
                    <a href="{{ route('admin.bid')}}" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-success text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            {{ $notification->data['message'] }}
                            <div class="time text-primary">{{ $notification->created_at->diffforhumans() }}</div>
                        </div>
                    </a>
                    @endif

                    @if($notification->type=='App\Notifications\PaymentNotification')
                    <a href="{{ route('admin.payment')}}" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-success text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            {{ $notification->data['message'] }}
                            <div class="time text-primary">{{ $notification->created_at->diffforhumans() }}</div>
                        </div>
                    </a>
                    @endif
                    @if($notification->type=='App\Notifications\quoteNotification')

                    <a href="{{ route('admin.quote') }}" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-success text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            {{ $notification->data['message'] }}
                            <div class="time text-primary">{{ $notification->created_at->diffforhumans() }}</div>
                        </div>
                    </a>
                    @endif
                    @empty
                    @endforelse

                </div>
            </div>

        </li> --}}

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ getFile('admin',auth()->guard('admin')->user()->image) }}"
                    class="rounded-circle mr-1">
                <div class="d-lg-inline-block text-capitalize">{{ __('Hi') }},
                    {{ auth()->guard('admin')->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('Profile') }}
                </a>

                <a href="{{ route('admin.logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
            </div>
        </li>
    </ul>
</nav>