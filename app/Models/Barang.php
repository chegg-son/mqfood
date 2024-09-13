<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // kategori_id masih belum dihapus
    protected $fillable = ['kode_barang', 'nama_barang', 'gambar_barang', 'stok', 'harga', 'kelas', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function transaksi_detail()
    {
        return $this->belongsTo(TransaksiDetail::class);
    }
}
