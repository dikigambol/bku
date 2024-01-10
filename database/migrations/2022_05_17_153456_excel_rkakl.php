<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExcelRkakl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excel_rkakl', function (Blueprint $table) {
            $table->id();
            $table->string('id_import');
            $table->string('kode');
            $table->string('desc');
            $table->string('vol');
            $table->string('harga');
            $table->string('jumlah');
            $table->string('sb');
            $table->string('sdcp');
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
        Schema::dropIfExists('excel_rkakl');
    }
}
