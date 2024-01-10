<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailSpj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_spj', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_cart_spj');
            $table->string('id_detail_item');
            $table->string('status_spj');
            $table->string('id_jenis_spj');
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
        //
    }
}
