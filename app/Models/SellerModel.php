<?php

namespace App\Models;

use CodeIgniter\Model;

class SellerModel extends Model
{
    protected $table = 'seller';
    protected $primaryKey = 'id';
    protected $useSoftDeletes   = true;
    protected $allowedFields = [
        'name',
        'picture',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
    ];
}
