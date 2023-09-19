@extends('layouts.main')

@section('content')
<div class="row col-md-10 mx-auto p-0 d-flex justify-content-end my-5">
    <div class="col-md-1 p-0 d-flex justify-content-end">
        <a href="{{ route('doctors.index') }}" class="d-none d-sm-inline-block btn btn-sm bg-default shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i>Kembali
        </a>
    </div>
</div>

<div class="detail-dokter container-c row col-md-10">
    <h3>Detail Dokter</h3>

    <div class="row">
        <div class="col-md-6 p-3">
            <span>Nama</span>
            <span>{{ $doctor->doctor_name }}</span>
        </div>
        <div class="col-md-6 p-3">
            <span>NIP</span>
            <span>{{ $doctor->nip }}</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 p-3">
            <span>Jenis Kelamin</span>
            <span>{{ $doctor->gender }}</span>
        </div>
        <div class="col-md-6 p-3">
            <span>Nomor Telepon</span>
            <span>{{ $doctor->phone_number }}</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 p-3">
            <span>Email</span>
            <span>{{ $doctor->user->email }}</span>
        </div>
        <div class="col-md-6 p-3">
            <span>Alamat</span>
            <span>{{ $doctor->address }}</span>
        </div>
    </div>

    <div class="tombol-aksi my-3 d-flex justify-content-end">
        <form action="{{ route('doctors.destroy', $doctor->id) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="button" class="btn btn-danger hapus">Hapus</button>
            <button type="submit" hidden value="hapus"></button>
        </form>

        <a href="/doctors/{{ $doctor->id }}/edit">
            <button class="btn btn-warning">Ubah</button>
        </a>
    </div>
</div>

@endsection