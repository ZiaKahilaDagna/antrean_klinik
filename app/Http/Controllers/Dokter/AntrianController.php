<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Antrian;

class AntrianController extends Controller
{
    public function index()
    {
        $dokterId = auth()->user()->dokter_id;
        
        $antrian = Antrian::with('pasien')
            ->where('dokter_id', $dokterId)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('dokters.antrian.index', compact('antrian'));  // ← BENAR
    }

    public function show($id)
    {
        $dokterId = auth()->user()->dokter_id;
        
        $antrian = Antrian::with('pasien', 'dokter', 'jadwal')
            ->where('dokter_id', $dokterId)
            ->findOrFail($id);
        
        return view('dokters.antrian.show', compact('antrian'));  // ← BENAR
    }

    public function panggil($id)
    {
        $antrian = Antrian::findOrFail($id);
        $antrian->status = 'dipanggil;';
        $antrian->waktu_panggil = now();
        $antrian->save();

        return redirect()->route('dokter.antrian.index')->with('success', 'Pasien berhasil dipanggil!');
    }

    public function selesai($id)
    {
        $antrian = Antrian::findOrFail($id);
        $antrian->status = 'selesai';
        $antrian->save();

        return redirect()->route('dokter.antrian.index')->with('success', 'Pasien selesai dilayani!');
    }
}