<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Spesialis;
use App\Dokter;
use App\Pasien;
use App\Antrian;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        // Statistik untuk card
        $spesialis = Spesialis::count();
        $dokter = Dokter::count();
        $pasien = Pasien::count();
        $antrian = Antrian::whereDate('created_at', today())->count();
        
        // Antrian terbaru (5 data terakhir)
        $antrianTerbaru = Antrian::with(['pasien', 'dokter'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('spesialis', 'dokter', 'pasien', 'antrian', 'antrianTerbaru'));
    }
}