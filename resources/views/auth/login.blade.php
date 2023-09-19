@extends('layouts.template')

@section('content')
    {{-- <div class="row col-md-1 mt-3 back">
    <a href="">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
    </a>
</div> --}}

    <div class="row col-md-12 vw-100 vh-100 login">
        <div class="row col-md-4 h-75 mx-auto my-auto rounded-5">
            <div class="row logo mx-auto">
                <img class="mx-auto mt-4" src="/images/logo.png" alt="puskesmas-nusa-indah-logo">
            </div>

            <div class="row text-center title">
                <h3>PUSKESMAS NUSA INDAH</h3>
                <span>Sistem Informasi Antrian Obat</span>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-2 text-danger" :errors="$errors" />

            <form action="{{ route('login') }}" method="POST" class="text-center row h-50">
                @csrf

                <label>LOGIN</label>

                <div class="mx-auto">
                    <label for="email" :value="__('Email')">
                        <i class="fa-regular fa-user"></i>
                    </label>
                    <input type="text" id="email" placeholder="email" name="email" :value="old('email')" required
                        autofocus>
                </div>

                <div class="">
                    <label for="password">
                        <i class="fa-solid fa-lock"></i>
                    </label>
                    <input type="password" id="password" placeholder="Password" type="password" name="password" required
                        autocomplete="current-password">
                </div>
                        
                {{-- <div style="text-align: center;  padding-top: 7px"> --}}
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 mb-1" href="{{ route('password.request') }}">
                            {{ __('Lupa kata sandi ?') }}
                        </a>
                    @endif
                {{-- </div> --}}
                

                <div>
                    <button type="submit" class="btn text-light">Masuk</button>
                </div>
            </form>
        </div>
    </div>
@endsection
