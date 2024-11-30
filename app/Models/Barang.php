<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // kategori_id masih belum dihapus
    protected $fillable = ['kode_barang', 'nama_barang', 'gambar_barang', 'stok', 'harga', 'kategori_id', 'supplier_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id')->where('is_admin', 3);
    }


    public function transaksi_detail()
    {
        return $this->belongsTo(TransaksiDetail::class);
    }
}
