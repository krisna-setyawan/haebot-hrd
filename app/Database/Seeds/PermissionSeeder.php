<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'Dashboard',
            'Data Master',
            'Pembelian',
            'Penjualan',
            'Produksi',
            'Gudang',
            'Inventaris',
            'Akuntansi',
            'SDM',
            'Laporan',
            'Admin Supplier'
        ];

        foreach ($data as $key => $value) {
            $this->db->table('auth_permissions')->insert(['name' => $value]);
        }
    }
}
