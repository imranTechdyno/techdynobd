@extends('backend.layout.master')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __($pageTitle) }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                <div class="breadcrumb-item active"><a
                        href="{{ route('admin.index') }}">{{ __('Admin List') }}</a>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="form-group col-md-4 mb-4">
                                        <label>{{__('Admin Image')}}</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">{{__('Choose File')}}</label>
                                                <input type="file" name="image" id="image-upload" />
                                            </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">{{__('Name')}}</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                    </div>
                                
                                    <div class="form-group col-md-6">
                                        <label for="">{{__('User Name')}}</label>
                                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Username">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">{{__('Phone')}}</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('Phone') }}">
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label for="">{{__('Email')}}</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label for="">{{__('Password')}}</label>
                                        <input type="password" name="password" class="form-control"  placeholder="Password">
                                    </div> 
                                    
                                    <div class="form-group col-md-6">
                                        <label for="">{{__('Password Confirmation')}}</label>
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" >
                                    </div>
                              
                                    <div class="form-group col-md-6">
                                        <label for="">{{__('Role')}}</label>
                                        <select class="form-control select2" name="role">
                                            <option value="" selected disabled>-- {{__('Select Role')}} -- </option>
                                            @foreach(@$roles as $role)
                                                <option value="{{ $role->name }}">{{ __($role->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                               
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">{{__('Create Admin')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection

@push('script')

    <script>
        $(function(){
            'use strict'

            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "{{__('Choose File')}}", // Default: Choose File
                label_selected: "{{__('Update Image')}}", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
        })
    </script>

@endpush
