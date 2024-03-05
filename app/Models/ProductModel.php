<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'cat_id',
        'seller_id',
        'name',
        'price',
        'stok',
        'picture',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
    ];


    public function category()
    {
        return $this->belongsTo('App\Models\ProductCatModel', 'cat_id');
    }

    public function seller()
    {
        return $this->belongsTo('App\Models\SellerModel', 'seller_id');
    }
}
