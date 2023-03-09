<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'ID';
    protected $returnType       = 'object';
    protected $allowedFields    = ['Name', 'Alamat', 'Jabatan', 'Divisi', 'NoHP', 'JenisKelamin', 'GolonganDarah', 'Email', 'Password', 'Level', 'Active', 'DateAdded', 'UserAdded', 'DateUpdate', 'UserUpdate'];


    public function getUser($Email = "")
    {
        $builder = $this->table($this->table);
        $builder->select('users.*,level.ID');
        $builder->join('Level', 'level.ID = users.Level');

        if ($Email) {
            $builder->where('users.Email', $Email);
        }

        $builder->orderby('users.ID', 'DESC');
        return $builder->get()->getResultObject();
    }
}
