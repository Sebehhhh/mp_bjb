<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
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
        'deleted_by'
    ];
}
