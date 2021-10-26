<?php

namespace App\Http\Controllers;

use App\Models\Karangsuci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // dd($karangsuci);
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
        $update = [
            'kode' => $karangsuci->kode,
            'nobuku_plat' => $karangsuci->nobuku_plat,
            'nama_pemohon' => $karangsuci->nama_pemohon,
            'nama_jenazah' => $karangsuci->nama_jenazah,
            'lahir_jenazah' => $karangsuci->lahir_jenazah,
            'wafat_jenazah' => $karangsuci->wafat_jenazah,
            'usia' => $karangsuci->usia,
            'ijinmulai' => $karangsuci->ijinmulai,
            'expired' => $karangsuci->expired,
            'bayar' => $karangsuci->bayar,
            'statusbayar' => $karangsuci->statusbayar,
            'keterangan' => $karangsuci->keterangan,
            'statusijin' => $karangsuci->statusijin,
            'lokasimakam1' => $karangsuci->lokasimakam1,
            'lokasimakam2' => $karangsuci->lokasimakam2,
        ];
        Karangsuci::find($karangsuci->id)
            ->update($update);

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

    public function pemutihan()
    {
        return view('pemutihan.karangsuci.index', [
            'judul' => 'Pemutihan Ijin Karang Suci',
            'tabel' => Karangsuci::all(),
            'data' => Karangsuci::where('statusijin', '=', 'EXPIRED')
                ->paginate(7)
        ]);
    }

    public function autocompleteKarangsuci(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Karangsuci::where('nama_jenazah', 'LIKE', '%' . $query . '%')
            ->orwhere('nama_pemohon', 'LIKE', '%' . $query . '%')
            ->get();
        return response()->json($filterResult);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $jenazah = DB::table('karangsucis')
            ->where('nama_jenazah', 'like', "%" . $cari . "%")
            ->where('statusijin', '=', 'EXPIRED')
            ->paginate();

        // mengirim data pegawai ke view index
        return view('pemutihan.karangsuci.index', [
            'data' => $jenazah,
            'judul' => 'Pemutihan Ijin Karang Suci'

        ]);
    }
    public function form(Karangsuci $karangsuci)
    {
        $bayar = DB::table('Karangsucis')
            ->distinct('statusbayar')
            ->get();
        return view('pemutihan.karangsuci.form', [
            'judul' => 'Form Pemutihan Makam Karang Suci',
            'data' => $karangsuci,
            'duit' => $bayar
        ]);
    }
    public function perbaharui(Karangsuci $karangsuci)
    {
        $update = [
            'kode' => $karangsuci->kode,
            'nobuku_plat' => $karangsuci->nobuku_plat,
            'nama_pemohon' => $karangsuci->nama_pemohon,
            'nama_jenazah' => $karangsuci->nama_jenazah,
            'lahir_jenazah' => $karangsuci->lahir_jenazah,
            'wafat_jenazah' => $karangsuci->wafat_jenazah,
            'usia' => $karangsuci->usia,
            'ijinmulai' => $karangsuci->ijinmulai,
            'expired' => $karangsuci->expired,
            'bayar' => $karangsuci->bayar,
            'statusbayar' => $karangsuci->statusbayar,
            'keterangan' => $karangsuci->keterangan,
            'statusijin' => $karangsuci->statusijin,
            'lokasimakam1' => $karangsuci->lokasimakam1,
            'lokasimakam2' => $karangsuci->lokasimakam2,
        ];
        Karangsuci::find($karangsuci->id)
            ->update($update);

        return redirect('/pemutihan/karangsuci')->with('berhasil', 'Data Berhasil Diupdate');
    }
    public function carikarangsuci(Request $request)
    {
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $jenazah = DB::table('karangsucis')
            ->where('nama_jenazah', 'like', "%" . $cari . "%")
            ->orWhere('nama_pemohon', 'LIKE', "%" . $cari . "%")
            ->paginate();

        // mengirim data pegawai ke view index
        return view('karangsuci.index', [
            'data' => $jenazah,
            'judul' => 'List Ijin Makam Karang Suci'

        ]);
    }
}
