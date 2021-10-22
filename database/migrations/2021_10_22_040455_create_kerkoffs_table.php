<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerkoffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerkoffs', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 2);
            $table->string('nobuku_plat');
            $table->string('id_pemohon')->nullable();
            $table->text('nama_pemohon');
            $table->text('nama_jenazah', 200);
            $table->date('lahir_jenazah');
            $table->date('wafat_jenazah');
            $table->string('usia', 5);
            $table->text('lokasimakam1');
            $table->text('lokasimakam2');
            $table->date('ijinmulai');
            $table->date('expired');
            $table->string('bayar');
            $table->string('statusbayar');
            $table->string('keterangan');
            $table->string('statusijin');
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
        Schema::dropIfExists('kerkoffs');
    }
}
