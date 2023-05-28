@extends('backend.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.roles.create') }}">{{ __('Role Create') }}</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.roles.create') }}"
                                class="btn btn-primary">{{ __('Role Create') }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped text-capitalize" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('created_at') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(@$roles as $role)
                                            <tr>
                                                <td>{{ @$loop->iteration }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->created_at->format('d/m/y') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                       @if (auth()->guard('admin')->user()->can('role_view'))
                                                        <a class="btn btn-primary btn-action mr-1"
                                                            href="{{ route('admin.roles.show', @$role->id) }}"
                                                            data-toggle="tooltip" title="View">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        @endif
                                                        @if (auth()->guard('admin')->user()->can('role_edit'))

                                                        <a class="btn btn-primary btn-action mr-1"
                                                            href="{{ route('admin.roles.edit', @$role->id) }}"
                                                            data-toggle="tooltip" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        @endif
                                                        @if (auth()->guard('admin')->user()->can('role_delete'))

                                                        <button
                                                            data-href="{{ route('admin.roles.destroy', @$role->id) }}"
                                                            class="btn btn-danger delete" data-toggle="tooltip"
                                                            title="Delete" type="button">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        @endif
                                                    </div>
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
        </section>
    </div>
@endsection
