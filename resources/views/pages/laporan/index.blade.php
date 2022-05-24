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
                        <a href="{{ route('data-penduduk.cetak-excel-semua-penduduk') }}" class="btn btn-primary" target="_blank">Print Laporan</a>
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
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_penduduk_miskin">
                            Print Laporan
                        </button>
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
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal_penduduk_pindah">
                            Print Laporan
                        </button>
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
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_penduduk_pendatang">
                            Print Laporan
                        </button>
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
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_penduduk_meninggal">
                            Print Laporan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_penduduk_pindah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary" id="exampleModalLabel">Cetak Data Penduduk Pindah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Cetak Berdasarkan Tahun</h5>
                        <form action="{{ route('data-penduduk.cetak-excel-penduduk-pindah') }}" target="_blank">
                            <div class="form-group">
                                <label for="date4">Masukkan Tahun</label><br>
                                <select id='date4' class="form-control" name="tahun">
                                    <option value="" hidden>-- Pilih Tahun --</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Cetak Data</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h5>Cetak Semua Data</h5>
                        <form action="{{ route('data-penduduk.cetak-excel-penduduk-pindah') }}" target="_blank">
                            <button type="submit" class="btn btn-primary btn-sm mb-auto">Cetak Semua Penduduk Pindah</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_penduduk_pendatang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning" id="exampleModalLabel">Cetak Data Penduduk Pendatang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Cetak Berdasarkan Tahun</h5>
                        <form action="{{ route('data-penduduk.cetak-excel-penduduk-pendatang') }}" target="_blank">
                            <div class="form-group">
                                <label for="date3">Masukkan Tahun</label><br>
                                <select id='date3' class="form-control" name="tahun">
                                    <option value="" hidden>-- Pilih Tahun --</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Cetak Data</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h5>Cetak Semua Data</h5>
                        <form action="{{ route('data-penduduk.cetak-excel-penduduk-pendatang') }}" target="_blank">
                            <button type="submit" class="btn btn-primary btn-sm mb-auto">Cetak Semua Penduduk Pendatang</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_penduduk_miskin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="exampleModalLabel">Cetak Data Penduduk Miskin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Cetak Berdasarkan Tahun</h5>
                        <form action="{{ route('data-penduduk.cetak-excel-penduduk-miskin') }}" target="_blank">
                            <div class="form-group">
                                <label for="date2">Masukkan Tahun</label><br>
                                <select id='date2' class="form-control" name="tahun">
                                    <option value="" hidden>-- Pilih Tahun --</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Cetak Data</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h5>Cetak Semua Data</h5>
                        <form action="{{ route('data-penduduk.cetak-excel-penduduk-miskin') }}" target="_blank">
                            <button type="submit" class="btn btn-primary btn-sm mb-auto">Cetak Semua Penduduk Miskin</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_penduduk_meninggal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Cetak Data Penduduk Meninggal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Cetak Berdasarkan Tahun</h5>
                        <form action="{{ route('penduduk-meninggal.cetak-excel-penduduk-meninggal') }}" target="_blank">
                            <div class="form-group">
                                <label for="date">Masukkan Tahun</label><br>
                                <select id='date' class="form-control" name="tahun">
                                    <option value="" hidden>-- Pilih Tahun --</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Cetak Data</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h5>Cetak Semua Data</h5>
                        <form action="{{ route('penduduk-meninggal.cetak-excel-penduduk-meninggal') }}" target="_blank">
                            <button type="submit" class="btn btn-primary btn-sm mb-auto">Cetak Semua Penduduk Meninggal</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    let dateDropdown = document.getElementById('date');

    let currentYear = new Date().getFullYear();
    let earliestYear = 1970;
    while (currentYear >= earliestYear) {
        let dateOption = document.createElement('option');
        dateOption.text = currentYear;
        dateOption.value = currentYear;
        dateDropdown.add(dateOption);
        currentYear -= 1;
    }

    let dateDropdown2 = document.getElementById('date2');

    let currentYear2 = new Date().getFullYear();
    let earliestYear2 = 1970;
    while (currentYear2 >= earliestYear2) {
        let dateOption2 = document.createElement('option');
        dateOption2.text = currentYear2;
        dateOption2.value = currentYear2;
        dateDropdown2.add(dateOption2);
        currentYear2 -= 1;
    }

    let dateDropdown3 = document.getElementById('date3');

    let currentYear3 = new Date().getFullYear();
    let earliestYear3 = 1970;
    while (currentYear3 >= earliestYear3) {
        let dateOption3 = document.createElement('option');
        dateOption3.text = currentYear3;
        dateOption3.value = currentYear3;
        dateDropdown3.add(dateOption3);
        currentYear3 -= 1;
    }

    let dateDropdown4 = document.getElementById('date4');

    let currentYear4 = new Date().getFullYear();
    let earliestYear4 = 1970;
    while (currentYear4 >= earliestYear4) {
        let dateOption4 = document.createElement('option');
        dateOption4.text = currentYear4;
        dateOption4.value = currentYear4;
        dateDropdown4.add(dateOption4);
        currentYear4 -= 1;
    }
</script>
@endpush
