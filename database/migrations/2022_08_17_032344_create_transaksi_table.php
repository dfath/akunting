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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->integer('perusahaan_id');
            $table->integer('akun_id');
            $table->string('tipe'); // income, income-transfer, income-split, income-recurring, expense, expense-transfer, expense-split, expense-recurring
            $table->dateTime('waktu_bayar');
            $table->double('jumlah', 15, 4);
            $table->text('deskripsi')->nullable();
            $table->boolean('rekonsiliasi')->default(0);
            $table->string('created_from', 100)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();

            $table->index('perusahaan_id');
            $table->index('akun_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
