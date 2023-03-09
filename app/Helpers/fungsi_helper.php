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
        $akses = $db->table('user_access_menu')->getWhere(['user_id' => $userId, 'submenu_id' => $submenu, 'flag_view' => 1])->getFirstRow();
    } else if ($flag == 'add') {
        $akses = $db->table('user_access_menu')->getWhere(['user_id' => $userId, 'submenu_id' => $submenu, 'flag_add' => 1])->getFirstRow();
    } else if ($flag == 'edit') {
        $akses = $db->table('user_access_menu')->getWhere(['user_id' => $userId, 'submenu_id' => $submenu, 'flag_edit' => 1])->getFirstRow();
    } else if ($flag == 'delete') {
        $akses = $db->table('user_access_menu')->getWhere(['user_id' => $userId, 'submenu_id' => $submenu, 'flag_delete' => 1])->getFirstRow();
    } else if ($flag == 'control') {
        $akses = $db->table('user_access_menu')->getWhere(['user_id' => $userId, 'submenu_id' => $submenu, 'flag_control' => 1])->getFirstRow();
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
    $builder->select('DISTINCT(user_access_menu.menu_id), mst_menu.menu');
    $builder->join('mst_menu', 'mst_menu.id = user_access_menu.menu_id');
    $builder->join('mst_sub_menu', 'mst_sub_menu.id = user_access_menu.submenu_id');
    $builder->where(['user_access_menu.user_id' => $user_id]);
    $builder->where(['user_access_menu.flag_view' => 1]);
    $builder->where(['mst_sub_menu.active' => 1, 'Type' => 'Side']);
    $builder->orderBy('mst_menu.id', 'ASC');

    return $builder->get()->getResultObject();
}

function generateSubmenu($menu_id, $user_id = '')
{
    $db = \config\Database::connect();

    $builder = $db->table('mst_sub_menu');
    $builder->select('mst_sub_menu.*');
    if ($user_id) {
        $builder->join('user_access_menu', 'mst_sub_menu.id = user_access_menu.submenu_id');
        $builder->where(['mst_sub_menu.menu_id' => $menu_id, 'user_access_menu.flag_view' => 1, 'user_id' => $user_id]);
    } else {
        $builder->where('menu_id', $menu_id);
    }

    return $builder->get()->getResultObject();
}
