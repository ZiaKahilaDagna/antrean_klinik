<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Antrian;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antrian = Antrian::all();
        return view('antrian.index', compact('antrian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('antrian.create');
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
            'kode_antrian' => 'required|string|max:20|unique:antrian,kode_antrian',
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'jadwal_id' => 'required|exists:jadwal,id',
            'keluhan' => 'nullable|string',
            'waktu_daftar' => 'required|date_format:Y-m-d H:i:s'
        ]);

        Antrian::create([
            'kode_antrian' => $request->kode_antrian,
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'jadwal_id' => $request->jadwal_id,
            'keluhan' => $request->keluhan,
            'waktu_daftar' => $request->waktu_daftar,
        ]);

        return redirect()->route('antrian.index');
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
        return view('antrian.edit', compact('dataeditantrian'));
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
            'kode_antrian' => 'required|string|max:20|unique:antrian,kode_antrian',
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'jadwal_id' => 'required|exists:jadwal,id',
            'keluhan' => 'nullable|string',
            'waktu_daftar' => 'required|date_format:Y-m-d H:i:s'
        ]);

        $updatedata = Antrian::findOrFail($id);


         $updatedata->update([
            'kode_antrian' => $request->kode_antrian,
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'jadwal_id' => $request->jadwal_id,
            'keluhan' => $request->keluhan,
            'waktu_daftar' => $request->waktu_daftar,
         ]);

        return redirect()->route('antrian.index');
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
        return redirect()->route('antrian.index');
    }
}
