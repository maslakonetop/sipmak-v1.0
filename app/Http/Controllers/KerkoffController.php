<?php

namespace App\Http\Controllers;

use App\Models\Kerkoff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return redirect('/kerkoff')->with('berhasil', 'User berhasil dihapus!');
    }
    public function carikerkoff(Request $request)
    {

        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $jenazah = DB::table('kerkoffs')
            ->where('nama_jenazah', 'like', "%" . $cari . "%")
            ->orWhere('nama_pemohon', 'LIKE', "%" . $cari . "%")
            ->paginate();

        // mengirim data pegawai ke view index
        return view('kerkoff.index', [
            'data' => $jenazah,
            'judul' => 'List Ijin Makam Karang Suci'
        ]);
    }
    public function pemutihan()
    {
        return view('pemutihan.kerkoff.index', [
            'judul' => 'Pemutihan Ijin Karang Suci',
            'tabel' => Kerkoff::all(),
            'data' => Kerkoff::where('statusijin', '=', 'EXPIRED')
                ->paginate(7)
        ]);
    }
    public function autocompleteKarangsuci(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Kerkoff::where('nama_jenazah', 'LIKE', '%' . $query . '%')
            ->orwhere('nama_pemohon', 'LIKE', '%' . $query . '%')
            ->get();
        return response()->json($filterResult);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $jenazah = DB::table('kerkoffs')
            ->where('nama_jenazah', 'like', "%" . $cari . "%")
            ->where('statusijin', '=', 'EXPIRED')
            ->paginate();

        // mengirim data pegawai ke view index
        return view('pemutihan.kerkoff.index', [
            'data' => $jenazah,
            'judul' => 'Pemutihan Ijin Karang Suci'

        ]);
    }
    public function form(Kerkoff $kerkoff)
    {
        $bayar = DB::table('Kerkoffs')
            ->distinct('statusbayar')
            ->get();
        return view('pemutihan.kerkoff.form', [
            'judul' => 'Form Pemutihan Makam Kerkoff / TP Arimatea',
            'data' => $kerkoff,
            'duit' => $bayar
        ]);
    }
    public function perbaharui(Kerkoff $kerkoff)
    {
        $update = [
            'kode' => $kerkoff->kode,
            'nobuku_plat' => $kerkoff->nobuku_plat,
            'nama_pemohon' => $kerkoff->nama_pemohon,
            'nama_jenazah' => $kerkoff->nama_jenazah,
            'lahir_jenazah' => $kerkoff->lahir_jenazah,
            'wafat_jenazah' => $kerkoff->wafat_jenazah,
            'usia' => $kerkoff->usia,
            'ijinmulai' => $kerkoff->ijinmulai,
            'expired' => $kerkoff->expired,
            'bayar' => $kerkoff->bayar,
            'statusbayar' => $kerkoff->statusbayar,
            'keterangan' => $kerkoff->keterangan,
            'statusijin' => $kerkoff->statusijin,
            'lokasimakam1' => $kerkoff->lokasimakam1,
            'lokasimakam2' => $kerkoff->lokasimakam2,
        ];
        kerkoff::find($kerkoff->id)
            ->update($update);

        return redirect('/pemutihan/kerkoff')->with('berhasil', 'Data Berhasil Diupdate');
    }
}
