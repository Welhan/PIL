<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAccessModel extends Model
{
    protected $table            = 'user_access_menu';
    protected $primaryKey       = 'ID';
    protected $returnType       = 'object';
    protected $allowedFields    = ['MenuID', 'SubmenuID', 'UserID', 'View', 'Add', 'Edit', 'Delete', 'UserAdded', 'DateAdded', 'UserUpdate', 'DateUpdate'];

    public function userAccess($userID, $subID)
    {
        return $this->table($this->table)->getWhere(['UserID' => $userID, 'SubmenuID' => $subID])->getResultObject();
    }
}
