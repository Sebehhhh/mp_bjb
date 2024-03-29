<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';
    protected $useSoftDeletes   = true;
    protected $allowedFields = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'role_id');
    }
}
