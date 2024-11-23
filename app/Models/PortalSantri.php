<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PortalSantri extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $connection = 'mysql2';
    protected $table = 'users';

    /**
     * Retrieve the role data for the authenticated user.
     *
     * @return object|null The role data object if found, or null if no role is assigned.
     */
    public function user_role()
    {
        return DB::connection('mysql2')
            ->table('roles')
            ->join('user_role', 'user_role.role_id', '=', 'roles.id')
            ->where('user_role.user_id', $this->id)
            ->first();
    }

    public function kelas()
    {
        return DB::connection('mysql2')
            ->table('kelas')
            ->join('santri', 'santri.kelas_id', '=', 'kelas.id')
            ->where('santri.user_id', $this->id)
            ->first();
    }
}