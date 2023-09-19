@extends('layouts.main')

@section('content')
    <div class="row col-md-10 mx-auto p-0 d-flex justify-content-end my-5">
        <div class="col-md-1 p-0 d-flex justify-content-end">
            <a href="{{ route('dokter.patients.index') }}" class="d-none d-sm-inline-block btn btn-sm bg-default shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i>Kembali
            </a>
        </div>
    </div>

    <div class="detail-patients container-c row col-md-10">
        <h3>Detail Pasien</h3>

        <div class="row">
            <div class="col-md-6 p-3">
                <span>ID Pasien</span>
                <span>{{ $patient->id }}</span>
            </div>
            <div class="col-md-6 p-3">
                <span>No. Pendaftaran</span>
                <span class="text-default" style="font-size: 28px">{{ $patient->no_queue }}</span>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 p-3">
                <span>Nama Pasien</span>
                <span>{{ $patient->name }}</span>
            </div>
            <div class="col-md-6 p-3">
                <span>Nomor BPJS</span>
                <span>{{ $patient->no_bpjs }}</span>
            </div>


        </div>

        <div class="row">
            <div class="col-md-6 p-3">
                <span>Umur Pasien</span>
                <span>{{ $patient->age }}</span>
            </div>
            <div class="col-md-6 p-3">
                <span>Ruang Poli</span>
                <span>{{ $patient->poly->poly_name }}</span>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 p-3">
                <span>Kode Map</span>
                <span>{{ $patient->code_map }}</span>
            </div>
            <div class="col-md-6 p-3">
                <span>Jenis Kelamin</span>
                <span>{{ $patient->gender }}</span>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 p-3">
                <span>Keluhan Pasien</span>
                <span>{{ $patient->symptom }}</span>
            </div>
            <div class="col-md-6 p-3">
                <span>Alamat</span>
                <span>{{ $patient->address }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 p-3">
                <span>Tanggal Pendaftaran</span>
                <span class="text-default">{{ $patient->created_at }}</span>
            </div>
            <div class="col-md-6 p-3">
                <span></span>
                <span> <span class="text-default"></span></span>
            </div>
        </div>
    </div>
@endsection
