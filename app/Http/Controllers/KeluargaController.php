<?php

namespace App\Http\Controllers;

use App\Exports\PendudukMiskinExport;
use App\Exports\PendudukPendatangExport;
use App\Exports\PendudukPindahExport;
use App\Exports\SemuaPendudukExport;
use App\Models\AnggotaKeluarga;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KeluargaController extends Controller
{
    public function index($tipe)
    {
        if ($tipe == 'semua-penduduk') {
            $items = Keluarga::latest('updated_at')->get();

            $datas = Keluarga::all();

            return view('pages.keluarga.index', [
                'items' => $items, 'tipe' => $tipe, 'datas' => $datas
            ]);
        }elseif ($tipe == 'penduduk-miskin') {
            $items = Keluarga::where('is_miskin', '1')->latest('updated_at')->get();

            $datas = Keluarga::all();

            return view('pages.keluarga.index', [
                'items' => $items, 'tipe' => $tipe, 'datas' => $datas
            ]);
        }elseif ($tipe == 'penduduk-pindah') {
            $items = Keluarga::where('is_pindah', '1')->latest('updated_at')->get();

            $datas = Keluarga::all();

            return view('pages.keluarga.index', [
                'items' => $items, 'tipe' => $tipe, 'datas' => $datas
            ]);
        }elseif ($tipe == 'penduduk-pendatang') {
            $items = Keluarga::where('is_pendatang', '1')->latest('updated_at')->get();

            $datas = Keluarga::all();

            return view('pages.keluarga.index', [
                'items' => $items, 'tipe' => $tipe, 'datas' => $datas
            ]);
        }
    }

    public function create()
    {
        return view('pages.keluarga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => ['required', 'string', 'max:255', 'unique:keluargas'],
            'alamat' => ['required', 'string', 'max:255'],
            'rt' => ['required', 'string', 'max:255'],
            'rw' => ['required', 'string', 'max:255'],
        ]);

        Keluarga::create([
            'no_kk' => $request->no_kk,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'is_miskin' => $request->is_miskin,
            'is_pindah' => $request->is_pindah,
            'is_pendatang' => $request->is_pendatang,
        ]);

        return redirect()->route('data-penduduk.index', 'semua-penduduk')->with('success', 'Berhasil Menambah Data Keluarga');
    }

    public function create_anggota($no_kk)
    {
        $item = Keluarga::findOrFail($no_kk);

        return view('pages.keluarga.show', [
            'item' => $item, 'no_kk' => $no_kk
        ]);
    }

    public function update(Request $request, $no_kk)
    {
        $item = Keluarga::findOrFail($no_kk);

        $request->validate([
            'alamat' => ['required', 'string', 'max:255'],
            'rt' => ['required', 'string', 'max:255'],
            'rw' => ['required', 'string', 'max:255'],
        ]);

        if ($request->no_kk != $item->no_kk) {
            $request->validate([
                'no_kk' => ['required', 'string', 'max:255', 'unique:keluargas'],
            ]);
        }

        $item->no_kk = $request->no_kk;
        $item->alamat = $request->alamat;
        $item->rt = $request->rt;
        $item->rw = $request->rw;
        $item->is_miskin = $request->is_miskin;
        $item->is_pindah = $request->is_pindah;
        $item->is_pendatang = $request->is_pendatang;
        $item->save();

        return redirect()->route('data-penduduk.create-anggota', $request->no_kk)->with('success', 'Berhasil Mengubah Data Keluarga');
    }

    public function store_anggota(Request $request, $no_kk)
    {
        $request->validate([
            'nik' => ['required', 'string', 'max:255', 'unique:anggota_keluargas'],
            'nama' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'agama' => ['required', 'string', 'max:255'],
            'pendidikan' => ['required', 'string', 'max:255'],
            'pekerjaan' => ['required', 'string', 'max:255'],
            'status_perkawinan' => ['required', 'in:Kawin,Belum Kawin,Cerai Hidup,Cerai Mati'],
            'status_hubungan' => ['required', 'in:Suami,Istri,Menantu,Anak,Cucu,Orang Tua,Mertua,Famili Lain,Pembantu'],
            'urutan' => ['required', 'numeric'],
        ]);

        AnggotaKeluarga::create([
            'nik' => $request->nik,
            'no_kk' => $no_kk,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'status_perkawinan' => $request->status_perkawinan,
            'status_hubungan' => $request->status_hubungan,
            'urutan' => $request->urutan,
        ]);

        return redirect()->route('data-penduduk.create-anggota', $request->no_kk)->with('success', 'Berhasil Menambah Anggota');
    }

    public function update_anggota(Request $request, $nik)
    {
        $item = AnggotaKeluarga::findOrFail($nik);

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'agama' => ['required', 'string', 'max:255'],
            'pendidikan' => ['required', 'string', 'max:255'],
            'pekerjaan' => ['required', 'string', 'max:255'],
            'status_perkawinan' => ['required', 'in:Kawin,Belum Kawin,Cerai Hidup,Cerai Mati'],
            'status_hubungan' => ['required', 'in:Suami,Istri,Menantu,Anak,Cucu,Orang Tua,Mertua,Famili Lain,Pembantu'],
            'urutan' => ['required', 'numeric'],
        ]);

        if ($request->nik != $item->nik) {
            $request->validate([
                'nik' => ['required', 'string', 'max:255', 'unique:anggota_keluargas'],
            ]);
        }

        $item->nama = $request->nama;
        $item->nik = $request->nik;
        $item->tempat_lahir = $request->tempat_lahir;
        $item->tanggal_lahir = $request->tanggal_lahir;
        $item->jenis_kelamin = $request->jenis_kelamin;
        $item->agama = $request->agama;
        $item->pendidikan = $request->pendidikan;
        $item->pekerjaan = $request->pekerjaan;
        $item->status_perkawinan = $request->status_perkawinan;
        $item->status_hubungan = $request->status_hubungan;
        $item->urutan = $request->urutan;
        $item->save();

        return redirect()->route('data-penduduk.create-anggota', $item->no_kk)->with('success', 'Berhasil Mengubah Anggota');
    }

    public function destroy($no_kk)
    {
        $item = Keluarga::findOrFail($no_kk);

        AnggotaKeluarga::where('no_kk', $no_kk)->delete();
        $item->delete();

        return redirect()->route('data-penduduk.index', 'semua-penduduk')->with('success', 'Berhasil Menghapus Data Keluarga');
    }

    public function destroy_anggota($nik)
    {
        $item = AnggotaKeluarga::findOrFail($nik);

        $no_kk = $item->no_kk;

        $item->delete();

        return redirect()->route('data-penduduk.create-anggota', $no_kk)->with('success', 'Berhasil Menghapus Anggota');
    }

    public function change_keluarga(Request $request, $tipe)
    {
        $item = Keluarga::findOrFail($request->penduduk);

        if ($tipe == 'penduduk-miskin') {
            $item->is_miskin = '1';
        }elseif ($tipe == 'penduduk-pindah') {
            $item->is_pindah = '1';
        }elseif ($tipe == 'penduduk-pendatang') {
            $item->is_pendatang = '1';
        }

        $item->save();

        if ($tipe == 'penduduk-miskin') {
            return redirect()->route('data-penduduk.index', 'penduduk-miskin')->with('success', 'Berhasil Menambah Penduduk Miskin');
        }elseif ($tipe == 'penduduk-pindah') {
            return redirect()->route('data-penduduk.index', 'penduduk-pindah')->with('success', 'Berhasil Menambah Penduduk Pindah');
        }elseif ($tipe == 'penduduk-pendatang') {
            return redirect()->route('data-penduduk.index', 'penduduk-pendatang')->with('success', 'Berhasil Menambah Penduduk Pendatang');
        }
    }

    public function export_semua_penduduk()
    {
        return Excel::download(new SemuaPendudukExport, 'data-semua-penduduk.xlsx');
    }

    public function export_penduduk_miskin()
    {
        return Excel::download(new PendudukMiskinExport, 'data-penduduk-miskin.xlsx');
    }

    public function export_penduduk_pindah()
    {
        return Excel::download(new PendudukPindahExport, 'data-penduduk-pindah.xlsx');
    }

    public function export_penduduk_pendatang()
    {
        return Excel::download(new PendudukPendatangExport, 'data-penduduk-pendatang.xlsx');
    }
}
