@extends('layouts.main')

@section('title', 'Edit Antrian Resep Obat Pasien')

@section('content')

<div class="row col-md-10 mx-auto p-0 d-flex justify-content-end my-5">
    <div class="col-md-1 p-0 d-flex justify-content-end">
        <a href="{{ route('dokter.patients.index') }}" class="d-none d-sm-inline-block btn btn-sm bg-default shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i>Kembali
        </a>
    </div>
</div>

<div class="edit-dokter container-c row col-md-10">
    <h3>Input Resep Pasien</h3>

    <div class="col-md-12 mt-5">
        <form action="{{ route('dokter.patients.update', $patient->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <fieldset disabled>
                    <div class="form-group">
                        <label for="no_bpjs">Nomor BPJS :</label>
                        <input type="text" name="no_bpjs" value="{{ $patient->no_bpjs }}" id="no_bpjs"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Pasien :</label>
                        <input type="text" name="name" value="{{ $patient->name }}" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="age">Umur Pasien :</label>
                        <input type="number" name="age" value="{{ $patient->age }}" id="age" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="gender" data-gender="{{ $patient->gender }}">Jenis Kelamin :</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="P">Perempuan</option>
                            <option value="L">Laki-laki</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="poly_name">Ruang Poli :</label>
                        <select name="id_poly" id="poly_name" class="form-control"
                            data-id-poly="{{ $patient->id_poly }}">
                            @foreach ($polys as $poly)
                            <option value="{{ $poly->id_poly }}">{{ $poly->poly_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="code_map">Kode Map :</label>
                        <input type="text" name="code_map" value="{{ $patient->code_map }}" id="code_map"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat Pasien :</label>
                        <input type="text" name="address" value="{{ $patient->address }}" id="address"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="symptom">Gejala Pasien :</label>
                        <input type="text" name="symptom" value="{{ $patient->symptom }}" id="symptom"
                            class="form-control">
                    </div>

                </fieldset>

                <div class="form-group">
                    <label for="recipe">Resep Obat :</label>
                    <input type="text" name="recipe" value="{{ $patient->recipe }}" id="recipe" class="form-control">
                </div>

            </div>

            <div class="col-md-12 d-flex justify-content-end px-0 py-3">
                <div class="col-md-5 d-flex justify-content-end px-0">
                    <button type="submit" class="btn bg-default activation" disabled>Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection