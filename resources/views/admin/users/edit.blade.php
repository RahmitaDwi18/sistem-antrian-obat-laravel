@extends('layouts.main')
@section('title', 'Edit Data Dokter')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Dokter</h1>

        <a href="{{ route('doctors.index') }}" class="d-none d-sm-inline-block btn btn-sm bg-default shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-default">Data Dokter</h6>
        </div>

        <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="nip">NIP :</label>
                    <input type="text" name="nip" value="{{ $doctor->nip }}" id="nip" class="form-control">
                </div>

                <div class="form-group">
                    <label for="doctor_name">Nama Dokter :</label>
                    <input type="text" name="doctor_name" value="{{ $doctor->doctor_name }}" id="doctor_name"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="gender">Jenis Kelamin :</label>
                    <select name="gender" id="gender" class="form-control" value=" {{ $doctor->gender }}">
                        <option>Perempuan</option>
                        <option>Laki-laki</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="phone_number">Nomor Telp :</label>
                    <input type="numeric" name="phone_number" value="{{ $doctor->phone_number }}" id="phone_number"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="address">Alamat :</label>
                    <input type="text" name="address" value="{{ $doctor->address }}" id="address" class="form-control">
                </div>

            </div>
            <div class="card-footer text-right">
                <input type="submit" value="Edit" class="btn bg-default activation" disabled>
            </div>
        </form>
    </div>
</div>
@endsection