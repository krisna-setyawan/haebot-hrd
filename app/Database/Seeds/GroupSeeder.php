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
            'name' => 'Grup Super admin',
            'description' => 'Administrator'
        ]);

        // menambahkan permision group ke dalam tabel groups_permissions
        // dengan cara loop semua module yang ada di permision karna 'super admin'
        // dapat mengakses semua module

        // proses ambil semua module atau permision
        $module_all = $permissions->findAll();
        foreach ($module_all as $mod_super) {
            // groups adalah model group buatan myth auth untuk menambahkan group kedalam permision
            // method addPermissionToGroup menerima 2 parameter bisa di cek di modelnya
            $groups->addPermissionToGroup($mod_super->id, $groups->getInsertID());
        }

        $groups->insert([
            'name' => 'Grup Owner',
            'description' => 'Pemilik Perusahaan'
        ]);
        foreach ($module_all as $mod_super) {
            $groups->addPermissionToGroup($mod_super->id, $groups->getInsertID());
        }




        $groups->insert([
            'name' => 'Grup SDM',
            'description' => 'Pengelola SDM dan User Aplikasi'
        ]);
        $where = "name!='Admin Supplier' AND name!='Admin Customer' AND name!='Penanggung Jawab Gudang'";
        $module_sdm = $permissions->where($where)->findAll();
        foreach ($module_sdm as $mod_sdm) {
            $groups->addPermissionToGroup($mod_sdm->id, $groups->getInsertID());
        }
        // foreach ($module_all as $mod_super) {
        //     $groups->addPermissionToGroup($mod_super->id, $groups->getInsertID());
        // }





        $groups->insert([
            'name' => 'Grup Kepala Divisi',
            'description' => 'Kepala setiap Divisi'
        ]);
        $where = "name!='Akuntansi' AND name!='SDM' AND name!='Admin Supplier' AND name!='Admin Customer' AND name!='Penanggung Jawab Gudang'";
        $module_kadiv = $permissions->where($where)->findAll();
        foreach ($module_kadiv as $mod_kadiv) {
            $groups->addPermissionToGroup($mod_kadiv->id, $groups->getInsertID());
        }

        $groups->insert([
            'name' => 'Grup RND',
            'description' => 'Research & Development'
        ]);
        $where = "name='Dashboard' OR name='Data Master' OR name='Produksi' OR name='Gudang' OR name='Inventaris' OR name='Laporan'";
        $module_rnd = $permissions->where($where)->findAll();
        foreach ($module_rnd as $mod_rnd) {
            $groups->addPermissionToGroup($mod_rnd->id, $groups->getInsertID());
        }

        $groups->insert([
            'name' => 'Grup Karyawan Penjualan',
            'description' => 'Admin Penjualan dan CS Penjualan'
        ]);
        $where = "name='Dashboard' OR name='Penjualan' OR name='Gudang'";
        $module_penjualan = $permissions->where($where)->findAll();
        foreach ($module_penjualan as $mod_penjualan) {
            $groups->addPermissionToGroup($mod_penjualan->id, $groups->getInsertID());
        }

        $groups->insert([
            'name' => 'Grup Karyawan Pembelian',
            'description' => 'Admin Pembelian dan CS Pembelian'
        ]);
        $where = "name='Dashboard' OR name='Pembelian' OR name='Gudang'";
        $module_pembelian = $permissions->where($where)->findAll();
        foreach ($module_pembelian as $mod_pembelian) {
            $groups->addPermissionToGroup($mod_pembelian->id, $groups->getInsertID());
        }
    }
}
