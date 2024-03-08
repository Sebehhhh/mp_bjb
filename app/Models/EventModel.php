<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table            = 'event';
    protected $primaryKey       = 'id';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['title', 'description', 'date', 'link', 'thumbnail', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by'];
}
