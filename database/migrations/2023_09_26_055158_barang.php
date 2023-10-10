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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->integer('id_category');
            $table->string('sku')->nullable();
            $table->string('nama_barang')->nullable();
            $table->integer('stok_min')->nullable();
            $table->enum('satuan', ['Kg','Meter','Gram','Pcs'])->nullable();
            $table->bigInteger('harga')->nullable();
            $table->integer('stok')->nullable();
            $table->enum('kelas',['A','B','C'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
