@extends('layouts.main')

@section('content')
    <div class="row col-md-10 mx-auto p-0 d-flex justify-content-end my-5">
        <div class="col-md-1 p-0 d-flex justify-content-end">
            <a href="{{ route('cs.patients.index') }}" class="d-none d-sm-inline-block btn btn-sm bg-default shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i>Kembali
            </a>
        </div>
    </div>

    <div class="detail-patients container-c row col-md-10">
        <h3>Detail patient</h3>

        <div class="row">
            <div class="col-md-6 p-3">
                <span>ID patient</span>
                <span>{{ $patient->id }}</span>
            </div>
            <div class="col-md-6 p-3">
                <span>Nomor BPJS</span>
                <span>{{ $patient->no_bpjs }}</span>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 p-3">
                <span>Nama patient</span>
                <span>{{ $patient->name }}</span>
            </div>
            <div class="col-md-6 p-3">
                <span>Ruang Poli</span>
                <span>{{ $patient->poly->poly_name }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 p-3">
                <span>Umur patient</span>
                <span>{{ $patient->age }}</span>
            </div>
            <div class="col-md-6 p-3">
                <span>Jenis Kelamin</span>
                <span>{{ $patient->gender }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 p-3">
                <span>Kode Map</span>
                <span>{{ $patient->code_map }}</span>
            </div>
            <div class="col-md-6 p-3">
                <span>Alamat</span>
                <span>{{ $patient->address }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 p-3">
                <span>Keluhan patient</span>
                <span>{{ $patient->symptom }}</span>
            </div>
            <div class="col-md-6 p-3">
                <span>Tanggal Pendaftaran</span>
                <span>{{ $patient->created_at }}</span>
            </div>
        </div>

        <div class="tombol-aksi my-3 d-flex justify-content-end">
            <form action="{{ route('cs.patients.destroy', $patient->id) }}"
                id="delete-form-{{ $patient->id }}"
                method="post">
                @csrf
                @method('DELETE')

                <button type="button" class="btn btn-danger btn-delete" 
                data-id="{{ $patient->id }}" title="Hapus Data">
                    <i class="fa-solid fa-trash"></i> Hapus</button>
                {{-- <button type="submit" hidden value="hapus"></button> --}}
            </form>

            <a href="{{ route('cs.patients.edit', $patient->id) }}">
                <button class="btn btn-warning"> <i class="fa-solid fa-pen-to-square"></i>
                    Ubah</button>
            </a>
        </div>
    </div>
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
                    title: 'apakah anda yakin ingin menghapus data patient ?',
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
