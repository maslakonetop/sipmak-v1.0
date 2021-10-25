<?php

namespace App\Http\Controllers;

use App\Models\Karangsuci;
use App\Models\PembayaranModel;
use Illuminate\Http\Request;

class PembayaranModelController extends Controller
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
        //
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
     * @param  \App\Models\PembayaranModel  $pembayaranModel
     * @return \Illuminate\Http\Response
     */
    public function show(PembayaranModel $pembayaranModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembayaranModel  $pembayaranModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PembayaranModel $pembayaranModel)
    {
        dd($pembayaranModel);
        return view('pembayaran.karangsuci.prosesbayar', [
            'judul' => 'Proses Bayar Pemutihan Karangsuci',
            'data' => Karangsuci::where('id', '=', '$pembayaranModel->id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PembayaranModel  $pembayaranModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembayaranModel $pembayaranModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembayaranModel  $pembayaranModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembayaranModel $pembayaranModel)
    {
        //
    }
}
