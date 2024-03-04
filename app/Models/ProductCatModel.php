<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductCatModel extends Model
{
    protected $table            = 'cat_product';
    protected $primaryKey       = 'id';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['name', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
}
