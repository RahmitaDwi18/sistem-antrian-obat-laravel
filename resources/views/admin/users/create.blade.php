@extends('layouts.main')
@section('title', 'Akun Dokter')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <a href="/admin" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i>Kembali
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftarkan Akun Dokter</h6>
            </div>

            {{-- @foreach ($errors->all() as $item)
                <div>{{ $item }}</div>
            @endforeach --}}

            <form class="pl-5 pb-5" action="{{ route('users_doctor.store') }}" method="POST">
                @csrf
                <br>
                <div class="container-fluid">
                    <div class="mb-3" class="pl-5">
                        <label for="doctor_name" class="form-label">Nama Dokter</label>
                        <input required type="text" name="name" id="doctor_name" value="{{ old('name') }}"
                            class="form-control ">
                        {{-- @error('doctor_name') is-invalid @enderror"
                    value="{{ old('doctor_name') }}">
                    @error('doctor_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror --}}

                    </div>

                    <div class="mb-3" class="pl-5">
                        <label for="email" class="form-label">Email Dokter</label>
                        <input required type="text" name="email" id="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror">

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3" class="pl-5">
                        <label for="password" class="form-label">Password </label>
                        <input required type="password" name="password" id="password" class="form-control">

                        {{-- <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>

                        <script>
                            $("body").on('click', '.toggle-password', function() {
                                $(this).toggleClass("fa-eye fa-eye-slash");

                                var input = $("#pass_log_id").attr("type");

                                if (input.attr("type") === "password") {
                                    input.attr("type", "text");
                                } else {
                                    input.attr("type", "password");
                                }
                            });
                        </script> --}}

                        {{-- @error('password') is-invalid @enderror"
                    value="{{ old('password') }}">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror --}}
                    </div>

                    <div class="form-group">
                        <label for="nip">NIP :</label>
                        <input required type="number" name="nip" value="{{ old('nip') }}" id="nip"
                            class="form-control @error('nip') is-invalid @enderror">

                        @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                    <label for="doctor_name">Nama Dokter :</label>
                    <input required type="text" name="doctor_name" value="{{ old('doctor_name') }}" id="doctor_name"
                        class="form-control @error('doctor_name') is-invalid @enderror">

                    @error('doctor_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> --}}

                    <div class="form-group">
                        <label for="gender">Jenis Kelamin :</label>
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

                    <div class="form-group">
                        <label for="phone_number">Nomor Telp :</label>
                        <input required type="numeric" name="phone_number" value="{{ old('phone_number') }}"
                            id="phone_number" class="form-control @error('phone_number') is-invalid @enderror">

                        @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat :</label>
                        <input required type="text" name="address" value="{{ old('address') }}" id="address"
                            class="form-control @error('address') is-invalid @enderror">

                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary my-4 activation" disabled>Simpan</button>
                </div>
            </form>
            {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit"
                class="btn btn-primary">Cancle</button></a> --}}
        @endsection
