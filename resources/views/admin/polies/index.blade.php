@extends('layouts.main')

@section('title', 'Kategori Ruang Poli')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-between mb-5">
        <div class="col-8">
            <h1 class="h3 mb-2 text-gray-800">Daftar Kategori Ruang Poli</h1>
            <p class="mb-4">Halaman ini menampilkan semua daftar kategori ruang poli yang telah berhasil disimpan dalam
                database</p>
        </div>

        <div class="col px-0 py-3 d-flex justify-content-end">
            <a href="/polys/create">
                <button type="button" class="btn bg-default" title="Tambah Data">
                    <i class="fa-regular fas fa-user-plus"></i>
                    Tambah Data Poli
                </button>
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-default">Daftar Ruang Poli</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Nama Ruang Poli</th>
                            <th>Nama Dokter</th>
                            <th class="text-center aksi">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($polys as $poli)
                        <tr>
                            <td>{{ ($polys->currentpage() - 1) * $polys->perpage() + $loop->index + 1 }}</td>
                            <td>{{ $poli->id_poly }}</td>
                            <td>{{ $poli->poly_name }}</td>
                            <td>{{ $poli->doctor->doctor_name }}</td>
                            <td class="d-flex aksi">
                                <a href="{{ route('polys.show', $poli->id_poly) }}">
                                    <button class="btn btn-warning mr-3" title="Lihat Data">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </a>
                                <a href="{{ route('polys.edit', $poli->id_poly) }}">
                                    <button class="btn btn-primary mr-3" title="Edit Data">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-danger remove-btn" data-id="{{ $poli->id_poly }}"
                                    title="Hapus Data">
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
            {{ $polys->links() }}
        </div>
    </div>
</div>
@endsection

@section('custom_html')
@foreach ($polys as $poli)
<form action="{{ route('polys.destroy', $poli->id_poly) }}" id="delete-form-{{ $poli->id_poly }}" method="post">
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
                    title: 'apakah anda yakin hapus ruang poli?',
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