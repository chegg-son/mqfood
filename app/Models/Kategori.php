<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['jenis'];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
