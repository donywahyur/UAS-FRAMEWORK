<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pemakaian', function (Blueprint $table) {
            $table->increments('trx_id');
            $table->string('no_tagihan');
            $table->integer('user_id');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->string('meter');
            $table->string('tarif');
            $table->string('total');
            $table->integer('created_by')->default(1);
            $table->integer('modified_by')->nullable();
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
        Schema::dropIfExists('t_pemakaian');
    }
};
