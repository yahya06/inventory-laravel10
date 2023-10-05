<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supply extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    
    protected $fillable = [
        'nama_supplier',
        'jenis_supplier',
        'keterangan',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
