<?php

namespace App\Http\Controllers;

use App\Models\Karangsuci;
use Illuminate\Http\Request;

class KarangsuciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('karangsuci.index', [
            'judul' => 'List Ijin Makam Karang Suci',
            'data' => Karangsuci::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karangsuci.create', [
            'judul' => 'Ijin Baru Karang Suci',
            'data' => Karangsuci::whereYear('ijinmulai', '2021')
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

        Karangsuci::create($rules);

        return redirect('/karangsuci/create')->with('berhasil', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karangsuci  $karangsuci
     * @return \Illuminate\Http\Response
     */
    public function show(Karangsuci $karangsuci)
    {
        return view('karangsuci.detail', [
            'judul' => 'Detail User',
            'data' => $karangsuci
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karangsuci  $karangsuci
     * @return \Illuminate\Http\Response
     */
    public function edit(Karangsuci $karangsuci)
    {
        return view('karangsuci.edit', [
            'judul' => 'Edit Ijin Karang Suci',
            'data' => $karangsuci
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karangsuci  $karangsuci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karangsuci $karangsuci)
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

        Karangsuci::where('id', $karangsuci->id)
            ->update($rules);

        return redirect('/karangsuci')->with('berhasil', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karangsuci  $karangsuci
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karangsuci $karangsuci)
    {
        Karangsuci::destroy($karangsuci->id);
        return redirect('/karangsuci')->with('berhasil', 'User berhasil dihapus!');
    }
}
