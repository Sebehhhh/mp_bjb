<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table            = 'video';
    protected $primaryKey       = 'id';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['title', 'link', 'showed', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by'];
}
