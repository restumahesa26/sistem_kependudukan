<?php

namespace App\Http\Controllers;

use App\Exports\PendudukMiskinExport;
use App\Exports\PendudukMiskinYearExport;
use App\Exports\PendudukPendatangExport;
use App\Exports\PendudukPendatangYearExport;
use App\Exports\PendudukPindahExport;
use App\Exports\PendudukPindahYearExport;
use App\Exports\SemuaPendudukExport;
use App\Exports\SemuaPendudukYearExport;
use App\Models\AnggotaKeluarga;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KeluargaController extends Controller
{
    public function index($tipe)
    {
        if ($tipe == 'semua-penduduk') {
            $items = Keluarga::latest('updated_at')->where('is_pindah', '!=', '1')->get();

            $datas = Keluarga::all();

            return view('pages.keluarga.index', [
                'items' => $items, 'tipe' => $tipe, 'datas' => $datas
            ]);
        }elseif ($tipe == 'penduduk-miskin') {
            $items = Keluarga::where('is_miskin', '1')->latest('updated_at')->get();

            $datas = Keluarga::all();

            $anggota = AnggotaKeluarga::join('keluargas AS keluarga', 'keluarga.no_kk', '=', 'anggota_keluargas.no_kk')->where('keluarga.is_miskin', '1')->where('anggota_keluargas.urutan', '!=', 1)->get();

            return view('pages.keluarga.index', [
                'items' => $items, 'tipe' => $tipe, 'datas' => $datas, 'anggotas' => $anggota
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
            'no_kk' => ['required', 'string', 'max:16', 'unique:keluargas', 'min:16'],
            'alamat' => ['required', 'string', 'max:30'],
            'rt' => ['required', 'string', 'max:5'],
            'rw' => ['required', 'string', 'max:5'],
            'is_miskin' => ['required'],
            'is_pindah' => ['required'],
            'is_pendatang' => ['required'],
        ]);

        Keluarga::create([
            'no_kk' => $request->no_kk,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'is_miskin' => $request->is_miskin,
            'is_pindah' => $request->is_pindah,
            'is_pendatang' => $request->is_pendatang,
            'tanggal_miskin' => $request->tanggal_miskin,
            'tanggal_pindah' => $request->tanggal_pindah,
            'tanggal_pendatang' => $request->tanggal_pendatang,
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
            'alamat' => ['required', 'string', 'max:30'],
            'rt' => ['required', 'string', 'max:5'],
            'rw' => ['required', 'string', 'max:5'],
            'is_miskin' => ['required'],
            'is_pindah' => ['required'],
            'is_pendatang' => ['required'],
        ]);

        if ($request->no_kk != $item->no_kk) {
            $request->validate([
                'no_kk' => ['required', 'string', 'max:16', 'unique:keluargas', 'min:16'],
            ]);
        }

        $item->no_kk = $request->no_kk;
        $item->alamat = $request->alamat;
        $item->rt = $request->rt;
        $item->rw = $request->rw;
        $item->is_miskin = $request->is_miskin;
        $item->is_pindah = $request->is_pindah;
        $item->is_pendatang = $request->is_pendatang;
        $item->tanggal_miskin = $request->tanggal_miskin;
        $item->tanggal_pindah = $request->tanggal_pindah;
        $item->tanggal_pendatang = $request->tanggal_pendatang;
        $item->save();

        return redirect()->route('data-penduduk.create-anggota', $request->no_kk)->with('success', 'Berhasil Mengubah Data Keluarga');
    }

    public function store_anggota(Request $request, $no_kk)
    {
        $request->validate([
            'nik' => ['required', 'string', 'max:16', 'unique:anggota_keluargas', 'min:16'],
            'nama' => ['required', 'string', 'max:40'],
            'tempat_lahir' => ['required', 'string', 'max:20'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'agama' => ['required', 'string', 'max:10'],
            'pendidikan' => ['required', 'string', 'max:25'],
            'pekerjaan' => ['required', 'string', 'max:25'],
            'status_perkawinan' => ['required', 'in:Kawin,Belum Kawin,Cerai Hidup,Cerai Mati'],
            'status_hubungan' => ['required', 'in:Suami,Istri,Menantu,Anak,Cucu,Orang Tua,Mertua,Famili Lain,Pembantu'],
            'urutan' => ['required', 'numeric']
        ]);

        $check = AnggotaKeluarga::where('no_kk', $no_kk)->where('urutan', $request->urutan)->first();

        if ($check != NULL) {
            return redirect()->back()->withInput()->with('error', 'Urutan Tersebut Telah Ada');
        }else {
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
    }

    public function update_anggota(Request $request, $nik)
    {
        $item = AnggotaKeluarga::findOrFail($nik);

        $request->validate([
            'nama' => ['required', 'string', 'max:40'],
            'tempat_lahir' => ['required', 'string', 'max:20'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'agama' => ['required', 'string', 'max:10'],
            'pendidikan' => ['required', 'string', 'max:25'],
            'pekerjaan' => ['required', 'string', 'max:25'],
            'status_perkawinan' => ['required', 'in:Kawin,Belum Kawin,Cerai Hidup,Cerai Mati'],
            'status_hubungan' => ['required', 'in:Suami,Istri,Menantu,Anak,Cucu,Orang Tua,Mertua,Famili Lain,Pembantu'],
            'urutan' => ['required', 'numeric']
        ]);

        if ($request->nik != $item->nik) {
            $request->validate([
                'nik' => ['required', 'string', 'max:16', 'unique:anggota_keluargas', 'min:16'],
            ]);
        }

        $check = AnggotaKeluarga::where('no_kk', $item->no_kk)->where('urutan', $request->urutan)->first();

        if ($check != NULL && $item->urutan != $request->urutan) {
            return redirect()->back()->withInput()->with('error', 'Urutan Tersebut Telah Ada');
        }else {
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

    public function export_penduduk_miskin(Request $request)
    {
        if ($request->year) {
            return Excel::download(new PendudukMiskinYearExport($request->year), 'data-penduduk-miskin-tahun-'. $request->year .'.xlsx');
        } else {
            return Excel::download(new PendudukMiskinExport, 'data-penduduk-miskin.xlsx');
        }
    }

    public function export_penduduk_pindah(Request $request)
    {
        if ($request->year) {
            return Excel::download(new PendudukPindahYearExport($request->year), 'data-penduduk-pindah-tahun-'. $request->year .'.xlsx');
        } else {
            return Excel::download(new PendudukPindahExport, 'data-penduduk-pindah.xlsx');
        }
    }

    public function export_penduduk_pendatang(Request $request)
    {
        if ($request->year) {
            return Excel::download(new PendudukPendatangYearExport($request->year), 'data-penduduk-pindah-tahun-'. $request->year .'.xlsx');
        } else {
            return Excel::download(new PendudukPendatangExport, 'data-penduduk-pindah.xlsx');
        }
    }

    public function cetak_sktm(Request $request)
    {
        $nik = $request->penduduk;

        $item = AnggotaKeluarga::where('nik', $nik)->first();

        $noKK = $item->no_kk;

        $check = Keluarga::where('no_kk', $noKK)->first();

        if ($check->is_miskin == '1') {
            return view('pages.keluarga.cetak-sktm', [
                'item' => $item,
                'nomor_surat' => $request->nomor_surat,
                'dari_rt_rw' => $request->dari_rt_rw,
                'nomor_surat_rt' => $request->nomor_surat_rt,
                'tanggal_surat_rt' => $request->tanggal_surat_rt,
                'fungsi' => $request->fungsi,
            ]);
        }else {
            return redirect()->route('data-penduduk.index', 'penduduk-miskin')->with('error', 'Bukan Keluarga Tidak Mampu');
        }
    }
}
