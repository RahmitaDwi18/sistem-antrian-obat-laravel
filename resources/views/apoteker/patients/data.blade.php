@extends('layouts.main')

@section('title', 'Daftar Antrian Obat Pasien')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h4 class="h3 mb-2 text-gray-800">Daftar Antrian Obat Pasien</h4>
        <p class="mb-4">Halaman ini menampilkan semua daftar antrian obat pasien Puskesmas Nusa Indah Kota Bengkulu</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <h6 class="m-0 font-weight-bold text-default">Daftar Pasien Berobat</h6>
                    </div>

                    <form action="{{ route('apoteker.search') }}" method="get">
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
                            <tr class="text-default" style="font-size: 17px">
                                <th>No</th>
                                {{-- @if (auth()->user()->role !== 'admin')
                                    <th>Nomor Antrian</th>
                                @endif --}}
                                <th>Nomor Antrian Obat</th>
                                <th>Nomor BPJS</th>
                                <th>Nama Pasien</th>
                                <th>Ruang Poli</th>
                                <th>Umur Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Kode Map</th>
                                <th>Alamat</th>
                                <th>Keluhan Pasien</th>
                                <th>Resep Obat</th>
                                <th>Tanggal Antrian</th>
                                @if (auth()->user()->role == 'apoteker')
                                    <th>Status</th>
                                @endif

                                @if (auth()->user()->role == 'apoteker')
                                    @isset($hideKelola)
                                        <th class="text-center">Aksi</th>
                                    @endisset
                                @endif

                                @if (auth()->user()->role == 'dokter')
                                    <th class="text-center">Aksi</th>
                                @endif
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

                                    <td class="text-center" style="font-size: 16pt; color:blue">{{ $pasien->no_antrian_obat }}</td>

                                    {{-- <td class="text-center">{{ $pasien->no_antrian_obat }}</td> --}}
                                    <td>{{ $pasien->no_bpjs }}</td>
                                    <td>{{ $pasien->name }}</td>
                                    <td>{{ $pasien->poly->poly_name }}</td>
                                    <td class="text-center">{{ $pasien->age }}</td>
                                    <td class="text-center">{{ $pasien->gender }}</td>
                                    <td>{{ $pasien->code_map }}</td>
                                    <td>{{ $pasien->address }}</td>
                                    <td>{{ $pasien->symptom }}</td>
                                    <td>{{ $pasien->recipe }}</td>
                                    <td>{{ date('l, d F Y H:i:s', strtotime($pasien->created_at)) }}</td>


                                    @if (auth()->user()->role == 'apoteker')
                                        @php
                                            if ($pasien->status == 'belum') {
                                                echo '<td class="text-info">Belum Diproses</td>';
                                            } elseif ($pasien->status == 'lewat') {
                                                echo '<td class="text-warning">Antrian Dilewati</td>';
                                            } elseif ($pasien->status == 'selesai') {
                                                echo '<td class="text-success">Selesai</td>';
                                            } elseif ($pasien->status == 'batal') {
                                                echo '<td class="text-danger">Batal</td>';
                                            }
                                        @endphp
                                    @endif

                                    @if (auth()->user()->role == 'apoteker')
                                        @isset($hideKelola)
                                            <td class="text-center">
                                                <a href="{{ route('apoteker.kelola.patients.show', $pasien->id) }}">
                                                    <button class="btn bg-default" title="Kelola Antrian">Kelola</button>
                                                </a>
                                            </td>
                                        @endisset
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="card-footer">
            {{ $patients->withQueryString()->links() }}
        </div> --}}
            <div class="card-footer">
                {{ $patients->links() }}
            </div>
        </div>
    </div>
@endsection

@section('custom_html')
    @foreach ($patients as $pasien)
        <form action="{{ route('dokter.patients.destroy', $pasien->id) }}" method="post">
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
                    title: 'apakah anda yakin hapus dosen?',
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
