<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pengguna = DB::table('data_models')
        //     ->join('id_pengguna', 'penggunas.nama_pengguna', '=', 'data_models.nama_pemohon')
        //     ->join('nama_pengguna', 'penggunas.nama_pengguna', '=', 'data_models.nama_pemohon')
        //     ->select('data_models.*', 'penggunas.id', 'penggunas.nama_pengguna')
        //     ->get();
        // dd($pengguna);
        return view('ijin.create', [
            'judul' => 'Buat Ijin Baru'
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataModel  $dataModel
     * @return \Illuminate\Http\Response
     */
    public function show(DataModel $dataModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataModel  $dataModel
     * @return \Illuminate\Http\Response
     */
    public function edit(DataModel $dataModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataModel  $dataModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataModel $dataModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataModel  $dataModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataModel $dataModel)
    {
        //
    }
}
