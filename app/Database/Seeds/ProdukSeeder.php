<?php

namespace App\Database\Seeds;

use App\Models\GudangModel;
use App\Models\ProdukModel;
use App\Models\ProdukPlanModel;
use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        $builder_produk_kategori = $db->table('produk_kategori');
        $builder_produk_kategori->insert(['id' => 0, 'nama' => '-']);
        $the_id_kategori = $db->insertID();

        $gudangModel = new GudangModel();
        $gudangModel->save(['id' => 0, 'nama' => '-']);
        $the_id_gudang = $gudangModel->insertID();

        $modelProduk = new ProdukModel();

        $modelProduk->save([                // 1
            'id_kategori'           => $the_id_kategori,
            'id_gudang'             => $the_id_gudang,
            'sku'                   => 'kom-01',
            'hs_code'               => '',
            'nama'                  => 'komputer',
            'slug'                  => 'komputer',
            'satuan'                => 'Unit',
            'jenis'                 => 'SET',
            'jenis_produk'          => 'Hardware',
            'hg_produk_penyusun'    => 0,
            'harga_beli'            => '1000000',
            'harga_jual'            => '1500000',
            'stok'                  => '3',
            'berat'                 => '5 kg',
            'panjang'               => '2 m',
            'lebar'                 => '1 m',
            'tinggi'                => '1.5 m',
            'status_marketing'      => 'Belum desain',
            'note'                  => ''
        ]);
        $modelProduk->save([                // 2
            'id_kategori'           => $the_id_kategori,
            'id_gudang'             => $the_id_gudang,
            'sku'                   => 'mtr-01',
            'hs_code'               => '',
            'nama'                  => 'motor',
            'slug'                  => 'motor',
            'satuan'                => 'Unit',
            'jenis'                 => 'SET',
            'jenis_produk'          => 'Hardware',
            'hg_produk_penyusun'    => 0,
            'harga_beli'            => '5000000',
            'harga_jual'            => '7500000',
            'stok'                  => '5',
            'berat'                 => '5 kg',
            'panjang'               => '2 m',
            'lebar'                 => '1 m',
            'tinggi'                => '1.5 m',
            'status_marketing'      => 'Belum desain',
            'note'                  => ''
        ]);
        $modelProduk->save([                // 3
            'id_kategori'           => $the_id_kategori,
            'id_gudang'             => $the_id_gudang,
            'sku'                   => 'roda-01',
            'hs_code'               => '',
            'nama'                  => 'roda',
            'slug'                  => 'roda',
            'satuan'                => 'Pcs',
            'jenis'                 => 'SINGLE',
            'jenis_produk'          => 'Hardware',
            'hg_produk_penyusun'    => 0,
            'harga_beli'            => '500000',
            'harga_jual'            => '600000',
            'stok'                  => '10',
            'berat'                 => '5 kg',
            'panjang'               => '2 m',
            'lebar'                 => '1 m',
            'tinggi'                => '1.5 m',
            'status_marketing'      => 'Belum desain',
            'note'                  => ''
        ]);
        $modelProduk->save([                // 4
            'id_kategori'           => $the_id_kategori,
            'id_gudang'             => $the_id_gudang,
            'sku'                   => 'ssd-01',
            'hs_code'               => '',
            'nama'                  => 'ssd',
            'slug'                  => 'ssd',
            'satuan'                => 'Pcs',
            'jenis'                 => 'SINGLE',
            'jenis_produk'          => 'Hardware',
            'hg_produk_penyusun'    => 0,
            'harga_beli'            => '350000',
            'harga_jual'            => '400000',
            'stok'                  => '2',
            'berat'                 => '5 kg',
            'panjang'               => '2 m',
            'lebar'                 => '1 m',
            'tinggi'                => '1.5 m',
            'status_marketing'      => 'Belum desain',
            'note'                  => ''
        ]);
        $modelProduk->save([                // 5
            'id_kategori'           => $the_id_kategori,
            'id_gudang'             => $the_id_gudang,
            'sku'                   => 'proc-01',
            'hs_code'               => '',
            'nama'                  => 'prosesor',
            'slug'                  => 'prosesor',
            'satuan'                => 'Pcs',
            'jenis'                 => 'SINGLE',
            'jenis_produk'          => 'Hardware',
            'hg_produk_penyusun'    => 0,
            'harga_beli'            => '15000',
            'harga_jual'            => '20000',
            'stok'                  => '4',
            'berat'                 => '5 kg',
            'panjang'               => '2 m',
            'lebar'                 => '1 m',
            'tinggi'                => '1.5 m',
            'status_marketing'      => 'Belum desain',
            'note'                  => ''
        ]);
        $modelProduk->save([                // 6
            'id_kategori'           => $the_id_kategori,
            'id_gudang'             => $the_id_gudang,
            'sku'                   => 'rgkmtr-01',
            'hs_code'               => '',
            'nama'                  => 'rangka motor',
            'slug'                  => 'rangka-motor',
            'satuan'                => 'Pcs',
            'jenis'                 => 'SINGLE',
            'jenis_produk'          => 'Hardware',
            'hg_produk_penyusun'    => 0,
            'harga_beli'            => '1350000',
            'harga_jual'            => '200000',
            'stok'                  => '1',
            'berat'                 => '5 kg',
            'panjang'               => '2 m',
            'lebar'                 => '1 m',
            'tinggi'                => '1.5 m',
            'status_marketing'      => 'Belum desain',
            'note'                  => ''
        ]);
        $modelProduk->save([                // 7
            'id_kategori'           => $the_id_kategori,
            'id_gudang'             => $the_id_gudang,
            'sku'                   => 'ram-01',
            'hs_code'               => '',
            'nama'                  => 'ram',
            'slug'                  => 'ram',
            'satuan'                => 'Pcs',
            'jenis'                 => 'SINGLE',
            'jenis_produk'          => 'Hardware',
            'hg_produk_penyusun'    => 0,
            'harga_beli'            => '200000',
            'harga_jual'            => '250000',
            'stok'                  => '6',
            'berat'                 => '5 kg',
            'panjang'               => '2 m',
            'lebar'                 => '1 m',
            'tinggi'                => '1.5 m',
            'status_marketing'      => 'Belum desain',
            'note'                  => ''
        ]);
        $modelProduk->save([                // 8
            'id_kategori'           => $the_id_kategori,
            'id_gudang'             => $the_id_gudang,
            'sku'                   => 'baut-set-01',
            'hs_code'               => '',
            'nama'                  => 'baut set',
            'slug'                  => 'baut-set',
            'satuan'                => 'Dus',
            'jenis'                 => 'SINGLE',
            'jenis_produk'          => 'Hardware',
            'hg_produk_penyusun'    => 0,
            'harga_beli'            => '50000',
            'harga_jual'            => '75000',
            'stok'                  => '6',
            'berat'                 => '5 kg',
            'panjang'               => '2 m',
            'lebar'                 => '1 m',
            'tinggi'                => '1.5 m',
            'status_marketing'      => 'Belum desain',
            'note'                  => ''
        ]);
        $modelProduk->save([                // 9
            'id_kategori'           => $the_id_kategori,
            'id_gudang'             => $the_id_gudang,
            'sku'                   => 'baut-ecer-01',
            'hs_code'               => '',
            'nama'                  => 'baut',
            'slug'                  => 'baut',
            'satuan'                => 'Pcs',
            'jenis'                 => 'ECER',
            'jenis_produk'          => 'Hardware',
            'hg_produk_penyusun'    => 0,
            'harga_beli'            => '2000',
            'harga_jual'            => '3000',
            'stok'                  => '6',
            'berat'                 => '5 kg',
            'panjang'               => '2 m',
            'lebar'                 => '1 m',
            'tinggi'                => '1.5 m',
            'status_marketing'      => 'Belum desain',
            'note'                  => ''
        ]);
        $modelProduk->save([                // 10
            'id_kategori'           => $the_id_kategori,
            'id_gudang'             => $the_id_gudang,
            'sku'                   => 'baut-single-01',
            'hs_code'               => '',
            'nama'                  => 'besi single',
            'slug'                  => 'besi-single',
            'satuan'                => 'Pcs',
            'jenis'                 => 'SINGLE',
            'jenis_produk'          => 'Hardware',
            'hg_produk_penyusun'    => 0,
            'harga_beli'            => '40000',
            'harga_jual'            => '70000',
            'stok'                  => '2',
            'berat'                 => '5 kg',
            'panjang'               => '2 m',
            'lebar'                 => '1 m',
            'tinggi'                => '1.5 m',
            'status_marketing'      => 'Belum desain',
            'note'                  => ''
        ]);
        $modelProduk->save([                // 11
            'id_kategori'           => $the_id_kategori,
            'id_gudang'             => $the_id_gudang,
            'sku'                   => 'besi-ecer-01',
            'hs_code'               => '',
            'nama'                  => 'eceran besi',
            'slug'                  => 'eceran-besi',
            'satuan'                => 'Pcs',
            'jenis'                 => 'ECER',
            'jenis_produk'          => 'Hardware',
            'hg_produk_penyusun'    => 0,
            'harga_beli'            => '10000',
            'harga_jual'            => '15000',
            'stok'                  => '3',
            'berat'                 => '5 kg',
            'panjang'               => '2 m',
            'lebar'                 => '1 m',
            'tinggi'                => '1.5 m',
            'status_marketing'      => 'Belum desain',
            'note'                  => ''
        ]);
        $modelProduk->save([                // 12
            'id_kategori'           => $the_id_kategori,
            'id_gudang'             => $the_id_gudang,
            'sku'                   => 'besi-single-01',
            'hs_code'               => '',
            'nama'                  => 'besi single panjang',
            'slug'                  => 'besi-single-panjang',
            'satuan'                => 'Pcs',
            'jenis'                 => 'SINGLE',
            'jenis_produk'          => 'Hardware',
            'hg_produk_penyusun'    => 0,
            'harga_beli'            => '100000',
            'harga_jual'            => '150000',
            'stok'                  => '2',
            'berat'                 => '5 kg',
            'panjang'               => '2 m',
            'lebar'                 => '1 m',
            'tinggi'                => '1.5 m',
            'status_marketing'      => 'Belum desain',
            'note'                  => ''
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
