<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TokoBuka extends Model
{
    use HasFactory;
    protected $fillable = ['hari', 'waktu_buka', 'waktu_tutup'];

    protected $casts = [
        'hari' => 'array',
    ];
}