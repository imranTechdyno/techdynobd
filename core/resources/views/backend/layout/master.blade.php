<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        @if (@$general->sitename)
        {{ __(@$general->sitename) . '-' }}
        @endif
        {{ __(@$pageTitle) }}
    </title>
    <link rel="shortcut icon" type="image/png" href="{{ getFile('icon', @$general->favicon) }}">

    <link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/datatables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/izitoast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/style.css') }}">
    <link rel="stylesheet"
        href="https://res.cloudinary.com/dlnpdqb4w/raw/upload/v1670134577/CA/components_xbwcc1_t1f6nd.css">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600;700;800&display=swap"
        rel="stylesheet">

    @stack('style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('backend.layout.navbar')
            @include('backend.layout.sidebar')
            @yield('content')
            @include('backend.layout.footer')
        </div>
    </div>

    @include('backend.layout.deleteModal')
    @include('backend.layout.deleteForeverModal')


    <script src="{{ asset('asset/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/proper.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/nicescroll.min.js') }}"></script>
    <script src="https://res.cloudinary.com/dlnpdqb4w/raw/upload/v1670134537/CA/datatables.min_vcx46d_tjmms0.js">
    </script>
    <script src="{{ asset('asset/admin/js/modules-datatables.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/moment.min.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/select2.min.js') }}"></script>
    {{-- <script src="{{ asset('asset/admin/js/stisla.js') }}"></script> --}}
    <script src="{{ asset('asset/admin/js/izitoast.min.js') }}"></script>
    <script src="https://res.cloudinary.com/dlnpdqb4w/raw/upload/v1670134536/CA/iconpicker_barbam_tdhtpa.js"></script>
    <script src="{{ asset('asset/admin/js/sortable.min.js') }}"></script>
    <script src="https://res.cloudinary.com/dlnpdqb4w/raw/upload/v1670134536/CA/summernote-bs4.min_tqi3vf_fqi8th.js">
    </script>
    <script src="{{ asset('asset/admin/js/scripts.js') }}"></script>

    @stack('script')

    <script>
        'use strict'
        $(document).ready(function() {
            $(document).on('click', '.delete', function(e) {
            const modal = $('#delete');

            modal.find('form').attr('action', $(this).data('href'));

            modal.modal('show');
        })
        $(document).on('click', '.deleteforever', function(e) {
            const modal = $('#deleteforever');

            modal.find('form').attr('action', $(this).data('href'));

            modal.modal('show');
        })

        var url = "{{ route('admin.changeLang') }}";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
    });
    </script>

    @if (Session::has('success'))
    <script>
        "use strict";
            iziToast.show({
                message: "{{ session('success') }}",
                position: 'topRight',
                theme: 'dark',
                icon: 'fas fa-solid fa-check',
                progressBarColor: 'rgb(0, 255, 184)',
                color: '#17d990',
                messageColor: '#ffffff',
            });
    </script>
    @endif

    @if (Session::has('error'))
    <script>
        "use strict";
            iziToast.show({
                message: "{{ session('error') }}",
                position: "topRight",
                theme: 'dark',
                icon: 'fa fa-exclamation-circle',
                progressBarColor: '#f78686',
                color: '#fb405d',
                messageColor: '#ffffff',
            });
    </script>
    @endif
    @if (session()->has('notify'))
    @foreach (session('notify') as $msg)
    <script>
        "use strict";
                iziToast.{{ $msg[0] }}({
                    message: "{{ __($msg[1]) }}",
                    position: 'topRight',
                    theme: 'dark',
                    icon: 'fas fa-solid fa-check',
                    progressBarColor: 'rgb(0, 255, 184)',
                    color: '#17d990',
                    messageColor: '#ffffff',
                });
    </script>
    @endforeach
    @endif

    @if (@$errors->any())
    <script>
        "use strict";
            @foreach ($errors->all() as $error)
                iziToast.show({
                    message: "{{ __($error) }}",
                    position: "topRight",
                    theme: 'dark',
                    icon: 'fa fa-exclamation-circle',
                    progressBarColor: '#f78686',
                    color: '#fb405d',
                    messageColor: '#ffffff',
                });
            @endforeach
    </script>
    @endif
</body>

</html>