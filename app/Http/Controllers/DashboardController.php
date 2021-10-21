<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->guest()) {
            abort(403);
        }
        // $baru = DB::select('select * from data_models where statusijin="ijin baru"');
        // $pemutihan = DB::select('select * from data_models where statusijin="pemutihan"');
        // $expired = DB::select('select * from data_models where statusijin="expired"');
        return view('dashboard.index', [
            'judul' => 'Dasboard Petugas',
            'data' => DataModel::count('id'),
            'baru' => DataModel::where('statusijin', '=', 'IJIN BARU')->count(),
            'pemutihan' => DataModel::where('statusijin', '=', 'PEMUTIHAN')->count(),
            'expired' => DataModel::where('statusijin', '=', 'EXPIRED')->count(),
            'dewasa' => DataModel::where('keterangan', '=', 'DEWASA')->count(),
            'anak' => DataModel::where('keterangan', '=', 'ANAK')->count(),
            'tahun' => DataModel::where('ijinmulai', 'like', '2017%')->count(),
            'tahunsatu' => DataModel::where('ijinmulai', 'like', '2018%')->count(),
            'tahundua' => DataModel::where('ijinmulai', 'like', '2019%')->count(),
            'tahuntiga' => DataModel::where('ijinmulai', 'like', '2020%')->count(),
            'tahunempat' => DataModel::where('ijinmulai', 'like', '2021%')->count(),
            'karangsuci' => DataModel::where('lokasimakam1', '=', 'TPU KARANG SUCI KELURAHAN DONAN')->count(),
            'kerkoff' => DataModel::where('lokasimakam1', '=', 'Taman Pemakaman Arimathea / Kerkop')->count()
        ]);
    }

    public function profil()
    {
        return view('dashboard.profil', [
            'judul' => 'Profil Saya',
            'users' => User::where('id', auth()->user()->id)->get()
        ]);
    }
}
