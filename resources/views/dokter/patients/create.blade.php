@extends('layouts.main')

@section('title', 'Input Resep Antrian Obat Pasien')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrasi Konsultasi Puskesmas Nusa Indah</h1>

        <a href="{{ route('dokter.patients.index') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Antrian Pasien</h6>
        </div>
        <form action="{{ route('dokter.patients.store') }}" method="post">
            @csrf

            <div class="card-body">

                <fieldset disabled>

                    <div class="form-group">
                        <label for="age">Nomor BPJS :</label>
                        <input type="number" name="no_bpjs" value="{{ old('no_bpjs') }}" id="age"
                            class="form-control @error('no_bpjs') is-invalid @enderror" required="required">

                        @error('no_bpjs')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Pasien :</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="name"
                            class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="age">Umur Pasien :</label>
                        <input type="number" name="age" value="{{ old('age') }}" id="age"
                            class="form-control @error('age') is-invalid @enderror" required="required">

                        @error('age')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender">Jenis Kelamin :</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="P">Perempuan</option>
                            <option value="L">Laki-laki</option>
                        </select>
                    </div>

                    <fieldset disabled>
                        <div class="form-group">
                            <label for="poly_name">Ruang Poli :</label>                           
                            <select name="id_poly" id="poly_name" class="form-control">
                                @foreach ($polys as $poly)
                                <option value="{{ $poly->id_poly }}" @if ($polydoctor->id_poly == $poly->id_poly) {{
                                    'selected' }} @endif>
                                    {{ $poly->poly_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <label for="symptom">Alamat :</label>
                        <input type="text" name="address" value="{{ old('address') }}" id="address"
                            class="form-control @error('address') is-invalid @enderror">

                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="age">Kode Map :</label>
                        <input type="number" name="code_map" value="{{ old('code_map') }}" id="code_map"
                            class="form-control @error('code_map') is-invalid @enderror" required="required">

                        @error('code_map')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="symptom">Gejala Pasien :</label>
                        <input type="text" name="symptom" value="{{ old('symptom') }}" id="symptom"
                            class="form-control @error('symptom') is-invalid @enderror">

                        @error('symptom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </fieldset>

                <div class="form-group">
                    <label for="recipe">Resep Obat :</label>
                    <textarea name="recipe" id="recipe" class="form-control @error('recipe') is-invalid @enderror"><{{ old('recipe') }}/textarea> 

                        @error('recipe')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="card-footer text-right">
                    <input type="submit" value="Tambah" class="btn btn-primary activation" disabled>
                </div>
            </form>
        </div>

    </div>
@endsection