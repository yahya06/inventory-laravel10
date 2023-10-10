<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangIn extends Model
{
    use HasFactory;
    protected $table = 'barang_in';
    
    protected $fillable = [
        'kode_in',
        'id_barang',
        'id_supp',
        'qty',
        'tgl_in',
        'keterangan',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
