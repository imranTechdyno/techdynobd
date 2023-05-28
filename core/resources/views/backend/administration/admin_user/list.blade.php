@extends('backend.layout.master')

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.create') }}">{{ __('Create Admin') }}</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.create') }}" class="btn btn-primary">{{ __('Create Admin') }}</a>
                        </div>
                        <div class="card-body">

                            <button class="btn btn-danger my-3" data-href="{{ route('admin.multiple') }}"
                                data-toggle="tooltip" title="multiple delete" type="button" id="multiple_delete">
                                <i class="fas fa-trash"></i> Multiple delete
                            </button>



                            <div class="table-responsive">
                                <table class="table table-striped text-capitalize" id="table-1">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Phone') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Role') }}</th>
                                            @if (auth()->guard('admin')->user()->canany(['admin_user_edit', 'admin_user_delete']))
                                                <th>{{ __('Action') }}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(@$admins as $admin)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="checkbox" data-id="{{ $admin->id }}" id="checkbox">
                                                        <label class="form-check-label" for="checkbox">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>{{ @$loop->iteration }}</td>
                                                <td>
                                                    @if ($admin->image)
                                                        <img src="{{ getFile('admin', @$admin->image) }}" alt="Image"
                                                            width="50px" class="rounded img-fluid">
                                                    @else
                                                        <img src="{{ getFile('default', @$general->default_image) }}"
                                                            alt="Image" width="50px" class="rounded img-fluid">
                                                    @endif

                                                </td>
                                                <td>{{ $admin->name ?? $admin->username }}</td>
                                                <td>{{ $admin->phone }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ @$admin->getRoleNames()[0] }}</td>
                                                @if (auth()->guard('admin')->user()->canany(['admin_user_edit', 'admin_user_delete']))
                                                    <td>
                                                        <div class="d-flex">
                                                            @if (auth()->guard('admin')->user()->can('admin_user_edit'))
                                                                <a class="btn btn-primary btn-action mr-1"
                                                                    href="{{ route('admin.edit', @$admin->id) }}"
                                                                    data-toggle="tooltip" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            @endif
                                                            @if (auth()->guard('admin')->user()->can('admin_user_delete'))
                                                                <button class="btn btn-danger delete"
                                                                    data-href="{{ route('admin.destroy', $admin->id) }}"
                                                                    data-toggle="tooltip" title="Delete" type="button">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                @endif
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
        </section>
    </div>
@endsection
@push('script')
    <script>
        'use strict'
        $(document).ready(function() {

            var data_arr = [];

            $(document).on('change', '#checkbox', function() {
                const id = $(this).attr('data-id');
                data_arr.push(id);
            });


            $(document).on('click', '#multiple_delete', function() {

                const url = $(this).attr('data-href');
                if (data_arr.length == 0) {
                    alert('please check the item');
                    return false;
                } else {
                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {
                            data: data_arr
                        },
                        success: (data) => {
                            iziToast.success({
                                message: data.message,
                                position: 'topRight',
                                theme: 'dark',
                                icon: 'fas fa-solid fa-check',
                                progressBarColor: 'rgb(0, 255, 184)',
                                color: '#17d990',
                                messageColor: '#ffffff',
                            });

                            location.reload();

                        },
                        error: (error) => {

                        }
                    })
                }

            });

        });
    </script>
@endpush
