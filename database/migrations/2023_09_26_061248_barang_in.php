<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang_in', function (Blueprint $table) {
            $table->id();
            $table->string('kode_in');
            $table->integer('id_barang');
            $table->integer('id_supp');
            $table->integer('qty')->nullable();
            $table->date('tgl_in')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_in');
    }
};
