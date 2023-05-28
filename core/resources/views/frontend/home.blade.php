@extends('frontend.layout.master')
@section('content')

{{-- ITEM LOAD FROM SECTION PAGE --}}
@if ($sections->sections != null)
@foreach ($sections->sections as $sections)
@include('frontend.sections.' . $sections)
@endforeach
@endif

@endsection