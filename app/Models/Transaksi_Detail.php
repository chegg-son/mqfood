<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Detail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['keterangan'];

    public function barang() {
        return $this->hasMany(Barang::class);
    }

    public function transaksi() {
        return $this->belongsTo(Transaksi::class);
    }
}
