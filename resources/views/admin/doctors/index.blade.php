@extends('layouts.main')

@section('title', 'Daftar Dokter')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-between mb-5">
            <div class="col-8">
                <h1 class="h3 mb-2 text-gray-800">Daftar Data Dokter</h1>
                <p class="mb-4">Halaman ini menampilkan semua daftar data dokter yang telah berhasil disimpan dalam
                    database
                </p>
            </div>
            <div class="col px-0 py-3 d-flex justify-content-end">
                <a href="{{ route('users_doctor.create') }}">
                    <button type="button" class="btn bg-default" title="Tambah Data">
                        <i class="fa-regular fas fa-user-plus"></i> Tambah Data Dokter</button>
                </a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-default">Daftar Data Dokter</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Dokter</th>
                                <th>Jenis Kelamin</th>
                                <th>Nomor Telp</th>
                                <th>Alamat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($doctors as $dokter)
                                <tr>
                                    <td>{{ ($doctors->currentpage() - 1) * $doctors->perpage() + $loop->index + 1 }}</td>
                                    <td>{{ $dokter->nip }}</td>
                                    <td>{{ $dokter->doctor_name }}</td>
                                    <td class="text-center">{{ $dokter->gender }}</td>
                                    <td>{{ $dokter->phone_number }}</td>
                                    <td>{{ $dokter->address }}</td>
                                    <td class="d-flex align-center justify-content-center align-items-center">
                                        <a href="{{ route('doctors.show', $dokter->id) }}">
                                            <button class="btn btn-warning mr-3" title="Lihat Data">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('doctors.edit', $dokter->id) }}">
                                            <button class="btn btn-primary mr-3" title="Edit Data">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </a>

                                        <button type="button" class="btn btn-danger remove-btn"
                                            data-id="{{ $dokter->id }}" title="Hapus Data">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <button type="submit" hidden value="hapus"></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $doctors->links() }}
            </div>
        </div>
    </div>
@endsection

@section('custom_html')
    @foreach ($doctors as $dokter)
        <form action="{{ route('doctors.destroy', $dokter->id) }}" id="delete-form-{{ $dokter->id }}" method="post">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
@endsection

@push('custom_js')
    <script>
        let removeBtns = document.querySelectorAll('.remove-btn');
        removeBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                let id = btn.getAttribute('data-id');
                let deleteForm = document.querySelector('#delete-form-' + id);

                Swal.fire({
                    title: 'apakah anda yakin hapus dokter?',
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
