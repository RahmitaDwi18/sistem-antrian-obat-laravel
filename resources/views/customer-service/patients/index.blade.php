@extends('layouts.main')

@section('title', 'Daftar Antrian Obat Pasien')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h4 class="h3 mb-2 text-gray-800">Daftar Antrian Obat Pasien</h4>
        <p class="mb-4">Halaman ini menampilkan semua Pendaftaran Pasien Berobat Di Puskesmas Nusa Indah Kota Bengkulu</p>


        <div class="col-md-12 px-0 py-3 d-flex justify-content-end">
            <a href="{{ route('cs.patients.create') }}">
                <button type="button" class="btn bg-default" title="Tambah Data">
                    <i class="fa-regular fas fa-user-plus"></i> Tambah Pendaftaran Pasien
                </button>
            </a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <h6 class="m-0 font-weight-bold text-default">Daftar Pasien Berobat</h6>
                    </div>

                    <form action="{{ route('cs.search') }}" method="get">
                        <div class="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="{{ request()->get('q') }}"
                                    placeholder="Masukkan kata">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-info shadow-sm" type="submit"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-4">
                        <div class="row justify-content-end">
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="date" class="form-control" name="masuk" id="masuk"
                                        aria-describedby="basic-addon2"
                                        @if (!empty($_GET['masuk'])) value ={{ $_GET['masuk'] }} 
                                    
                                @else @endif>
                                    <button class="input-group-text text-dark" id="basic-addon2"
                                        type="submit">Cari</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-center">Nomor Pendaftaran</th>
                                <th>Nomor BPJS</th>
                                <th>Nama Pasien</th>
                                <th>Ruang Poli</th>
                                {{-- <th>Umur Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Kode Map</th>
                                <th>Alamat</th> --}}
                                <th>Keluhan Pasien</th>
                                <th>Tanggal Antrian</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            {{-- {{ dd($patients) }} --}}
                            @foreach ($patients as $index => $pasien)
                                <tr>

                                    <th scope="row">{{ $index + $patients->firstItem() }}</th>
                                    {{-- <td>{{ ($patients->currentpage() - 1) * $patients->perpage() + $loop->index + 1 }}</td> --}}
                                    <td class="text-center" style="font-size: 16pt; color:blue">{{ $pasien->no_queue }}</td>
                                    <td>{{ $pasien->no_bpjs }}</td>
                                    <td>{{ $pasien->name }}</td>
                                    <td>{{ $pasien->poly->poly_name }}</td>
                                    {{-- <td>{{ $pasien->age }}</td>
                                    <td>{{ $pasien->gender }}</td>
                                    <td>{{ $pasien->code_map }}</td>
                                    <td>{{ $pasien->address }}</td> --}}
                                    <td>{{ $pasien->symptom }}</td>
                                    <td>{{ date('l, d F Y H:i:s', strtotime($pasien->created_at)) }}</td>

                                    <td class="d-flex justify-content-between">

                                        <a href="{{ route('cs.patients.show', $pasien->id) }}">
                                            <button class="btn btn-warning mr-3" title="Lihat Data">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('cs.patients.edit', $pasien->id) }}">
                                            <button class="btn btn-primary mr-3" title="Edit Data">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-delete"
                                            data-id="{{ $pasien->id }}" title="Hapus Data">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $patients->links() }}
            </div>
        </div>
    </div>
@endsection

@section('custom_html')
    @foreach ($patients as $pasien)
        <form action="{{ route('cs.patients.destroy', $pasien->id) }}" id="delete-form-{{ $pasien->id }}"
            method="post">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
@endsection

@push('custom_js')
    <script>
        let removeBtns = document.querySelectorAll('.btn-delete');
        removeBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                let id = btn.getAttribute('data-id');
                let deleteForm = document.querySelector('#delete-form-' + id);

                Swal.fire({
                    title: 'apakah anda yakin hapus data pendaftaran pasien?',
                    text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit();
                    }
                })
            })
        })
    </script>
@endpush
