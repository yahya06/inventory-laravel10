<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi_in', function (Blueprint $table) {
            $table->id();
            $table->integer('id_transaksi_in')->nullable();
            $table->integer('id_supplier')->nullable();
            $table->integer('status')->nullable();
            $table->integer('qty')->nullable();
            $table->string('tgl_transaksi_in')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_in');
    }
};
