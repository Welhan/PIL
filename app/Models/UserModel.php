<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'ID';
    protected $returnType       = 'object';
    protected $allowedFields    = ['Nama', 'Alamat', 'Jabatan', 'Divisi', 'NoHP', 'JenisKelamin', 'GolonganDarah', 'Email', 'Password', 'Level', 'Active', 'DateAdded', 'UserAdded', 'DateUpdate', 'UserUpdate'];


    public function getUser($Email = "")
    {
        $builder = $this->table($this->table);
        $builder->select('users.*,level.ID, divisi.Nama AS divisiName');
        $builder->join('Level', 'level.ID = users.Level', 'left');
        $builder->join('divisi', 'users.Divisi = divisi.DivisiNum', 'left');

        if ($Email) {
            $builder->where('users.Email', $Email);
        }

        $builder->orderby('users.ID', 'DESC');
        return $builder->get()->getResultObject();
    }
}
