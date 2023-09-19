@extends('layouts.main')
@section('title', 'Edit Data Dokter')

@section('content')

<div class="row col-md-10 mx-auto p-0 d-flex justify-content-end my-5">
    <div class="col-md-1 p-0 d-flex justify-content-end">
        <a href="{{ route('doctors.index') }}" class="d-none d-sm-inline-block btn btn-sm bg-default shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i>Kembali
        </a>
    </div>
</div>

<div class="edit-dokter container-c row col-md-10">
    <h3>Edit Dokter</h3>

    <div class="col-md-12 mt-5">
        <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <input type="hidden" name="user_id" value="{{ $doctor->user_id }}" id="user_id" class="form-group">
                <label for="nip">NIP :</label>
                <input type="text" name="nip" value="{{ $doctor->nip }}" id="nip" class="form-control">
            </div>

            <div class="form-group">
                <label for="doctor_name">Nama Dokter :</label>
                <input type="text" name="doctor_name" value="{{ $doctor->doctor_name }}" id="doctor_name"
                    class="form-control">
            </div>

            <div class="form-group" data-gender="{{ $doctor->gender }}">
                <label for="gender">Jenis Kelamin :</label>
                <select name="gender" id="gender" class="form-control" value="{{ $doctor->gender }}">
                    <option value="P">Perempuan</option>
                    <option value="L">Laki-laki</option>
                </select>
            </div>

            <div class="form-group">
                <label for="phone_number">Nomor Telp :</label>
                <input type="numeric" name="phone_number" value="{{ $doctor->phone_number }}" id="phone_number"
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="address">Alamat :</label>
                <textarea type="text" name="address" id="address" class="form-control">{{ $doctor->address }}</textarea>
            </div>

            <div class="col-md-12 d-flex justify-content-end px-0 py-3">
                <div class="col-md-5 d-flex justify-content-end px-0">
                    <button type="submit" class="btn bg-default activation" disabled>Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection