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
        Schema::create('akun', function (Blueprint $table) {
            $table->id();
            $table->integer('perusahaan_id');
            $table->integer('kategori_id');
            $table->string('nama');
            $table->double('saldo_awal', 15, 4)->default('0.0000');
            $table->integer('induk_id')->default(0);
            $table->timestamps();

            $table->index('perusahaan_id');
            $table->index('kategori_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akun');
    }
};
