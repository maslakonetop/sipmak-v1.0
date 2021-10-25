<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karangsuci;
use App\Models\Kerkoff;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    public function index()
    {
        // $tahuns = DB::table('karangsucis')
        //     ->select(DB::raw('year(ijinmulai)'))
        //     ->distinct()
        //     ->get();
        // dd($tahuns);
        return view('keuangan.index', [
            'judul' => 'Laporan Keuangan',
            'tahuns' => Karangsuci::select(Karangsuci::raw('year(ijinmulai)'))
                ->distinct()
                ->get()
        ]);
    }
}
