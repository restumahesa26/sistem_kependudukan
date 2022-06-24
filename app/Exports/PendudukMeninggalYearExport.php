<?php

namespace App\Exports;

use App\Models\PendudukMeninggal;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PendudukMeninggalYearExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
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
        return PendudukMeninggal::query()->whereYear('tanggal_meninggal', $this->year);
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
