<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\PermissionModel;

class GroupSeeder extends Seeder
{
    public function run()
    {
        // menambahkan data ke tabel group
        $groups = new GroupModel();
        $permissions = new PermissionModel();


        $groups->insert([
            'name' => 'Super admin',
            'description' => 'Administrator'
        ]);

        // menambahkan permision group ke dalam tabel groups_permissions
        // dengan cara loop semua module yang ada di permision karna 'super admin'
        // dapat mengakses semua module

        // proses ambil semua module atau permision
        $module_super_admin = $permissions->findAll();
        foreach ($module_super_admin as $mod_super) {
            // groups adalah model group buatan myth auth untuk menambahkan group kedalam permision
            // method addPermissionToGroup menerima 2 parameter bisa di cek di modelnya
            $groups->addPermissionToGroup($mod_super->id, $groups->getInsertID());
        }



        $groups->insert([
            'name' => 'User',
            'description' => 'General user'
        ]);

        // proses ambil module atau permision yang hanya untuk users
        // user hanya dapat mengakses module 'Profil' dan 'Pengaturan' makanya digunakan where
        $where = "name='Profil' OR name='Pengaturan'";
        $module_user = $permissions->where($where)->findAll();
        foreach ($module_user as $mod_user) {
            $groups->addPermissionToGroup($mod_user->id, $groups->getInsertID());
        }



        $groups->insert([
            'name' => 'Limit User',
            'description' => 'Limited user'
        ]);

        // proses ambil module atau permision yang hanya untuk users
        // user hanya dapat mengakses module 'Profil' makanya digunakan where
        $where = "name='Profil'";
        $module_user = $permissions->where($where)->findAll();
        foreach ($module_user as $mod_user) {
            $groups->addPermissionToGroup($mod_user->id, $groups->getInsertID());
        }
    }
}
