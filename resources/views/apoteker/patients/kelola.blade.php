@extends('layouts.main')

@section('title', 'Kelola Antrian')

@section('content')

    <div class="top mb-5 d-flex align-items-center justify-content-between mt-5 col-md-10 mx-auto">
        <div class="col-md-6">
            <h1>Kelola Antrian</h1>
            <h3>Halaman Ini Menampilkan .......</h3>
        </div>

        <div class="col-md-2 p-0 d-flex justify-content-end">
            <a href="{{ route('apoteker.patients.index') }}" class="d-none d-sm-inline-block btn btn-sm bg-default shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="antrian container-c col-md-10 mx-auto">
        <h3>Detail Antrian Obat Pasien</h3>

        <div class="info-patients">
            @foreach ($patient as $pasien)
                <div>
                    <span>Id Pasien</span>
                    <span>: {{ $pasien->id }}</span>
                </div>
                <div>
                    <span>Nama</span>
                    <span>: {{ $pasien->name }}</span>
                </div>

                <div>
                    <span>Umur</span>
                    <span>: {{ $pasien->age }}</span>
                </div>

                <div>
                    <span>Jenis Kelamin</span>
                    <span>: {{ $pasien->gender }}</span>
                </div>

                <div>
                    <span>Alamat</span>
                    <span>: Jalan Anggrek</span>
                </div>

                <div>
                    <span>No. Antrian</span>
                    <span>: <span class="text-default">{{ $pasien->no_antrian_obat }}</span></span>
                </div>

                <div>
                    <span>Ruang Poli</span>
                    <span>: {{ $pasien->poly->poly_name }}</span>
                </div>

                <div>
                    <span>Gejala Pasien</span>
                    <span>: {{ $pasien->symptom }}</span>
                </div>

                <div>
                    <span>Resep Obat</span>
                    <span>: {{ $pasien->recipe }}</span>
                </div>
        </div>

        <div class="aksi d-flex">
            <form action="">
                {{-- <button class="btn bg-default">Selesai</button> --}}
                <a href="#"> <button class="btn btn-info mx-2 btn-call" data-id="{{ $pasien->no_antrian_obat }}">
                        <i class="fa-solid fas fa-volume-up"></i> Panggil
                    </button> </a>
            </form>

            <form action="{{ route('ganti.status', $pasien->id) }} "method="POST">
                @csrf
                @method('post')
                <input name="status" type="text" value="lewat" hidden>
                <button class="btn btn-warning mx-2"><i class="fa-solid fas fa-forward"></i> Lewati Antrian
                </button>
            </form>

            <form action="{{ route('ganti.status', $pasien->id) }} "method="POST">
                @csrf
                @method('post')
                <input name="status" type="text" value="selesai" hidden>
                <button class="btn btn-success mx-2">
                    <i class="fa-solid fas fa-clipboard-check"></i> Selesai</button>
            </form>

            <button class="btn btn-danger btn-cancel" title="Batalkan Antrian">
                <i class="fa-solid fas fa-xmark"></i> Batalkan Antrian</button>

            <form action="{{ route('ganti.status', $pasien->id) }}" id="cancel-form" method="POST">
                @csrf
                @method('post')
                <input name="status" type="hidden" value="batal">
            </form>
        </div>
    </div>
    @endforeach
@endsection

{{-- @section('custom_html')
    @foreach ($patient as $pasien)
        <form action="{{ route('patients.destroy', $pasien->id) }}" method="post">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
@endsection --}}

@push('custom_js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const button = document.querySelector(".btn-call");

        button.addEventListener("click", (e) => {
            e.preventDefault();

            let id = button.getAttribute('data-id');

            const audio = new Audio(`/suara/${id}.mp3`);
            audio.play();
        });
    </script>

    <script>
        let removeBtns = document.querySelectorAll('.remove-btn');
        removeBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                let id = btn.getAttribute('data-id');
                let deleteForm = document.querySelector('#delete-form-' + id);

                Swal.fire({
                    title: 'Apakah Anda Yakin Ingin Membatalkan Nomor Antrian ?',
                    text: "Nomor antrian yang Dibatalkan Akan menjadi Nomor Antrian Keluar di History",
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
        });

        let btnCancel = document.querySelector('.btn-cancel');
        btnCancel.addEventListener('click', (e) => {
            e.preventDefault();
            Swal.fire({
                title: 'Apa Anda Yakin Untuk Membatalkan Antrian ?',
                text: "Anda tidak dapat mengembalikan antrian yang telah dibatalkan !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes !'
            }).then((result) => {
                if (result.isConfirmed) {
                    let cancelForm = document.querySelector('#cancel-form');
                    cancelForm.submit();
                }
            })
        })
    </script>
@endpush
