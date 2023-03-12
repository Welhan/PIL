<?php

namespace App\Models;

use CodeIgniter\Model;

class SubmenuModel extends Model
{

    protected $table            = 'mst_submenu';
    protected $primaryKey       = 'ID';
    protected $returnType       = 'object';
    protected $allowedFields    = [];
}
