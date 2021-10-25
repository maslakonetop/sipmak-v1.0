<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerkoff;
use App\Models\Karangsuci;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function krijinbaru()
    {
        return view('pembayaran.karangsuci.ijinbaru', [
            'judul' => 'Pembayaran Ijin Baru untuk Makam Karang Suci',
            'data' => Karangsuci::where('statusijin', '=', 'IJIN BARU')
                ->where('statusbayar', '=', 'Belum Bayar')
                ->paginate(7)
        ]);
    }
    public function krpemutihan()
    {
        return view('pembayaran.karangsuci.pemutihan', [
            'judul' => 'Pembayaran Ijin Baru untuk Makam Karang Suci',
            'data' => Karangsuci::where('statusijin', '=', 'PEMUTIHAN')
                ->where('statusbayar', '=', 'Belum Bayar')
                ->paginate(7)
        ]);
    }
    public function krcaribaru(Request $request)
    {
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $jenazah = DB::table('karangsucis')
            ->where('nama_jenazah', 'like', "%" . $cari . "%")
            ->where('statusijin', '=', 'PEMUTIHAN')
            ->paginate();

        // mengirim data pegawai ke view index
        return view('pembayaran.karangsuci.ijinbaru', [
            'data' => $jenazah,
            'judul' => 'Pemutihan Ijin Karang Suci'

        ]);
    }
    public function krcaripemutihan(Request $request)
    {
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $jenazah = DB::table('karangsucis')
            ->where('nama_jenazah', 'like', "%" . $cari . "%")
            ->where('statusijin', '=', 'PEMUTIHAN')
            ->paginate();

        // mengirim data pegawai ke view index
        return view('pembayaran.karangsuci.pemutihan', [
            'data' => $jenazah,
            'judul' => 'Pemutihan Ijin Karang Suci'

        ]);
    }
    public function krformbayarpemutihan(Karangsuci $karangsuci)
    {
        $bayar = DB::table('Karangsucis')
            ->distinct('statusbayar')
            ->get();
        return view('pembayaran.karangsuci.form', [
            'judul' => 'Form Pemutihan Makam Karang Suci',
            'data' => $karangsuci,
            'duit' => $bayar
        ]);
    }
    public function krpemutihanupdate(Karangsuci $karangsuci)
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
        // dd($update);
        Karangsuci::find($karangsuci->id)
            ->update($update);

        return redirect('/prosesbayar/($karangsuci->id)/edit')->with('berhasil', 'Data Berhasil Diupdate');
    }
}
