@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="text-info font-weight-bold">Selamat Datang, {{ Auth::user()->nama }}</h4>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Semua Penduduk
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $semua_penduduk }}</div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('data-penduduk.index', 'semua-penduduk') }}">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Penduduk Miskin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $miskin }}</div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('data-penduduk.index', 'penduduk-miskin') }}">
                            <i class="fas fa-id-badge fa-2x text-success"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Penduduk Pindah</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $pindah }}</div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('data-penduduk.index', 'penduduk-pindah') }}">
                            <i class="fas fa-share fa-2x text-info"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Penduduk Pendatang
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendatang }}</div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('data-penduduk.index', 'penduduk-pendatang') }}">
                            <i class="fas fa-reply fa-2x text-secondary"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Penduduk Meninggal
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $meninggal }}</div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('data-penduduk.index', 'penduduk-meninggal') }}">
                            <i class="fas fa-heartbeat fa-2x text-warning"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
