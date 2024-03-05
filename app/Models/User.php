<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'role_id',
        'name',
        'username',
        'email',
        'password',
        'alamat',
        'telp',
        'photo',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
    ];

    // Definisikan relasi dengan tabel 'role'
    public function role()
    {
        return $this->belongsTo('App\Models\RoleModel', 'role_id');
    }
}
