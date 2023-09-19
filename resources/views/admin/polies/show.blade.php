@extends('layouts.main')

@section('title', 'Detail Poli')

@section('content')
<div class="row col-md-10 mx-auto p-0 d-flex justify-content-end my-5">
    <div class="col-md-1 p-0 d-flex justify-content-end">
        <a href="{{ route('polys.index') }}" class="d-none d-sm-inline-block btn btn-sm bg-default shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i>Kembali
        </a>
    </div>
</div>

<div class="detail-poli container-c row col-md-10">
    <h3>Detail Poli</h3>

    <div class="row">
        <div class="col-md-6 p-3">
            <span>ID Poli</span>
            <span>{{ $poly->id_poly }}</span>
        </div>
        <div class="col-md-6 p-3">
            <span>Nama Poli</span>
            <span>{{ $poly->poly_name }}</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 p-3">
            <span>Nama Dokter</span>
            <span>{{ $poly->doctor->doctor_name }}</span>
        </div>
        <div class="col-md-6 p-3">
            <span>Nama Dokter</span>
            <span>{{ $poly->doctor->doctor_name }}</span>
        </div>
    </div>

    <div class="tombol-aksi my-3 d-flex justify-content-end">
        <form action="{{ route('polys.destroy', $poly->id_poly) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="button" class="btn btn-danger hapus">Hapus</button>
            <button type="submit" hidden value="hapus"></button>
        </form>

        <a href="/polys/{{ $poly->id_poly }}/edit">
            <button class="btn btn-warning">Ubah</button>
        </a>
    </div>
</div>

@endsection