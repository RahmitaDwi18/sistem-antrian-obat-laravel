@extends('layouts.main')
@section('title', 'Profil')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profil {{ auth()->user()->name }} </h6>
        </div>

        <form class="pl-5">
            @csrf
            <div class="container-fluid">
                <fieldset disabled>
                    <br>
                    {{-- {{ auth()->user()->name }} --}}

                    <div class="mb-3" class="pl-5">
                        <label for="name" class="form-label">Nama </label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ auth()->user()->name }}">
                    </div>

                    <div class="mb-3" class="pl-5">
                        <label for="email" class="form-label">Email </label>
                        <input type="text" name="email" id="email" class="form-control"
                            value="{{ auth()->user()->email }}">
                    </div>

                    <div class="mb-3" class="pl-5">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" name="role" id="role" class="form-control"
                            value="{{ auth()->user()->role }}">
                    </div>

                    {{-- <div class="mb-3" class="pl-5">
                        <label for="password" class="form-label">Password </label>
                        <input type="text" name="password" id="password" class="form-control" value="">
                    </div> --}}


                </fieldset><br>
                <div class="mb-3" class="pl-5">
                    <button class="btn btn-primary mr-3 activation" disabled type="submit" title="Ubah Password">
                        <style>
                            .edit-password {
                                color: white;
                            }

                            .edit-password:hover {
                                color: #fff;
                                text-decoration: none;
                            }
                        </style>
                        <a href=" {{ route('profil.editPassword') }}" class="edit-password">
                            <i class="fa-solid fa-eye"></i>
                            Ubah Password
                        </a>
                    </button>
                </div>
            </div>
        </form>
        <br>
        {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit"
                class="btn btn-primary">Cancle</button></a> --}}
        @endsection