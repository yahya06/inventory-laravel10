<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang_out', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_out');
            $table->integer('id_barang');
            $table->integer('id_customer');
            $table->integer('qty')->nullable();
            $table->string('tgl_out')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_out');
    }
};
