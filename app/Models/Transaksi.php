<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['jenis_transaksi', 'faktur', 'nota'];

    public function detail()
    {
        return $this->hasMany(Transaksi_Detail::class);
    }
}
