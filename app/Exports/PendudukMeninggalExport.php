<?php

namespace App\Exports;

use App\Models\PendudukMeninggal;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PendudukMeninggalExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PendudukMeninggal::all();
    }

    public function map($item): array
    {
        return [
            '`' . $item->nik,
            $item->nama,
            $item->tempat_lahir . ', ' . Carbon::parse($item->tanggal_lahir)->translatedFormat('d F Y'),
            ($item->jenis_kelamin == 'L') ? 'Laki-Laki' : 'Perempuan',
            $item->agama,
            $item->pendidikan,
            $item->pekerjaan,
        ];
    }

    public function headings(): array
    {
        return [
            'NIK',
            'Nama',
            'Tempat, Tanggal Lahir',
            'Jenis Kelamin',
            'Agama',
            'Pendidikan',
            'Pekerjaan',
        ];
    }
}
