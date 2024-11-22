<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PortalSantri extends Authenticatable
{
    protected $connection = 'mysql2'; // Database kedua
    protected $table = 'users';       // Nama tabel
}
