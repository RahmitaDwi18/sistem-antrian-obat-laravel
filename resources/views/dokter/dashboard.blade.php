@extends('layouts.main')

@section('title', 'Selamat Datang Admin')

@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <div class="row">
            {{-- TODO: Dokter --}}
            @if (auth()->user()->role == 'dokter')
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-3">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 12pt">
                                        Pasien Hari Ini</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25pt">{{ $pendaftar }}</div>
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
