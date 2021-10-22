<?php

namespace App\Http\Controllers;

use App\Models\Kerkoff;
use Illuminate\Http\Request;

class KerkoffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kerkoff.index', [
            'judul' => 'List Ijin Makam TPA Kerkoff / Arimatea',
            'data' => Kerkoff::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kerkoff.create', [
            'judul' => 'Data Ijin Baru Kerkoff',
            'data' => Kerkoff::whereYear('ijinmulai', '2021')
                ->max('nobuku_plat')
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
        // dd($request);
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

        Kerkoff::create($rules);

        return redirect('/kerkoff/create')->with('berhasil', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kerkoff  $kerkoff
     * @return \Illuminate\Http\Response
     */
    public function show(Kerkoff $kerkoff)
    {
        return view('kerkoff.detail', [
            'judul' => 'Detail User',
            'data' => $kerkoff
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kerkoff  $kerkoff
     * @return \Illuminate\Http\Response
     */
    public function edit(Kerkoff $kerkoff)
    {
        return view('kerkoff.edit', [
            'judul' => 'Edit Ijin Karang Suci',
            'data' => $kerkoff
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kerkoff  $kerkoff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kerkoff $kerkoff)
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

        Kerkoff::where('id', $kerkoff->id)
            ->update($rules);

        return redirect('/kerkoff')->with('berhasil', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kerkoff  $kerkoff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kerkoff $kerkoff)
    {
        Kerkoff::destroy($kerkoff->id);
        return redirect('/karangsuci')->with('berhasil', 'User berhasil dihapus!');
    }
}
