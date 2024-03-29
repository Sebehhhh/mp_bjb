<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsCatModel extends Model
{
    protected $table            = 'cat_news';
    protected $primaryKey       = 'id';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['name', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by'];

    public function news()
    {
        return $this->hasMany('App\Models\NewsModel', 'cat_id');
    }
}
