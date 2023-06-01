@extends('backend.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Color</th>
                        <th>Short</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content_test as $key)
                        <tr>
                            <td>{{ $key->data->title }}</td>
                            <td>{{ $key->data->color_text }}</td>
                            <td>{{ $key->data->short_description }}</td>
                            <td><img src="{{ $key->data->image }}"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
