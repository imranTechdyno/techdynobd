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
                <div class="col-md-12">                  
                    
                    <div class="card">                  
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>{{ __('SL') }}</th>
                                            <th>{{ __('Email') }}</th>       
                                            <th>{{ __('Created_at') }}</th>                                 
                                            <th></th>                                
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @forelse(@$subscribers_all as $item)
                                            <tr >
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-lowercase">{{ @$item->email}}</td>
                                                <td>{{ @$item->created_at->format('m/d/Y')}}</td>                                                                                         
                                            </tr>
                                        @empty

                                            <tr>
                                                <td class="text-center" colspan="100%">
                                                    {{ __('No Data Found') }}
                                                </td>
                                            </tr>

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



