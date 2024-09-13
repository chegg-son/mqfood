<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('faktur');
            $table->date('tanggal_transaksi');
            $table->string('order_id');
            $table->string('total');
            $table->string('status');
            $table->string('nama');
            $table->string('kelas');
            $table->string('keterangan');
            $table->string('alamat');
            $table->string('telepon');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
