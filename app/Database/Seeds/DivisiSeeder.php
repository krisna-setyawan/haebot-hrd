<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DivisiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'Direktur',
            'SDM',
            'Produksi',
            'Gudang',
            'RND',
            'Customer Service',
            'Marketing',
        ];

        foreach ($data as $key => $value) {
            $this->db->table('divisi')->insert(['nama' => $value, 'deskripsi' => '-']);
        }
    }
}
