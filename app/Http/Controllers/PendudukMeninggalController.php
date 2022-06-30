<?php

namespace App\Http\Controllers;

use App\Exports\PendudukMeninggalExport;
use App\Exports\PendudukMeninggalYearExport;
use App\Models\AnggotaKeluarga;
use App\Models\PendudukMeninggal;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PendudukMeninggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = PendudukMeninggal::all();

        $data = AnggotaKeluarga::all();

        return view('pages.penduduk-meninggal.index', [
            'items' => $items, 'datas' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = AnggotaKeluarga::where('nik', $request->penduduk)->first();

        PendudukMeninggal::create([
            'tanggal_meninggal' => $request->tanggal_meninggal,
            'nik' => $item->nik,
            'no_kk' => $item->no_kk,
            'nama' => $item->nama,
            'tempat_lahir' => $item->tempat_lahir,
            'tanggal_lahir' => $item->tanggal_lahir,
            'jenis_kelamin' => $item->jenis_kelamin,
            'agama' => $item->agama,
            'pendidikan' => $item->pendidikan,
            'pekerjaan' => $item->pekerjaan,
        ]);

        $item->delete();

        return redirect()->route('penduduk-meninggal.index')->with('success', 'Berhasil Menambah Penduduk Meninggal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PendudukMeninggal  $pendudukMeninggal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PendudukMeninggal  $pendudukMeninggal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = PendudukMeninggal::findOrFail($id);

        return view('pages.penduduk-meninggal.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PendudukMeninggal  $pendudukMeninggal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = PendudukMeninggal::findOrFail($id);

        $request->validate([
            'nama' => ['required', 'string', 'max:40'],
            'tempat_lahir' => ['required', 'string', 'max:20'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'agama' => ['required', 'string', 'max:10'],
            'pendidikan' => ['required', 'string', 'max:25'],
            'pekerjaan' => ['required', 'string', 'max:25'],
            'tanggal_meninggal' => ['required', 'date'],
        ]);

        if ($request->nik != $item->nik) {
            $request->validate([
                'nik' => ['required', 'string', 'max:16', 'unique:anggota_keluargas', 'unique:penduduk_meninggals','min:16'],
            ]);
        }

        $item->nama = $request->nama;
        $item->tanggal_meninggal = $request->tanggal_meninggal;
        $item->nik = $request->nik;
        $item->tempat_lahir = $request->tempat_lahir;
        $item->tanggal_lahir = $request->tanggal_lahir;
        $item->jenis_kelamin = $request->jenis_kelamin;
        $item->agama = $request->agama;
        $item->pendidikan = $request->pendidikan;
        $item->pekerjaan = $request->pekerjaan;
        $item->save();

        return redirect()->route('penduduk-meninggal.index')->with('success', 'Berhasil Mengubah Penduduk Meninggal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PendudukMeninggal  $pendudukMeninggal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PendudukMeninggal::findOrFail($id);

        $item->delete();

        return redirect()->route('penduduk-meninggal.index')->with('success', 'Berhasil Menghapus Penduduk Meninggal');
    }

    public function kembali_ke_penduduk($nik)
    {
        $item = PendudukMeninggal::findOrFail($nik);

        $no_kk = $item->no_kk;

        AnggotaKeluarga::create([
            'no_kk' => $item->no_kk,
            'nik' => $item->nik,
            'no_kk' => $item->no_kk,
            'nama' => $item->nama,
            'tempat_lahir' => $item->tempat_lahir,
            'tanggal_lahir' => $item->tanggal_lahir,
            'jenis_kelamin' => $item->jenis_kelamin,
            'agama' => $item->agama,
            'pendidikan' => $item->pendidikan,
            'pekerjaan' => $item->pekerjaan,
        ]);

        $item->delete();

        return redirect()->route('data-penduduk.create-anggota', $no_kk)->with('success', 'Berhasil Mengembalikan Penduduk');
    }

    public function export_penduduk_meninggal(Request $request)
    {
        if ($request->year) {
            return Excel::download(new PendudukMeninggalYearExport($request->year), 'data-penduduk-meninggal-tahun-'. $request->year .'.xlsx');
        } else {
            return Excel::download(new PendudukMeninggalExport, 'data-penduduk-meninggal.xlsx');
        }
    }
}
