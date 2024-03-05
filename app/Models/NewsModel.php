<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table            = 'news';
    protected $primaryKey       = 'id';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['title', 'content', 'picture', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by'];

    // Definisikan relasi dengan tabel 'cat_news'
    public function category()
    {
        return $this->belongsTo('App\Models\NewsCatModel', 'cat_id');
    }
}
