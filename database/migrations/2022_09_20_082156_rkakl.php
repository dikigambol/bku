<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rkakl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rkakl', function (Blueprint $table) {
            $table->id();
            $table->string('id_import');
            $table->string('id_parent');
            $table->string('string_id');
            $table->string('kode');
            $table->string('hie1');
            $table->string('hie2');
            $table->string('hie3');
            $table->string('hie4');
            $table->string('hie5');
            $table->string('hie6');
            $table->string('hie7');
            $table->string('hie8');
            $table->string('desc');
            $table->string('vol');
            $table->string('harga');
            $table->string('jumlah');
            $table->string('sb');
            $table->string('sdcp');
            $table->string('realisasi')->nullable();
            $table->string('sisa')->nullable();
            $table->string('pengajuan')->nullable();
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
        Schema::dropIfExists('rkakl');
    }
}
