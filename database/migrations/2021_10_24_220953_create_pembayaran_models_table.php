<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_models', function (Blueprint $table) {
            $table->id();
            $table->string('nobuku_plat');
            $table->string('nama_pemohon');
            $table->string('nama_jenazah');
            $table->string('usia');
            $table->string('lokasimakam1');
            $table->string('bayar');
            $table->string('statusbayar');
            $table->string('metodebayar');
            $table->date('tanggalpelunasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_models');
    }
}
