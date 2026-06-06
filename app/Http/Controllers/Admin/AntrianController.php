<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Antrian;
use App\Pasien;  
use App\Dokter;  
use App\Jadwal; 

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antrian = Antrian::with('dokter', 'pasien', 'jadwal')->get();
        return view('admin.antrian.index', compact('antrian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();    
        $dokter = Dokter::all();     
        $jadwal = Jadwal::all();     
        
        return view('admin.antrian.create', compact('pasien', 'dokter', 'jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           // 'kode_antrian' => 'required|string|max:20|unique:antrian,kode_antrian',
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'jadwal_id' => 'required|exists:jadwal,id',
            'keluhan' => 'nullable|string',
            //'waktu_daftar' => 'required|date_format:Y-m-d H:i:s'
        ]);

        // Buat kode antrian otomatis
        $lastId = Antrian::max('id');
        $nomorUrut = $lastId + 1;
        $kodeAntrian = 'A' . str_pad($nomorUrut, 3, '0', STR_PAD_LEFT);

        Antrian::create([
            'kode_antrian' => $kodeAntrian,
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'jadwal_id' => $request->jadwal_id,
            'keluhan' => $request->keluhan,
            'waktu_daftar' => now(),
        ]);

        return redirect()->route('admin.antrian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataeditantrian = Antrian::find($id);
        $dokter = Dokter::all();      
        $pasien = Pasien::all();      
        $jadwal = Jadwal::all();
    
        return view('admin.antrian.edit', compact('dataeditantrian', 'dokter', 'pasien', 'jadwal'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            //'kode_antrian' => 'required|string|max:20|unique:antrian,kode_antrian,' .$id,
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'jadwal_id' => 'required|exists:jadwal,id',
            'keluhan' => 'nullable|string',
            'status' => 'required|in:menunggu,dipanggil,selesai,batal',
            //'waktu_daftar' => 'required|date_format:Y-m-d H:i:s'
        ]);

        $updatedata = Antrian::findOrFail($id);


         $updatedata->update([
            //'kode_antrian' => $request->kode_antrian,
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'jadwal_id' => $request->jadwal_id,
            'keluhan' => $request->keluhan,
            'status' => $request->status,
            //'waktu_daftar' => $request->waktu_daftar,
         ]);

        return redirect()->route('admin.antrian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Antrian::where('id', $id)->delete();
        return redirect()->route('admin.antrian.index');
    }

    public function panggil($id)
    {
        $antrian = Antrian::findOrFail($id);
        $antrian->status = 'dipanggil;';
        $antrian->waktu_panggil = now();
        $antrian->save();

        return redirect()->route('admin.antrian.index')->with('success', 'Pasien berhasil dipanggil!');
    }
}
