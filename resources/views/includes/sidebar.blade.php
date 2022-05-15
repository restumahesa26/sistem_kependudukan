<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ url('logo-kota.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">Klr. Panorama</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(Route::is('dashboard')) active @endif">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-check-circle"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Main Menu
    </div>
    <li class="nav-item @if(Route::is('data-penduduk.*') || Route::is('penduduk-meninggal.*')) active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Data Penduduk</span>
        </a>
        <div id="collapseBootstrap" class="collapse @if(Route::is('data-penduduk.*') || Route::is('penduduk-meninggal.*')) show @endif" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Penduduk</h6>
                <a class="collapse-item {{ (request()->is('data-penduduk/semua-penduduk') || Route::is('data-penduduk.create') || Route::is('data-penduduk.create-anggota') || Route::is('data-penduduk.store') || Route::is('data-penduduk.store-anggota') || Route::is('data-penduduk.update') || Route::is('data-penduduk.update-anggota') || Route::is('data-penduduk.destroy') || Route::is('data-penduduk.destroy-anggota')) ? 'active' : '' }}" href="{{ route('data-penduduk.index', 'semua-penduduk') }}">Semua Penduduk</a>
                <a class="collapse-item {{ (request()->is('data-penduduk/penduduk-miskin')) ? 'active' : '' }}" href="{{ route('data-penduduk.index', 'penduduk-miskin') }}">Penduduk Miskin</a>
                <a class="collapse-item {{ (request()->is('data-penduduk/penduduk-pindah')) ? 'active' : '' }}" href="{{ route('data-penduduk.index', 'penduduk-pindah') }}">Penduduk Pindah</a>
                <a class="collapse-item {{ (request()->is('data-penduduk/penduduk-pendatang')) ? 'active' : '' }}" href="{{ route('data-penduduk.index', 'penduduk-pendatang') }}">Penduduk Pendatang</a>
                <a class="collapse-item @if(Route::is('penduduk-meninggal.*')) active @endif" href="{{ route('penduduk-meninggal.index') }}">Penduduk Meninggal</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if(Route::is('data-pegawai.*')) active @endif">
        <a class="nav-link" href="{{ route('data-pegawai.index') }}">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Data Pegawai</span>
        </a>
    </li>
    <li class="nav-item @if(Route::is('data-pengguna.*')) active @endif">
        <a class="nav-link" href="{{ route('data-pengguna.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pengguna</span>
        </a>
    </li>
    <li class="nav-item @if(Route::is('laporan')) active @endif">
        <a class="nav-link" href="{{ route('laporan') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Laporan</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Personal
    </div>
    <li class="nav-item @if(Route::is('profile.*')) active @endif">
        <a class="nav-link" href="{{ route('profile.edit') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
