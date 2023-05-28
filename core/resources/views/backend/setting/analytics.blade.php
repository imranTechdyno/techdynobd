@extends('backend.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                </div>
            </div>

            <div class="section-body ">
                <div class="row">
                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <form action="" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <div class="row">

                                        <div class="form-group col-md-6 mb-3">
                                            <label class="col-form-label">{{ __('Analytics Id') }}</label>
                                            <input type="text" name="analytics_key" class="form-control form_control"
                                                value="{{ @$general->analytics_key }}">


                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="">{{ __('Allow Analytics') }}</label>

                                            <select name="analytics_status" id="" class="form-control selectric">

                                                <option value="1"
                                                    {{ @$general->analytics_status == 1 ? 'selected' : '' }}>
                                                    {{ __('Yes') }}</option>
                                                <option value="0"
                                                    {{ @$general->analytics_status == 0 ? 'selected' : '' }}>
                                                    {{ __('No') }}</option>

                                            </select>

                                        </div>

                                        <div class="form-group col-md-8">

                                            <button type="submit"
                                                class="btn btn-primary">{{ __('Analytics Update') }}</button>

                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
    </div>
@endsection
