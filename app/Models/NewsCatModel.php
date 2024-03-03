<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsCatModel extends Model
{
    protected $table            = 'cat_news';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];

    protected bool $allowEmptyInserts = false;
}
