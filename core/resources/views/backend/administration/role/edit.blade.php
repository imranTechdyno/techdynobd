@extends('backend.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.roles.index') }}">{{ __('Role List') }}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.roles.update', @$role->id) }}" method="post">
                                {{ method_field('PUT') }}
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">{{ __('Role Name') }}</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ @$role->name }}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="">{{ __('Permissions') }}</label>
                                        <div id="kt_repeater_1">

                                            <div data-repeater-list="group-a">
                                                @if (count($parentSelectedPermissions) > 0)
                                                    @foreach ($parentSelectedPermissions as $parentSelectedPermission)
                                                        <div data-repeater-item="" class="form-group row formSubModule_1">
                                                            <div class="col-lg-4">
                                                                <label for="tst-test"> {{ __('Add Module') }}: </label>
                                                                <select class="form-control tst-test"
                                                                    name="mother-permissions"
                                                                    onchange="onSelectSelect(this)">
                                                                    <option value="" selected disabled>
                                                                        {{ __('Select option') }}</option>
                                                                    @foreach ($permissions as $permission)
                                                                        @if ($permission->submodule_id == 0)
                                                                            @if ($parentSelectedPermission->id === $permission->id)
                                                                                <option selected
                                                                                    value="{{ $permission->id }}">
                                                                                    {{ $permission->display_name }}
                                                                                </option>
                                                                            @else
                                                                                <option value="{{ $permission->id }}">
                                                                                    {{ $permission->display_name }}
                                                                                </option>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <a href="javascript:;" data-repeater-delete=""
                                                                    class="btn btn-icon-remove btn-danger">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-7" id="sub-module">
                                                                <label for="kt_select2_3"> {{ __('Sub-module') }}:
                                                                </label>
                                                                <select class="form-control sub-module-select"
                                                                    multiple="multiple" name="permissions"
                                                                    id="kt_select2_{{ $parentSelectedPermission->id }}">
                                                                    @foreach ($permissions as $permission)
                                                                        @if ($parentSelectedPermission->id === $permission->submodule_id)
                                                                            @php($selected = false)
                                                                            @foreach ($childSelectedPermissions as $childSelectedPermission)
                                                                                @if ($permission->id === $childSelectedPermission->id)
                                                                                    @php($selected = true)
                                                                                @endif
                                                                            @endforeach
                                                                            @if ($selected === true)
                                                                                <option selected
                                                                                    value="{{ $permission->id }}">
                                                                                    {{ $permission->display_name }}
                                                                                </option>
                                                                            @else
                                                                                <option value="{{ $permission->id }}">
                                                                                    {{ $permission->display_name }}
                                                                                </option>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div data-repeater-item="" class="form-group row formSubModule_1">
                                                        <div class="col-lg-4">
                                                            <label for="tst-test">{{ __(' Add Module') }}: </label>
                                                            <select class="form-control tst-test" name="mother-permissions"
                                                                onchange="onSelectSelect(this)">
                                                                <option value="">{{ __('Select option') }}</option>
                                                                @foreach ($permissions as $permission)
                                                                    @if ($permission->submodule_id == 0)
                                                                        <option value="{{ $permission->id }}">
                                                                            {{ $permission->display_name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <a href="javascript:;" data-repeater-delete=""
                                                                class="btn btn-icon-remove btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-7" id="sub-module">
                                                            <label for="kt_select2_3"> {{ __('Sub-module') }}: </label>
                                                            <select class="form-control sub-module-select"
                                                                multiple="multiple" name="permissions" id="kt_select2_3">
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-2">
                                                    <a id="add" href="javascript:;" data-repeater-create=""
                                                        class="btn btn-sm font-weight-bolder btn btn-primary">
                                                        <i class="fas fa-plus"></i> {{ __('ADD') }}
                                                    </a>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary float-right">{{ __('Update Role') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <!-- End:: Main Content -->
@endsection

@push('script')
    <script src="{{ asset('asset/admin/js/jquery.repeater.min.js') }}"></script>
    <script>
        'use strict'
        jQuery(document).ready(function() {
            KTFormRepeater.init();
            @if (count($parentSelectedPermissions) > 0)
                @foreach ($parentSelectedPermissions as $parentSelectedPermission)
                    $('#kt_select2_{{ $parentSelectedPermission->id }}').select2({
                        placeholder: "Select permission",
                    });
                @endforeach
            @else
                $('#kt_select2_3').select2({
                    placeholder: "Select permission",
                });
            @endif
        });

        let countSub = 0;
        let formRepeaterId = "#kt_repeater_1";
        let KTFormRepeater = function() {
            let demo1 = function() {
                $(formRepeaterId).repeater({
                    initEmpty: false,

                    defaultValues: {
                        'text-input': 'foo'
                    },

                    show: function() {
                        $(this).slideDown();
                        $(this).find('.sub-module-select').attr('id', 'select-kt-' + countSub)
                        $(`#select-kt-${countSub}`).select2({
                            placeholder: "Select permission",
                        })
                        $(`#select-kt-${countSub++}`).children().remove()
                    },

                    hide: function(deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
            }

            return {
                // public functions
                init: function() {
                    demo1();
                }
            };
        }();

        // parent role selected
        function onSelectSelect(that) {
            const value = that.value;
            let url = "{{ route('admin.getsubmodule', ':value') }}";
            url = url.replace(':value', value);
            $.ajax({
                type: 'GET',
                url: url,
                success: res => {
                    if (res.permissions.length > 0) {
                        let idName = $(that).parent().parent().find('select')[1].id;
                        $(`#${idName}`).children().remove()
                        res.permissions.forEach(each => {
                            $(`#${idName}`).append(new Option(each.display_name, each.id))
                        });


                    } else {
                        toastr.warning('', `No sub-module data found against ${res.permission.display_name}`);
                    }
                },
            })
        }
    </script>
@endpush
