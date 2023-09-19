@extends('layouts.main')
@section('content')

<style>
    h2 {
        color: #179b00;
        font-weight: bold;
        margin: 4rem 0;
        font-size: 3rem
    }
</style>

<div class="breadcrumbs" data-aos="fade-in">
    <div class="col-lg-10 mx-auto p-0">
        <h2>Password</h2>
    </div>

    <div class="col-lg-10 mx-auto p-0">
        <form action="{{ route('profil.updatePassword') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}"
                    readonly>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input type="text" name="password" id="password" class="form-control" value="">
            </div>

            <div class="mt-5 d-flex justify-content-end">
                <a href="{{ route('profil.updatePassword') }}">
                    <button type="submit" class="btn btn-danger activation" disabled>Ubah Password</button>
                </a>
            </div>
        </form>
    </div>
</div>

<script src="{{ url('themes/form/form.js') }}"></script>
@endsection