@extends('layouts.main')

@section('content')
<form>
    <a href="{{ route('dashboard.admin') }}"> <button class="btn bg-default mr-20"> Kembali ke Dashboard </button></a>
    <fieldset disabled>
        <legend>Akun Dokter </legend>

        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Nama Dokter :</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input"
                value="{{ $user->name }}">
        </div>

        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Email Dokter :</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input"
                value="{{ $user->email }}">
        </div>

        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Nama Dokter :</label>
            <input type="password" id="disabledTextInput" class="form-control" placeholder="Disabled input"
                value="{{ $user->password }}">
        </div>
    </fieldset>
</form>

<form action="{{ route('user_doctor.destroy', $user->id) }}" method="post">

    @csrf
    @method('DELETE')

    <input type="submit" value="Hapus">
</form>

@endsection