<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- ---------------------------------- Bootstrap 5 ---------------------------------- --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    {{-- ---------------------------------- My Style ---------------------------------- --}}
    @foreach ($style as $s)
    <link rel="stylesheet" href="/style/{{ $s }}.css">
    @endforeach
</head>

<body>
    @yield('content')

    {{-- ---------------------------------- Bootstrap 5 ---------------------------------- --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    {{-- ---------------------------------- Fontawesome ---------------------------------- --}}
    <script src="https://kit.fontawesome.com/02db274a60.js" crossorigin="anonymous"></script>

    {{-- ---------------------------------- My Script ---------------------------------- --}}
    @foreach ($script as $sc)
    <script src="/script/{{ $sc }}.js"></script>


    @yield('custom_html')


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('themes/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('themes/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('themes/admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('themes/admin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('themes/admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('themes/admin/js/demo/chart-pie-demo.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    @if (session()->has('success'))
        <script>
            Swal.fire(
  'Berhasil!',
  '{{ session()->get('success') }}',
  'success'
)
        </script>
    @endif

    @stack('custom_js')



    @endforeach
</body>

</html>