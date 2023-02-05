<?php

namespace App\Database\Seeds;

use App\Models\SupplierModel;
use CodeIgniter\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $supplier = new SupplierModel();

        $supplier->save(
            [
                'nama' => 'Suplier 1',
                'slug' => url_title('Suplier 1', '-', true),
                'pemilik' => 'Pemilik 1',
                'alamat' => 'Alamat 1',
                'no_telp' => '08554651232',
            ]
        );
        $supplier->save(
            [
                'nama' => 'Suplier 2',
                'slug' => url_title('Suplier 2', '-', true),
                'pemilik' => 'Pemilik 2',
                'alamat' => 'Alamat 2',
                'no_telp' => '08554651232',
            ]
        );
    }
}
