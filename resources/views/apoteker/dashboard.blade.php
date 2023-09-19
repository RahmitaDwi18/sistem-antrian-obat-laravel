@extends('layouts.main')

@section('title', 'Selamat Datang Admin')

@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        {{-- TODO: Apoteker -- --}}
        @if (auth()->user()->role == 'apoteker')
        <div class="d-flex">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-size: 12pt">
                                    Jumlah Antrian Hari Ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25pt">{{ $hariIni }}</div>
                            </div>
                            <div class="col-auto">
                                <br><br><i class="fas fa-clipboard-list fa-3x text-600" style="color:rgb(96, 169, 200)"></i>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1" style="font-size: 12pt">
                                    Antrian Tidak Terpanggil </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25pt">{{ $tidakTerpanggil }}</div>
                            </div>
                            <div class="col-auto">
                                <br><br><i class="fa-solid fa-ban fa-3x text-600" style="color: rgb(206, 76, 76)"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 12pt">Antrian Terpanggil Hari ini
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" style="font-size: 25pt">{{ $terpanggil }}</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 20%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <br><br><i class="fa-regular fa-square-check fa-3x text-600" style="color:rgb(76, 166, 76)"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->
            <div class="">

            </div>
        </div>

        <!-- Pie Chart -->
        <div class="">
            <div class="">

                <!-- Card Body -->
                <div class="card-body">

                </div>
            </div>
        </div>
    

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

        </div>
    </div>

    </div>

@endsection
