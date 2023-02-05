<?php

namespace App\Database\Seeds;

use App\Models\DivisiModel;
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

        $divisi = new DivisiModel();

        foreach ($data as $key => $value) {
            $divisi->save(['nama' => $value, 'deskripsi' => '-']);
        }
    }
}
