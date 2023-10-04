<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    
    protected $fillable = [
        'id_category',
        'id_kelas',
        'nama_barang',
        'stok_min',
        'satuan',
        'harga',
        'stok',

    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
