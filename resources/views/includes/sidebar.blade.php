<ul class="navbar-nav sidebar sidebar-dark accordion p-3" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-start p-0" href="index.html">
        <div class="sidebar-brand-icon mr-2" style="height: 50px">
            <img class="h-100" src="/images/logo.png" alt="icon">
        </div>
        <div class="sidebar-brand-text mx-1 p-0" style="font-size: 15px">ANTRIAN OBAT</div>
    </a>

    <hr class="sidebar-divider my-0">

    @if (auth()->user()->role == 'cs')
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('cs.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    @endif

    @if (auth()->user()->role == 'admin')
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    @endif

    @if (auth()->user()->role == 'dokter')
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dokter.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    @endif

    @if (auth()->user()->role == 'apoteker')
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('apoteker.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    @endif

    <hr class="sidebar-divider">

    <div class="sidebar-heading">MENU</div>

    {{-- TODO: Admin --}}
    @if (auth()->user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('doctors.index') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Kelola Data Dokter</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('polys.index') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Kelola Ruang Poli</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.patients.index') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Laporan Antrian</span>
            </a>
        </li>

        {{-- <li class="nav-item">
        <a class="nav-link" href="/admin/laporan">
            <i class="fas fa-fw fa-book"></i>
            <span>Laporan</span>
        </a>
    </li> --}}
    @endif


    {{-- TODO: Apoteker --}}
    @if (auth()->user()->role == 'apoteker')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('apoteker.patients.index') }}">
                <i class="fa-solid fa-list"></i>
                <span>Daftar Antrian Obat</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('apoteker.patients.history') }}">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>History Obat Keluar</span>
            </a>
        </li>

        {{-- ! TRASH 3 LOCATION --}}
    @endif

    {{-- TODO: Dokter --}}
    @if (auth()->user()->role == 'dokter')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dokter.patients.index') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Kelola Resep Pasien</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dokter.patients.data') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Daftar Pasien</span></a>
        </li>
    @endif




    {{-- TODO: Customer Service --}}
    @if (auth()->user()->role == 'cs')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cs.patients.index') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Pendaftaran Pasien</span>
            </a>
            {{-- <a class="nav-link" href="{{ route('cs.patients.index') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Laporan Pasien</span>
            </a> --}}
        </li>
    @endif
</ul>
