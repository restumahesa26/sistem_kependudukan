@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-flex justify-content-start">
        <h1 class="h3 mb-0 text-gray-800">Data Keluarga</h1>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $no_kk }}</li>
    </ol>
</div>

<form action="{{ route('data-penduduk.update', $no_kk) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="no_kk">No KK</label>
                        <input type="number" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk" placeholder="Masukkan No KK" value="{{ old('no_kk', $item->no_kk) }}" required>
                        @error('no_kk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat', $item->alamat) }}" required>
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
                                <input type="text" class="form-control @error('rt') is-invalid @enderror" id="rt" name="rt" placeholder="Masukkan RT" value="{{ old('rt', $item->rt) }}" required>
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
                                <input type="text" class="form-control @error('rw') is-invalid @enderror" id="rw" name="rw" placeholder="Masukkan RW" value="{{ old('rw', $item->rw) }}" required>
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
                                    <option value="0" @if(old('is_miskin', $item->is_miskin) == '0') selected @endif>Tidak</option>
                                    <option value="1" @if(old('is_miskin', $item->is_miskin) == '1') selected @endif>Ya</option>
                                </select>
                                @error('is_miskin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_miskin">Sejak Tanggal</label>
                                <input type="date" name="tanggal_miskin" id="tanggal_miskin" class="form-control @error('tanggal_miskin') is-invalid @enderror" value="{{ old('tanggal_miskin', $item->tanggal_miskin) }}">
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
                                    <option value="0" @if(old('is_pindah', $item->is_pindah) == '0') selected @endif>Tidak</option>
                                    <option value="1" @if(old('is_pindah', $item->is_pindah) == '1') selected @endif>Ya</option>
                                </select>
                                @error('is_pindah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pindah">Sejak Tanggal</label>
                                <input type="date" name="tanggal_pindah" id="tanggal_pindah" class="form-control @error('tanggal_pindah') is-invalid @enderror" value="{{ old('tanggal_pindah', $item->tanggal_pindah) }}">
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
                                    <option value="0" @if(old('is_pendatang', $item->is_pendatang) == '0') selected @endif>Tidak</option>
                                    <option value="1" @if(old('is_pendatang', $item->is_pendatang) == '1') selected @endif>Ya</option>
                                </select>
                                @error('is_pendatang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pendatang">Sejak Tanggal</label>
                                <input type="date" name="tanggal_pendatang" id="tanggal_pendatang" class="form-control @error('tanggal_pendatang') is-invalid @enderror" value="{{ old('tanggal_pendatang', $item->tanggal_pendatang) }}">
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
            <button type="submit" class="btn btn-primary btn-block mt-3 btn-simpan">Simpan Perubahan</button>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">Anggota Keluarga</h1>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap table-hover align-items-center" id="dataTable">
                        <thead>
                            <tr>
                                <th>Urutan</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($item->anggota_keluarga as $item2)
                                <tr>
                                    <td>{{ $item2->urutan }}</td>
                                    <td>{{ $item2->nik }}</td>
                                    <td>{{ $item2->nama }}</td>
                                    <td>{{ $item2->tempat_lahir }}, {{ \Carbon\Carbon::parse($item2->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                    <td>
                                        @if ($item2->jenis_kelamin == 'L')
                                            Laki-Laki
                                        @else
                                            Perempuan
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah{{ $item2->nik }}">
                                            Ubah Data
                                        </button>
                                        <form action="{{ route('data-penduduk.destroy-anggota', $item2->nik) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-hapus-anggota">Hapus Data</button>
                                        </form>
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
                <button type="button" class="btn btn-primary btn-block mt-3" data-toggle="modal" data-target="#modal_tambah">
                    Tambah Anggota
                </button>
            </div>
        </div>
        <div class="modal fade" id="modal_tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota Keluarga</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('data-penduduk.store-anggota', $no_kk) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="Masukkan NIK" value="{{ old('nik') }}" required>
                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_kk">No KK</label>
                                        <input type="text" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk" placeholder="Masukkan No KK" value="{{ old('no_kk', $item->no_kk) }}" readonly>
                                        @error('no_kk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir') }}" required>
                                        @error('tempat_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="{{ old('tanggal_lahir') }}" required>
                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="" hidden>-- Pilih Jenis Kelamin --</option>
                                            <option value="L" @if(old('jenis_kelamin') == 'L') selected @endif>Laki-Laki</option>
                                            <option value="P" @if(old('jenis_kelamin') == 'P') selected @endif>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror" required>
                                            <option value="" hidden>-- Pilih Agama --</option>
                                            <option value="Islam" @if(old('agama') == 'Islam') selected @endif>Islam</option>
                                            <option value="Katolik" @if(old('agama') == 'Katolik') selected @endif>Katolik</option>
                                            <option value="Protestan" @if(old('agama') == 'Protestan') selected @endif>Protestan</option>
                                            <option value="Hindu" @if(old('agama') == 'Hindu') selected @endif>Hindu</option>
                                            <option value="Buddha" @if(old('agama') == 'Buddha') selected @endif>Buddha</option>
                                            <option value="Konghucu" @if(old('agama') == 'Konghucu') selected @endif>Konghucu</option>
                                        </select>
                                        @error('agama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan</label>
                                        <select name="pendidikan" id="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" required>
                                            <option value="" hidden>-- Pilih Pendidikan --</option>
                                            <option value="Tidak / Belum Sekolah" @if(old('pendidikan') == 'Tidak / Belum Sekolah') selected @endif>Tidak / Belum Sekolah</option>
                                            <option value="Belum Tamat SD / Sederajat" @if(old('pendidikan') == 'Belum Tamat SD / Sederajat') selected @endif>Belum Tamat SD / Sederajat</option>
                                            <option value="Tamat SD / Sederajat" @if(old('pendidikan') == 'Tamat SD / Sederajat') selected @endif>Tamat SD / Sederajat</option>
                                            <option value="SLTP / Sederajat" @if(old('pendidikan') == 'SLTP / Sederajat') selected @endif>SLTP / Sederajat</option>
                                            <option value="SLTA / Sederajat" @if(old('pendidikan') == 'SLTA / Sederajat') selected @endif>SLTA / Sederajat</option>
                                            <option value="Diploma I / II / III" @if(old('pendidikan') == 'Diploma I / II / III') selected @endif>Diploma I / II / III</option>
                                            <option value="Diploma IV / Strata I" @if(old('pendidikan') == 'Diploma IV / Strata I') selected @endif>Diploma IV / Strata I</option>
                                            <option value="Strata II" @if(old('pendidikan') == 'Strata II') selected @endif>Strata II</option>
                                            <option value="Strata III" @if(old('pendidikan') == 'Strata III') selected @endif>Strata III</option>
                                        </select>
                                        @error('pendidikan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <select name="pekerjaan" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" required>
                                            <option value="" hidden>-- Pilih Pekerjaan --</option>
                                            <option value="Belum / Tidak Bekerja" @if(old('pekerjaan') == 'Belum / Tidak Bekerja') selected @endif>Belum / Tidak Bekerja</option>
                                            <option value="Mengurus Rumah Tangga" @if(old('pekerjaan') == 'Mengurus Rumah Tangga') selected @endif>Mengurus Rumah Tangga</option>
                                            <option value="Pelajar / Mahasiswa" @if(old('pekerjaan') == 'Pelajar / Mahasiswa') selected @endif>Pelajar / Mahasiswa</option>
                                            <option value="Pegawai Negeri Sipil" @if(old('pekerjaan') == 'Pegawai Negeri Sipil') selected @endif>Pegawai Negeri Sipil</option>
                                            <option value="Buruh" @if(old('pekerjaan') == 'Buruh') selected @endif>Buruh</option>
                                            <option value="Karyawan Swasta" @if(old('pekerjaan') == 'Karyawan Swasta') selected @endif>Karyawan Swasta</option>
                                            <option value="Wirausaha" @if(old('pekerjaan') == 'Wirausaha') selected @endif>Wirausaha</option>
                                            <option value="Lainnya" @if(old('pekerjaan') == 'Lainnya') selected @endif>Lainnya</option>
                                        </select>
                                        @error('pekerjaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_perkawinan">Status Perkawinan</label>
                                        <select name="status_perkawinan" id="status_perkawinan" class="form-control">
                                            <option value="" hidden>-- Pilih Status Perkawinan --</option>
                                            <option value="Kawin" @if(old('status_perkawinan') == 'Kawin') selected @endif>Kawin</option>
                                            <option value="Belum Kawin" @if(old('status_perkawinan') == 'Belum Kawin') selected @endif>Belum Kawin</option>
                                            <option value="Cerai Hidup" @if(old('status_perkawinan') == 'Cerai Hidup') selected @endif>Cerai Hidup</option>
                                            <option value="Cerai Mati" @if(old('status_perkawinan') == 'Cerai Mati') selected @endif>Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_hubungan">Status Hubungan</label>
                                        <select name="status_hubungan" id="status_hubungan" class="form-control">
                                            <option value="" hidden>-- Pilih Status Hubungan --</option>
                                            <option value="Suami" @if(old('status_hubungan') == 'Suami') selected @endif>Suami</option>
                                            <option value="Istri" @if(old('status_hubungan') == 'Istri') selected @endif>Istri</option>
                                            <option value="Anak" @if(old('status_hubungan') == 'Anak') selected @endif>Anak</option>
                                            <option value="Cucu" @if(old('status_hubungan') == 'Cucu') selected @endif>Cucu</option>
                                            <option value="Orang Tua" @if(old('status_hubungan') == 'Orang Tua') selected @endif>Orang Tua</option>
                                            <option value="Menantu" @if(old('status_hubungan') == 'Menantu') selected @endif>Menantu</option>
                                            <option value="Mertua" @if(old('status_hubungan') == 'Mertua') selected @endif>Mertua</option>
                                            <option value="Famili Lain" @if(old('status_hubungan') == 'Famili Lain') selected @endif>Famili Lain</option>
                                            <option value="Pembantu" @if(old('status_hubungan') == 'Pembantu') selected @endif>Pembantu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="urutan">Urutan</label>
                                        <input type="number" class="form-control @error('urutan') is-invalid @enderror" id="urutan" name="urutan" placeholder="Masukkan Urutan" value="{{ old('urutan') }}" required min="1">
                                        @error('urutan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-simpan-anggota">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($item->anggota_keluarga as $item3)
        <div class="modal fade modal" id="modal_ubah{{ $item3->nik }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data {{ $item3->nama }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('data-penduduk.update-anggota', $item3->nik) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ old('nama', $item3->nama) }}" required>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="Masukkan NIK" value="{{ old('nik', $item3->nik) }}" required>
                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_kk">No KK</label>
                                        <input type="text" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk" placeholder="Masukkan No KK" value="{{ old('no_kk', $item3->no_kk) }}" readonly>
                                        @error('no_kk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir', $item3->tempat_lahir) }}" required>
                                        @error('tempat_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="{{ old('tanggal_lahir', $item3->tanggal_lahir) }}" required>
                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="" hidden>-- Pilih Status Keluarga Pendatang --</option>
                                            <option value="L" @if(old('jenis_kelamin', $item3->jenis_kelamin) == 'L') selected @endif>Laki-Laki</option>
                                            <option value="P" @if(old('jenis_kelamin', $item3->jenis_kelamin) == 'P') selected @endif>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror" required>
                                            <option value="" hidden>-- Pilih Agama --</option>
                                            <option value="Islam" @if(old('agama', $item3->agama) == 'Islam') selected @endif>Islam</option>
                                            <option value="Katolik" @if(old('agama', $item3->agama) == 'Katolik') selected @endif>Katolik</option>
                                            <option value="Protestan" @if(old('agama', $item3->agama) == 'Protestan') selected @endif>Protestan</option>
                                            <option value="Hindu" @if(old('agama', $item3->agama) == 'Hindu') selected @endif>Hindu</option>
                                            <option value="Buddha" @if(old('agama', $item3->agama) == 'Buddha') selected @endif>Buddha</option>
                                            <option value="Konghucu" @if(old('agama', $item3->agama) == 'Konghucu') selected @endif>Konghucu</option>
                                        </select>
                                        @error('agama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan</label>
                                        <select name="pendidikan" id="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" required>
                                            <option value="" hidden>-- Pilih Pendidikan --</option>
                                            <option value="Tidak / Belum Sekolah" @if(old('pendidikan', $item3->pendidikan) == 'Tidak / Belum Sekolah') selected @endif>Tidak / Belum Sekolah</option>
                                            <option value="Belum Tamat SD / Sederajat" @if(old('pendidikan', $item3->pendidikan) == 'Belum Tamat SD / Sederajat') selected @endif>Belum Tamat SD / Sederajat</option>
                                            <option value="Tamat SD / Sederajat" @if(old('pendidikan', $item3->pendidikan) == 'Tamat SD / Sederajat') selected @endif>Tamat SD / Sederajat</option>
                                            <option value="SLTP / Sederajat" @if(old('pendidikan', $item3->pendidikan) == 'SLTP / Sederajat') selected @endif>SLTP / Sederajat</option>
                                            <option value="SLTA / Sederajat" @if(old('pendidikan', $item3->pendidikan) == 'SLTA / Sederajat') selected @endif>SLTA / Sederajat</option>
                                            <option value="Diploma I / II / III" @if(old('pendidikan', $item3->pendidikan) == 'Diploma I / II / III') selected @endif>Diploma I / II / III</option>
                                            <option value="Diploma IV / Strata I" @if(old('pendidikan', $item3->pendidikan) == 'Diploma IV / Strata I') selected @endif>Diploma IV / Strata I</option>
                                            <option value="Strata II" @if(old('pendidikan', $item3->pendidikan) == 'Strata II') selected @endif>Strata II</option>
                                            <option value="Strata III" @if(old('pendidikan', $item3->pendidikan) == 'Strata III') selected @endif>Strata III</option>
                                        </select>
                                        @error('pendidikan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <select name="pekerjaan" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" required>
                                            <option value="" hidden>-- Pilih Pekerjaan --</option>
                                            <option value="Belum / Tidak Bekerja" @if(old('pekerjaan', $item3->pekerjaan) == 'Belum / Tidak Bekerja') selected @endif>Belum / Tidak Bekerja</option>
                                            <option value="Mengurus Rumah Tangga" @if(old('pekerjaan', $item3->pekerjaan) == 'Mengurus Rumah Tangga') selected @endif>Mengurus Rumah Tangga</option>
                                            <option value="Pelajar / Mahasiswa" @if(old('pekerjaan', $item3->pekerjaan) == 'Pelajar / Mahasiswa') selected @endif>Pelajar / Mahasiswa</option>
                                            <option value="Pegawai Negeri Sipil" @if(old('pekerjaan', $item3->pekerjaan) == 'Pegawai Negeri Sipil') selected @endif>Pegawai Negeri Sipil</option>
                                            <option value="Buruh" @if(old('pekerjaan', $item3->pekerjaan) == 'Buruh') selected @endif>Buruh</option>
                                            <option value="Karyawan Swasta" @if(old('pekerjaan', $item3->pekerjaan) == 'Karyawan Swasta') selected @endif>Karyawan Swasta</option>
                                            <option value="Wirausaha" @if(old('pekerjaan', $item3->pekerjaan) == 'Wirausaha') selected @endif>Wirausaha</option>
                                            <option value="Lainnya" @if(old('pekerjaan', $item3->pekerjaan) == 'Lainnya') selected @endif>Lainnya</option>
                                        </select>
                                        @error('pekerjaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_perkawinan">Status Perkawinan</label>
                                        <select name="status_perkawinan" id="status_perkawinan" class="form-control">
                                            <option value="" hidden>-- Pilih Status Perkawinan --</option>
                                            <option value="Kawin" @if(old('status_perkawinan', $item3->status_perkawinan) == 'Kawin') selected @endif>Kawin</option>
                                            <option value="Belum Kawin" @if(old('status_perkawinan', $item3->status_perkawinan) == 'Belum Kawin') selected @endif>Belum Kawin</option>
                                            <option value="Cerai Hidup" @if(old('status_perkawinan', $item3->status_perkawinan) == 'Cerai Hidup') selected @endif>Cerai Hidup</option>
                                            <option value="Cerai Mati" @if(old('status_perkawinan', $item3->status_perkawinan) == 'Cerai Mati') selected @endif>Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_hubungan">Status Hubungan</label>
                                        <select name="status_hubungan" id="status_hubungan" class="form-control">
                                            <option value="" hidden>-- Pilih Status Hubungan --</option>
                                            <option value="Suami" @if(old('status_hubungan', $item3->status_hubungan) == 'Suami') selected @endif>Suami</option>
                                            <option value="Istri" @if(old('status_hubungan', $item3->status_hubungan) == 'Istri') selected @endif>Istri</option>
                                            <option value="Anak" @if(old('status_hubungan', $item3->status_hubungan) == 'Anak') selected @endif>Anak</option>
                                            <option value="Cucu" @if(old('status_hubungan', $item3->status_hubungan) == 'Cucu') selected @endif>Cucu</option>
                                            <option value="Orang Tua" @if(old('status_hubungan', $item3->status_hubungan) == 'Orang Tua') selected @endif>Orang Tua</option>
                                            <option value="Menantu" @if(old('status_hubungan', $item3->status_hubungan) == 'Menantu') selected @endif>Menantu</option>
                                            <option value="Mertua" @if(old('status_hubungan', $item3->status_hubungan) == 'Mertua') selected @endif>Mertua</option>
                                            <option value="Famili Lain" @if(old('status_hubungan', $item3->status_hubungan) == 'Famili Lain') selected @endif>Famili Lain</option>
                                            <option value="Pembantu" @if(old('status_hubungan', $item3->status_hubungan) == 'Pembantu') selected @endif>Pembantu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="urutan">Urutan</label>
                                        <input type="number" class="form-control @error('urutan') is-invalid @enderror" id="urutan" name="urutan" placeholder="Masukkan Urutan" value="{{ old('urutan', $item3->urutan) }}" required min="1">
                                        @error('urutan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-simpan-ubah-anggota">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('addon-style')
    <link href="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

    <script>
        $('.btn-simpan').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Simpan Perubahan?',
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

        $('.btn-simpan-anggota').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Simpan Data Anggota?',
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

        $('.btn-simpan-ubah-anggota').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Simpan Perubahan?',
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

        $('.btn-hapus-anggota').on('click', function (e) {
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

    @if(session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session()->get("error") }}'
            })
        </script>
    @endif
@endpush
