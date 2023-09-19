@extends('layouts.main')
@section('title', 'Input Data Dokter')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Dokter</h1>

        <a href="{{ route('doctors.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i>
            Kembali
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Dokter</h6>
        </div>
        <form action="{{ route('doctors.store') }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <div class="card-body"></div>

            <div class="card-footer text-right">
                <input type="submit" value="Tambah" class="btn btn-primary" disabled>
            </div>
        </form>
    </div>
</div>
@endsection