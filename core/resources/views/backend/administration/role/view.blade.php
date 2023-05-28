@extends('backend.layout.master')
@push('style')
    <style>
        .formSubModule_1{
            border: 1px solid #e4e6fc;
        border-radius:8px;
        }
      
    </style>
@endpush
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __($pageTitle) }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                <div class="breadcrumb-item active"><a
                        href="{{ route('admin.roles.index') }}">{{ __('Role List') }}</a>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row mb-3 border-bottom">
                                <div class="form-group col-md-12">
                                    <h5 class="text-center">{{__('Role Name : ')}} <span class="text-primary">{{ @$role->name }}</span></h5>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h5>{{__( @$role->name.' '.'Has Permissions:')}}</h5>
                                    <div id="kt_repeater_1">
                                        <div class="card-body">
                                            <div data-repeater-list="group-a">
                                                @if (count($parentSelectedPermissions) > 0)
                                                    @foreach($parentSelectedPermissions as $parentSelectedPermission)
                                                        <div data-repeater-item="" class="form-group row p-3 formSubModule_1"  >
                                                            <div class="col-lg-4">
                                                                <b>{{__('Module')}}: </b><br>
                                                                @foreach($permissions as $permission)
                                                                    @if($permission->submodule_id == 0)
                                                                        @if ($parentSelectedPermission->id === $permission->id)
                                                                            {{$permission->display_name}}
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </div>

                                                            <div class="col-lg-7" id="sub-module">
                                                                <b> {{__('Sub-module')}}: </b><br>

                                                                @foreach($permissions as $permission)
                                                                    @if($parentSelectedPermission->id === $permission->submodule_id)
                                                                        @php ($selected = false)
                                                                        @foreach($childSelectedPermissions as $childSelectedPermission)
                                                                            @if($permission->id === $childSelectedPermission->id)
                                                                                @php ($selected = true)
                                                                            @endif
                                                                        @endforeach
                                                                        @if ($selected === true)
                                                                            {{$permission->display_name}}<br>
                                                                        @endif
                                                                    @endif
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
