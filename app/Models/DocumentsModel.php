<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentsModel extends Model
{
    protected $table            = 'documents';
    protected $primaryKey       = 'ID';
    protected $returnType       = 'object';
    protected $allowedFields    = ['Name', 'Destination', 'Departure', 'Return', 'PoliceNo', 'Vehicle', 'User', 'Email', 'Color', 'Description', 'Active', 'DateAdded', 'UserAdded', 'DateUpdate', 'UserUpdate'];

    public function getDocuments()
    {
        $builder = $this->db->table('documents');
        $builder->join('users', 'documents.Email = users.Email AND documents.DriverID = users.ID');
        $builder->orderBy('documents.ID', 'DESC');
        return $builder->get()->getResult();
    }
}
