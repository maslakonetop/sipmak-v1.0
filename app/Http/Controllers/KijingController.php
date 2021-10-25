<?php

namespace App\Http\Controllers;

use App\Models\Kijing;
use Illuminate\Http\Request;

class KijingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kijing.index', [
            'judul' => 'List Ijin Kijing',
            'data' => Kijing::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kijing.create', [
            'judul' => 'Ijin Kijing Baru',
            'data' => Kijing::whereYear('ijinmulai', '2021')
                ->count('nobuku_plat')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $request->validate([
            'kode' => 'required',
            'nobuku_plat' => 'required',
            'nama_pemohon' => 'required',
            'nama_jenazah' => 'required',
            'lahir_jenazah' => 'required',
            'wafat_jenazah' => 'required',
            'usia' => 'required',
            'ijinmulai' => 'required',
            'expired' => 'required',
            'bayar' => 'required',
            'statusbayar' => 'required',
            'keterangan' => 'required',
            'statusijin' => 'required',
            'lokasimakam1' => 'required',
            'lokasimakam2' => 'required',

        ]);
        // dd($rules);

        Kijing::create($rules);

        return redirect('/kijing/create')->with('berhasil', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kijing  $kijing
     * @return \Illuminate\Http\Response
     */
    public function show(Kijing $kijing)
    {
        return view('kijing.detail', [
            'judul' => 'Detail User',
            'data' => $kijing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kijing  $kijing
     * @return \Illuminate\Http\Response
     */
    public function edit(Kijing $kijing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kijing  $kijing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kijing $kijing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kijing  $kijing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kijing $kijing)
    {
        //
    }
}
