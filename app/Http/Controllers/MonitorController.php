<?php

namespace App\Http\Controllers;

use App\Antrian;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function index()
    {
        $antrian = Antrian::with('pasien', 'dokter')
            ->whereDate('created_at', today())
            ->where('status', '!=', 'selesai')
            ->orderBy('created_at', 'asc')
            ->get();

        $dipanggil = Antrian::with('pasien', 'dokter')
            ->whereDate('created_at', today())
            ->where('status', 'dipanggil;')
            ->first();

        return view('monitor.index', compact('antrian', 'dipanggil'));
    }
}