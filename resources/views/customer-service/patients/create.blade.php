@extends('layouts.main')

@section('title', 'Input Resep Antrian Obat Pasien')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Registrasi Konsultasi Puskesmas Nusa Indah</h1>

            <a href="{{ route('cs.patients.index') }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color: green; color:white"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold" style="color: green">Data Antrian Pasien</h6>
            </div>
            <form action="{{ route('cs.patients.store') }}" method="post">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label for="no_bpjs" style="color: black; font-weight:bold">Nomor BPJS :</label>
                        <input type="number" name="no_bpjs" value="{{ old('no_bpjs') }}" id="age"
                            class="form-control @error('no_bpjs') is-invalid @enderror" required="required">

                        @error('no_bpjs')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name" style="color: black; font-weight:bold">Nama Pasien :</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="name"
                            class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="age" style="color: black; font-weight:bold">Umur Pasien :</label>
                        <input type="number" name="age" value="{{ old('age') }}" id="age"
                            class="form-control @error('age') is-invalid @enderror" required="required">

                        @error('age')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender" style="color: black; font-weight:bold">Jenis Kelamin :</label>
                        <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                            <option selected disabled style="background-color:rgb(182, 174, 174); color:white">
                                Pilih Jenis Kelamin</option>
                            <option value="P">Perempuan</option>
                            <option value="L">Laki-laki</option>
                        </select>

                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <fieldset>
                        <div class="form-group">
                            <label for="poly_name" style="color: black; font-weight:bold">Ruang Poli :</label>
                            <select name="id_poly" id="id_poly" class="form-control @error('id_poly') is-invalid @enderror">
                                <option selected disabled style="background-color:rgb(182, 174, 174); color:white">Pilih
                                    Ruang Poli</option>
                                @foreach ($polys as $poly)
                                    <option value="{{ $poly->id_poly }}">
                                        {{ $poly->poly_name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('id_poly')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <label for="address" style="color: black; font-weight:bold">Alamat :</label>
                        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>

                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="code_map" style="color: black; font-weight:bold">Kode Map :</label>
                        <input type="text" name="code_map" value="{{ old('code_map') }}" id="code_map"
                            class="form-control @error('code_map') is-invalid @enderror" required="required">

                        @error('code_map')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="symptom" style="color: black; font-weight:bold">Gejala Pasien :</label>
                        <textarea name="symptom" id="symptom" class="form-control @error('symptom') is-invalid @enderror">{{ old('symptom') }}</textarea>

                        @error('symptom')
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
