<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $connection = 'portal_santri';
    protected $table = 'users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function user_role()
    {
        return DB::connection('portal_santri')
            ->table('roles')
            ->join('user_role', 'user_role.role_id', '=', 'roles.id')
            ->where('user_role.user_id', $this->id)
            ->select('roles.name') // Only select the role name
            ->first();
    }

    public function kelas()
    {
        return DB::connection('portal_santri')
            ->table('kelas')
            ->join('santri', 'santri.kelas_id', '=', 'kelas.id')
            ->where('santri.user_id', $this->id)
            ->first();
    }
}
