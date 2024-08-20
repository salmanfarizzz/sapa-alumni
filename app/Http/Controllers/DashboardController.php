<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Mitra;
use App\Models\User;
use App\Models\Lowongan;
use App\Models\Kategori;
use App\Models\Jenis_Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $user = auth()->user();

        // $berita_count   = User  ::where('role', '=', 'pusat karir')->get()->count();
        // $mitra_count    = User    ::where('role', '=', 'pusat karir')->get()->count();
        // $lowongan_count = User ::where('role', '=', 'pusat karir')->get()->count();

        // Menentukan apakah user adalah alumni
        $is_alumni = $user->role == 'alumni';

        // Hanya hitung statistik jika user bukan alumni
        $berita_count = $is_alumni ? 0 : Artikel::count();
        $mitra_count = $is_alumni ? 0 : Mitra::count();
        $lowongan_count = $is_alumni ? 0 : Lowongan::count();
        $kategori_count = $is_alumni ? 0 : Kategori::count();
        $jenis_count = $is_alumni ? 0 : Jenis_Mitra::count();

        return view('pages.backend.dashboard')->with([
            'user' => $user,
            'berita_count' => $berita_count,
            'mitra_count' => $mitra_count,
            'lowongan_count' => $lowongan_count,
            'is_alumni' => $is_alumni,
            'kategori_count' => $kategori_count,
            'jenis_count' => $jenis_count,
        ]);
    }
}
