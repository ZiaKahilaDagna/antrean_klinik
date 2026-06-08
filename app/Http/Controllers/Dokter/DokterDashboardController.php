<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Antrian;

class DokterDashboardController extends Controller
{
    public function dashboard()
{
    $dokter = auth()->user()->dokter_id;

    $antrianHariIni = Antrian::with('pasien')  
        ->where('dokter_id', $dokter)
        ->whereDate('waktu_daftar', today())
        ->orderBy('waktu_daftar', 'asc')
        ->get();

    $totalAntrian = Antrian::where('dokter_id', $dokter)->count();  
    $antrianMenunggu = Antrian::where('dokter_id', $dokter)  
        ->where('status', 'menunggu')
        ->count();
    $antrianDipanggil = Antrian::where('dokter_id', $dokter)  
        ->where('status', 'dipanggil')
        ->count();
    $antrianSelesai = Antrian::where('dokter_id', $dokter)  
        ->where('status', 'selesai')
        ->count();

    return view('dokter.dashboard', compact(  
        'antrianHariIni',    
        'totalAntrian',      
        'antrianMenunggu',   
        'antrianDipanggil',  
        'antrianSelesai'     
    ));
}
}