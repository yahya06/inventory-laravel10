<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelasBarang extends Model
{
    use HasFactory;
    protected $table = 'category';
    
    protected $fillable = [
        'nama_kelas',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
