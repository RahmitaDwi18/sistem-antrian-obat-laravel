@extends('layouts.main')

@section('title', 'Daftar Dokter')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Data Dokter</h1>
    <p class="mb-4">Halaman ini menampilkan semua daftar data dokter yang telah berhasil disimpan dalam
        database</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-default">Daftar Data Dokter</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Dokter</th>
                            <th>NIP</th>
                            <th>Nama Dokter</th>
                            <th>Jenis Kelamin</th>
                            <th>Nomor Telp</th>
                            <th>Alamat</th>
                            <th></th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($doctors as $dokter)
                        <tr>
                            <td>{{ $dokter->id }}</td>
                            <td>{{ $dokter->NIP }}</td>
                            <td>{{ $dokter->doctor_name }}</td>
                            <td>{{ $dokter->poly->gender }}</td>
                            <td>{{ $dokter->phone_number }}</td>
                            <td>{{ $dokter->address }}</td>
                            <td>
                                <a href="{{ route('doctors.show', $dokter->id) }}"> <button
                                        class="btn btn-warning mr-3" title="Lihat Data">Lihat</button> </a>
                            </td>
                            <td>
                                <a href="{{ route('doctors.edit', $dokter->id) }}"> <button
                                        class="btn btn-success mr-3" title="Edit Data">Edit
                                    </button> </a>
                            </td>
                            <td>
                                <form action="{{ route('doctors.destroy', $dokter->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="">
                                        <button type="submit" value="hapus" class="btn btn-danger" title="Hapus Data">Hapus</button>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<a href="{{ route('doctors.create') }}"> <button class="btn btn-primary" title="Tambah Data"> Tambah Data</button></a>

@endsection