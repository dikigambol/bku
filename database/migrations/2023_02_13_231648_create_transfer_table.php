<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer', function (Blueprint $table) {
            $table->id();
            $table->string('role', 25);
            $table->string('tgl_buku');
            $table->bigInteger('no_buku');
            $table->bigInteger('no_bukti');
            $table->string('jenis_transfer');
            $table->string('detail_transfer');
            $table->string('dari');
            $table->string('kepada');
            $table->string('bpp_unor')->nullable();
            $table->string('uraian');
            $table->string('jumlah');
            $table->string('terbilang');
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
        Schema::dropIfExists('transfer');
    }
}
