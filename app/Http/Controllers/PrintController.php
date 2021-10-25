<?php

namespace App\Http\Controllers;

use App\Models\Karangsuci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintController extends Controller
{
    public function krijinbaruindex()
    {
        return view('cetak.karangsuci.ijinbaruindex', [
            'judul' => 'List Ijin Baru Karang Suci',
            'data' => Karangsuci::where('statusijin', '=', 'Ijin Baru')
                ->paginate(10)
        ]);
    }
    public function krijinbarucari(Request $request)
    {
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $jenazah = DB::table('karangsucis')
            ->where('nama_jenazah', 'like', "%" . $cari . "%")
            ->where('nama_pemohon', 'like', "%" . $cari . "%")
            ->where('statusijin', '=', 'Ijin Baru')
            ->paginate();

        // mengirim data pegawai ke view index
        return view('pemutihan.karangsuci.index', [
            'data' => $jenazah,
            'judul' => 'Pemutihan Ijin Karang Suci'

        ]);
    }
    public function krijinbarucetak(Karangsuci $karangsuci)
    {
        // dd($karangsuci);
        return view('cetak.karangsuci.cetakijinbaru', [
            'judul' => 'Cetak Ijin Baru Karang Suci',
            'data' => $karangsuci
        ]);
    }
}
