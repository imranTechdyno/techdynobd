@extends('frontend.layout.master')

@section('content')

@if ($page->sections != null)
@foreach ($page->sections as $sections)
@include('frontend.sections.' . $sections)
@endforeach
@endif

@endsection