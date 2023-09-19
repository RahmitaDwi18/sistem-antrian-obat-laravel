@extends('layouts.main')

@section('title', 'Selamat Datang Admin')

@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            {{-- <a href="/{{ auth()->user()->role }}/{{ (auth()->user()->role === 'admin') ? 'laporan' : 'history' }}"
            class="tombol-cetak-laporan d-none d-sm-inline-block btn btn-sm shadow-sm">
            <i class="fas fa-download fa-sm"></i>
            Cetak Laporan
        </a> --}}
        </div>

        {{-- TODO: Admin -- --}}
        <div class="row">
            @if (auth()->user()->role == 'admin')
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 12pt">
                                        Ruang Poli</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25pt">{{ $poly }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-3x text-gray-600"></i>
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
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 12pt">
                                        Data Dokter</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25pt">{{ $doctor }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-3x text-gray-600"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-size: 12pt">Pasien
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" style="font-size: 25pt">{{ $patient }}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 20%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-3x text-gray-600"></i>
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
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

            </div>
        </div>

    </div>

@endsection
