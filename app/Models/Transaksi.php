<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'faktur',
        'tanggal_transaksi',
        'order_id',
        'total',
        'status',
        'nama',
        'kelas',
        'keterangan',
        'telepon',
        'bukti_transfer',
        'expired_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function checkExpiration()
    // {
    //     if ($this->status === 'pending' && $this->expired_at && $this->expired_at < now()) {
    //         $this->update([
    //             'status' => 'expired',
    //         ]);
    //     }
    // }
}
