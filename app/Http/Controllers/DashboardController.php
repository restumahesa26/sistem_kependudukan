<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\Keluarga;
use App\Models\PendudukMeninggal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $semua_penduduk = AnggotaKeluarga::join('keluargas AS keluarga', 'keluarga.no_kk', '=', 'anggota_keluargas.no_kk')->where('keluarga.is_pindah', '!=', '1')->count();
        $miskin = Keluarga::where('is_miskin', '1')->count();
        $pindah = Keluarga::where('is_pindah', '1')->count();
        $pendatang = Keluarga::where('is_pendatang', '1')->count();
        $meninggal = PendudukMeninggal::count();

        return view('pages.dashboard')->with(compact('semua_penduduk','miskin','pindah','pendatang','meninggal'));
    }

    public function edit_profile()
    {
        $item = User::findOrFail(Auth::user()->id);

        return view('pages.profile', [
            'item' => $item
        ]);
    }

    public function update_profile(Request $request)
    {
        $item = User::findOrFail(Auth::user()->id);

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
        ]);

        if ($item->email != $request->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        $item->nama = $request->nama;
        $item->email = $request->email;
        if ($request->password) {
            $item->password = Hash::make($request->password);
        }
        $item->save();

        return redirect()->route('profile.edit')->with('success', 'Berhasil Mengubah Profile');
    }

    public function laporan()
    {
        return view('pages.laporan.index');
    }
}
