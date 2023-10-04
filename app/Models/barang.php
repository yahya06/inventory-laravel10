<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'category';
    
    protected $fillable = [
        'nama_category',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
