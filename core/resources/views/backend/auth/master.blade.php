<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        @if (@$general->sitename)
            {{ __(@$general->sitename) . '-' }}
        @endif
        {{ __(@$pageTitle) }}
    </title>
    <link rel="shortcut icon" type="image/png" href="{{ getFile('icon', @$general->favicon) }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="{{ asset('asset/admin/css/izitoast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/login.css') }}">

</head>

<body>

    <div id="app">
        @yield('content')
        <div class="text-light fixed-bottom text-center px-3 p-2">
            <p class="ml-4">{{ @$general->copyright }}</p>
        </div>
    </div>


    <script src="{{ asset('asset/admin/js/izitoast.min.js') }}"></script>

    @stack('script')

    @if (Session::has('success'))
        <script>
            "use strict";
            iziToast.show({
                message: "{{ session('success') }}",
                position: 'topCenter',
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
                position: "topCenter",
                theme: 'dark',
                icon: 'fa fa-exclamation-circle',
                progressBarColor: '#f78686',
                color: '#fb405d',
                messageColor: '#ffffff',
            });
        </script>
    @endif

    @if (@$errors->any())
        <script>
            "use strict";
            @foreach ($errors->all() as $error)
                iziToast.show({
                    message: "{{ __($error) }}",
                    position: "topCenter",
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
