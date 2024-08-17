<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['kode_barang', 'nama_barang', 'stok', 'harga', 'kelas'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function transaksi_detail()
    {
        return $this->belongsTo(Transaksi_Detail::class);
    }

}
