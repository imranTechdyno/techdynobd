@extends('backend.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __(@$pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __(@$pageTitle) }}</div>
                </div>
            </div>

            <div class="section-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SL') }}</th>
                                                <th>{{ __('name') }}</th>
                                                <th>{{ __('Phone') }}</th>
                                                <th>{{ __('email') }}</th>
                                                <th>{{ __('address') }}</th>
                                                <th>{{ __('image') }}</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($user as $key => $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ @$user->fullname }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->address }}</td>
                                                    <td>
                                                        @if($user->image)
                                                        <img src="{{ getFile('user',@$user->image)}}" alt="img" class="img-fluid" width="80px" height="80px">
                                                        @else 
                                                        <img src="{{ getFile('default',@$general->default_image) }}" alt="img" class="img-fluid" width="80px" height="80px">
                                                        @endif
                                                    </td>     
                                                    <td>
                                                        <a href="{{ route('admin.user.details', $user) }}"
                                                        class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                                    </td>                                               
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
