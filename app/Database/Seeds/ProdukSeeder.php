<?php

namespace App\Database\Seeds;

use App\Models\ProdukModel;
use App\Models\ProdukPlanModel;
use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $modelProduk = new ProdukModel();

        $modelProduk->save([                // 1
            'nama'          => 'komputer',
            'slug'          => 'komputer',
            'jenis'         => 'SET',
            'harga_beli'    => '1000000',
            'harga_jual'    => '1500000',
            'stok'          => '3',
        ]);
        $modelProduk->save([                // 2
            'nama'          => 'motor',
            'slug'          => 'motor',
            'jenis'         => 'SET',
            'harga_beli'    => '5000000',
            'harga_jual'    => '7500000',
            'stok'          => '5',
        ]);
        $modelProduk->save([                // 3
            'nama'          => 'roda',
            'slug'          => 'roda',
            'jenis'         => 'SINGLE',
            'harga_beli'    => '500000',
            'harga_jual'    => '600000',
            'stok'          => '10',
        ]);
        $modelProduk->save([                // 4
            'nama'          => 'ssd',
            'slug'          => 'ssd',
            'jenis'         => 'SINGLE',
            'harga_beli'    => '350000',
            'harga_jual'    => '400000',
            'stok'          => '2',
        ]);
        $modelProduk->save([                // 5
            'nama'          => 'prosesor',
            'slug'          => 'prosesor',
            'jenis'         => 'SINGLE',
            'harga_beli'    => '15000',
            'harga_jual'    => '20000',
            'stok'          => '4',
        ]);
        $modelProduk->save([                // 6
            'nama'          => 'rangka motor',
            'slug'          => 'rangka-motor',
            'jenis'         => 'SINGLE',
            'harga_beli'    => '1350000',
            'harga_jual'    => '200000',
            'stok'          => '1',
        ]);
        $modelProduk->save([                // 7
            'nama'          => 'ram',
            'slug'          => 'ram',
            'jenis'         => 'SINGLE',
            'harga_beli'    => '200000',
            'harga_jual'    => '250000',
            'stok'          => '6',
        ]);
        $modelProduk->save([                // 8
            'nama'          => 'baut set',
            'slug'          => 'baut-set',
            'jenis'         => 'SINGLE',
            'harga_beli'    => '50000',
            'harga_jual'    => '75000',
            'stok'          => '6',
        ]);
        $modelProduk->save([                // 9
            'nama'          => 'baut',
            'slug'          => 'baut',
            'jenis'         => 'ECER',
            'harga_beli'    => '2000',
            'harga_jual'    => '3000',
            'stok'          => '6',
        ]);
        $modelProduk->save([                // 10
            'nama'          => 'besi single',
            'slug'          => 'besi-single',
            'jenis'         => 'SINGLE',
            'harga_beli'    => '40000',
            'harga_jual'    => '70000',
            'stok'          => '2',
        ]);
        $modelProduk->save([                // 11
            'nama'          => 'eceran besi',
            'slug'          => 'eceran-besi',
            'jenis'         => 'ECER',
            'harga_beli'    => '10000',
            'harga_jual'    => '15000',
            'stok'          => '3',
        ]);
        $modelProduk->save([                // 12
            'nama'          => 'besi single panjang',
            'slug'          => 'besi-single-panjang',
            'jenis'         => 'SINGLE',
            'harga_beli'    => '100000',
            'harga_jual'    => '150000',
            'stok'          => '2',
        ]);



        // PLAN
        $modelProdukPlan = new ProdukPlanModel();

        // Komputer
        $modelProdukPlan->save([
            'id_produk_jadi'    => 1,  // komputer
            'id_produk_bahan'   => 4,  // ssd
            'qty_bahan'         => 1,
        ]);
        $modelProdukPlan->save([
            'id_produk_jadi'    => 1,  // komputer
            'id_produk_bahan'   => 5,  // prosesor
            'qty_bahan'         => 1,
        ]);
        $modelProdukPlan->save([
            'id_produk_jadi'    => 1,  // komputer
            'id_produk_bahan'   => 7,  // ram
            'qty_bahan'         => 2,
        ]);
        $modelProdukPlan->save([
            'id_produk_jadi'    => 1,  // komputer
            'id_produk_bahan'   => 8,  // baut set
            'qty_bahan'         => 1,
        ]);



        // Motor
        $modelProdukPlan->save([
            'id_produk_jadi'    => 2,  // motor
            'id_produk_bahan'   => 3,  // roda
            'qty_bahan'         => 2,
        ]);
        $modelProdukPlan->save([
            'id_produk_jadi'    => 2,  // motor
            'id_produk_bahan'   => 6,  // rangka
            'qty_bahan'         => 1,
        ]);
        $modelProdukPlan->save([
            'id_produk_jadi'    => 2,  // motor
            'id_produk_bahan'   => 8,  // baut set
            'qty_bahan'         => 1,
        ]);
        $modelProdukPlan->save([
            'id_produk_jadi'    => 2,  // motor
            'id_produk_bahan'   => 10,  // besi single
            'qty_bahan'         => 2,
        ]);




        // Besi single
        $modelProdukPlan->save([
            'id_produk_jadi'    => 10,  // besi single
            'id_produk_bahan'   => 11,  // besi ecer
            'qty_bahan'         => 3,
        ]);

        // Besi single panjang
        $modelProdukPlan->save([
            'id_produk_jadi'    => 12,  // besi single
            'id_produk_bahan'   => 11,  // besi ecer
            'qty_bahan'         => 5,
        ]);
    }
}
