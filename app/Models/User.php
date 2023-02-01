<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use hasFactory;
    protected $table = 'm_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'password',
        'nama',
        'role_id',
        'no_telp',
        'alamat',
        'status',
        'updated_at',
        'modified_by',
        'created_by',
    ];
    protected $hidden = [
        'password',
    ];
}
