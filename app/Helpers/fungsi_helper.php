<?php
function check_login($Email)
{
    if ($Email) {
        return true;
    }

    return false;
}

function checkAccess($userId, $submenu, $flag)
{
    $db = \config\Database::connect();

    if ($flag == 'view') {
        $akses = $db->table('user_access_menu')->getWhere(['UserID' => $userId, 'SubmenuID' => $submenu, 'View' => 1])->getFirstRow();
    } else if ($flag == 'add') {
        $akses = $db->table('user_access_menu')->getWhere(['UserID' => $userId, 'SubmenuID' => $submenu, 'Add' => 1])->getFirstRow();
    } else if ($flag == 'edit') {
        $akses = $db->table('user_access_menu')->getWhere(['UserID' => $userId, 'SubmenuID' => $submenu, 'Edit' => 1])->getFirstRow();
    } else if ($flag == 'delete') {
        $akses = $db->table('user_access_menu')->getWhere(['UserID' => $userId, 'SubmenuID' => $submenu, 'Delete' => 1])->getFirstRow();
    }

    if ($akses) {
        return true;
    } else {
        return false;
    }
}

function generateMenu($user_id)
{
    $db = \config\Database::connect();

    $builder = $db->table('user_access_menu');
    $builder->select('DISTINCT(user_access_menu.MenuID), mst_menu.Menu');
    $builder->join('mst_menu', 'mst_menu.ID = user_access_menu.MenuID');
    $builder->join('mst_submenu', 'mst_submenu.ID = user_access_menu.SubmenuID');
    $builder->where(['user_access_menu.UserID' => $user_id]);
    $builder->where(['mst_menu.Active' => 1]);
    $builder->where(['user_access_menu.View' => 1]);
    $builder->where(['mst_submenu.Active' => 1, 'Type' => 'Side']);
    $builder->orderBy('mst_menu.ID', 'ASC');

    return $builder->get()->getResultObject();
}

function generateSubmenu($menu_id, $user_id = '')
{
    $db = \config\Database::connect();

    $builder = $db->table('mst_submenu');
    $builder->select('mst_submenu.*');
    if ($user_id) {
        $builder->join('user_access_menu', 'mst_submenu.ID = user_access_menu.SubmenuID');
        $builder->where(['mst_submenu.MenuID' => $menu_id, 'user_access_menu.View' => 1, 'UserID' => $user_id]);
    } else {
        $builder->where(['MenuID' => $menu_id, 'Type' => 'Side']);
    }

    return $builder->get()->getResultObject();
}

function generateOtherMenu()
{
    $db = \config\Database::connect();

    $builder = $db->table('mst_submenu');
    $builder->where(['mst_submenu.Active' => 1, 'Type' => 'Top']);
    $builder->orderBy('mst_submenu.ID', 'ASC');

    return $builder->get()->getResultObject();
}
