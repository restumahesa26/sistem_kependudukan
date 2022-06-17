<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Tidak Mampu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman';
        }

        h3, h4 {
            margin-bottom: -3px;
        }

        p, span {
            margin-bottom: -3px;
            font-size: 22px;
        }

        .table-borderless tr td {
            padding: 1px !important;
        }

        .table-borderless .ttd tr td {
            padding: 0px !important;
        }

        .table-bordered th, .table-bordered td{
            border: 1px solid #000 !important;
        }

        table tr td, table tr th {
            font-size: 22px;
        }

        .tb-anak tr td, table tr th {
            font-size: 22px;
        }

        table tr th{
            padding: 2px !important;
        }

        table tr td {
            padding: 16px !important;
        }
    </style>
</head>
<body>
    <div class="container" style="padding-left: 50px; padding-right: 50px;">
        <div class="row justify-content-center text-center">
            <div class="col-3">
                <img src="{{ url('logo-kota.png') }}" alt="" srcset="" style=" width: 110px; margin-left: -200px;">
            </div>
            <div class="col-9" style="margin-left: -200px;">
                <h4>PEMERINTAH KOTA BENGKULU</h4>
                <h3 class="font-weight-bold">KECAMATAN SINGARAN PATI</h3>
                <h3 class="font-weight-bold">KELURAHAN PANORAMA</h3>
                <p style=" margin-top: 2px; font-size: 20px;">Jalan Merapi 7 RT.29 RW.02 Kota Bengkulu</p>
            </div>
        </div>
        <hr style="border: 2px solid #000;">
        <h5 class="text-center font-weight-bold" style="text-decoration: underline; font-size: 24px;">
            SURAT KETERANGAN TIDAK MAMPU / SKTM
        </h5>
        <h5 class="text-center font-weight-bold" style="font-size: 20px; margin-top: -10px;">
            NOMOR : {{ $nomor_surat }}
        </h5>
        <p class="mt-4" style="text-indent: 60px;">Yang bertanda tangan dibawah ini Kepala Kelurahan Panorama Kecamatan Singaran Pati Kota Bengkulu</p>
        <table class="table table-borderless mt-3" style="margin-left: 60px;">
            <tbody>
                <tr>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 1%;">:</td>
                    <td class="font-weight-bold">{{ $item->kepala_keluarga->kepala_keluarga->nama }}</td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $item->kepala_keluarga->kepala_keluarga->tempat_lahir }}, {{ \Carbon\Carbon::parse($item->kepala_keluarga->kepala_keluarga->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>{{ $item->kepala_keluarga->kepala_keluarga->nik }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $item->kepala_keluarga->kepala_keluarga->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td>:</td>
                    <td>{{ $item->kepala_keluarga->kepala_keluarga->status_perkawinan }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{ $item->kepala_keluarga->kepala_keluarga->agama }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $item->kepala_keluarga->kepala_keluarga->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $item->kepala_keluarga->alamat }}</td>
                </tr>
            </tbody>
        </table>
        <p class="mt-4 text-justify" style="text-indent: 60px;">Berdasarkan Surat Pengantar dari Ketua RT.{{ $item->kepala_keluarga->rt }} RW.{{ $item->kepala_keluarga->rw }} Nomor : {{ $nomor_surat_rt }} Kelurahan Panorama Kecamatan Singaran Pati Kota Bengkulu tanggal {{ \Carbon\Carbon::parse($tanggal_surat_rt)->translatedFormat('d F Y') }}, yang tersebut diatas adalah benar warga Kelurahan Panorama yang berdomisili pada alamat tersebut diatas. Adapun yang bersangkutan termasuk keluarga <span class="font-weight-bold"><i>Tidak Mampu/Miskin</i></span>.</p>
        <p class="mt-2 text-justify" style="text-indent: 60px;">Adapun surat keterangan ini dibuat dipergunakan untuk keperluan <span class="font-weight-bold"><i>{{ $fungsi }}</i></span>.</p>
        <table class="table table-borderless mt-3 tb-anak" style="margin-left: 60px;">
            <tbody>
                <tr>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 1%;">:</td>
                    <td class="font-weight-bold">{{ $item->nama }}</td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $item->tempat_lahir }}, {{ \Carbon\Carbon::parse($item->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $item->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                </tr>
            </tbody>
        </table>
        <p class="mt-2 text-justify" style="text-indent: 60px;">Demikian keterangan ini dibuat untuk dapat dipergunakan sebagaimana semestinya.</p>
        <table class="table table-borderless mt-4" style="margin-left: 60px;">
            <tbody>
                <tr>
                    <td style="width: 50%;">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 20%;">No</td>
                                    <td style="width: 1%;">:</td>
                                    <td style="width: 79%;">&nbsp;463/&emsp;&emsp;/Kesos/K.SP/2022</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Tanggal</td>
                                    <td style="width: 1%;">:</td>
                                    <td style="width: 79%;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="width: 50%;">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 30%;">Dibuat di</td>
                                    <td style="width: 1%;">:</td>
                                    <td style="width: 69%;">&nbsp;Bengkulu</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;">Pada tanggal</td>
                                    <td style="width: 1%;">:</td>
                                    <td style="width: 69%;">&nbsp;{{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('d F Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-borderless" style="margin-top: -30px;">
            <tbody class="text-center ttd">
                <tr>
                    <td style="width: 50%;">Mengetahui</td>
                    <td style="width: 50%;">Kepala Kelurahan Panorama</td>
                </tr>
                <tr>
                    <td style="width: 50%;">Kepala Kecamatan Singaran Pati</td>
                    <td style="width: 50%;"></td>
                </tr>
                <tr>
                    <td style="padding-top: 110px !important; " class="font-weight-bold">
                        <span style="border-bottom: 2px #000 solid;">
                            Drs. ALEX PERIYANSH
                        </span>
                    </td>
                    <td style="padding-top: 110px !important;" class="font-weight-bold"><span style="border-bottom: 2px #000 solid;">
                        A. SYAFRUDDIN, SE
                    </span> </td>
                </tr>
                <tr>
                    <td>NIP. 19700415 199003 1 002</td>
                    <td>NIP. 19700411 199603 1 005</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
    window.print()
</script>
</html>
