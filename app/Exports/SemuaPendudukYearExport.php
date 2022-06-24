<?php

namespace App\Exports;

use App\Models\Keluarga;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SemuaPendudukYearExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function query()
    {
        return Keluarga::query()->with(['anggota_keluargas','kepala_keluarga','anggota_keluarga'])->whereYear('tanggal_pindah', $this->year);
    }

    public function map($keluarga): array
    {
        $return = array();

        foreach ($keluarga->anggota_keluarga as $value) {
            $return[] = [
                '`' . $keluarga->no_kk,
                $keluarga->kepala_keluarga->nama,
                '`' . $keluarga->kepala_keluarga->nik,
                $keluarga->kepala_keluarga->tempat_lahir . ', ' . Carbon::parse($keluarga->kepala_keluarga->tanggal_lahir)->translatedFormat('d F Y'),
                ($keluarga->kepala_keluarga->jenis_kelamin == 'L') ? 'Laki-Laki' : 'Perempuan',
                $keluarga->kepala_keluarga->agama,
                $keluarga->kepala_keluarga->pendidikan,
                $keluarga->kepala_keluarga->pekerjaan,
                $keluarga->alamat,
                $keluarga->rt,
                $keluarga->rw,
                $value->nama,
                '`' . $value->nik,
                $value->tempat_lahir . ',' . Carbon::parse($value->tanggal_lahir)->translatedFormat('d F Y'),
                ($value->jenis_kelamin == 'L') ? 'Laki-Laki' : 'Perempuan',
                $value->agama,
                $value->pendidikan,
                $value->pekerjaan,
            ];
        }

        return $return;
    }

    public function headings(): array
    {
        return [
            'No KK',
            'Nama Kepala Keluarga',
            'NIK Kepala Keluarga',
            'Tempat, Tanggal Lahir Kepala Keluarga',
            'Jenis Kelamin Kepala Keluarga',
            'Agama Kepala Keluarga',
            'Pendidikan Kepala Keluarga',
            'Pekerjaan Kepala Keluarga',
            'Alamat',
            'RT',
            'RW',
            'Nama Anggota keluarga',
            'NIK Anggota keluarga',
            'Tempat, Tanggal Lahir Anggota Keluarga',
            'Jenis Kelamin Anggota Keluarga',
            'Agama Anggota Keluarga',
            'Pendidikan Anggota Keluarga',
            'Pekerjaan Anggota Keluarga',
        ];
    }
}
