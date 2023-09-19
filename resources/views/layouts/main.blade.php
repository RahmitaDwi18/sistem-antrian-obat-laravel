<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link href="{{ asset('themes/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('themes/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/style/components/sidebar.css">
    <link rel="stylesheet" href="/style/components/navbar.css">
    <link rel="stylesheet" href="/style/main.css">

    @if (isset($style))
    @foreach ($style as $s)
    <link rel="stylesheet" href="/style/pages/{{ $s }}.css">
    @endforeach
    @endif
</head>

<body id="page-top">
    <div id="wrapper">
        @include('includes.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('includes.navbar')

                @yield('content')
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Puskesmas Nusa Indah 2022</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Logout ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih button logout jika ingin keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" title="Batal">Cancel</button>
                    <a class="btn btn-primary btn-logout" href="#">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('logout') }}" method="post" id="logout-form">
        @csrf
    </form>

    <script>
        let btnLogout = document.querySelector('.btn-logout');
        btnLogout.addEventListener('click', (e) => {
            e.preventDefault();

            let logoutForm = document.querySelector('#logout-form');
            logoutForm.submit();
        });
    </script>


    @yield('custom_html')


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('themes/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('themes/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('themes/admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('themes/admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('themes/admin/js/demo/chart-area-demo.js') }}"></script>
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




    {{-- <script src="{{ asset('themes/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('themes/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('themes/admin/js/sb-admin-2.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('themes/admin/vendor/chart.js/Chart.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('themes/admin/js/demo/chart-area-demo.js') }}"></script> --}}
    {{-- <script src="{{ asset('themes/admin/js/demo/chart-pie-demo.js') }}"></script> --}}

    {{-- TODO: Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.all.min.js"></script>

    {{-- TODO: Font Awesome --}}
    <script src="https://kit.fontawesome.com/02db274a60.js" crossorigin="anonymous"></script>

    {{-- TODO: My Script --}}
    <script src="/script/main.js"></script>
    <script src="/script/sidebar.js"></script>

    @if (isset($script))
    @foreach ($script as $sc)
    <script src="/script/{{ $sc }}.js"></script>
    @endforeach
    @endif
</body>

</html>