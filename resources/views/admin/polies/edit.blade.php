@extends('layouts.main')

@section('title', 'Edit Kategori Poli')

@section('content')
<div class="row col-md-10 mx-auto p-0 d-flex justify-content-end my-5">
    <div class="col-md-1 p-0 d-flex justify-content-end">
        <a href="{{ route('polys.index') }}" class="d-none d-sm-inline-block btn btn-sm bg-default shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i>Kembali
        </a>
    </div>
</div>

<div class="edit-dokter container-c row col-md-10">
    <h3>Edit Kategori Poli</h3>

    <div class="col-md-12 mt-5">
        <form action="{{ route('polys.update', $poly->id_poly) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Nama Poli :</label>
                <input type="text" name="poly_name" value="{{ $poly->poly_name }}" id="poly_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label" data-id-doctor="{{ $poly->id_doctor }}">Nama
                    Dokter</label>
                <select name="id_doctor" id="name" class="form-control" value="{{ $poly->doctor_name }}">
                    @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->doctor_name }}</option>
                    @endforeach
                </select>
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