@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    @if ($tipe == 'semua-penduduk')
        <h1 class="h3 mb-0 text-gray-800">Data Semua Penduduk</h1>
    @elseif ($tipe == 'penduduk-miskin')
        <h1 class="h3 mb-0 text-gray-800">Data Penduduk Miskin</h1>
    @elseif ($tipe == 'penduduk-pindah')
        <h1 class="h3 mb-0 text-gray-800">Data Penduduk Pindah</h1>
    @elseif ($tipe == 'penduduk-pendatang')
        <h1 class="h3 mb-0 text-gray-800">Data Penduduk Pendatang</h1>
    @endif
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Penduduk</li>
    </ol>
</div>

<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if ($tipe == 'semua-penduduk')
                    <a href="{{ route('data-penduduk.create') }}" class="btn btn-primary btn-sm mb-3 px-4">Tambah Data Keluarga</a>
                @elseif ($tipe == 'penduduk-miskin')
                    <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#modal_tambah_miskin">
                        Tambah Data Penduduk Miskin
                    </button>
                @elseif ($tipe == 'penduduk-pindah')
                    <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#modal_tambah_pindah">
                        Tambah Data Penduduk Pindah
                    </button>
                @elseif ($tipe == 'penduduk-pendatang')
                    <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#modal_tambah_pendatang">
                        Tambah Data Penduduk Pendatang
                    </button>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap table-hover align-items-center" id="dataTable">
                        <thead>
                            <tr>
                                <th>No KK</th>
                                <th>Kepala Keluarga</th>
                                <th>Alamat</th>
                                <th>Anggota</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->no_kk }}</td>
                                    <td>@if ($item->kepala_keluarga)
                                        {{ $item->kepala_keluarga->nama }}
                                    @else
                                        <span class="badge badge-danger">Silahkan pilih kepala keluarga</span>
                                    @endif</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        @if ($item->kepala_keluarga)
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_pesan{{ $item->no_kk }}">
                                                Lihat Anggota
                                            </button>
                                        @else
                                            <span class="badge badge-danger">Silahkan masukkan anggota</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('data-penduduk.create-anggota', $item->no_kk) }}" class="btn btn-sm btn-primary">Lihat Data</a>
                                        @if ($tipe == 'semua-penduduk')
                                        <form action="{{ route('data-penduduk.destroy', $item->no_kk) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus Data</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">-- Data Masih Kosong --</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_tambah_miskin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penduduk Miskin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-penduduk.ganti-status-penduduk', 'penduduk-miskin') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="miskin">Pilih Penduduk</label><br>
                            <select name="penduduk" id="miskin" class="form-control select2-penduduk-miskin" style="width: 400px;">
                                <option value="" hidden>-- Pilih Penduduk --</option>
                                @foreach ($datas as $data)
                                    <option value="{{ $data->no_kk }}">{{ $data->kepala_keluarga->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_tambah_pindah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penduduk Pindah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-penduduk.ganti-status-penduduk', 'penduduk-pindah') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="pindah">Pilih Penduduk</label><br>
                            <select name="penduduk" id="pindah" class="form-control select2-penduduk-pindah" style="width: 400px;">
                                <option value="" hidden>-- Pilih Penduduk --</option>
                                @foreach ($datas as $data)
                                    <option value="{{ $data->no_kk }}">{{ $data->kepala_keluarga->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_tambah_pendatang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penduduk Pendatang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-penduduk.ganti-status-penduduk', 'penduduk-pendatang') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="pendatang">Pilih Penduduk</label><br>
                            <select name="penduduk" id="pendatang" class="form-control select2-penduduk-pendatang" style="width: 400px;">
                                <option value="" hidden>-- Pilih Penduduk --</option>
                                @foreach ($datas as $data)
                                    <option value="{{ $data->no_kk }}">{{ $data->kepala_keluarga->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($items as $item2)
    <div class="modal fade" id="modal_pesan{{ $item2->no_kk }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anggota Keluarga - {{ $item->no_kk }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ol style="margin-left: -20px !important;" class="font-weight-bold">
                        @foreach ($item2->anggota_keluargas as $item3)
                            <li>{{ $item3->nama }}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@push('addon-style')
    <link href="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ url('backend/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('backend/vendor/select2/dist/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

    <script>
        $('#pindah').select2({
            placeholder: "-- Pilih Penduduk --",
            allowClear: true
        });
    </script>

    <script>
        $('#pendatang').select2({
            placeholder: "-- Pilih Penduduk --",
            allowClear: true
        });
    </script>

    <script>
        $('#miskin').select2({
            placeholder: "-- Pilih Penduduk --",
            allowClear: true
        });
    </script>

    <script>
        $('.btn-hapus').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Hapus Data?',
            text: "Data Akan Terhapus",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });
    </script>

    @if(session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session()->get("success") }}'
            })
        </script>
    @endif
@endpush
