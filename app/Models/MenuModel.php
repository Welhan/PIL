<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table            = 'mst_menu';
    protected $primaryKey       = 'ID';
    protected $returnType       = 'object';
    protected $allowedFields    = [];
}
