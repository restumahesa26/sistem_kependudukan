@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Laporan</li>
    </ol>
</div>

<div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-lg-2 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Semua Penduduk
                        </div>
                        <a href="{{ route('data-penduduk.cetak-excel-semua-penduduk') }}" class="btn btn-primary">Print Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-lg-2 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Penduduk Miskin</div>
                        <a href="{{ route('data-penduduk.cetak-excel-penduduk-miskin') }}" class="btn btn-info">Print Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-lg-2 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Penduduk Pindah</div>
                        <a href="{{ route('data-penduduk.cetak-excel-penduduk-pindah') }}" class="btn btn-secondary">Print Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-lg-2 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Penduduk Pendatang
                        </div>
                        <a href="{{ route('data-penduduk.cetak-excel-penduduk-pendatang') }}" class="btn btn-warning">Print Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-lg-2 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Penduduk Meninggal
                        </div>
                        <a href="{{ route('penduduk-meninggal.cetak-excel-penduduk-meninggal') }}" class="btn btn-danger">Print Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
