@extends('layouts.main')

@section('title', 'Tambah Data Poli')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <a href="{{ route('doctors.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i>
            Kembali
        </a>
    </div>

    <div class="container-c row col-md-10">
        <div class="col-md-12 mt-5">
            <form action="{{ route('polys.store') }}" method="POST" class="formBook">
                @csrf

                <div class="container">
                    <div class="content">
                        <h2>Daftar Input Kategori Ruang Poli :</h2>
                        <h5>Silahkan Masukkan Data</h5>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Poli</label>
                        <input type="text" name="poly_name" id="exampleInputPassword1"
                            class="form-control @error('poly_name') is-invalid @enderror"
                            value="{{ old('poly_name') }}">
                        @error('poly_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Dokter</label>
                        <select name="id_doctor" id="name" class="form-control">
                            @foreach ($doctors as $doctor)
                            @if (!isDoctorInPoly($doctor->id))
                            <option value="{{ $doctor->id }}">{{ $doctor->doctor_name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 d-flex justify-content-end px-0 py-3">
                        <div class="col-md-5 d-flex justify-content-end px-0">
                            <button type="submit" name="submit" class="btn btn-primary activation" disabled>Tambah
                                Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection