@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-flex justify-content-start">
        <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Keluarga</li>
    </ol>
</div>

<form action="{{ route('data-penduduk.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="no_kk">No KK</label>
                        <input type="number" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk" placeholder="Masukkan No KK" value="{{ old('no_kk') }}" required>
                        @error('no_kk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}" required>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rt">RT</label>
                                <input type="text" class="form-control @error('rt') is-invalid @enderror" id="rt" name="rt" placeholder="Masukkan RT" value="{{ old('rt') }}" required>
                                @error('rt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rw">RW</label>
                                <input type="text" class="form-control @error('rw') is-invalid @enderror" id="rw" name="rw" placeholder="Masukkan RW" value="{{ old('rw') }}" required>
                                @error('rw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="is_miskin">Apakah Keluarga Miskin?</label>
                                <select name="is_miskin" id="is_miskin" class="form-control" required>
                                    <option value="" hidden>-- Pilih Status Keluarga Miskin --</option>
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                                @error('is_miskin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_miskin">Sejak Tanggal</label>
                                <input type="date" name="tanggal_miskin" id="tanggal_miskin" class="form-control @error('tanggal_miskin') is-invalid @enderror" value="{{ old('tanggal_miskin') }}">
                                @error('tanggal_miskin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="is_pindah">Apakah Keluarga Pindah?</label>
                                <select name="is_pindah" id="is_pindah" class="form-control" required>
                                    <option value="" hidden>-- Pilih Status Keluarga Pindah --</option>
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                                @error('is_pindah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pindah">Sejak Tanggal</label>
                                <input type="date" name="tanggal_pindah" id="tanggal_pindah" class="form-control @error('tanggal_pindah') is-invalid @enderror" value="{{ old('tanggal_pindah') }}">
                                @error('tanggal_pindah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="is_pendatang">Apakah Keluarga Pendatang?</label>
                                <select name="is_pendatang" id="is_pendatang" class="form-control" required>
                                    <option value="" hidden>-- Pilih Status Keluarga Pendatang --</option>
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                                @error('is_pendatang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pendatang">Sejak Tanggal</label>
                                <input type="date" name="tanggal_pendatang" id="tanggal_pendatang" class="form-control @error('tanggal_pendatang') is-invalid @enderror" value="{{ old('tanggal_pendatang') }}">
                                @error('tanggal_pendatang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3 btn-simpan">Simpan</button>
        </div>
    </div>
</form>
@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    <script>
        $('.btn-simpan').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Simpan Data?',
            text: "Data Akan Tersimpan",
            icon: 'info',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Simpan',
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

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Perhatikan Lagi Field Yang Diisi'
            })
        </script>
    @endif

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
