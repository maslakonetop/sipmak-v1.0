<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->text('nama_pemohon', 200);
            $table->string('NIK');
            $table->string('nohp');
            $table->string('email');
            $table->string('password');
            $table->text('alamat', 200);
            $table->text('kecamatan', 100);
            $table->text('kelurahan', 100);
            $table->text('filektp');
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
        Schema::dropIfExists('penggunas');
    }
}
