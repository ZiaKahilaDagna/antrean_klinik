<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dokter;
use App\Spesialis;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::with('spesialis')->get();
        return view('admin.dokter.index', compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spesialis = Spesialis::all();
        return view('admin.dokter.create', compact('spesialis'));
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
            'name' => 'required|string',
            'spesialis_id' => 'required|exists:spesialis,id',
             'no_hp' => 'required|string|max:15',
        ]);

        Dokter::create([
            'name' => $request->name,
            'spesialis_id' => $request->spesialis_id,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('admin.dokter.index');
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
        $dataeditdokter = Dokter::find($id);
        $spesialis = Spesialis::all();
        return view('admin.dokter.edit', compact('dataeditdokter', 'spesialis'));
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
            'name' => 'required|string',
            'spesialis_id' => 'required|exists:spesialis,id',
            'no_hp' => 'required|string|max:15'
        ]);

        $updatedata = Dokter::findOrFail($id);


         $updatedata->update([
            'name' => $request->name,
            'spesialis_id' => $request->spesialis_id,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('admin.dokter.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dokter::where('id', $id)->delete();
        return redirect()->route('admin.dokter.index');
    }
}
